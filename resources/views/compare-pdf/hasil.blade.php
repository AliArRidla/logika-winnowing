<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Logika for penilitian</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="dist/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Penilitian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        {{-- <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Programs string matching using winnowing logic</h1>
                            <p class="lead text-white-50 mb-4">Winnowing algorithm is an algorithm used in similarity detection using hashing function.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> --}}
        <!-- Features section-->
        {{-- <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Compare Text</h2>
                        <p>Text Compare! is an online diff tool that can find the difference between two text documents. Just paste and compare.
                        </p>
                        <a class="text-decoration-none" href="{{route('compare-text.index')}}">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Compare PDF</h2>
                        <p>Draftable Online is our free online document comparison tool for Word, PDF and other files. Use it for free, right here in your browser.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Create Essay</h2>
                        <p>Use free auto essay typer tool. Our essay generator tool provides plagiarism free content for your essays on every type.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Pricing section-->
        <section class="bg-dark py-5 border-bottom">
            <div class="container px-5 my-4">
                <div class="text-center mb-5 text-white">
                    <h2 class="fw-bolder ">Compare PDF</h2>
                    <p class="lead mb-0">Dari hasil inputan yang telah dimasukkan tadi</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Kalimat 1-->
                    <div class="col-lg-6 col-xl-6">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Kalimat 1</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">N-Gram</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['nGramFirst'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">Rolling Hash</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['rollingHashFirst'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">Window</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['windowFirst'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">FingerPrints</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['FingerprintsFirst'] }} 
                                </div>
                                {{-- <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <strong>1 users</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        5GB storage
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Unlimited public projects
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Community access
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Unlimited private projects
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Dedicated support
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Free linked domain
                                    </li>
                                    <li class="text-muted">
                                        <i class="bi bi-x"></i>
                                        Monthly status reports
                                    </li>
                                </ul> --}}
                                <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Kalimat 2-->
                    <div class="col-lg-6 col-xl-6">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Kalimat 2</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">N-Gram</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['nGramSecond'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">Rolling Hash</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['rollingHashSecond'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">Window</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['windowSecond'] }} 
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">FingerPrints</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <div class="mb-3">
                                    {{ $result ['FingerprintsSecond'] }} 
                                </div>
                                {{-- <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <strong>1 users</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        5GB storage
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Unlimited public projects
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Community access
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Unlimited private projects
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Dedicated support
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Free linked domain
                                    </li>
                                    <li class="text-muted">
                                        <i class="bi bi-x"></i>
                                        Monthly status reports
                                    </li>
                                </ul> --}}
                                <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Testimonials section-->
        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                    <h2 class="fw-bolder">Result</h2>
                    <p class="lead mb-0">For more information please register on Pro account</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Pricing card free-->
                    <div class="col-lg-6 col-xl-6">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">winnowiing result</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">Result</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <label for="">Jumalah Fingerprints kalimat 1 : </label>                                        
                                        <strong>{{ $result['countFinger1'] }}</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <label for="">Jumalah Fingerprints kalimat 2 : </label>
                                        <strong>{{ $result['countFinger2'] }}</strong>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Union (Gabungan) Fingerprints 1 dan 2 : 
                                        <strong>{{ $result['countUnionFingers'] }} </strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Intersection (fingerprints yang sama) : 
                                        <strong>{{ $result['countIntersectFingers'] }} </strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <label for="">(Union - Intersection) : </label><br>
                                        <strong>{{ $result['windowFirst'] }}</strong>                                                                                
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-x  text-primary"></i>
                                        <label for="">Jumalah Fingerprints kalimat 1 - kalimat 2 : </label>
                                        <strong>{{ $result['countUnionFingers'] - $result['countIntersectFingers']}}</strong>                                        
                                    </li>
                                    <li class="mb-2">                                        
                                        <span class="display-4 fw-bold">Result Plagiarism</span>
                                        <span class="text-muted">{{ $result['percent']}}%</span>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-x text-primary"></i>
                                        <label for="">Koefisien Jaccard = (Intersection / (Union-Intersection)) * 100 : </label>
                                        <strong>({{ $result['countIntersectFingers'] }}/{{$result['countUnionFingers']}})*100 = {{ $result['percent']}}%</strong>                                        
                                    </li>
        
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-primary" href="/">Back</a></div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </section>
       
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="dist/js/scripts.js"></script>
        <script src="dist/js/bootstrap.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>