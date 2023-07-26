    <!-- Page content-->
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0">

            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <?php include 'templates/sidebar_usuario.php'; ?>
            <!-- Page content-->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">            
              <div class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
                  <div class="card-body pb-4">
                    <!-- Orders accordion-->
                    <div class="accordion accordion-alt accordion-orders" id="viewgrupos_usuario_cuotas" data-token_estudiante='<?= $_GET['token_estudiante'] ?>'>
                      
                    </div>                  
                  </div>
                </div>
              
            </div>
        </div>
    </div>
     
   