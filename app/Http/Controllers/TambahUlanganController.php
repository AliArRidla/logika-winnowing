<?php

namespace App\Http\Controllers;

use App\Models\Ulangan;
use Illuminate\Http\Request;

class TambahUlanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('compare-essay.create-soal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'idSoal' => 'required',
            'jumlahSoal' => 'required|string|max:155',            
            // 'status' => 'required'
        ]);

        $jumlahSoals = [
            'idSoal' => $request->idSoal,
            'jumlahSoal' => $request->jumlahSoal,
        ];
        //
        // echo 'Id Soal:' . $request->idSoal . '<br>';
        // echo 'Jumlah Soal:' . $request->jumlahSoal ;    

        return view('compare-essay.create-soal',compact('jumlahSoals'));
        // return redirect()->action([TambahUlanganController::class, 'index'],compact('jumlahSoal'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idSoal' => 'required',
            'soal' => 'required',
            'jawabanGuru' => 'required'
        ]);
    

        for ($i=0; $i < $request->jumlahSoal; $i++) { 
            $ulangan[$i] = Ulangan::create([
                        'idSoal' => $request->idSoal[$i], 
                        'soal' => $request->soal[$i], 
                        'jawabanGuru' => $request->jawabanGuru[$i], 
                    ]);         
            $ulangan[$i] = '';     
        }



        if ($ulangan) {
            return redirect()
                ->route('compare-essay.index')
                ->with([                    
                    'success' => 'Soal berhasil di tambahkan',
                    'ulangan' => $ulangan,
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
     * @param  \App\Models\Ulangan  $ulangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ulangan $ulangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ulangan  $ulangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ulangan $ulangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ulangan  $ulangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ulangan $ulangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ulangan  $ulangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ulangan $ulangan)
    {
        //
    }
}
