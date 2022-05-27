@extends('layouts.pages.theme')
    @section('content')
        <!--HERO-->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                    <i class="mdi mdi-account"></i>
                </span> Account        
            </h3>
        </div>
        <!--ACCOUNTDETAILS-->
        <div class="content-wrapper pt-0">
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
                                <label class="form-label">Telefoonnummer</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">HK-nummer</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Straat</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Huisnummer</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Postcode</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Gemeente</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Wachtwoord</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
{{--                     <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Uw voornaam</label>
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Uw achternaam</label>
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Uw geboortedatum</label>
                                <select class="form-control form-control-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-gradient-success float-end mt-5">
                    Sla op
                    </button>
                </div>
            </div>
        </div>


    @endsection