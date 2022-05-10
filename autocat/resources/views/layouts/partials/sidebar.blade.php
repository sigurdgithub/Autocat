@extends('layouts.pages.theme')

@section('sidebar')
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-view-dashboard menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Overzicht Katten</span>
          <i class="mdi mdi-paw menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Overzicht Pleeggezinnen</span>
          <i class="mdi mdi-home-variant menu-icon"></i>
        </a>
      </li>
          <button class="btn btn-block btn-lg btn-gradient-primary mt-4 text-white"><a href="catDetail">Kat aanmelden</a></button>
      </li>
    </ul>
</nav>
<!-- partial -->
@endsection