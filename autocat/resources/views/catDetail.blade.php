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
    <div class="content-wrapper pt-0">
        <div class="row">
            <div class="col-md-7">
                <h1>Mijn naam is <span></span></h1>
            </div>
            <div class="col-md-5">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label-lg">Adoptie status</label>
                    <div class="col-md-8">
                        <select class="form-control form-control-sm">
                            <option></option>
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
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Naam aanmelder</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Telefoonnummer aanmelder</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Ras</label>
                            <select class="form-control form-control-sm">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Kleur</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Vachtlengte</label>
                            <select class="form-control form-control-sm">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Geboorte datum</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Geslacht</label>
                            <select class="form-control form-control-sm">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Socialisatie</label>
                            <select class="form-control form-control-sm">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Chip nummer</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gewicht (gram)</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Steriel</label>
                            <div class="col-sm-4">
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input"> Ja
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input"> Nee
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
                            <input type="checkbox" class="form-check-input">Flesvoeding</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Zwangerschap</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Ziek met intensieve verzorging</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Ziek zonder intensieve verzorging</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Isolatie</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Andere</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Medicatie</label>
                            <textarea class="form-control"></textarea>
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
                            <textarea class="form-control"></textarea>
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
                                            <input type="radio" class="form-check-input"> Moet
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Mag
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Nee
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
                                            <input type="radio" class="form-check-input"> Moet
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Mag
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Nee
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Buddy</label>
                            <div class="col-md-4">
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>                                   
                        <div class="form-group">
                            <label class="form-label">Toegang tot tuin</label>
                            <div class="row">
                                <div class="col-md-4">        
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio"class="form-check-input"> Moet
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Mag
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input"> Nee
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
                            <input type="checkbox" class="form-check-input">Jonge kinderen</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Honden</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Katten</label>
                        </div>
                        <h5 class="mt-5">Karakter</h5>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Schootkat</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Speelse kat</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Buitenkat</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Rustige kat</label>
                        </div>
                        <div class="form-check form-check-danger">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Wil in de slaapkamer</label>
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
                        <ul class="list-star">
                            <li class="row">
                                <div class="col-md-3">Datum: </div>
                                <div class="col-md-3">Gewicht: </div>
                                <div class="col-md-3">Opmerking: </div>
                                <div class="col-md-2" position="relative" style="z-index: 1; cursor: pointer;"><span>&#10006;</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Datum</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Gewicht (gram)</label>
                            <input type="number" min="0" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Opmerkingen</label>
                            <textarea class="form-control"></textarea>
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
                        <ul class="list-star">
                            <li class="row">
                                <div class="col-md-3">Datum: </div>
                                <div class="col-md-3">Reden: </div>
                                <div class="col-md-3">Opmerking: </div>
                                <div class="col-md-2" position="relative" style="z-index: 1; cursor: pointer;"><span>&#10006;</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="text-muted mb-4">Nieuw toevoegen</h5>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Datum</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Reden</label>
                        <select class="form-control form-control-sm">
                            <option></option>
                        </select>                                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Opmerkingen</label>
                        <textarea class="form-control"></textarea>
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
        <button type="submit" class="btn btn-gradient-danger w-25 mx-auto">
        Sla op
        </button>
    </div>
    
    <!-- BUTTON - UPDATE -->
    <div class="row mt-5">
        <button type="submit" class="btn btn-gradient-danger w-25 mx-auto">
        Sla wijzigingen op
        </button>
    </div>

    @endsection