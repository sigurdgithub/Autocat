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
    <form id="updateCat" method="POST" action="/updateCat/{{$cat->id}}">
    @endif
    <form id="storeCat" method="POST" action="/katDetail">
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
            <!--INTAKE INFORMATION-->
            <div class="mt-5">
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
            </
            <!--PERSONALITY INFORMATION-->
            <div class="mt-5">
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
                <!-- HEALTH DIARY : WEIGHING-->
            @if(isset($cat))
            <div class="mt-5">
                <h3 class="text-muted">Wegingen</h3>
                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="modal fade" id="weighingModal" tabindex="-1" aria-labelledby="weighingModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="weighingModalLabel">Nieuwe weging</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('storeWeighing')}}" method="post" enctype="multipart/form" required>
                                            @csrf
                                            <input type="hidden" value={{$cat->id}} name="cat_id">                          
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="date">Datum</label>
                                                    <input type="date" class="form-control" name="date" id="date">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="weight">Gewicht</label>
                                                    <input type="number" min="0" class="form-control" name="weight" id="weight">
                                                </div>
                                                <div class="form-group">
                                                    <label for="comments">Opmerking</label>
                                                    <textarea class="form-control" name="comments" id="comments" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-danger">Toevoegen</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                        
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Gewicht</th>
                                            <th>Opmerking</th>
                                            <th>                                
                                                <button class="btn btn-icon btn-lg btn-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#weighingModal">
                                                <i class="mdi mdi-message-plus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $weighings as $weighing)
                                            <tr>
                                                <td>{{ $weighing->date }}</td>
                                                <td>{{ $weighing->weight }} g</td>
                                                <td>{{ $weighing->comments}} </td>  
                                                <td><a href='/weighing_delete/{{$weighing->id}}' class="col-md-1 btn btn-inverse-danger btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a></td>               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEALTH DIARY : VETVISIT -->
            <div class="mt-5">
                <h3 class="text-muted">Dierenarts bezoeken</h3>
                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="modal fade" id="vetVisitModal" tabindex="-1" aria-labelledby="vetVisitModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="vetVisitModalLabel">Nieuw dierenartsbezoek</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('storeVetVisit')}}" method="post" enctype="multipart/form" required>
                                            @csrf
                                            <input type="hidden" value={{$cat->id}} name="cat_id">                          
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label" for="date">Datum</label>
                                                    <input type="date" class="form-control" name="date" id="date">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="weight">Reden</label>
                                                    <select class="form-control form-control-sm" name="reason">
                                                        <option value="0">Selecteer</option>
                                                        @foreach ($reason as $reaso)
                                                            <option value="{{$reaso}}">{{$reaso}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="form-group">
                                                    <label for="comments">Opmerking</label>
                                                    <textarea class="form-control" name="comments" id="comments" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-danger">Toevoegen</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                        
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Datum</th>
                                            <th>Reden</th>
                                            <th>Opmerking</th>
                                            <th>                                
                                                <button class="btn btn-icon btn-lg btn-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#vetVisitModal">
                                                <i class="mdi mdi-message-plus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $vetVisits as $vetVisit)
                                            <tr>
                                                <td>{{ $vetVisit->date }}</td>
                                                <td>{{ $vetVisit->reason }}</td>
                                                <td>{{ $vetVisit->comments }}</td>  
                                                <td><a href='/vetVisit_delete/{{$vetVisit->id}}' class="col-md-1 btn btn-inverse-danger btn-icon btn-lg pt-2"><i class="mdi mdi-delete"></i></a></td>               
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
            <button type="submit" class="btn btn-gradient-danger float-end mt-5" @if(isset($cat)) form="updateCat" @else form="storeCat" @endif>
                @if(isset($cat)) Update @else Sla op @endif 
            </button>
            </div>
        </div>    
    </form>
    @endsection