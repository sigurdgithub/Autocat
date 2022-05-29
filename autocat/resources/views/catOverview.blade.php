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
                        <input type="text" class="form-control" placeholder="Zoek op naam">
                    </div>
                </div>  
            </div>          
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select id='multi-select-container-location' class="btn btn-sm btn-outline-danger filter location-search" autocomplete="off" placeholder="Selecteer pleeggezin..." multiple data-silent-initial-value-set="true">
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-sm btn-outline-danger" multiple placeholder="Selecteer Geslacht...">
                                <option>Kattin</option>
                                <option>Kater</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-sm btn-outline-danger" multiple placeholder="Selecteer Leeftijd...">
                                <option>Kitten</option>
                                <option>Puber</option>
                                <option>Volwassen</option>
                                <option>Senior</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <select class="btn btn-sm btn-outline-danger" multiple placeholder="Selecteer Adoptiestatus...">
                                <option>Aangemeld</option>  
                                <option>Bij Pleeggezin</option>                                                     
                                <option>In Asiel</option>
                                <option>Klaar voor adoptie</option>
                                <option>In optie</option>  
                                <option>Adoptie goedgekeurd</option>  
                                <option>Bij Adoptiegezin</option>  
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-sm btn-outline-danger" multiple placeholder="Selecteer Adoptie mogelijkheden...">
                                <option>Solo Moet</option>
                                <option>Solo Mag</option>
                                <option>Solo Nee</option>
                                <option>Huisdier Moet</option>
                                <option>Huisdier Mag</option>
                                <option>Huisdier Nee</option>
                                <option>Tuin Moet</option>
                                <option>Tuin Mag</option>
                                <option>Tuin Nee</option>
                                <option>Kinderen Mag</option>
                                <option>Honden Mag</option>
                                <option>Katten Mag</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-sm btn-outline-danger" multiple placeholder="Selecteer Karakter...">
                                <option>Schootkat</option>  
                                <option>Speelse kat</option>                                                     
                                <option>Buitenkat</option>
                                <option>Rustige kat</option>
                                <option>Wil in de slaapkamer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>Trixie</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3"><b>4 jaar</b></h5>
                                        </div>                              </div>
                                    <div class="card-footer card-border-danger">
                                        <div>Beschikbaar voor adoptie</div>
                                        <div><a href="" class="text-black"><u>Liesbeth Poelmans</u></a></div>
                                        <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Make a card for each cat in the database --}}
                        @foreach ($cats as $cat)
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card card-img-holder">
                                    <div class="card">
                                        <div class="card-header bg-gradient-danger">
                                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                            <div class="row">
                                                <h4 class="col-md-6 font-weight-normal mb-3"><b>{{$cat->name}}</b></h4>
                                                <h5 class="col-md-6 font-weight-normal mb-3"><b>{{$cat->dateOfBirth}}</b></h5>
                                            </div>                              
                                        </div>
                                        <div class="card-footer card-border-danger">
                                            <div>{{$cat->adoptionStatus}}</div>
                                            @if ($cat->fosterFamily_id != null)
                                                {{-- TODO: add route once detail of foster family is available --}}
                                                <div><a href="{{--route()--}}" class="text-black"><u>{{$cat->fosterFamily->firstName }} {{$cat->fosterFamily->lastName }}</u></a></div>

                                            @else
                                                <div><a href="" class="text-black"><u>nvt</u></a></div>
                                            @endif

                                            <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>Jade</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3"><b>6 maanden</b></h5>
                                        </div>                              </div>
                                    <div class="card-footer card-border-danger">
                                        <div>In Asiel</div>
                                        <div><a href="" class="text-black"><u>nvt</u></a></div>
                                        <div class="mt-3"><a href=""><u>Meer info</u></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>Izzy</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3"><b>4 jaar</b></h5>
                                        </div>                              </div>
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
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>Tux</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3"><b>1 jaar</b></h5>
                                        </div>                              </div>
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
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <div class="row">
                                            <h4 class="col-md-6 font-weight-normal mb-3"><b>Malou</b></h4>
                                            <h5 class="col-md-6 font-weight-normal mb-3"><b>9 jaar</b></h5>
                                        </div>                              </div>
                                    <div class="card-footer card-border-danger">
                                        <div>Adoptie goedgekeurd</div>
                                        <div><a href="" class="text-black"><u>Leentje Bout</u></a></div>
                                        <div class="mt-3"><a href=""><u>Meer info</u></a></div>
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
            });
        </script>
    @endsection