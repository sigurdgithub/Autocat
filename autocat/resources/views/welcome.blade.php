@extends('layouts.pages.theme')
    @section('content')
        <div class="welcome">
            <div class="content-wrapper ms-5 mt-5 mb-5 opacity-50 rounded">
                <div>
                    @auth
                        @if (auth()->user()->fosterFamily_id != null)
                            @php
                            $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);
                            $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);
                            @endphp
                            <h1 class="uppercase">dag
                                @php
                                    $foster_f_name = App\Models\User::with('fosterFamily')->find(auth()->user()->id)->fosterFamily->firstName;
                                @endphp
                                {{$foster_f_name}}
                            </h1>
                        @elseif (auth()->user()->shelter_id != null)
                            <h1 class="uppercase">dag
                                @php
                                    $shelter_f_name = App\Models\User::with('shelter')->find(auth()->user()->id)->shelter->shelterFirstName;
                                @endphp
                                {{$shelter_f_name}}
                            </h1>
                        @endif
                    @endauth  
                </div>
                <div class="mt-3">
                    <h4>Welkom bij AutoCat</h4>
                </div>
            </div>
            <div class="content-wrapper ms-5 mt-5 w-50 opacity-75 rounded">
                @auth
                @if (auth()->user()->fosterFamily_id != null)
                    <h5 class="row">
                        
                        <div class="col-md-1"><a href="/pleeggezinAccount/{{$foster_id_crypt}}"><i class="mdi mdi-account menu-icon"></i></a></div>
                        <div class="col-md-11">Laat via jouw account weten welke en hoeveel katten je wil opvangen</div>
                    </h5>   
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/notifications/{{$foster_id_crypt}}"><i class="mdi mdi-view-dashboard menu-icon"></i></a></div>
                        <div class="col-md-11">Communiceer via het dashboard met jouw asielbeheerder</div>
                    </h5>
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/mijnKatten/{{$foster_id_crypt}}"><i class="mdi mdi-paw menu-icon"></i></a></div>
                        <div class="col-md-11">Hou de gegevens van jouw opvangertjes gemakkelijk bij</div>
                    </h5>
                @elseif (auth()->user()->shelter_id != null)
                    <h5 class="row">
                        <div class="col-md-1"><a href="/asielDashboard"><i class="mdi mdi-view-dashboard menu-icon"></i></a></div>
                        <div class="col-md-11">Communiceer via het dashboard met de pleeggezinnen</div>
                    </h5>
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/asielDashboard"><i class="mdi mdi-view-dashboard menu-icon"></i></a></div>
                        <div class="col-md-11">Vind met de Matchmaker snel het ideale pleeggezin voor jouw opvangertjes</div>
                    </h5>
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/katDetail"><i class="mdi mdi-paw menu-icon"></i></a></div>
                        <div class="col-md-11">Meld makkelijk een nieuw opvangertje aan</div>
                    </h5>
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/kattenOverzicht"><i class="mdi mdi-paw menu-icon"></i></a></div>
                        <div class="col-md-11">Raadpleeg alle informatie van de opvangertjes via de overzichtspagina</div>
                    </h5>
                    <h5 class="row mt-4">
                        <div class="col-md-1"><a href="/pleeggezinnenOverzicht"><i class="mdi mdi-home menu-icon"></i></a></div>
                        <div class="col-md-11">Navigeer tussen de pleeggezinnen via de overzichtspagina</div>
                    </h5>
                @endif
                @endauth  
            </div>
        </div>
    @endsection