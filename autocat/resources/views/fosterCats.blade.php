@extends('layouts.pages.theme')
@section('content')
<div class="content-wrapper">
    <!--HERO-->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-paw"></i>
            </span> Mijn Katten
        </h3>
    </div>
    <div class="content-wrapper pt-0">
        <h3 class="text-muted">Ga naar Detailpagina</h3>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($cats as $cat)
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card card-img-holder">
                                    <div class="card">
                                        <div class="card-header bg-gradient-danger">
                                            <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute"
                                                alt="circle-image" />
                                            <div class="row">
                                                <h4 class="col-md-6 font-weight-normal mb-3"><b>{{ $cat->name }}</b></h4>
                                                <h5 class="col-md-6 font-weight-normal mb-3">
                                                    <b>{{ \App\Http\Controllers\CatController::getCatAgeString($cat->dateOfBirth) }}</b>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-footer card-border-danger">
                                            <div>{{ $cat->gender }}</div>
                                            <div>{{ $cat->socialization }}</div>
                                            <div>{{ $cat->adoptionStatus }}</div>
                                            <div class="mt-3"><a href="{{ route('showCatById', $cat->id) }}"><u>Meer info</u></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection