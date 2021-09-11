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
        <!-- Contact section-->
        <section class="bg-dark py-5">
            <div class="container px-5 my-4 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder text-white">Compare Text</h2>
                    <p class="lead mb-0 text-white">Please enter your text in this form</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-12">
                        
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="{{route('compare-text.store')}}" method="POST">
                            @csrf                            
                            <!-- Message input-->
                            <div class="col">
                                <div class="row">
                                    <div class="col form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." name="text-1" style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label class="px-4" for="message">Text 1</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <div class="form-floating mb-3 col">
                                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." name="text-2" style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label class="px-4" for="message">Text 2</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                      <input type="text" class="form-control" placeholder="N-Gram" name="ngram" value="">
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control" placeholder="Window" name="window" value="">
                                    </div>
                                    <div class="col mb-3">                                        
                                        <select id="inputState" class="form-control" name="prima">
                                          <option>Prima</option>
                                          {!! <?php
                                            for($i = 2; $i < 100; $i++){
                                                    $hitung = 0;
                                                    for($j = 1; $j <= $i; $j++){
                                                            if(($i % $j) == 0) $hitung++;
                                                    }
                                                    if($hitung == 2) {
                                                            $selected = ''; if($prima ?? '' == $i) $selected = ' selected';
                                                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                                    }
                                            }
                                            ?>
                                            !!}
                                        </select>
                                      </div>
                                  </div>
                            </div>
                          
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                        </form>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>