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
              <form class="pt-3" method="POST" action="{{ route('login.custom')}}">
                @csrf
                <div class="form-group">
                  {{-- Edit name to database column --}}
                  <input type="email" class="form-control form-control-lg" placeholder="E-mail" name="email"
                    value="{{old('email')}}" required>
                  @error('email')
                  <span class="text-danger m-3">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  {{-- Edit password to database column --}}
                  <input type="password" class="form-control form-control-lg" placeholder="Wachtwoord" name="password"
                    value="{{old('password')}}" required>
                  @error('password')
                  <span class="text-danger m-3">{{$message}}</span>
                  @enderror
                </div>
                {{-- <div class="mt-3">
                  <input type="submit" class="btn btn-gradient-primary btn-lg font-weight-medium text-white w-100"
                    value="Asielbeheerder LOG IN">
                </div> --}}
                <div class="mt-3">
                  <input type="submit" class="btn btn-gradient-info btn-lg font-weight-medium text-white w-100"
                    value="LOG IN">
                </div>
                <div class="text-center mt-4 font-weight-light">
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>