@extends('layouts.pages.theme')
@section('content')
<!--HERO-->
<div class="content-wrapper">
    <div class="page-header">

        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white me-2">
                <i class="mdi mdi-account"></i>
            </span>@if (Auth::check()) Account @else Registreer als pleeggezin @endif
        </h3>
        @if (!Auth::check())
        <h4><a href="/" class="text-gray text-decoration-underline">Terug naar login</a></h4>
        @endif

    </div>
    <!--ACCOUNTDETAILS-->
    <div class="content-wrapper pt-0">
        {{-- FosterFamily Form --}}
        @auth
        <form id="updateForm" method="POST" action="/pleeggezinAccount/{{$fosterFamily->id}}"> @csrf <input type="hidden"
                value="{{$fosterFamily->id}}" name="fosterFamily_id">
            @endauth
            <form id="registerForm" method="POST" action="{{ route('storeFoster') }}">
                @csrf
                <h3 class="text-muted mt-4">Mijn gegevens</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="lastName">Naam</label>
                                    <input type="text" class="form-control" name="lastName"
                                        value="{{old('lastName')}}{{$fosterFamily->lastName ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Voornaam</label>
                                    <input type="text" class="form-control" name="firstName"
                                        value="{{old('firstName')}}{{$fosterFamily->firstName ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Geboortedatum</label>
                                    <input type="date" class="form-control" name="dateOfBirth"
                                        value="{{old('dateOfBirth')}}{{$fosterFamily->dateOfBirth ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Straat</label>
                                    <input type="text" class="form-control" name="street"
                                        value="{{old('street')}}{{$fosterFamily->street ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Huisnummer</label>
                                    <input type="text" class="form-control" name="number"
                                        value="{{old('number')}}{{$fosterFamily->number ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Postcode</label>
                                    <input type="text" class="form-control" name="zipCode"
                                        value="{{old('zipCode')}}{{$fosterFamily->zipCode ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Gemeente</label>
                                    <input type="text" class="form-control" name="city"
                                        value="{{old('city')}}{{$fosterFamily->city ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Telefoonnummer</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{old('phone')}}{{$fosterFamily->phone ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{old('email')}}{{$user->email ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Wachtwoord</label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{$user->password ?? ''}}" @auth readonly @endauth>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-muted mt-5">Ik sta open voor</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Aantal beschikbare plaatsen</label>
                            <div class="col-md-2">
                                <input type="number" min="0" class="form-control" name="availableSpots"
                                    value="{{old('availableSpots')}}{{$fosterFamily->availableSpots ?? ''}}" #txtWeight>
                            </div>
                        </div>
                        {{-- <form method="POST" action="{{route('register')}}">
                            @csrf --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="adult" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->adult=="1")? "checked" : ""
                                            }}
                                            @endif
                                            :value="{{old('adult')}}{{$fosterPreference->adult ?? ''}}">Volwassen</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="pregnant" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->pregnant=="1")? "checked" :
                                            ""
                                            }} @endif
                                            :value="{{old('pregnant')}}{{$fosterPreference->pregnant ??
                                            ''}}">Zwanger</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="kitten" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->kitten=="1")? "checked" : ""
                                            }}
                                            @endif
                                            :value="{{old('kitten')}}{{$fosterPreference->kitten ?? ''}}">Kitten</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="bottleFeeding" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->bottleFeeding=="1")?
                                            "checked" :
                                            "" }}
                                            @endif
                                            :value="{{old('bottleFeeding')}}{{$fosterPreference->bottleFeeding ??
                                            ''}}">Flesvoeding</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="scared" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->scared=="1")? "checked" : ""
                                            }}
                                            @endif
                                            :value="{{old('scared')}}{{$fosterPreference->scared ?? ''}}">Bang</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="feral" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->feral=="1")? "checked" : ""
                                            }}
                                            @endif
                                            :value="{{old('feral')}}{{$fosterPreference->feral ?? ''}}">Wild</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="intensiveCare" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->intensiveCare=="1")?
                                            "checked" :
                                            "" }}
                                            @endif
                                            :value="{{old('intensiveCare')}}{{$fosterPreference->intensiveCare ?? ''}}">Ziek
                                            met intensieve
                                            verzorging</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="noIntensiveCare" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->noIntensiveCare=="1")?
                                            "checked"
                                            : "" }}
                                            @endif
                                            :value="{{old('noIntensiveCare')}}{{$fosterPreference->noIntensiveCare ??
                                            ''}}">Ziek zonder
                                            intensieve
                                            verzorging</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-info">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="isolation" value="1"
                                                @if(isset($fosterFamily)){{ ($fosterPreference->isolation=="1")? "checked" :
                                            ""
                                            }} @endif
                                            :value="{{old('isolation')}}{{$fosterPreference->isolation ??
                                            ''}}">Isolatie</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
            @auth
        </form>
        @endauth
        <!-- ROOMMATES -->
        @if(isset($fosterFamily))
        <div class="mt-5">
            <h3 class="text-muted">Huisgenoten</h3>
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="modal fade" id="roommateModal" tabindex="-1" aria-labelledby="roommateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="roommateModalLabel">Nieuwe huisgenoot</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storeRoommate')}}" method="post" enctype="multipart/form" required>
                                        @csrf
                                        <input type="hidden" value={{$fosterFamily->id}} name="fosterFamily_id">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-form-label" for="relation">Relatie</label>
                                                <select class="form-control form-control-sm" name="relation">
                                                    <option value="0">Selecteer</option>
                                                    @foreach ($relation as $relatio)
                                                    <option value="{{$relatio}}">{{$relatio}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="dateOfBirth">Geboortedatum</label>
                                                <input type="date" class="form-control" name="dateOfBirthRoommate" id="dateOfBirth">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-info">Toevoegen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Relatie</th>
                                        <th>Geboortedatum</th>
                                        <th>                                
                                            <button class="btn btn-icon btn-lg btn-gradient-info" data-bs-toggle="modal"
                                            data-bs-target="#roommateModal">
                                            <i class="mdi mdi-message-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $roommates as $roommate)
                                        <tr>
                                            <td>{{ $roommate->relation }}</td>
                                            <td>{{ $roommate->dateOfBirth }}</td>
                                            <td><a href='/roommate_delete/{{$roommate->id}}' class="col-md-1 btn btn-inverse-info btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a></td>               
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PETS -->
        <div class="mt-5">
            <h3 class="text-muted">Huisdieren</h3>
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="modal fade" id="petModal" tabindex="-1" aria-labelledby="petModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="petModalLabel">Nieuw huisdier</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storePet')}}" method="post" enctype="multipart/form" required>
                                        @csrf
                                        <input type="hidden" value={{$fosterFamily->id}} name="fosterFamily_id">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-form-label" for="species">Soort</label>
                                                <select class="form-control form-control-sm" name="species">
                                                    <option value="0">Selecteer</option>
                                                    @foreach ($species as $specie)
                                                    <option value="{{$specie}}">{{$specie}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="dateOfBirth">Geboortedatum</label>
                                                <input type="date" class="form-control" name="dateOfBirthPet" id="dateOfBirth">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-info">Toevoegen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Soort</th>
                                        <th>Geboortedatum</th>
                                        <th>                                
                                            <button class="btn btn-icon btn-lg btn-gradient-info" data-bs-toggle="modal"
                                            data-bs-target="#petModal">
                                            <i class="mdi mdi-message-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $pets as $pet)
                                        <tr>
                                            <td>{{ $pet->species }}</td>
                                            <td>{{ $pet->dateOfBirth }}</td>
                                            <td><a href='/roommate_delete/{{$pet->id}}' class="col-md-1 btn btn-inverse-info btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a></td>               
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <button type="submit" class="btn btn-gradient-info float-end mt-5" @if(Auth::check()) form="updateForm" @else
        form="registerForm" @endif>
        @if (Auth::check()) Sla op @else Registreren @endif
        </button>
    </div>
</div>
@endsection