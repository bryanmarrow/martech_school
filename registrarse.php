<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Around | Account - Sign Up</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Around - Multipurpose Bootstrap HTML Template">
    <meta name="keywords" content="bootstrap, business, corporate, coworking space, services, creative agency, dashboard, e-commerce, mobile app showcase, saas, multipurpose, product landing, shop, software, ui kit, web studio, landing, dark mode, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" color="#6366f1" href="assets/favicon/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="white">
    <!-- Theme mode-->
    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== undefined && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
      
      
    </script>
    <!-- Page loading styles-->
    <style>
      
      
    </style>
    <!-- Page loading scripts-->
    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1500);
        };
      })();
      
    </script>
    <!-- Import Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" id="google-font">
    <!-- Vendor styles-->
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="assets/css/theme.min.css">
    <link rel="stylesheet" media="screen" href="assets/css/page-loader.css">   
  </head>
  
  <body>    
    <!-- Page loading spinner-->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
    
    <!-- Page wrapper-->
    <main class="page-wrapper">
      <!-- Page content-->
      <div class="d-lg-flex position-relative h-100">
        <!-- Home button--><a class="text-nav btn btn-icon bg-light border rounded-circle position-absolute top-0 end-0 p-0 mt-3 me-3 mt-sm-4 me-sm-4" href="index.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Back to home"><i class="ai-home"></i></a>
        <!-- Sign up form-->
        <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
          <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>Registro</h1>
            <p class="pb-3 mb-3 mb-lg-4">Ya tienes cuenta?&nbsp;&nbsp;
              <a href='account-signin.html'>Inicia sesión aquí!</a></p>
            <form class="needs-validation" novalidate>
              <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mb-4">
                  <input class="form-control form-control-lg" type="text" placeholder="Your name" required>
                </div>
                <div class="col mb-4">
                  <input class="form-control form-control-lg" type="email" placeholder="Email address" required>
                </div>
              </div>
              <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Password" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
              <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Confirm password" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
              <div class="pb-4">
                <div class="form-check my-2">
                  <input class="form-check-input" type="checkbox" id="terms">
                  <label class="form-check-label ms-1" for="terms">I agree to <a href="account-signup.html#">Terms &amp; Conditions</a></label>
                </div>
              </div>
              <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>
              
            </form>
          </div>
          <!-- Copyright-->
          <p class="w-100 fs-sm pt-5 mt-auto mb-5" style="max-width: 526px;">
          <span class="text-muted">&copy; Todos los derechos reservados. Made by</span><a class="nav-link d-inline-block p-0 ms-1" href="https://createx.studio/" target="_blank" rel="noopener">Martech Studio</a></p>
        </div>
        <!-- Cover image-->
        <div class="w-50 bg-size-cover bg-repeat-0 bg-position-center" style="background-image: url('assets/img/account/cover.jpg');"></div>
      </div>
    </main>
    <!-- Back to top button--><a class="btn-scroll-top" href="account-signup.html#top" data-scroll>
      <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></circle>
      </svg><i class="ai-arrow-up"></i></a>
    <?php

              include 'templates/bundle_footer.php';

    ?>
  </body>
</html>