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
<h3 class="text-muted">Meldingen</h3>
<div class="grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            </p>
            <!-- Modal for creation of new notifications -->
            <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationModalLabel">Nieuwe melding</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('addNotification')}}" method="post" enctype="multipart/form" required>
                            @csrf
                            <input type="hidden" name="fosterFamily" value="{{$fosterFamily}}">
                            <div class="modal-body">
                                <div class="form-floating">
                                    <select class="form-select" name="cat" id="catSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Selecteer een kat</option>
                                        @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="catSelect">Kat</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select" name="type" id="notificationTypeSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Selecteer een Melding Type</option>
                                        <option value="Profiel is up to date">Profiel is up to date</option>
                                        <option value="Opvang geaccepteerd">Opvang geaccepteerd</option>
                                        <option value="Opvang geweigerd">Opvang geweigerd</option>
                                        <option value="Weging">Weging</option>
                                        <option value="Dierenarts bezoek">Dierenarts bezoek</option>
                                        <option value="Afspraak adoptant gemaakt">Afspraak adoptant gemaakt</option>
                                        <option value="Adoptant goedgekeurd">Adoptant goedgekeurd</option>
                                        <option value="Adoptant afgekeurd">Adoptant afgekeurd</option>
                                        <option value="Andere">Andere</option>
                                    </select>
                                    <label for="notificationTypeSelect">Melding Type</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Leave a comment here"
                                        id="notificationMessage" style="height: 100px"></textarea>
                                    <label for="notificationMessage">Bericht</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Sluit</button>
                                <button type="submit" class="btn btn-outline-info">Verstuur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kat</th>
                            <th>Melding Type</th>
                            <th>Bericht</th>
                            <th>
                                <button class="btn btn-icon btn-lg btn-gradient-info" data-bs-toggle="modal"
                                    data-bs-target="#notificationModal">
                                    <i class="mdi mdi-message-plus"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                        <tr>
                            @if (isset($notification->cat))
                            <td>{{$notification->cat->name}}</td>
                            @else
                            <td><span style="font-weight:bold;">Geen kat</span></td>
                            @endif
                            <td>{{$notification->type}}</td>
                            <td>{{$notification->message}}</td>
                            <td>
                                <form action="{{route('delete', $notification->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-inverse-info btn-icon btn-lg">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection