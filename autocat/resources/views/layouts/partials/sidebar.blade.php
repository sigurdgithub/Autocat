<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="{{Request::path() === 'asielDashboard'? 'nav-link active active':'nav-link'}}" href="asielDashboard">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-view-dashboard menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{Request::path() === 'kattenOverzicht'? 'nav-link active active':'nav-link'}}" href="kattenOverzicht">
          <span class="menu-title">Katten Overzicht</span>
          <i class="mdi mdi-paw menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{Request::path() === 'pleeggezinnenOverzicht'? 'nav-link active active':'nav-link'}}" href="pleeggezinnenOverzicht">
          <span class="menu-title">Pleeggezinnen Overzicht</span>
          <i class="mdi mdi-home-variant menu-icon"></i>
        </a>
      </li>
          <button class="btn btn-lg btn-outline-danger mt-4"><a href="katDetail">Kat aanmelden</a></button>
      </li>
    </ul>
</nav>
<!-- partial -->