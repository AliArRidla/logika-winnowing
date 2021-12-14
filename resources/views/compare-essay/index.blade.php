@extends('layouts.master')
@section('header')
    <!-- Header-->        
    <header class="bg-dark py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 rounded-3 text-center text-white ">
                           <!-- Notifikasi menggunakan flash session data -->
                           @if (session('success'))
                           <div class="alert alert-success">
                               {{ session('success') }}
                           </div>
                           @endif
           
                           @if (session('error'))
                           <div class="alert alert-error">
                               {{ session('error') }}
                           </div>
                           @endif
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold ">Let's create the question</h1>
                    <p class="fs-4 mb-5">Silahkan tekan button dibawah untuk membuat essay dan berapa jumlah essay yang akan dibuat</p>
                    <a class="btn btn-primary btn-lg " href="#!" data-bs-toggle="modal" data-bs-target="#buatEssayModal">Buat Essay</a>
                    <a class="btn btn-outline-secondary btn-lg" href="#!" data-bs-toggle="modal" data-bs-target="#kerjakanEssayModal">Kerjakan Essay</a>
                </div>
            </div>
        </div>
    </header>
     <!-- Modal -->
     <div class="modal fade" id="buatEssayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Soal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{route('tambah-soal.create')}}" >
                    @csrf
                    <div class="mb-3">
                      <label for="idSoal" class="form-label">ID Soal</label>                      
                      <input type="text" class="form-control" name="idSoal" id="idSoal" value="<?php echo uniqid();?>">                    
                      <div id="id-note" class="form-text">Masih dalam perbaikan (automatic generate)</div>
                    </div>
                    <div class="mb-3">
                      <label for="jumlahSoal" class="form-label">Masukkan jumlah soal ? </label>
                      <select class="form-select" aria-label="Default select example" name="jumlahSoal">
                        <option selected>Pilih angka</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>                    
                  
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>            
                    <button type="submit" class="btn btn-primary">Create</button>            
                    {{-- <a class="btn btn-primary" href="{{route('tambah-soal.store')}}" >Create</a> --}}
                </form>            
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="kerjakanEssayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="{{route('kerjakan-soal.show','idSoal')}}">                
                    <div class="modal-body">
                            <div class="mb-3">
                            <label for="idSoal" class="form-label">ID Ujian</label>
                            <input type="text" class="form-control" id="idSoal" name="idSoal">
                            <div id="text" class="form-text">Masih dalam perbaikan (automatic generate)</div>
                            </div>                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>            
                        <button type="submit" class="btn btn-primary">Create</button>  
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>             --}}
                        {{-- <a class="btn btn-primary" href="{{route('compare-essay.show/idSoal')}}" >Create</a>                 --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var myModal = document.getElementById('exampleModal')
        var myInput = document.getElementById('myInput')
        
        myModal.addEventListener('shown.bs.modal', function () {
          myInput.focus()
        })
    </script>
@endsection
         
@section('content')

    @if ($ulangans != null && session('success') )
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
    @else
          <!-- Page Content-->
    <section class="pt-4 mt-5">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                            <h2 class="fs-4 fw-bold">Fresh new layout</h2>
                            <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-cloud-download"></i></div>
                            <h2 class="fs-4 fw-bold">Free to download</h2>
                            <p class="mb-0">As always, Start Bootstrap has a powerful collectin of free templates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
                            <h2 class="fs-4 fw-bold">Jumbotron hero header</h2>
                            <p class="mb-0">The heroic part of this template is the jumbotron hero header!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-bootstrap"></i></div>
                            <h2 class="fs-4 fw-bold">Feature boxes</h2>
                            <p class="mb-0">We've created some custom feature boxes using Bootstrap icons!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-code"></i></div>
                            <h2 class="fs-4 fw-bold">Simple clean code</h2>
                            <p class="mb-0">We keep our dependencies up to date and squash bugs as they come!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-patch-check"></i></div>
                            <h2 class="fs-4 fw-bold">A name you trust</h2>
                            <p class="mb-0">Start Bootstrap has been the leader in free Bootstrap templates since 2013!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    @endif
      
@endsection
  
       
    