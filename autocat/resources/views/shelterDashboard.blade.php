@extends('layouts.pages.theme')
    @section('content')
        <!--HERO-->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                    <i class="mdi mdi-view-dashboard"></i>
                </span> Dashboard        
            </h3>
        </div>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Meldingen</h4>
<!-- Modal for creation of new notifications -->
                    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationModalLabel">Nieuwe melding</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating">
                                <select class="form-select" id="fosterSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een pleeggezin</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="fosterSelect">Pleeggezin</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" id="catSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een kat</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="catSelect">Katnaam</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" id="notificationTypeSelect" aria-label="Floating label select example">
                                    <option selected>Selecteer een Type melding</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="notificationTypeSelect">Melding-type</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="notificationMessage" style="height: 100px"></textarea>
                                <label for="notificationMessage">Comments</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                              </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Pleeggezin</th>
                            <th>kat</th>
                            <th>Type melding</th>
                            <th>Bericht</th>
                            <th>
                                <button class="btn btn-icon btn-lg btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#notificationModal">
                                    <i class="mdi mdi-message-plus"></i>
                                </button>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Liesbeth P</td>
                                <td>Malou</td>
                                <td>Profiel up to date?</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                      
                            </tr>
                            <tr>
                                <td>Sophie C</td>
                                <td>Caramel</td>
                                <td>Weging</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Leentje B</td>
                                <td>Tux</td>
                                <td>Opvang geweigerd</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Doenja S</td>
                                <td>Pumpkin</td>
                                <td>Afspraak adoptant</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Jan V</td>
                                <td>Olijfje</td>
                                <td>Opvang geaccepteerd</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
                <!-- CAT DISPLAY BASED ON ADOPTER SELECTION-->
    <div class="row">
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-md-8 text-muted">Selecteer hier de kat</h4>
                        <div class="col-md-4">
                        <select class="select-option form-control bg-gradient-danger text-white">
                            <option class="option">Selecteer</option>
                            <option class="option"></option>
                        </select>
                        </div>
                    </div>
                    <ng-container>
                        <div class="card mt-5">
                            <div class="card-body card-border-danger">
                                <p class="card-description"> Algemene Informatie </p>
                                <div class="row">
                                    <div class="col-md-6">Geboortedatum</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Gender</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Ras</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Chipnummer</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Socialisatie</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Gewicht</div>
                                    <div class="col-md-6"> gram</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Gesteriliseerd</div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body card-border-danger">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-description">Aandachtspunten</p>
                                        <ul class="list-star">
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-description">Eigenschappen</p>
                                    <ul class="list-star">
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5"><a> Volledige fiche van </a></div>
                    </ng-container>
                </div>
            </div>
        </div>
        <!-- FOSTER DISPLAY BASED ON CAT SELECTION-->
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-md-8 text-muted">Selecteer hier het pleeggezin</h4>
                        <div class="col-md-4">
                            <select class="select-option form-control bg-gradient-info text-white">
                                <option class="option">Selecteer</option>
                                <option class="option"></option>
                            </select>
                        </div>
                    </div>
                    <ng-container>
                        <div class="card mt-5">
                            <div class="card-body card-border-info">
                                <p class="card-description"> Algemene informatie </p>
                                <div class="row">
                                    <div class="col-md-6">Naam</div>                  
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Adres</div>
                                    <div class="col-md-6">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Geboortedatum</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Email</div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">Aantal beschikbare plaatsen </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body card-border-info">
                                <p class="card-description">Staat open voor</p>
                                <ul class="list-star">
                                    <li class="row">
                                        <div class="col-md-10"></div>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                            <!-- Roommates & Pets -->
                        <div class="card mt-5">
                            <div class="card-body card-border-info">
                                <p class="card-description">Huisdieren</p>
                                <div class="row">
                                    <div class="col-md-6">
                                    <p></p>
                                    </div>
                                    <div class="col-md-6">
                                    <p> jaar oud </p>
                                    </div>
                                </div>
                                <p class="card-description">Huisgenoten</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>jaar oud </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5"><a> Volledige fiche van </a></div>
                    </ng-container>
                </div>
            </div>
        </div>
    </div>
    @endsection