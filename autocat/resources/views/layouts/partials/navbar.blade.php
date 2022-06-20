<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center border-bottom">
    <a class="navbar-brand brand-logo" href="welkom"><img
        src="../assets/images/autoCatLogo/autoCatLogo_horizontaal_grey.png" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="welkom"><img
        src="../assets/images/autoCatLogo/autoCatLogo_small_grey.png" alt="logo" /></a>
  </div>
  @auth
  <div class="navbar-menu-wrapper d-flex align-items-stretch border-bottom">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <div class="nav-profile-img">
            <img src="../assets/images/faces-clipart/pic-1.png" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">

              @php
              if (isset(auth()->user()->fosterFamily_id)) {
              $foster_f_name = App\Models\User::with('fosterFamily')->find(auth()->user()->id)->fosterFamily->firstName;
              $foster_l_name = App\Models\User::with('fosterFamily')->find(auth()->user()->id)->fosterFamily->lastName;
              }
              elseif (isset(auth()->user()->shelter_id)) {
              $shelter_f_name = App\Models\User::with('shelter')->find(auth()->user()->id)->shelter->shelterFirstName;
              $shelter_l_name = App\Models\User::with('shelter')->find(auth()->user()->id)->shelter->shelterLastName;
              }
              @endphp
              @if(auth()->user()->shelter_id != null)
              {{$shelter_f_name}} {{$shelter_l_name}}
              @elseif(auth()->user()->fosterFamily_id != null)
              {{$foster_f_name}} {{$foster_l_name}}
              @endif

            </p>
          </div>
        </a>
        @php
        $foster_id_crypt = Crypt::encryptString(auth()->user()->fosterFamily_id);
        $shelter_id_crypt = Crypt::encryptString(auth()->user()->shelter_id);
        @endphp

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          @if (auth()->user()->fosterFamily_id != null)
          <a class="{{Request::path() === 'fosterAccount'? 'dropdown-item active active':'dropdown-item'}}"
            href="/pleeggezinAccount/{{$foster_id_crypt}}">
            <i class="mdi mdi-account me-2"></i> Account overzicht </a>
          @elseif (auth()->user()->shelter_id != null)
          <a class="{{Request::path() === 'asielAccount'? 'dropdown-item active active':'dropdown-item'}}"
            href="asielAccount/{{$shelter_id_crypt}}">
            <i class="mdi mdi-account me-2"></i> Account overzicht </a>
          @endif
          <div class="dropdown-divider nav-item nav-logout d-none d-lg-block"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="{{Request::path() === '/'? 'dropdown-item active active':'dropdown-item'}}" :href="/"
              onclick="event.preventDefault();this.closest('form').submit();" id='logout'><i id='logout'
                class="mdi mdi-power me-2"></i> Log uit </a>
          </form>
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
  @endauth
</nav>