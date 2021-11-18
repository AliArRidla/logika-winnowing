@extends('layouts.master')

@section('content')
<section class="py-5 border-bottom" id="features">
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
                <a class="text-decoration-none" href="{{route('compare-pdf.index')}}">
                    Call to action
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                <h2 class="h4 fw-bolder">Create Essay</h2>
                <p>Use free auto essay typer tool. Our essay generator tool provides plagiarism free content for your essays on every type.</p>
                <a class="text-decoration-none" href="{{route('compare-essay.index')}}">
                    Call to action
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection