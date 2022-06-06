@extends('layouts.pages.theme')
    @section('content')
        <!--HERO-->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white me-2">
                    <i class="mdi mdi-home-variant"></i>
                </span>Pleeggezinnen Overzicht        
            </h3>
        </div>
        <div class="content-wrapper pt-0">
            <div class="row mb-5">
                <div class="col-md-8">
                    <h3 class="text-muted">Zoek een Pleeggezin</h3>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Zoek op naam">
                    </div>
                </div>  
            </div>             
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <select class="fosterFilter" multiple placeholder="Selecteer een aantal plaatsen...">
                                <option>1 beschikbare plaats</option>
                                <option>2 beschikbare plaatsen</option>
                                <option>3 beschikbare plaatsen</option>
                                <option>4 beschikbare plaatsen</option>
                                <option>5 beschikbare plaatsen</option>
                                <option>6 beschikbare plaatsen</option>
                                <option>7 beschikbare plaatsen</option>
                                <option>8 beschikbare plaatsen</option>
                                <option>9 beschikbare plaatsen</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="fosterFilter" multiple placeholder="Selecteer katvoorkeur(en)...">
                                <option>Volwassen</option>
                                <option>Zwanger</option>
                                <option>Kitten</option>
                                <option>Flesvoeding</option>
                                <option>Bang</option>
                                <option>Wild</option>
                                <option>Ziek met intensieve verzorging</option>
                                <option>Ziek zonder intensieve verzorging</option>
                                <option>Isolatie</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="fosterFilter" multiple placeholder="Selecteer thuissituatie...">
                                <option>Geen kinderen</option>  
                                <option>Geen huisdieren</option>                                                     
                                <option>Geen honden</option>
                                <option>Geen katten</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    @foreach ($fosterFamilies as $fosterFamily) 
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>{{$fosterFamily->firstName}} {{$fosterFamily->lastName}}</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">{{$fosterFamily->availableSpots}} beschikbare plaatsen</div>
                                            {{-- TODO: add route once detail of foster family is available --}}
                                            <div><a href="{{--route()--}}" class="text-black"><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Liesbeth Poelmans</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">4 beschikbare plaatsen</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Heleen Vijgen</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">2 beschikbare plaatsen</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Sophie Coemans</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">Geen beschikbare plaatsen</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Leentje Bout</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">1 beschikbare plaats</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Doentja Seykens</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">9 beschikbare plaatsen</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>Sara Frère</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">6 beschikbare plaatsen</div>
                                        <div><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            myOptions = [];
            VirtualSelect.init({
                        ele: '.fosterFilter',
                        allowNewOption: false,
                        showValueAsTags: true,
                        options: myOptions
            });
        });
        </script>
    @endsection