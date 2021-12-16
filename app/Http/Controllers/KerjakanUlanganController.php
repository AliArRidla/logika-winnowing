<?php

namespace App\Http\Controllers;
use App\Models\Ulangan;
use App\Models\KerjakanUlangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KerjakanUlanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        for($i = 0; $i < count($request->jawabanSiswa); $i++){
            // $data = substr($request->idSoal[$i],strpos($request->idSoal[$i],"_")+1);                
            $jawabanUlangans[$i] = DB::table('kerjakan_ulangans')->insert([                
                'idSoal' => $request->idSoal[$i],                 
                'jawabanSiswa' => $request->jawabanSiswa[$i], 
            ]);
            $jawabanUlangans[$i] = '';              
        }      

        if ($jawabanUlangans) {
            return redirect()
                ->route('compare-essay.index')
                ->with([
                    'success' => 'Jawaban berhasil di tambahkan',
                    // compact($ulangans)
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $keyword = request('idSoal');       
        $ulangans = Ulangan::where('idSoal', 'like' , '%' . request('idSoal'). '%')->get();
        
        // if(request('idSoal')){
        //     $ulangans->where('idSoal', 'like' , '%' . request('idSoal'). '%');
        //     return view('compare-essay.kerjakan-soal',['ulangans' => $ulangans]);
        // }else{

        // }

        if(!empty($ulangans)){            
            return view('compare-essay.kerjakan-soal',['ulangans' => $ulangans]);
        }else{
            dd($keyword);
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
