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
                        <input id="searchTerm" type="text" class="form-control" placeholder="Zoek op naam">
                    </div>
                </div>  
            </div>             
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <select class="fosterFilter" placeholder="Selecteer een aantal plaatsen...">
                                <option value='1'>1 beschikbare plaats</option>
                                <option value='2'>2 beschikbare plaatsen</option>
                                <option value='3'>3 beschikbare plaatsen</option>
                                <option value='4'>4 beschikbare plaatsen</option>
                                <option value='5'>5 beschikbare plaatsen</option>
                                <option value='6'>6 beschikbare plaatsen</option>
                                <option value='7'>7 beschikbare plaatsen</option>
                                <option value='8'>8 beschikbare plaatsen</option>
                                <option value='9'>9 beschikbare plaatsen</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="fosterFilter" multiple placeholder="Selecteer katvoorkeur(en)...">
                                <option value='adult'>Volwassen</option>
                                <option value='pregnant'>Zwanger</option>
                                <option value='kitten'>Kitten</option>
                                <option value='bottleFeeding'>Flesvoeding</option>
                                <option value='scared'>Bang</option>
                                <option value='feral'>Wild</option>
                                <option value='intensiveCare'>Ziek met intensieve verzorging</option>
                                <option value='noIntensiveCare'>Ziek zonder intensieve verzorging</option>
                                <option value='isolation'>Isolatie</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="fosterFilter" multiple placeholder="Selecteer thuissituatie...">
                                <option value='no kids'>Geen kinderen</option>  
                                <option value='no pets'>Geen huisdieren<option>                                                     
                                <option value='no dogs'>Geen honden</option>
                                <option value='no cats'>Geen katten</option>
                            </select>
                        </div>
                    </div>
                    <div id="fosterFamilies" class="row">
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
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function createAndFillCards(data, container) {
            filteredCats = data;
            var cats = container;
            cats.empty();
            console.log(filteredCats);
            filteredCats.forEach(cat => {
                console.log(cat);
                let string = `<div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3"><b>` + cat.firstName + ` ` + cat.lastName + `</b></h4>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="mb-3">` + cat.availableSpots + `beschikbare plaatsen</div>
                                            {{-- TODO: add route once detail of foster family is available --}}
                                            <div><a href="{{--route()--}}" class="text-black"><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                cats.append(string);

            });
            console.log(data);
        }
        $(document).ready(function() {
            myOptions = [];
            VirtualSelect.init({
                        ele: '.fosterFilter',
                        allowNewOption: false,
                        showValueAsTags: true,
                        options: myOptions
            });
            $('#searchTerm').on('keyup', function() {
                var searchTerm = $(this).val();
                var fosterFamilies = $("#fosterFamilies");
                if (searchTerm == '') {
                    $.ajax({
                    url: '/fosterfamilies/ajax/',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        createAndFillCards(data, fosterFamilies);
                    }
                });
                } else {
                    $.ajax({
                        url: '/fosterfamilies/ajax/' + searchTerm,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            createAndFillCards(data, fosterFamilies);
                        }
                    });
                }
            });
        });
        </script>
    @endsection