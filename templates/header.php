<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($title); ?></title>
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

    <!-- SEO Meta Tags-->
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($author); ?>">

    <!-- Facebook tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($ogtitle); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($ogdescription); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogimagen); ?>">
   
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
    <link rel="stylesheet" media="screen" href="assets/css/estilo_edutrebol.css">   
  </head>

  <!-- Body-->
  <body class="bg-secondary">
    
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>

      <!-- Page wrapper-->
      <main class="page-wrapper">
      <!-- Navbar. Remove 'fixed-top' class to make the navigation bar scrollable with the page-->
      <header class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a class="navbar-brand pe-sm-3" href="index.html"><span class="text-primary flex-shrink-0 me-2">
              <svg version="1.1" width="35" height="32" viewBox="0 0 36 33" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M35.6,29c-1.1,3.4-5.4,4.4-7.9,1.9c-2.3-2.2-6.1-3.7-9.4-3.7c-3.1,0-7.5,1.8-10,4.1c-2.2,2-5.8,1.5-7.3-1.1c-1-1.8-1.2-4.1,0-6.2l0.6-1.1l0,0c0.6-0.7,4.4-5.2,12.5-5.7c0.5,1.8,2,3.1,3.9,3.1c2.2,0,4.1-1.9,4.1-4.2s-1.8-4.2-4.1-4.2c-2,0-3.6,1.4-4,3.3H7.7c-0.8,0-1.3-0.9-0.9-1.6l5.6-9.8c2.5-4.5,8.8-4.5,11.3,0L35.1,24C36,25.7,36.1,27.5,35.6,29z"></path>
              </svg></span><?= $nombrePagina; ?></a>
          
          <!-- User signed in state. Account dropdown on screens > 576px-->
          <div class="dropdown nav d-none d-sm-block order-lg-3"><a class="nav-link d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="ps-2">
                <div class="fs-xs lh-1 opacity-60">Hola,</div>
                <div class="fs-sm dropdown-toggle"><?= $nombreUsuarioLog ?></div>
              </div></a>
            <div class="dropdown-menu dropdown-menu-end my-1">
              <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Account</h6><a class="dropdown-item" href="account-overview.html"><i class="ai-user-check fs-lg opacity-70 me-2"></i>Overview</a><a class="dropdown-item" href="account-settings.html"><i class="ai-settings fs-lg opacity-70 me-2"></i>Settings</a><a class="dropdown-item" href="account-billing.html"><i class="ai-wallet fs-base opacity-70 me-2 mt-n1"></i>Billing</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header fs-xs fw-medium text-muted text-uppercase pb-1">Dashboard</h6><a class="dropdown-item" href="account-orders.html"><i class="ai-cart fs-lg opacity-70 me-2"></i>Orders</a><a class="dropdown-item" href="account-earnings.html"><i class="ai-activity fs-lg opacity-70 me-2"></i>Earnings</a><a class="dropdown-item d-flex align-items-center" href="account-chat.html"><i class="ai-messages fs-lg opacity-70 me-2"></i>Chat<span class="badge bg-danger ms-auto">4</span></a><a class="dropdown-item" href="account-favorites.html"><i class="ai-heart fs-lg opacity-70 me-2"></i>Favorites</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="account-signin.html"><i class="ai-logout fs-lg opacity-70 me-2"></i>Sign out</a>
            </div>
          </div>
          <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
          <nav class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
              
              <!-- <li class="nav-item"><a class="nav-link" href="components/typography.html">UI Kit</a></li>
              <li class="nav-item"><a class="nav-link" href="docs/getting-started.html">Docs</a></li> -->
              <!-- User signed in state. Account dropdown on screens > 576px-->
              <li class="nav-item dropdown d-sm-none border-top mt-2 pt-2"><a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                
                  <div class="ps-2">
                    <div class="fs-xs lh-1 opacity-60">Hola,</div>
                    <div class="fs-sm dropdown-toggle"><?= $nombreUsuarioLog ?></div>
                  </div></a>
                <div class="dropdown-menu">
                  
                  <div class="dropdown-divider"></div>
                    <button type="button" class="dropdown-item" onclick="logOut()">
                      <i class="ai-logout fs-lg opacity-70 me-2"></i>Cerrar sesión
                    </button>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </header>

     