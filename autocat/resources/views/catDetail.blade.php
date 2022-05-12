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
    <div class="content-wrapper">
        <div class="row">
            <h1>Mijn naam is <span></span></h1>
        </div>
    </div>
    <div class="content-wrapper py-0">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label class="col-sm-8 col-form-label"><h3>Adoptie status</h3></label>
                    <div class="col-sm-4">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-description">Intake gegevens</h1>
                        <form>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Naam</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Naam aanmelder</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-5 col-form-label">Telefoonnummer aanmelder</label>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Ras</label>
                                      <div class="col-sm-9">
                                        <select class="form-control form-control-sm">
                                            <option></option>
                                          </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-4 col-form-label">Kleur</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Vachtlengte</label>
                                        <div class="col-sm-7">
                                          <select class="form-control form-control-sm">
                                            <option></option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Geboorte datum</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Geslacht</label>
                                        <div class="col-sm-8">
                                          <select class="form-control form-control-sm">
                                            <option></option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Socialisatie</label>
                                        <div class="col-sm-7">
                                          <select class="form-control form-control-sm">
                                            <option></option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Chip nummer</label>
                                      <div class="col-sm-9">
                                        <input type="number" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Gewicht (gram)</label>
                                      <div class="col-sm-9">
                                        <input type="number" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-2 column">
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
                                <div class="col-md-6 column">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--PERSONALITY INFORMATION-->

<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-description">Informatie karakter</h1>
                    <form>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label>Beschrijving</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 column">
                                <h3>Adoptie mogelijkheden</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Solo Plaatsing</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bij ander huisdier</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Buddy</label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm">
                                            <option></option>
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Toegang tot tuin</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio"class="form-check-input"> Moet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Mag
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"> Nee
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 column">
                                <h3>Kan geplaatst worden met</h3>
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
                            </div>
                            <div class="col-md-3 column">
                                <h3>Karakter</h3>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- HEALTH DIARY : VETVISIT-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-description">Medisch dagboek</h1>
                    <h2 class="">Wegingen</h2>
                    <div class="stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <ul class="list-star">
                                    <li class="row">
                                        <div class="col-md-3"><b>Datum: </b></div>
                                        <div class="col-md-3"><b>Gewicht: </b></div>
                                        <div class="col-md-3"><b>Opmerking: </b></div>
                                        <div class="col-md-2" position="relative" style="z-index: 1; cursor: pointer;"><span>&#10006;</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Datum</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Gewicht (gram)</label>
                            <div class="col-sm-6">
                                <input type="number" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Opmerkingen</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"></textarea>
                            </div>
                        </div> 
                    </div>
                    </div>
                    <button type="submit" class="btn btn-outline-danger">
                    Toevoegen
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- HEALTH DIARY : WEIGHINGS -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-description">Dierenarts bezoeken</h2>
                    <div class="stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <ul class="list-star">
                                    <li class="row">
                                        <div class="col-md-3"><b>Datum: </b></div>
                                        <div class="col-md-3"><b>Reden: </b></div>
                                        <div class="col-md-3"><b>Opmerking: </b></div>
                                        <div class="col-md-2" position="relative" style="z-index: 1; cursor: pointer;"><span>&#10006;</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Datum</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Reden</label>
                            <div class="col-sm-6">
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Opmerkingen</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"></textarea>
                            </div>
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
        <button type="button" class="btn btn-gradient-danger">Upload foto</button>
        </div> -->
    </div>

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
</div>

    @endsection