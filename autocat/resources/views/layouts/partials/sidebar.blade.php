<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  {{-- FOSTER SIDEBAR --}}
  @auth
  @if (auth()->user()->fosterFamily_id != null)
  @php
  $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);
  $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);
  @endphp
  <ul class="nav ">
    <li class="nav-item info">
      <a class="{{Request::path() === 'notifications'? 'nav-link active active':'nav-link'}}"
        href="/notifications/{{$foster_id_crypt}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-view-dashboard menu-icon"></i>
      </a>
    </li>
    <li class="nav-item danger">
      <a class="{{Request::path() === 'katDetail'? 'nav-link active active':'nav-link'}}" href="/katDetail">
        <span class="menu-title">Kat Aanmelden</span>
        <i class="mdi mdi-plus-box menu-icon"></i>
      </a>
    </li>
    <li class="nav-item danger">
      <a class="{{Request::path() === 'kattenOverzicht'? 'nav-link active active':'nav-link'}}" href="/kattenOverzicht">
        <span class="menu-title">Katten Overzicht</span>
        <i class="mdi mdi-paw menu-icon"></i>
      </a>
    </li>
    {{-- <li class="nav-item info">
      <a class="{{Request::path() === 'pleeggezinnenOverzicht'? 'nav-link active active':'nav-link'}}"
        href="/pleeggezinnenOverzicht">
        <span class="menu-title">Pleeggezinnen Overzicht</span>
        <i class="mdi mdi-home-variant menu-icon"></i>
      </a> --}}
  </ul>
  {{-- SHELTER SIDEBAR --}}
  @elseif (auth()->user()->shelter_id != null)
  <ul class="nav ">
    <li class="nav-item success">
      <a class="{{Request::path() === 'asielDashboard'? 'nav-link active active':'nav-link'}}" href="/asielDashboard">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-view-dashboard menu-icon"></i>
      </a>
    </li>
    <li class="nav-item danger">
      <a class="{{Request::path() === 'katDetail'? 'nav-link active active':'nav-link'}}" href="/katDetail">
        <span class="menu-title">Kat Aanmelden</span>
        <i class="mdi mdi-plus-box menu-icon"></i>
      </a>
    </li>
    <li class="nav-item danger">
      <a class="{{Request::path() === 'kattenOverzicht'? 'nav-link active active':'nav-link'}}" href="/kattenOverzicht">
        <span class="menu-title">Katten Overzicht</span>
        <i class="mdi mdi-paw menu-icon"></i>
      </a>
    </li>
    <li class="nav-item info">
      <a class="{{Request::path() === 'pleeggezinnenOverzicht'? 'nav-link active active':'nav-link'}}"
        href="/pleeggezinnenOverzicht">
        <span class="menu-title">Pleeggezinnen Overzicht</span>
        <i class="mdi mdi-home-variant menu-icon"></i>
      </a>
  </ul>
  @endif
  @endauth
</nav>
<!-- partial -->