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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Kat</th>
                            <th>Type melding</th>
                            <th>Bericht</th>
                            <th></th>
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