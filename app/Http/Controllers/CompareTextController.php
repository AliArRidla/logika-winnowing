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
                $window = $request->input('window') ? (int)$request->input('ngram') : 4;
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
                $n_grams = $n;
                $ngrams = array();
                $leg = strlen($word);
                for ($i = 0; $i <= ($leg - $n_grams); $i++) {
                        $ngrams[$i] = substr($word, $i, $n_grams);
                }
                return $ngrams;
                // var_dump($ngrams);
        }
        private function rolling_hash($ngrams) //baru
        {
                $h = 0; // file temp
                $roll_hash = array(); // variable yang akan menampung data 
                for ($i = 0; $i < count($ngrams); $i++) {  // perulangan outer menhitung bnyak nya count character ngrams

                        for ($j = 0; $j < strlen($ngrams[$i]); $j++) { //pisahkan satu-satu dari setiap karakter
                                //       untuk kasus bun bisa karena bun hanya di pangkat kan 1 kali atau 1 baris
                                $pow = pow($this->prime_number, (strlen($ngrams[$i]) - ($j + 1))); //buatlah sebuah pangkat yang akan dikalikan 
                                // var_dump($pow); //print pangkat setelah dikalikan
                                // var_dump($ngrams[$i]);        //print character nya
                                $h += (ord(substr($ngrams[$i], $j, 1)) * $pow); //hashing asci                                
                                // var_dump(substr($ngrams[$i], $j, 1));        //print character nya
                                // var_dump($pow);
                                // echo "<b>dikali $pow </b> sama dengan = $h; </br>";
                                // $h = array();
                                // $h += $h;
                                // echo "<b>$h</b></br>";
                        }

                        // for ($k = 0; $k < $i; $k++) {
                        // $h += $h[$i];
                        // echo "<b>$h</b></br>";
                        // }

                        $roll_hash[$i] = $h;
                        // $h =0;
                }
                // var_dump($ngrams);
                return $roll_hash;
        }


        private function windowing($roll_hash, $n) //baru
        {
                $window = $n;
                $leg = count($roll_hash);
                $windows = array(array());
                for ($i = 0; $i <= ($leg - $window); $i++) {
                        for ($j = 0; $j < $window; $j++) {
                                $windows[$i][$j] = $roll_hash[$j + $i];
                        }
                }
                return $windows;
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
                ini_set('memory_limit', '-1');
                $arr_intersect = array_intersect($fingerprint1, $fingerprint2);
                $arr_union = array_merge($fingerprint1, $fingerprint2);

                $count_intersect_fingers = count($arr_intersect);
                $count_union_fingers = count($arr_union);

                $coefficient = $count_intersect_fingers / $count_union_fingers;
                //     var_dump($count_union_fingers);

                return $coefficient;
        }
}


