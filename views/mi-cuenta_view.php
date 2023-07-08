    <!-- Page content-->
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0">

            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <?php include 'templates/sidebar_usuario.php'; ?>
            <!-- Page content-->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
            <h1 class="h2 mb-4">Mi cuenta</h1>
            <!-- Basic info-->
            <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                <div class="card-body">
                <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3"><i class="ai-user text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Información básica</h2>
                    <a class="btn btn-sm btn-secondary ms-auto d-none" href="account-settings.html">
                        <i class="ai-edit ms-n1 me-2"></i>Editar información
                    </a>
                </div>
                <div class="d-md-flex align-items-center">
                    <div class="d-sm-flex align-items-center">
                    
                    <div class="pt-3 pt-sm-0 ps-sm-3">
                        <h3 class="h5 mb-2"><?= $nombreCompletoUsuarioLog ?><i class="ai-circle-check-filled fs-base text-success ms-2"></i></h3>
                        <div class="text-muted fw-medium d-flex flex-wrap flex-sm-nowrap align-iteems-center">
                        <div class="d-flex align-items-center me-3"><i class="ai-mail me-1"></i><?= $emailUsuarioLog ?></div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="row py-4 mb-2 mb-sm-3">
                    
                </div>
                
                </div>
            </section>
            
            </div>
        </div>
    </div>
     
   