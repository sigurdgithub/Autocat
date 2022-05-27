@extends('layouts.pages.theme')
@section('content')
<!--HERO-->
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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3 class="text-muted mt-4">Mijn gegevens</h3>
        <div class="card">
            <div class="card-body">
                <div class="row mt-3">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Naam</label>
                            <input type="text" class="form-control" name="lastName" :value="{{old('lastName')}}"
                                required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Voornaam</label>
                            <input type="text" class="form-control" name="firstName" :value="{{old('firstName')}}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Geboortedatum</label>
                            <input type="date" class="form-control" name="dateOfBirth" :value="{{old('dateOfBirth')}}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Straat</label>
                            <input type="text" class="form-control" name="street" :value="{{old('street')}}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Huisnummer</label>
                            <input type="text" class="form-control" name="number" :value="{{old('number')}}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Postcode</label>
                            <input type="text" class="form-control" name="zipCode" :value="{{old('zipcode')}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gemeente</label>
                            <input type="text" class="form-control" name="city" :value="{{old('city')}}" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Telefoonnummer</label>
                            <input type="text" class="form-control" name="phone" :value="{{old('phone')}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" :value="{{old('email')}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Wachtwoord</label>
                            <input type="password" class="form-control" name="password" required>
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
                            :value="{{old('availableSpots')}}" required #txtWeight>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="adult"
                                    :value="{{old('preferences.0')}}">Volwassen</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="pregnant"
                                    :value="{{old('preferences.1')}}">Zwanger</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="kitten"
                                    :value="{{old('preferences.2')}}">Kitten</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]"
                                    value="bottleFeeding" :value="{{old('preferences.3')}}">Flesvoeding</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="scared"
                                    :value="{{old('preferences.4')}}">Bang</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="feral"
                                    :value="{{old('preferences.5')}}">Wild</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]"
                                    value="intensiveCare" :value="{{old('preferences.6')}}">Ziek met intensieve
                                verzorging</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]"
                                    value="noIntensiveCare" :value="{{old('preferences.7')}}">Ziek zonder intensieve
                                verzorging</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="preferences[]" value="isolation"
                                    :value="{{old('preferences.8')}}">Isolatie</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-muted mt-5">Huisgenoten</h3>
        <div class="card">

            <div class="card-body">
                {{--
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                {{-- FosterRoommate Form
                <form method='POST' action=''>
                    @csrf --}}
                    <h5 class="text-muted">Overzicht</h5>
                    <div class="stretch-card grid-margin">
                        <div class="card-body card-border-info">
                            <ul>
                                <li class="row">
                                    <div class="col-md-5">Relatie: </div>
                                    <div class="col-md-5">Leeftijd: </div>
                                    <button class="col-md-1 btn btn-inverse-info btn-icon btn-lg">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Relatie</label>
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Geboortedatum</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-info">
                        Toevoegen
                    </button>
            </div>
        </div>

        <h3 class="text-muted mt-5">Huisdieren</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Overzicht</h5>

                <div class="stretch-card grid-margin">
                    <div class="card-body card-border-info">
                        <ul>
                            <li class="row">
                                <div class="col-md-5">Soort: </div>
                                <div class="col-md-5">Leeftijd: </div>
                                <button class="col-md-1 btn btn-inverse-info btn-icon btn-lg">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Soort</label>
                            <select class="form-control form-control-sm">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Geboortedatum</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-info">
                    Toevoegen
                </button>
            </div>
        </div>

        <button type="submit" class="btn btn-gradient-info float-end mt-5">
            @if (Auth::check()) Sla op @else Registreren @endif
        </button>
    </form>
</div>
@endsection