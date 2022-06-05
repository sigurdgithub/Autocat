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
    <form method="POST" action="{{route('registerShelter')}}">
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
                            <input type="text" class="form-control" name="shelterName" value="{{ old('shelterName') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Telefoonnummer asiel</label>
                            <input type="text" class="form-control" name="shelterPhone"
                                :value="{{old('shelterPhone')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">HK-nummer</label>
                            <input type="text" class="form-control" name="hkNumber" value="{{ old('hkNumber') }}">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Naam</label>
                            <input type="text" class="form-control" name="lastName" :value="{{old('lastName')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Voornaam</label>
                            <input type="text" class="form-control" name="firstName" :value="{{old('firstName')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Geboortedatum</label>
                            <input type="date" class="form-control" name="dateOfBirth" :value="{{old('dateOfBirth')}}">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Straat</label>
                            <input type="text" class="form-control" name="street" :value="{{old('street')}}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Huisnummer</label>
                            <input type="text" class="form-control" name="number" :value="{{old('number')}}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Postcode</label>
                            <input type="text" class="form-control" name="zipCode" :value="{{old('zipcode')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gemeente</label>
                            <input type="text" class="form-control" name="city" :value="{{old('city')}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Telefoonnummer</label>
                                <input type="text" class="form-control" name="phone" :value="{{old('phoneNumber')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" :value="{{old('email')}}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Wachtwoord</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Laad hier uw foto op</label>
                                <input type="file" class="form-control form-control-sm" name="picture">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-success float-end mt-5">
                    Sla op
                </button>
    </form>
</div>



@endsection