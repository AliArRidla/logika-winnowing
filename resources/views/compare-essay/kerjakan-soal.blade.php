@extends('layouts.master')
@section('content')
<div class="container"> 
    <section class="py-5 border-bottom">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Kerjakan Soal Essay</h2>
                <p class="lead mb-0">Tolong isi semua kolom</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <section class="pt-4 mt-5">
                    <div class="container px-lg-5">
                        <div class="row gx-lg-5 mb-5">
                            {{-- <h1 class="display-4">{{$ulangans['idSoal']}}</h1> --}}
                            {{-- <div class="col-lg-6 col-xxl-4 mb-5"> --}}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Soal</th>
                                    <th scope="col">Soal</th>
                                    <th scope="col">Jawaban Essay</th>
                                    <th scope="col">Similarity</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ulangans as $item)
                                    <tr>
                                        {{-- <th scope="row"></th> --}}
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$item->idSoal}}</th>
                                        <td>{{$item->soal}}</td>
                                        <td>{{$item->jawabanGuru}}</td>                            
                                        <td>{{$item->similarity}}</td>                            
                                    </tr>        
                                    @endforeach
                                                    
                                </tbody>
                            </table>        
                        </div>
                    </div>
                </section>  
            </div>

            <div class="row gx-5 justify-content-center">
                <form method="POST" action="{{route('kerjakan-soal.store')}}" >
                    @csrf
                    {{-- <input type="text" name="jumlahSoal" value="{{$jumlahSoals['jumlahSoal']}}" hidden> --}}
                    <div class="col-lg-12">
                        <div class="card mb-4">     
                            {{-- @for($i = 0; $i < $jumlahSoals['jumlahSoal']; $i++)
                            
                            @endfor --}}
                            
                            {{-- @for ($i = 0; $i < count($ulangans); $i++)        --}}
                            @foreach ($ulangans as $i => $item)                                                        
                                <div class="ms-4 row ">
                                    <div class="col-lg-4 m-auto gap-auto">
                                        <div class="display-2">{{$i}}</div>
                                        {{-- <div class="display-2">{{$item->jumlahSoal}}</div> --}}
                                        {{-- <div class="display-2">{{$jumlahSoals[$i]}}</div> --}}
                                    </div>
                                    <div class="col-lg-8">
                                        {{-- {{ $jumlahSoal }} --}}                   
                                        {{-- {{strval($i).$jumlahSoals['idSoal'].strval($i)}}                  --}}
                                        {{-- {{strval($i).$jumlahSoals['idSoal'].strval($i)}} --}}
                                            {{-- <input type="text" name="jumlahSoal" value="{{count($i)}}" hidden> --}}
                                            <input type="text" name="idSoal[]" value="{{$item->idSoal}}" hidden>                                                                 
                                            <label for="soal" class="mt-3">Soal Essay</label>
                                            <input type="text" class="form-control " id="soal" name="soal[]" placeholder="{{$item->soal}}" required disabled>
                                            <label for="soal" class="mt-3">Jawaban Essay</label>
                                            <input type="text" class="form-control mb-3" id="jawabanSiswa" name="jawabanSiswa[]" placeholder="Masukkan Jawaban nya " required>                                                       
                                            {{-- <input type="text" class="form-control mb-3" id="jawabanGuru" name="jawabanGuru[]" placeholder="Masukkan Jawaban nya " required>                                                        --}}
                                    </div>
                                </div>
                                <hr width="70%" class="mx-auto">
                                @endforeach                                                                                 
                            {{-- @endfor --}}
                        </div>     
                        <div class="text-center">
                            {{-- <button type="button" >Close</button>             --}}
                            <a href="{{ route('compare-essay.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>                                  
                        </div>                                    
                    </div>                
                </form>
            </div>
        </div>
    </section> 
</div>
@endsection
