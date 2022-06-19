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
    @if(isset($cat))
    <form method="post" action="/updateCat/{{$cat->id}}" enctype="multipart/form-data">
    @else
    <form method="post" action="/katDetail" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="content-wrapper pt-0">
            <div class="row">
                @if(isset($cat))
                    <div class="col-md-7">
                        <h1>Mijn naam is {{$cat->name ?? ''}}<span></span></h1>
                    </div>
                @else
                    <div class="col-md-7">
                        <h1>Meld nieuwe kat aan</h1>
                    </div>
                @endif
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label">Adoptiestatus</label>
                    <select class="form-control form-control-sm" name="adoptionStatus" value="{{ old('adoptionStatus') }}">
                        @foreach ($adoptionStatus as $adopt)
                            <option value="{{$adopt}}" @if(isset($cat))@if($cat->adoptionStatus == $adopt) selected @endif @else "" @endif>{{$adopt}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pleeggezin</label>
                    <select class="form-control form-control-sm" name="fosterFamily_id" value="{{ old('fosterFamily_id') }}">
                        <option value="0">Selecteer</option>
                        @foreach ($fosterFamilies as $fosterFamily)
                            <option value="{{$fosterFamily->id}}" @if(isset($cat))@if($cat->fosterFamily_id == $fosterFamily->id) selected @endif @else "" @endif>{{$fosterFamily->firstName}} {{$fosterFamily->lastName}}</option>
                        @endforeach
                    </select>
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
                                <label class="form-label" for="name">Naam</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}{{$cat->name ?? ''}}">
                                <div class="valid-feedback">
                                    Looks good!
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Naam aanmelder</label>
                                <input type="text" class="form-control" name="notifierName" value="{{ old('notifierName') }}{{$cat->notifierName ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Telefoonnummer aanmelder</label>
                                <input type="text" class="form-control" name="notifierPhone" value="{{ old('notifierPhone') }}{{$cat->notifierPhone ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Ras</label>
                                <select class="form-control form-control-sm" name="breed" value="{{ old('breed') }}{{$cat->breed ?? ''}}">
                                    <option value="0">Selecteer</option>
                                    @foreach ($breed as $bree)
                                        <option value="{{$bree}}" @if(isset($cat))@if($cat->breed == $bree) selected @endif @else "" @endif>{{$bree}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kleur</label>
                                <input type="text" class="form-control" name="furColor" value="{{ old('furColor') }}{{$cat->furColor ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Vachtlengte</label>
                                <select class="form-control form-control-sm" name="furLength" value="{{ old('furLength') }}{{$cat->furLength ?? ''}}">
                                    <option value="0">Selecteer</option>
                                    @foreach ($furLength as $furLengt)
                                        <option value="{{$furLengt}}" @if(isset($cat))@if($cat->furLength == $furLengt) selected @endif @else "" @endif>{{$furLengt}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geboorte datum</label>
                                <input type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}{{$cat->dateOfBirth ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geslacht</label>
                                <select class="form-control form-control-sm" name="gender" value="{{ old('gender') }}{{$cat->gender ?? ''}}">
                                    <option value="0">Selecteer</option>
                                    @foreach ($gender as $gende)
                                        <option value="{{$gende}}" @if(isset($cat))@if($cat->gender == $gende) selected @endif @else "" @endif>{{$gende}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Socialisatie</label>
                                <select class="form-control form-control-sm" name="socialization" value="{{ old('socialization') }}{{$cat->socialization ?? ''}}">
                                    <option value="0">Selecteer</option>
                                    @foreach ($socialization as $socializatio)
                                        <option value="{{$socializatio}}" @if(isset($cat))@if($cat->socialization == $socializatio) selected @endif @else "" @endif>{{$socializatio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Chip nummer</label>
                                <input type="number" class="form-control" name="chipNumber" value="{{ old('chipNumber') }}{{$cat->chipNumber ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gewicht (gram)</label>
                                <input type="number" class="form-control" name="startWeight" value="{{ old('startWeight') }}{{$cat->startWeight ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Steriel</label>
                                <div class="col-sm-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sterilized" value="1" @if(isset($cat)){{ ($cat->sterilized=="1")? "checked" : "" }} @endif> Ja
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sterilized" value="0" @if(isset($cat)){{ ($cat->sterilized=="0")? "checked" : "" }} @endif> Nee
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
                                    <input type="checkbox" class="form-check-input" name="bottleFeeding" value="1" @if(isset($cat)){{ ($catPreference->bottleFeeding=="1")? "checked" : "" }} @endif>Flesvoeding</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="pregnancy" value="1" @if(isset($cat)){{ ($catPreference->pregnancy=="1")? "checked" : "" }} @endif>Zwangerschap</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="intensiveCare" value="1" @if(isset($cat)){{ ($catPreference->intensiveCare=="1")? "checked" : "" }} @endif>Ziek met intensieve verzorging</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="noIntensiveCare" value="1" @if(isset($cat)){{ ($catPreference->noIntensiveCare=="1")? "checked" : "" }} @endif>Ziek zonder intensieve verzorging</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="isolation" value="1" @if(isset($cat)){{ ($catPreference->isolation=="1")? "checked" : "" }} @endif>Isolatie</label>
                                </div>
                            </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Beschrijving speciale noden</label>
                                <textarea class="form-control" name="extraInfo" value="{{ old('extraInfo') }}">{{ old('extraInfo') }}{{$cat->extraInfo ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Medicatie</label>
                                <textarea class="form-control" name="medication" value="{{ old('medication') }}">{{ old('extraInfo') }}{{$cat->medication ?? ''}}</textarea>
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
                                <textarea class="form-control" name="personality">{{ old('personality') }}{{$cat->personality ?? ''}}</textarea>
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
                                                <input type="radio" class="form-check-input" name="solo" value="should"                             
                                                @if(isset($cat)){{ ($cat->solo=="should")? "checked" : "" }}@endif> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="solo" value="could"
                                                @if(isset($cat)){{ ($cat->solo=="could")? "checked" : "" }} @endif> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="solo" value="no"                                                 
                                                @if(isset($cat)){{ ($cat->solo=="no")? "checked" : "" }} @endif> Nee
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
                                                <input type="radio" class="form-check-input" name="withPet" value="should"                                                 
                                                @if(isset($cat)){{ ($cat->withPet=="should")? "checked" : "" }} @endif> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="withPet" value="could" 
                                                @if(isset($cat)){{ ($cat->withPet=="could")? "checked" : "" }} @endif> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="withPet" value="no" 
                                                @if(isset($cat)){{ ($cat->withPet=="no")? "checked" : "" }} @endif> Nee
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
                                        @foreach ($cats as $buddy)
                                            <option value="{{$buddy->id}}" @if(isset($cat))@if($cat->buddyId == $buddy->id) selected @endif @else "" @endif>{{$buddy->name}}</option>
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
                                                <input type="radio"class="form-check-input" name="gardenAccess" value="should" 
                                                @if(isset($cat)){{ ($cat->gardenAccess=="should")? "checked" : "" }} @endif> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gardenAccess" value="could" 
                                                @if(isset($cat)){{ ($cat->gardenAccess=="could")? "checked" : "" }} @endif> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gardenAccess" value="no" 
                                                @if(isset($cat)){{ ($cat->gardenAccess=="no")? "checked" : "" }} @endif> Nee
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
                                <input type="checkbox" class="form-check-input" name="kids" value="1" @if(isset($cat)){{ ($catPreference->kids=="1")? "checked" : "" }} @endif>Jonge kinderen</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="dogs" value="1" @if(isset($cat)){{ ($catPreference->dogs=="1")? "checked" : "" }} @endif>Honden</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="cats" value="1" @if(isset($cat)){{ ($catPreference->cats=="1")? "checked" : "" }} @endif>Katten</label>
                            </div>
                            <h5 class="mt-5">Karakter</h5>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="lapCat" value="1" @if(isset($cat)){{ ($catPreference->lapCat=="1")? "checked" : "" }} @endif>Schootkat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="playfulCat" value="1" @if(isset($cat)){{ ($catPreference->playfulCat=="1")? "checked" : "" }} @endif>Speelse kat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="outdoorCat" value="1" @if(isset($cat)){{ ($catPreference->outdoorCat=="1")? "checked" : "" }} @endif>Buitenkat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="calmCat" value="1" @if(isset($cat)){{ ($catPreference->calmCat=="1")? "checked" : "" }} @endif>Rustige kat</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="bedroomAccess" value="1" @if(isset($cat)){{ ($catPreference->bedroomAccess=="1")? "checked" : "" }} @endif>Wil in de slaapkamer</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($cat))
        <div class="row mt-5">
            <input type="submit" class="btn btn-gradient-danger w-25 mx-auto" value="Update">
        </div>
        @else
        <div class="row mt-5">
            <input type="submit" class="btn btn-gradient-danger w-25 mx-auto" value="Sla op">
        </div>
        @endif
        <!-- BUTTON - UPDATE -->
{{--         <div class="row mt-5">
            <button type="submit" class="btn btn-gradient-danger w-25 mx-auto">
            Sla wijzigingen op
            </button>
        </div> --}}
    </form>

        <!-- HEALTH DIARY : WEIGHING-->
        @if(isset($cat))
            <div class="content-wrapper">
                <h3 class="text-muted">Wegingen</h3>
                <div class="card">
                    <div class="card-body">                        
                        <h5 class="text-muted">Overzicht</h5>
                        <div class="stretch-card grid-margin">
                            <div class="card-body card-border-danger">
                                @foreach ( $weighings as $weighing)
                                    <ul>
                                        <li class="row">
                                            <div class="col-md-3">Datum: {{ $weighing->date }}</div>
                                            <div class="col-md-3">Gewicht: {{ $weighing->weight }} g</div>
                                            <div class="col-md-5">Opmerking: {{ $weighing->comments}} </div>  
                                            <a href='/weighing_delete/{{$weighing->id}}' class="col-md-1 btn btn-inverse-danger btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a>                 
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <form id='weighingForm' method="post" action="{{route('storeWeighing')}}"> 
                            @csrf
                            <input type="hidden" value={{$cat->id}} name="cat_id">                          
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
                            <button form='weighingForm' type="submit" class="btn btn-outline-danger">
                            Toevoegen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- HEALTH DIARY : VETVISIT -->
            <div class="content-wrapper">
                <h3 class="text-muted">Dierenarts bezoeken</h3>
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Overzicht</h5>
                        <div class="stretch-card grid-margin">
                            <div class="card-body card-border-danger">
                                @foreach ( $vetVisits as $vetVisit)
                                    <ul>
                                        <li class="row">
                                            <div class="col-md-3">Datum: {{ $vetVisit->date}} </div>
                                            <div class="col-md-3">Reden: {{ $vetVisit->reason}}</div>
                                            <div class="col-md-5">Opmerking: {{ $vetVisit->comments }}</div>
                                            <a href='/vetVisit_delete/{{$vetVisit->id}}' class="col-md-1 btn btn-inverse-danger btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a>                            
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <form id='vetVisitForm' method="post" action="{{route('storeVetVisit')}}"> 
                            @csrf
                            <input type="hidden" value={{$cat->id}} name="cat_id">
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
                                        <option value="0">Selecteer</option>
                                        @foreach ($reason as $reaso)
                                            <option value="{{$reaso}}">{{$reaso}}</option>
                                        @endforeach
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
                            <button id="vetVisitForm" type="submit" class="btn btn-outline-danger">
                            Toevoegen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <!-- PHOTO ALBUM
        <h2>Foto Album</h2>
        <button type="button" class="btn btn-gradient-danger">Upload foto</button> -->

        <!-- BUTTON - ADD -->
        
    @endsection