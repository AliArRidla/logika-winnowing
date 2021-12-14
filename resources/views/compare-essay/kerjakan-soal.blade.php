@extends('layouts.master');
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
        </div>
    </section> 
</div>
@endsection
