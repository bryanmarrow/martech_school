    <!-- Page content-->
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0">

            <?php
                
                var_dump($_SESSION);
            ?>
            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <?php include 'templates/sidebar_usuario.php'; ?>
            <!-- Page content-->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">            
            <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
              <div class="card-body">
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3"><i class="ai-map-pin text-primary lead pe-1 me-2"></i>
                  <h2 class="h4 mb-0"><?= $nombreSeccion ?></h2>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">                  
                  <!-- <div class="col">
                    <div class="card h-100 rounded-3 p-3 p-sm-4">
                      <div class="d-flex align-items-center pb-2 mb-1">
                        <h3 class="h6 text-nowrap text-truncate mb-0">Billing address #1</h3><span class="badge bg-faded-primary text-primary fs-xs ms-3">Primary</span>
                        <div class="d-flex ms-auto">
                          <button class="nav-link fs-xl fw-normal py-1 pe-0 ps-1 ms-2" type="button" data-bs-toggle="tooltip" title="Edit"><i class="ai-edit-alt"></i></button>
                          <button class="nav-link text-danger fs-xl fw-normal py-1 pe-0 ps-1 ms-2" type="button" data-bs-toggle="tooltip" title="Delete"><i class="ai-trash"></i></button>
                        </div>
                      </div>
                      <p class="mb-0">314 Robinson Lane,<br>Wilmington, DE 19805,<br>USA</p>
                    </div>
                  </div>                   -->
                  <!-- Add address-->
                  <div class="col">
                    <div class="card h-100 justify-content-center align-items-center border-dashed rounded-3 py-5 px-3 px-sm-4">
                        <a class="stretched-link d-flex align-items-center fw-semibold text-decoration-none my-sm-3" href="#addAddress" data-bs-toggle="modal"><i class="ai-circle-plus fs-xl me-2"></i>Agregar tutor</a></div>
                  </div>
                </div>
                
              </div>
            </section>
            
            </div>
        </div>
    </div>
     
   