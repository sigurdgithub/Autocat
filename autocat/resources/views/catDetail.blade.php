@extends('layouts.pages.theme')

    @section('content')
    <!--HERO-->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-danger text-white me-2">
                <i class="mdi mdi-paw"></i>
            </span> Kat Detail        
        </h3>
    </div>
    <form method="post" action="/katDetail" enctype="multipart/form-data"> 
        @csrf
        <div class="content-wrapper pt-0">
            <div class="row">
                <div class="col-md-7">
                    <h1>Mijn naam is {{$lastcat->name ?? ''}}<span></span></h1>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label-lg">Adoptie status</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm" name="adoptionStatus" >
                                <option value="{{ old('AdoptieStatus') }}{{$lastcat->adoptionStatus ?? ''}}">Selecteer</option>
                                <option value="Aangemeld">Aangemeld</option>  
                                <option value="Bij Pleeggezin">Bij Pleeggezin</option>                                                     
                                <option value="In Asiel">In Asiel</option>
                                <option value="Klaar voor adoptie">Klaar voor adoptie</option>
                                <option value="In optie">In optie</option>  
                                <option value="Adoptie goedgekeurd">Adoptie goedgekeurd</option>  
                                <option value="Bij Adoptiegezin">Bij Adoptiegezin</option>                         
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--INTAKE INFORMATION-->
        <div class="content-wrapper pt-0">
            <h3 class="text-muted">Intake gegevens</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Naam</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}{{$lastcat->name ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Naam aanmelder</label>
                                <input type="text" class="form-control" name="notifierName" value="{{ old('notifierName') }}{{$lastcat->notifierName ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Telefoonnummer aanmelder</label>
                                <input type="text" class="form-control" name="notifierPhone" value="{{ old('notifierPhone') }}{{$lastcat->notifierPhone ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Ras</label>
                                <select class="form-control form-control-sm" name="breed" value="{{ old('breed') }}{{$lastcat->breed ?? ''}}">
                                    <option value="">Selecteer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kleur</label>
                                <input type="text" class="form-control" name="furColor" value="{{ old('furColor') }}{{$lastcat->furColor ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Vachtlengte</label>
                                <select class="form-control form-control-sm" name="furLength" value="{{ old('furLength') }}{{$lastcat->furLength ?? ''}}">
                                    <option value="">Selecteer</option>
                                    <option>Kort</option>
                                    <option>Lang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geboorte datum</label>
                                <input type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}{{$lastcat->dateOfBirth ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geslacht</label>
                                <select class="form-control form-control-sm" name="gender" value="{{ old('gender') }}{{$lastcat->gender ?? ''}}">
                                    <option value="">Selecteer</option>
                                    <option>Kattin</option>
                                    <option>Kater</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Socialisatie</label>
                                <select class="form-control form-control-sm" name="socialization" value="{{ old('socialization') }}{{$lastcat->socialization ?? ''}}">
                                    <option value="">Selecteer</option>
                                    <option>Tam</option>
                                    <option>Bang</option>
                                    <option>Wild</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Chip nummer</label>
                                <input type="number" class="form-control" name="chipNumber" value="{{ old('chipNumber') }}{{$lastcat->chipNumber ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gewicht (gram)</label>
                                <input type="number" class="form-control" name="startWeight" value="{{ old('startWeight') }}{{$lastcat->startWeight ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Steriel</label>
                                <div class="col-sm-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sterilized" value="{{ old('sterilized') }}{{$lastcat->sterilized ?? 1}}"> Ja
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sterilized" value="{{ old('sterilized') }}{{$lastcat->sterilized ?? 0}}"> Nee
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">Speciale noden</div>
                        <div class="col-md-5">
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="bottleFeeding" value="1">Flesvoeding</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="pregnancy" value="1">Zwangerschap</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="intensiveCare" value="1">Ziek met intensieve verzorging</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="noIntensiveCare" value="1">Ziek zonder intensieve verzorging</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isolation" value="1">Isolatie</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Andere</label>
                                <textarea class="form-control" name="extraInfo" value="{{ old('extraInfo') }}">{{ old('extraInfo') }}{{$lastcat->extraInfo ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Medicatie</label>
                                <textarea class="form-control" name="medication" value="{{ old('medication') }}">{{ old('extraInfo') }}{{$lastcat->medication ?? ''}}</textarea>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <!--PERSONALITY INFORMATION-->
        <div class="content-wrapper">
            <h3 class="text-muted">Informatie karakter</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Beschrijving</label>
                                <textarea class="form-control" name="personality" value="{{ old('personality') }}{{$lastcat->personality ?? ''}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <h5>Adoptie mogelijkheden</h5>
                            <div class="form-group mt-5">
                                <label class="form-label">Solo Plaatsing</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="solo" value="should"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="solo" value="could"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="solo" value="no"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-label">Bij ander huisdier</label>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="withPet" value="should"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="withPet" value="could"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="withPet" value="no"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Buddy</label>
                                <div class="col-md-4">
                                    <select class="form-control form-control-sm" name="buddyId" value="{{ old('buddyId') }}">
                                        <option value="0">Selecteer</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                                   
                            <div class="form-group">
                                <label class="form-label">Toegang tot tuin</label>
                                <div class="row">
                                    <div class="col-md-4">        
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio"class="form-check-input" name="gardenAccess" value="should"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gardenAccess" value="could"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gardenAccess" value="no"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>Kan geplaatst worden met</h5>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="kids" value="1">Jonge kinderen</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="dogs" value="1">Honden</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="cats" value="1">Katten</label>
                            </div>
                            <h5 class="mt-5">Karakter</h5>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="lapCat" value="1">Schootkat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="playfulCat" value="1">Speelse kat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="outdoorCat" value="1">Buitenkat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="calmCat" value="1">Rustige kat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="bedroomAccess" value="1">Wil in de slaapkamer</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HEALTH DIARY : VETVISIT-->
        <div class="content-wrapper">
            <h3 class="text-muted">Wegingen</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Overzicht</h5>
                    <div class="stretch-card grid-margin">
                        <div class="card-body card-border-danger">
                            <ul>
                                <li class="row">
                                    <div class="col-md-3">Datum: </div>
                                    <div class="col-md-3">Gewicht: </div>
                                    <div class="col-md-5">Opmerking: </div>
                                    <button class="col-md-1 btn btn-inverse-danger btn-icon btn-lg">
                                        <i class="mdi mdi-delete"></i>
                                    </button>                            
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Datum</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Gewicht (gram)</label>
                                <input type="number" min="0" class="form-control" name="weight">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Opmerking</label>
                                <textarea class="form-control" name="comments"></textarea>
                            </div> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-danger">
                    Toevoegen
                    </button>
                </div>
            </div>
        </div>
        <!-- HEALTH DIARY : WEIGHINGS -->
        <div class="content-wrapper">
            <h3 class="text-muted">Dierenarts bezoeken</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Overzicht</h5>
                    <div class="stretch-card grid-margin">
                        <div class="card-body card-border-danger">
                            <ul>
                                <li class="row">
                                    <div class="col-md-3">Datum: </div>
                                    <div class="col-md-3">Reden: </div>
                                    <div class="col-md-5">Opmerking: </div>
                                    <button class="col-md-1 btn btn-inverse-danger btn-icon btn-lg">
                                        <i class="mdi mdi-delete"></i>
                                    </button>                            
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Datum</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Reden</label>
                            <select class="form-control form-control-sm" name="reason">
                                <option value="">Selecteer</option>
                                <option>Vaccinatie</option>
                                <option>Chip</option>
                                <option>Vaccinatie & chip</option>
                                <option>Sterilisatie</option>
                                <option>Ziekte</option>
                                <option>Andere</option>
                            </select>                                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Opmerking</label>
                            <textarea class="form-control" name="comments"></textarea>
                        </div> 
                    </div>
                    </div>
                    <button type="submit" class="btn btn-outline-danger">
                    Toevoegen
                    </button>
                </div>
            </div>
        </div>

        <!-- PHOTO ALBUM
        <h2>Foto Album</h2>
        <button type="button" class="btn btn-gradient-danger">Upload foto</button> -->

        <!-- BUTTON - ADD -->
        <div class="row mt-5">
            <input type="submit" class="btn btn-gradient-danger w-25 mx-auto" value="Sla op">
        </div>
        
        <!-- BUTTON - UPDATE -->
{{--         <div class="row mt-5">
            <button type="submit" class="btn btn-gradient-danger w-25 mx-auto">
            Sla wijzigingen op
            </button>
        </div> --}}
    </form>
    @endsection