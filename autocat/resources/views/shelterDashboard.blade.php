@extends('layouts.pages.theme')
    @section('content')
        <!--HERO-->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                    <i class="mdi mdi-view-dashboard"></i>
                </span> Dashboard        
            </h3>
        </div>
        <script type="text/javascript">
        var current_cat = null;
        </script>
        <h3 class="text-muted">Meldingen</h3>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Modal for creation of new notifications -->
                    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationModalLabel">Nieuwe melding</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('addNotificationShelter')}}" method="post" enctype="multipart/form" required>
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating">
                                <select class="form-select" name="fosterFamily" id="fosterSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een pleeggezin</option>
                                     @foreach ($fosterFamilies as $foster)
                                        <option value="{{ $foster->id }}">{{ $foster->firstName }} {{  $foster->lastName }}</option>
                                    @endforeach
                                </select>
                                <label for="fosterSelect">Pleeggezin</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" name="cat" id="catSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een kat</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <label for="catSelect">Kat</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" name="type" id="notificationTypeSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een Melding Type</option>
                                    <option value="Profiel up to date?">Profiel up to date?</option>
                                    <option value="Vraag voor opvang">Vraag voor opvang</option>
                                    <option value="Afspraak adoptant maken">Afspraak adoptant maken</option>
                                    <option value="Adoptie bevestigd">Adoptie bevestigd</option>
                                    <option value="Andere">Andere</option>
                                </select>
                                <label for="notificationTypeSelect">Melding Type</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="message" placeholder="Leave a comment here" id="notificationMessage" style="height: 100px"></textarea>
                                <label for="notificationMessage">Bericht</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Sluit</button>
                            <button type="submit" class="btn btn-outline-success">Verstuur</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                              </p>
                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                            <th>Pleeggezin</th>
                            <th>Kat</th>
                            <th>Melding Type</th>
                            <th>Bericht</th>
                            <th>
                                <button class="btn btn-icon btn-lg btn-gradient-success" data-bs-toggle="modal" data-bs-target="#notificationModal">
                                    <i class="mdi mdi-message-plus"></i>
                                </button>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                            <tr>
                                <td>{{$notification->fosterFamily->firstName}} {{$notification->fosterFamily->lastName}}</td>
                                <td>{{$notification->cat->name}}</td>
                                <td>{{$notification->type}}</td>
                                <td>{{$notification->message}}</td>
                                <td>                          
                                    <form action="{{route('delete', $notification->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-inverse-success btn-icon">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>        
                                </td>                      
                            </tr>
                            @endforeach
                            <tr>
                                <td>Liesbeth P</td>
                                <td>Malou</td>
                                <td>Profiel up to date?</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td> 
                                    <button class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                      
                            </tr>
                            <tr>
                                <td>Sophie C</td>
                                <td>Caramel</td>
                                <td>Weging</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Leentje B</td>
                                <td>Tux</td>
                                <td>Opvang geweigerd</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Doenja S</td>
                                <td>Pumpkin</td>
                                <td>Afspraak adoptant</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Jan V</td>
                                <td>Olijfje</td>
                                <td>Opvang geaccepteerd</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
                <!-- CAT DISPLAY BASED ON ADOPTER SELECTION-->
    <div class="row">
        <h3 class="text-muted">Match Maker</h3>
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-md-8 text-muted">Selecteer hier de kat</h4>
                        <div class="col-md-4">
                        <select id="selectedCatMatch" name="catMatch" class="select-option form-control">
                            <option class="option">Selecteer</option>
                            @foreach ($cats as $cat)
                                {{-- TODO: Make this == whatever the value a cat has for fosterFamily_id if not yet assigned --}}
                                @if ($cat->fosterFamily_id == null)
                                    <option class="option" value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <ng-container>
                        <div class="stretch-card grid-margin mt-5">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <p class="text-white">Algemene Informatie</p>                             
                                    </div>
                                    <div class="card-footer card-border-danger">
                                        <div class="row">
                                            <div class="col-md-6">Gender</div>
                                            <div id="genderCat" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Ras</div>
                                            <div id="breedCat" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Chipnummer</div>
                                            <div id="chipNumberCat" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Socialisatie</div>
                                            <div id="socializationCat" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Gewicht</div>
                                            <div id="startWeightCat" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Gesteriliseerd</div>
                                            <div  id="sterilizedCat" class="col-md-6"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stretch-card grid-margin mt-5">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-danger">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <p class="text-white">Aandachtspunten</p>                             
                                    </div>
                                    <div class="card-footer card-border-danger">
                                        <ul class="list-star" id="catAttention">
                                            <li></li>
                                        </ul>
                                    </div>       
                                </div>
                                <div class="stretch-card grid-margin mt-5">
                                    <div class="card card-img-holder">
                                        <div class="card">
                                            <div class="card-header bg-gradient-danger">
                                                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                                <p class="text-white">Eigenschappen</p>                             
                                            </div>
                                            <div class="card-footer card-border-danger">
                                                <ul class="list-star" id="catPreferences">
                                                    <li></li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>              
                                </div>
                            </div>
                        </div>
                        <div class="mt-5"><a id='catLink'> Volledige fiche van </a></div>
                </div>
            </div>
        </div>
        <!-- FOSTER DISPLAY BASED ON CAT SELECTION-->
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-md-8 text-muted">Selecteer hier het pleeggezin</h4>
                        <div class="col-md-4">
                            <select name="fosterFamilyMatch" class="select-option form-control">
                                <option class="option">Selecteer</option>
                                 @foreach ($fosterFamilies as $family)
                                {{-- TODO: Make this == whatever the value a cat has for fosterFamily_id if not yet assigned --}}
                                @if ($family->id != null)
                                    <option class="option" value="{{$family->id}}">{{$family->firstName}} {{$family->lastName}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <ng-container>
                        <div class="stretch-card grid-margin mt-5">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <p class="text-white">Algemene informatie</p>                             
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <div class="row">
                                            <div class="col-md-6">Naam</div>                  
                                            <div id="nameFoster" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Adres</div>
                                            <div class="col-md-6">
                                                <div id="addressOneFoster"></div>
                                                <div id="addressTwoFoster"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Geboortedatum</div>
                                            <div id="dateOfBirthFoster" class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Email</div>
                                            <div id="emailFoster" class="col-md-6"></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">Aantal beschikbare plaatsen </div>
                                            <div id="availableSpotsFoster" class="col-md-6"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stretch-card grid-margin mt-5">
                            <div class="card card-img-holder">
                                <div class="card">
                                    <div class="card-header bg-gradient-info">
                                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <p class="text-white">Staat open voor</p>
                                    </div>
                                    <div class="card-footer card-border-info">
                                        <ul class="list-star">
                                            <li class="row">
                                                <div class="col-md-10"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                            <!-- Roommates & Pets -->
                            <div class="stretch-card grid-margin mt-5">
                                <div class="card card-img-holder">
                                    <div class="card">
                                        <div class="card-header bg-gradient-info">
                                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                            <p class="text-white">Huisdieren</p>                             
                                        </div>
                                        <div class="card-footer card-border-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stretch-card grid-margin mt-5">
                                <div class="card card-img-holder">
                                    <div class="card">
                                        <div class="card-header bg-gradient-info">
                                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                            <p class="text-white">Huisgenoten</p>                             
                                        </div>
                                        <div class="card-footer card-border-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="mt-5"><a> Volledige fiche van </a></div>
                    </ng-container>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function getPreferencesCat(catId) {
        $.ajax({
                    url: '/catPref/ajax/'+ catId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#catPreferences').empty();
                        $('#catAttention').empty();
                        let string = (data.kids ? ' wel ' : ' niet ');
                        $('#catPreferences').append('<li>kan ' + string + 'geplaatst worden met kinderen</li>');
                        string = (data.dogs ? ' wel ' : ' niet ');
                        $('#catPreferences').append('<li>kan ' + string + 'geplaatst worden met honden</li>');
                        string = (data.cats ? ' wel ' : ' niet ');
                        $('#catPreferences').append('<li>kan ' + string + 'geplaatst worden met katten</li>');
                        if (data.intensiveCare) {
                            $('#catAttention').append('<li>Heeft intensieve verzorging nodig</li>');
                        }
                        if (data.noIntensiveCare) {
                            $('#catAttention').append('<li>Is ziek maar heeft geen intensieve verzorging nodig</li>');
                        }
                        string = (data.cats ? ' wel ' : ' niet ');
                        $('#catPreferences').append('<li>kan ' + string + 'geplaatst worden met katten</li>');
                        //$('#catPreferences').append(JSON.stringify(data));
                        console.log(data);
                        //$('#sterilizedCat').empty();
                        //$('#sterilizedCat').append(current_foster.sterilized);
                        //$('#sterilizedCat').empty();
                        //$('#sterilizedCat').append(current_foster.sterilized);
                        //$('#sterilizedCat').empty();
                        //$('#sterilizedCat').append(current_foster.sterilized);
                        
                    }
                });
    }
    $(document).ready(function() {
        $('select[name="fosterFamily"]').on('change', function() {
            var fosterId = $(this).val();
            if(fosterId) {
                $.ajax({
                    url: '/asielDashboard/ajax/'+fosterId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="cat"]').empty();
                        $('select[name="cat"]').append('<option class="option">Selecteer een kat</option>');
                        $.each(data, function(key, value) {
                            $('select[name="cat"]').append('<option value="'+ value['id'] +'">'+ (value['name']) +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="cat"]').empty();
            }
        });
        $('select[name="catMatch"]').on('change', function() {
            var catId = $(this).val();
            if(catId) {
                $.ajax({
                    url: '/cat/ajax/'+catId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        current_cat = data;
                        console.log(current_cat);
                        $('#dateOfBirthCat').empty();
                        $('#dateOfBirthCat').append(current_cat.dateOfBirth.toString());
                        $('#genderCat').empty();
                        $('#genderCat').append(current_cat.gender);
                        $('#breedCat').empty();
                        $('#breedCat').append(current_cat.breed);
                        $('#chipNumberCat').empty();
                        $('#chipNumberCat').append(current_cat.chipNumber)
                        $('#socializationCat').empty();
                        $('#socializationCat').append(current_cat.socialization);
                        $('#startWeightCat').empty();
                        $('#startWeightCat').append(current_cat.startWeight + " Gram");
                        $('#sterilizedCat').empty();
                        $('#sterilizedCat').append(current_cat.sterilized);
                        // TODO: add more if extra properties are selected
                        $('#catLink').append(current_cat.name);
                        $('#catLink').attr('href', '/katDetail/'+current_cat.id);
                        getPreferencesCat(current_cat.id);
                    }
                });
            }else{
                current_cat = null;
                console.log("OOPs");
            }
        });
        $('select[name="fosterFamilyMatch"]').on('change', function() {
            var fosterFamilyId = $(this).val();
            if(fosterFamilyId) {
                $.ajax({
                    url: '/fosterfamily/ajax/'+fosterFamilyId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        current_foster = data;
                        $('#dateOfBirthFoster').empty();
                        $('#dateOfBirthFoster').append(current_foster.dateOfBirth.toString());
                        $('#nameFoster').empty();
                        $('#nameFoster').append(current_foster.firstName + ' ' + current_foster.lastName);
                        $('#addressOneFoster').empty();
                        $('#addressOneFoster').append(current_foster.street + ' ' + current_foster.number);
                        $('#addressTwoFoster').empty();
                        $('#addressTwoFoster').append(current_foster.zipCode + ' ' + current_foster.city);
                        $('#emailFoster').empty();
                        $('#emailFoster').append(current_foster.email);
                        $('#availableSpotsFoster').empty();
                        $('#availableSpotsFoster').append(current_foster.availableSpots);
                        //$('#sterilizedCat').empty();
                        //$('#sterilizedCat').append(current_foster.sterilized);
                        // TODO: add more if extra properties are selected
                        
                    }
                });
            }else{
                current_foster = null;
            }
        });
    });
</script>

    @endsection