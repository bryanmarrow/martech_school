<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags-->
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($author); ?>">

    <!-- Facebook tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($ogtitle); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($ogdescription); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogimagen); ?>">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v4.0.8/css/line.css">
    
    <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" >    
    <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" >
   
    <link href="vendors/choices/choices.min.css" rel="stylesheet">
    <link href="vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">
  </head>

  <body>
    
    <main class="main" id="top">
        <nav class="navbar navbar-vertical navbar-expand-lg" >       
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <!-- scrollbar removed-->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="index" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="fas fa-home"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Inicio</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="comprobantes?id_escuela=1" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="far fa-folder-open"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Comprobantes</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="grupos?id_escuela=1&id_generacion=1" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="far fa-folder-open"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Grupos</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="maestros?id_escuela=1" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="far fa-folder-open"></i>
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Maestros</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                
                </ul>
            </div>
            </div>
            <div class="navbar-vertical-footer"><button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
        </nav>
        <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" >
            <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-logo">
                <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand me-1 me-sm-3" href="index.html">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">

                    <p class="logo-text ms-2 d-none d-sm-block"><?= $nombrePagina ?></p>
                    </div>
                </div>
                </a>
            </div>
            
            <ul class="navbar-nav navbar-nav-icons flex-row">
            
                <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                    <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                    <div class="card-body p-0">
                        <div class="text-center pt-4 pb-3">
                        <div class="avatar avatar-xl ">
                            <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                        </div>
                        <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                        </div>
                        <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                    </div>
                    <div class="overflow-auto scrollbar" style="height: 10rem;">
                        <ul class="nav d-flex flex-column mb-2 pb-1">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                        </ul>
                    </div>
                    <div class="card-footer p-0 border-top">
                        <ul class="nav d-flex flex-column my-3">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                        </ul>
                        <hr />
                        <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                        <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                    </div>
                    </div>
                </div>
                </li>
            </ul>
            </div>
        </nav>
     
     
