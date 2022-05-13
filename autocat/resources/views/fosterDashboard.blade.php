@extends('layouts.pages.theme')
    @section('content')
        <!--HERO-->
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white me-2">
                    <i class="mdi mdi-view-dashboard"></i>
                </span> Dashboard        
            </h3>
        </div>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Meldingen</h4>
                    </p>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Kat</th>
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
                                <td>Malou</td>
                                <td>Profiel up to date?</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                      
                            </tr>
                            <tr>
                                <td>Caramel</td>
                                <td>Vraag voor opvang</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Tux</td>
                                <td>Afspraak adoptant</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Pumpkin</td>
                                <td>Adoptant goedgekeurd</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <tr>
                                <td>Olijfje</td>
                                <td>Vraag voor opvang</td>
                                <td>lorem ipsum dolor sit amet</td>
                                <td>                          
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    @endsection