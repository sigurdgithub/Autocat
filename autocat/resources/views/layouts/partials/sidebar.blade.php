<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
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
        <a class="{{Request::path() === 'pleeggezinnenOverzicht'? 'nav-link active active':'nav-link'}}" href="/pleeggezinnenOverzicht">
          <span class="menu-title">Pleeggezinnen Overzicht</span>
          <i class="mdi mdi-home-variant menu-icon"></i>
        </a>
    </ul>
</nav>
<!-- partial -->