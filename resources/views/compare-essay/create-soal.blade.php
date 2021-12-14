@extends('layouts.master');
@section('content')
<div class="container"> 
    <section class="py-5 border-bottom">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Buat Soal Essay</h2>
                <p class="lead mb-0">Tolong isi semua kolom</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <form method="POST" action="{{route('tambah-soal.store')}}" >
                    @csrf
                    <input type="text" name="jumlahSoal" value="{{$jumlahSoals['jumlahSoal']}}" hidden>
                    <input type="text" name="idSoal" value="{{$jumlahSoals['idSoal']}}" hidden>
                    <div class="col-lg-12">
                        <div class="card mb-4">     
                            
                            @for ($i = 1; $i < $jumlahSoals['jumlahSoal']+1; $i++)                                                                                        
                                <div class="ms-4 row ">
                                    <div class="col-lg-4 m-auto gap-auto">
                                        <div class="display-2">{{$i}}</div>
                                        {{-- <div class="display-2">{{$item->jumlahSoal}}</div> --}}
                                        {{-- <div class="display-2">{{$jumlahSoals[$i]}}</div> --}}
                                    </div>
                                    <div class="col-lg-8">
                                        {{-- {{ $jumlahSoal }} --}}                                    
                                            <label for="soal" class="mt-3">Soal Essay</label>
                                            <input type="text" class="form-control " id="soal" name="soal[]" placeholder="Masukkan soal nya " required>
                                            <label for="soal" class="mt-3">Jawaban Essay</label>
                                            <input type="text" class="form-control mb-3" id="jawabanGuru" name="jawabanGuru[]" placeholder="Masukkan Jawaban nya " required>                                                                            
                                    </div>
                                </div>
                                <hr width="70%" class="mx-auto">
                            @endfor
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
