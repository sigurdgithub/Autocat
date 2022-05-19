<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center border-bottom">
    <a class="navbar-brand brand-logo" href="welcome"><img
        src="../assets/images/autoCatLogo/autoCatLogo_horizontaal_grey.png" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="welcome"><img
        src="../assets/images/autoCatLogo/autoCatLogo_small_grey.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch border-bottom">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="mdi mdi-email-outline"></i>
          <span class="count-symbol bg-warning"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <h6 class="p-3 mb-0">Berichten</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Nieuw bericht van <b>Massimo</b></h6>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Nieuw bericht van <b>Wesley</b></h6>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Nieuw bericht van <b>Jari</b></h6>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">4 nieuwe berichten</h6>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <div class="nav-profile-img">
            <img src="../assets/images/faces/face1.jpg" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">David Greymaax</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="{{Request::path() === 'pleeggezinAccount'? 'dropdown-item active active':'dropdown-item'}}"
            href="pleeggezinAccount">
            <i class="mdi mdi-account me-2"></i> Account overzicht </a>
          <div class="dropdown-divider"></div>
          <a class="{{Request::path() === ''? 'dropdown-item active active':'dropdown-item'}}" href="/">
            <i class="mdi mdi-power me-2"></i> Log uit </a>
        </div>
      </li>
      <li class="nav-item nav-logout d-none d-lg-block">
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <a class="nav-link active active nav-link" :href="route('logout')"
            onclick="event.preventDefault();this.closest('form').submit();">
            <i id='logout' class="mdi mdi-power"></i>

          </a>
        </form>

      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="/" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>