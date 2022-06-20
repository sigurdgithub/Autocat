@extends('layouts.pages.theme')
@section('content')
    <!--HERO-->

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-paw"></i>
            </span>Katten Overzicht
        </h3>
    </div>
    <div class="content-wrapper pt-0">
        <div class="row mb-5">
            <div class="col-md-8">
                <h3 class="text-muted">Zoek een Kat</h3>
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
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id='selectFoster' class="catFilter" class="filter location-search" autocomplete="off"
                            placeholder="Selecteer pleeggezin..." multiple data-silent-initial-value-set="true">
                            @foreach ($fosterFamilies as $fosterFamily)
                                <option value='{{ $fosterFamily->id }}'>{{ $fosterFamily->firstName }}
                                    {{ $fosterFamily->lastName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id='selectGender' class="catFilter" multiple placeholder="Selecteer Geslacht...">
                            <option value='Kattin'>Kattin</option>
                            <option value='Kater'>Kater</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id='selectAge' class="catFilter" multiple placeholder="Selecteer Leeftijd...">
                            <option value='kitten'>Kitten</option>
                            <option value='adolescent'>Puber</option>
                            <option value='adult'>Volwassen</option>
                            <option value='senior'>Senior</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <select id='selectStatus' class="catFilter" multiple placeholder="Selecteer Adoptiestatus...">
                            <option value='Aangemeld'>Aangemeld</option>
                            <option value='Bij Pleeggezin'>Bij Pleeggezin</option>
                            <option value='In Asiel'>In Asiel</option>
                            <option value='Klaar voor adoptie'>Klaar voor adoptie</option>
                            <option value='In optie'>In optie</option>
                            <option value='Adoptie goedgekeurd'>Adoptie goedgekeurd</option>
                            <option value='Bij Adoptiegezin'>Bij Adoptiegezin</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id='selectPlacement' class="catFilter" multiple placeholder="Selecteer Adoptie mogelijkheden...">
                            <option value='Solo should'>Solo Moet</option>
                            <option value='Solo could'>Solo Mag</option>
                            <option value='Solo no'>Solo Nee</option>
                            <option value='Huisdier should'>Huisdier Moet</option>
                            <option value='Huisdier could'>Huisdier Mag</option>
                            <option value='Huisdier no'>Huisdier Nee</option>
                            <option value='Tuin should'>Tuin Moet</option>
                            <option value='Tuin could'>Tuin Mag</option>
                            <option value='Tuin no'>Tuin Nee</option>
                            <option value='Kinderen Mag'>Kinderen Mag</option>
                            <option value='Honden Mag'>Honden Mag</option>
                            <option value='Katten Mag'>Katten Mag</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id='selectCharacter' class="catFilter" multiple placeholder="Selecteer Karakter...">
                            <option value='lapCat'>Schootkat</option>
                            <option value='playfulCat'>Speelse kat</option>
                            <option value='outdoorCat'>Buitenkat</option>
                            <option value='calmCat'>Rustige kat</option>
                            <option value='bedroomAccess'>Wil in de slaapkamer</option>
                        </select>
                    </div>
                </div>
                <div id="cats" class="row">
                    {{-- Make a card for each cat in the database --}}
                    @foreach ($cats as $cat)
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                            alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>{{ $cat->name }}</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3">
                                                <b>{{ \App\Http\Controllers\CatController::getCatAgeString($cat->dateOfBirth) }}</b>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-footer card-border-danger">
                                        <div>{{ $cat->adoptionStatus }}</div>
                                        @if ($cat->fosterFamily_id != null)
                                            {{-- TODO: add route once detail of foster family is available --}}
                                            <div><a href="" class="text-black"><u>{{ $cat->fosterFamily->firstName }}
                                                        {{ $cat->fosterFamily->lastName }}</u></a></div>
                                        @else
                                            <div><a href="" class="text-black"><u>nvt</u></a></div>
                                        @endif

                                        <div class="mt-3"><a href="{{ route('showCatById', $cat->id) }}"><u>Meer
                                                    info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card card-img-holder">
                            <div class="card">
                                <div class="card-header bg-gradient-danger">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                        alt="circle-image" />
                                    <div class="row">
                                        <h4 class="col-md-6 font-weight-normal mb-3"><b>Jade</b></h4>
                                        <h5 class="col-md-6 font-weight-normal mb-3"><b>6 maanden</b></h5>
                                    </div>
                                </div>
                                <div class="card-footer card-border-danger">
                                    <div>In Asiel</div>
                                    <div><a href="" class="text-black"><u>nvt</u></a></div>
                                    <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card card-img-holder">
                            <div class="card">
                                <div class="card-header bg-gradient-danger">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                        alt="circle-image" />
                                    <div class="row">
                                        <h4 class="col-md-6 font-weight-normal mb-3"><b>Izzy</b></h4>
                                        <h5 class="col-md-6 font-weight-normal mb-3"><b>4 jaar</b></h5>
                                    </div>
                                </div>
                                <div class="card-footer card-border-danger">
                                    <div>In optie</div>
                                    <div><a href="" class="text-black"><u>Sophie Coemans</u></a></div>
                                    <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card card-img-holder">
                            <div class="card">
                                <div class="card-header bg-gradient-danger">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                        alt="circle-image" />
                                    <div class="row">
                                        <h4 class="col-md-6 font-weight-normal mb-3"><b>Tux</b></h4>
                                        <h5 class="col-md-6 font-weight-normal mb-3"><b>1 jaar</b></h5>
                                    </div>
                                </div>
                                <div class="card-footer card-border-danger">
                                    <div>Bij Pleeggezin</div>
                                    <div><a href="" class="text-black"><u>Doenja Seykens</u></a></div>
                                    <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card card-img-holder">
                            <div class="card">
                                <div class="card-header bg-gradient-danger">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                        alt="circle-image" />
                                    <div class="row">
                                        <h4 class="col-md-6 font-weight-normal mb-3"><b>Malou</b></h4>
                                        <h5 class="col-md-6 font-weight-normal mb-3"><b>9 jaar</b></h5>
                                    </div>
                                </div>
                                <div class="card-footer card-border-danger">
                                    <div>Adoptie goedgekeurd</div>
                                    <div><a href="" class="text-black"><u>Leentje Bout</u></a></div>
                                    <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                let string = `
                            <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute"
                                            alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>` + cat.name + `</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3">
                                                <b>` + cat.stringDate + `</b>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-footer card-border-danger">
                                        <div>` + cat.adoptionStatus + `</div>`;
                if (cat.fosterFamily_id != null) {
                    if (typeof {{{auth()->user()->shelter_id ?? "undefined"}}} !== "undefined" || {{{auth()->user()->fosterFamily_id ?? "undefined"}}} == cat.fosterFamily_id) {
                        string += `<div><a href="/pleeggezinAccount/${cat.fosterHashed}" class="text-black"><u>` + cat.fosterFirstName + ` ` + cat.fosterLastName + `</u></a></div>`;
                    } else if (typeof {{{auth()->user()->fosterFamily_id ?? "undefined"}}} !== "undefined"){
                        string += `<div><a href="" class="text-black"><u>` + cat.fosterFirstName + ` ` + cat
                        .fosterLastName + `</u></a></div>`;
                    }
                    
                } else {
                    string += `<div><a href="" class="text-black"><u>nvt</u></a></div>`;

                }
                string += `<div class="mt-3"><a href="/katDetail/` + cat.id + `"><u>Meer
                                                    info</u></a></div>
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
            myOptionsProvider = [{
                label: 'Please select a provider',
                value: ''
            }];
            VirtualSelect.init({
                ele: 'select',
                allowNewOption: false,
                showValueAsTags: true,
                options: myOptions
            });
            /*VirtualSelect.init({
                ele: '#multi-select-container-price',
                allowNewOption: false,
                showValueAsTags: true,
                options: myOptions
            });
            VirtualSelect.init({
                ele: '#multi-select-container-location',
                allowNewOption: false,
                showValueAsTags: true,
                options: myOptions
            });*/
            $('.catFilter').on('change', function() {

                // Get input value on change
                var ageTerm = $('#selectAge').val();
                var cats = $("#cats");
                var placementTerm = $('#selectPlacement').val();
                var fosterTerm = $('#selectFoster').val();
                var characterTerm = $('#selectCharacter').val();
                var statusTerm = $('#selectStatus').val();
                var genderTerm = $('#selectGender').val();
                //page = $('.page-search').val();
                $.ajax({
                    url: '/cats/ajax/',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "age": ageTerm,
                        "gender": genderTerm,
                        "placement": placementTerm,
                        "fosterFamily": fosterTerm,
                        "character": characterTerm,
                        "status": statusTerm
                    },
                    dataType: "json",
                    success: function(data) {
                        createAndFillCards(data, cats);
                    }
                });
            });
            $('#searchTerm').on('keyup', function() {
                var searchTerm = $(this).val();
                var cats = $("#cats");
                if (searchTerm == '') {
                    $.ajax({
                    url: '/cats/ajax/',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        createAndFillCards(data, cats);
                    }
                });
                } else {
                    $.ajax({
                        url: '/cats/ajax/' + searchTerm,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            createAndFillCards(data, cats);
                        }
                    });
                }
            });
        });
    </script>
@endsection
