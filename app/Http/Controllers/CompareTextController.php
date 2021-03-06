<?php

namespace App\Http\Controllers;

use App\Models\CompareText;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CompareTextController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
                return view('compare-text.index');
        }


        public function store(Request $request)
        {
                $kalimat = $request->input('text-1');
                $kalimat2 = $request->input('text-2');

                $n = $request->input('ngram') ? (int)$request->input('ngram') : 5;
                $window = $request->input('window') ? (int)$request->input('window') : 4;
                $prima = (int)$request->input('prima');

                $w = new winnowing($kalimat, $kalimat2);
                $w->SetPrimeNumber($prima);
                $w->SetNGramValue($n);
                $w->SetNWindowValue($window);
                $w->process();

                $s = '';
                foreach ($w->GetNGramFirst() as $ng) {
                        $s .= $ng . ' ';
                }

                $s2 = '';
                foreach ($w->GetNGramSecond() as $ng) {
                        $s2 .= $ng . ' ';
                }

                $s3 = '';
                foreach ($w->GetRollingHashFirst() as $rl) {
                        $s3 .= $rl . ' ';
                }

                $s4 = '';
                foreach ($w->GetRollingHashSecond() as $rl) {
                        $s4 .= $rl . ' ';
                }

                $wdf = $w->GetWindowFirst();
                $sWf = '';
                for ($i = 0; $i < count($wdf); $i++) {
                        $s = '';
                        for ($j = 0; $j < $window; $j++) {
                                $s .= $wdf[$i][$j] . ' ';
                        }
                        $sWf = "W-" . ($i + 1) . " : {" . rtrim($s, ' ') . "}\n";
                }

                $wds = $w->GetWindowSecond();
                $sWs = '';
                for ($i = 0; $i < count($wds); $i++) {
                        $s = '';
                        for ($j = 0; $j < $window; $j++) {
                                $s .= $wds[$i][$j] . ' ';
                        }
                        $sWs = "W-" . ($i + 1) . " : {" . rtrim($s, ' ') . "}\n";
                }

                $s7 = '';
                foreach ($w->GetFingerprintsFirst() as $fp) {
                        $s7 .= $fp . ' ';
                }

                $s8 = '';
                foreach ($w->GetFingerprintsSecond() as $fp) {
                        $s8 .= $fp . ' ';
                }

                $count_fingers1 = count($w->GetFingerprintsFirst());
                $count_fingers2 = count($w->GetFingerprintsSecond());

                $count_union_fingers = count(array_merge($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));
                $count_intersect_fingers = count(array_intersect($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));
                $result = [
                        'nGramFirst' => rtrim($s, ' '),
                        'nGramSecond' => rtrim($s2, ' '),
                        'rollingHashFirst' => rtrim($s3, ' '),
                        'rollingHashSecond' => rtrim($s4, ' '),
                        'windowFirst' => $sWf,
                        'windowSecond' => $sWs,
                        'FingerprintsFirst' => rtrim($s7, ' '),
                        'FingerprintsSecond' => rtrim($s8, ' '),
                        'countFinger1' => $count_fingers1,
                        'countFinger2' => $count_fingers2,
                        'countUnionFingers' => $count_union_fingers,
                        'countIntersectFingers' => $count_intersect_fingers,
                        'percent' => $w->GetJaccardCoefficient()
                ];

                return view('compare-text.hasil')->withresult($result);
        }
}


class winnowing
{
        private $word1 = '';
        private $word2 = '';

        //input properties
        // private $prime_number = 3;
        // private $n_gram_value = 2;
        // private $n_window_value = 4;

        //output properties
        private $arr_n_gram1;
        private $arr_n_gram2;
        private $arr_rolling_hash1;
        private $arr_rolling_hash2;
        private $arr_window1;
        private $arr_window2;
        private $arr_fingerprints1;
        private $arr_fingerprints2;

        public function SetPrimeNumber($value)
        {
                $this->prime_number = $value;
        }
        public function SetNGramValue($value)
        {
                $this->n_gram_value = $value;
        }
        public function SetNWindowValue($value)
        {
                $this->n_window_value = $value;
        }
        public function GetNGramFirst()
        {
                return $this->arr_n_gram1;
        }
        public function GetNGramSecond()
        {
                return $this->arr_n_gram2;
        }
        public function GetRollingHashFirst()
        {
                return $this->arr_rolling_hash1;
        }
        public function GetRollingHashSecond()
        {
                return $this->arr_rolling_hash2;
        }
        public function GetWindowFirst()
        {
                return $this->arr_window1;
        }
        public function GetWindowSecond()
        {
                return $this->arr_window2;
        }
        public function GetFingerprintsFirst()
        {
                return $this->arr_fingerprints1;
        }
        public function GetFingerprintsSecond()
        {
                return $this->arr_fingerprints2;
        }
        public function GetJaccardCoefficient($prosen = true)
        {
                if ($prosen)
                        return round(($this->jaccard_coefficient * 100), 2);
                else
                        return $this->jaccard_coefficient;
        }

        function __construct($w1, $w2)
        {
                $this->word1 = $w1;
                $this->word2 = $w2;
        }

        public function process()
        {
                if (($this->word1 == '') || ($this->word2 == '')) exit;

                //langkah 1 : buang semua huruf yang bukan kelompok [a-z A-Z 0-9] dan ubah menjadi huruf kecil semua (lowercase)
                $this->word1 = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $this->word1)));
                $this->word2 = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $this->word2)));

                //langkah 2 : buat N-Gram
                $this->arr_n_gram1 = $this->n_gram($this->word1, $this->n_gram_value);
                $this->arr_n_gram2 = $this->n_gram($this->word2, $this->n_gram_value);

                //langkah 3 : rolling hash untuk masing-masing n gram
                $this->arr_rolling_hash1 = $this->rolling_hash($this->arr_n_gram1);
                $this->arr_rolling_hash2 = $this->rolling_hash($this->arr_n_gram2);

                //langkah 4 : buat windowing untuk masing-masing tabel hash
                $this->arr_window1 = $this->windowing($this->arr_rolling_hash1, $this->n_window_value);
                $this->arr_window2 = $this->windowing($this->arr_rolling_hash2, $this->n_window_value);

                //langkah 5 : cari nilai minimum masing-masing window table (fingerprints)
                $this->arr_fingerprints1 = $this->fingerprints($this->arr_window1);
                $this->arr_fingerprints2 = $this->fingerprints($this->arr_window2);

                //langkah 6 : hitung koefisien plagiarisme memanfaatkan persamaan Jaccard Coefficient
                $this->jaccard_coefficient = $this->jaccard_coefficient($this->arr_fingerprints1, $this->arr_fingerprints2);
        }

        private function n_gram($word, $n)
        { //baru                
                $ngrams = array();
                $panjang = strlen($word);
                for ($i = 0; $i < $panjang; $i++) {
                        if ($i > ($n - 2)) {
                                $ng = '';
                                for ($j = $n-1; $j >= 0; $j--) {
                                        $ng .= $word[$i - $j];
                                }
                                $ngrams[] = $ng;
                        }
                }
                // var_dump($ngrams);
                return $ngrams;
        }


        private function char2hash($string)
        {
                if (strlen($string) == 1) {
                        return ord($string);
                } else {
                        $result = 0;
                        $length = strlen($string);
                        for ($i = 0; $i < $length; $i++) {
                                $result += ord(substr($string, $i, 1)) * pow($this->prime_number, $length - $i);
                                // var_dump($this->prime_number);
                                // var_dump($i);
                                // var_dump($length-$i);
                                // var_dump(pow($this->prime_number, $length - $i));
                        }                        
                        return $result;
                }
        }

        private function rolling_hash($ngram) //baru
        {
                $roll_hash = array();
                foreach ($ngram as $ng) {
                        $roll_hash[] = $this->char2hash($ng);
                }
                return $roll_hash;
        }


        private function windowing($rolling_hash, $n) //mengikuti dari ngram
        {
                // var_dump($rolling_hash);
                // var_dump($n);
                $ngram = array(); //variable baru ngram
                $length = count($rolling_hash); //panjang dari rolling hash
                $x = 0; // variable kosong
                for ($i = 0; $i < $length; $i++) {
                        if ($i > ($n - 2)) { //jika 0 > 1-2(-1)
                                $ngram[$x] = array(); // isi dari array ngram di indeks 0
                                $y = 0; //variable kosong
                                for ($j = $n - 1; $j >= 0; $j--) { //-1-1(-2) jika -2>=0 maka -2 dikurangi 1
                                        $ngram[$x][$y] = $rolling_hash[$i - $j];
                                        $y++;
                                }
                                $x++;
                        }
                }
                
                return $ngram;
        }

        private function fingerprints($window_table)
        {
                $fingers = array();
                for ($i = 0; $i < count($window_table); $i++) {
                        $min = $window_table[$i][0];
                        for ($j = 1; $j < $this->n_window_value; $j++) {
                                if ($min > $window_table[$i][$j])
                                        $min = $window_table[$i][$j];
                        }
                        $fingers[] = $min;
                }
                return $fingers;
        }


        private function jaccard_coefficient($fingerprint1, $fingerprint2)
        {
                // ini_set('memory_limit', '-1');
                $arr_intersect = array_intersect($fingerprint1, $fingerprint2);
                $arr_union = array_merge($fingerprint1, $fingerprint2);

                $count_intersect_fingers = count($arr_intersect);
                $count_union_fingers = count($arr_union);

                $coefficient = $count_intersect_fingers / ($count_union_fingers - $count_intersect_fingers);
                //     var_dump($count_union_fingers);

                return $coefficient;
        }
}
