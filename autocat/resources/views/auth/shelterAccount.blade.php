@extends('layouts.pages.theme')
@section('content')
<!--HERO-->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-account"></i>
        </span> @if (Auth::check()) Account @else Registreer als VZW @endif
    </h3>
    @if (!Auth::check())
    <h4><a href="/" class="text-gray text-decoration-underline">Terug naar login</a></h4>
    @endif
</div>
<!--ACCOUNTDETAILS-->
<div class="content-wrapper pt-0">
    {{-- Shelter Form --}}
    @auth
    <form id="updateForm" method="POST" action="/asielAccount/{{$shelter->id}}"> @csrf <input type="hidden"
            value="{{$shelter->id}}" name="shelter_id">
        @endauth
        <form id="registerForm" method="POST" action="{{ route('storeShelter') }}">
            @csrf
            <h3 class="text-muted mt-4">Mijn gegevens</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Naam asiel</label>
                                <input type="text" class="form-control" name="shelterName"
                                    value="{{ old('shelterName') }}{{$shelter->shelterName ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Telefoonnummer asiel</label>
                                <input type="text" class="form-control" name="shelterPhone"
                                    value="{{old('shelterPhone')}}{{$shelter->shelterPhone ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">HK-nummer</label>
                                <input type="text" class="form-control" name="hkNumber"
                                    value="{{ old('hkNumber') }}{{$shelter->hkNumber ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class=" row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Naam</label>
                                <input type="text" class="form-control" name="shelterLastName"
                                    value="{{old('shelterLastName')}}{{$shelter->shelterLastName ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label class="form-label">Voornaam</label>
                                <input type="text" class="form-control" name="shelterFirstName"
                                    value="{{old('shelterFirstName')}}{{$shelter->shelterFirstName ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geboortedatum</label>
                                <input type="date" class="form-control" name="shelterDateOfBirth"
                                    value="{{old('shelterDateOfBirth')}}{{$shelter->shelterDateOfBirth ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Straat</label>
                                <input type="text" class="form-control" name="shelterStreet"
                                    value="{{old('shelterStreet')}}{{$shelter->shelterStreet ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Huisnummer</label>
                                <input type="text" class="form-control" name="shelterNumber"
                                    value="{{old('shelterNumber')}}{{$shelter->shelterNumber ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Postcode</label>
                                <input type="text" class="form-control" name="shelterZipCode"
                                    value="{{old('shelterZipCode')}}{{$shelter->shelterZipCode ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gemeente</label>
                                <input type="text" class="form-control" name="shelterCity"
                                    value="{{old('shelterCity')}}{{$shelter->shelterCity ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Telefoonnummer</label>
                                <input type="text" class="form-control" name="phoneNumber"
                                    value="{{old('phoneNumber')}}{{$shelter->phoneNumber ?? ''}}">
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
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website"
                                    value="{{old('website')}}{{$shelter->website ?? ''}}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @auth
    </form>
    @endauth
</div>
<button type="submit" class="btn btn-gradient-success float-end mt-5" @if(Auth::check()) form="updateForm" @else
    form="registerForm" @endif>
    @if (Auth::check()) Sla op @else Registreren @endif
</button>
@endsection