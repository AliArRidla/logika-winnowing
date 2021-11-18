<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareEssayController extends Controller
{
    public function index()
    {
        return view('compare-essay.index');
    }

    public function create(){
        return view('compare-essay.create-soal');
    }
}
