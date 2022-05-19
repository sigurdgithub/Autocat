<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/autoCatLogo/autoCatLogo_horizontaal_grey.png">
              </div>
              <h4>Welkom!</h4>
              <h5 class="font-weight-light">Log in om verder te gaan</h5>
              <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />

              <!-- Validation Errors -->
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                {{-- Email Address --}}
                <div class="form-group">
                  {{--
                  <x-label for="email" :value="__('Email')" /> --}}
                  <input type="email" class="form-control form-control-lg" placeholder="E-mail" name="email"
                    value="{{old('email')}}" required autofocus>
                </div>
                <!-- Password -->
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Wachtwoord" name="password"
                    required autocomplete="current-password">
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                  <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                      class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                      name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
                  </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                  @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                  </a>
                  @endif
                  <div class="mt-3">
                    <input class="btn btn-gradient-info btn-lg font-weight-medium text-white w-100" type="submit"
                      name="sendLogin">
                  </div>
                  <div class=" text-center mt-4 font-weight-light">
                    <h5 class="font-weight-light">Nog geen account?</h5>
                    <a href="/asielDashboard" class="text-gray text-decoration-underline">Maak een account aan als
                      <b>asielbeheerder</b></a><br>
                    <br>
                    <a href="/pleeggezinDashboard" class="text-gray text-decoration-underline text-bottom">Maak een
                      account aan als <b>pleeggezin</b></a>

                  </div>
              </form>


            </div>


          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>