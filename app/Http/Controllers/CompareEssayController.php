<?php

namespace App\Http\Controllers;
use App\Models\Ulangan;
use Illuminate\Http\Request;

class CompareEssayController extends Controller
{
    public function index()
    {
        // dd(request('idSoal'));
        $ulangans = Ulangan::latest();        
        return view('compare-essay.index',compact('ulangans'));
        // echo $ulangans;
    }

    public function create(){
        return view('compare-essay.create-soal');
    }

    public function show($idSoal){
        // dd(request('idSoal'));
        // $ulangans = Ulangan::latest();        
        // if(request('idSoal')){
        //     $ulangans->where('idSoal', 'like' , '%' . request('idSoal'). '%');
        //     return view('compare-essay.index',['ulangans' => $ulangans]);
        // }else{

        // }
    }    
}
