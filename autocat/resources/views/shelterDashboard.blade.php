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
                    </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Pleeggezin</th>
                            <th>kat</th>
                            <th>Type melding</th>
                            <th>Bericht</th>
                            <th></th>
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
    @endsection