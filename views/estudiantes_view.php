    <!-- Page content-->
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0">

            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <?php include 'templates/sidebar_usuario.php'; ?>
            <!-- Page content-->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">            
            <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
              <div class="card-body">
                
                <div class="d-sm-flex align-items-center mb-4">
                    <i class="ai-map-pin text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0"><?= $nombreSeccion ?></h2>
                    <div class="d-flex ms-auto">
                        <a class="btn btn-secondary btn_collapse_agregar_estudiante" data-bs-toggle="collapse" 
                        href="#collapse_form_agregar_estudiante" role="button" 
                        aria-expanded="false" aria-controls="collapse_form_agregar_tutor">
                        <i class="ai-download me-2 ms-n1"></i>Agregar Estudiante</a>                        
                    </div>
                </div>
                <div class="row mb-3 collapse" id="collapse_form_agregar_estudiante">
                    <div class="col-lg-12">                        
                        <form id="form_agregar_estudiante">
                            <div class="row">
                                <!-- <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                        <input class="form-control input_curp_estudiante" type="text" name="nombre_tutor" placeholder="Ingresar nombre" required>
                                        <label for="fl-text">Ingrese el curp del estudiante</label>
                                        <div id="suggestions"></div>
                                    </div>                                    
                                </div>   
                                                              -->
                                
                                <div class="col-lg-12 mb-2">
                                        
                                    <label for="select-input" class="form-label">Escuela</label>
                                    <select class="form-select" id="select_escuelas">
                                        <option value="">Seleccione una opción...</option>
                                        <?php 
                                            $queryEscuelas="CALL proc_get_escuelas_activas()";                                            
                                            $dataEscuelas = $dbConn->prepare($queryEscuelas);        
                                            $dataEscuelas->execute();
                                            foreach($dataEscuelas as $row) {                                                
                                            
                                        ?>
                                            <option value="<?= $row['id_escuela'] ?>"><?= $row['nombre_escuela'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <label for="datalist-input" class="form-label">CURP</label>                                    
                                    <select class="js-example-basic-single form-select" id="datalist-options" disabled>
                                                
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn btn-primary mb-3" id="btn_addestudiante" type="button" disabled>Agregar estudiante</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4" id="">                                       
                    <div class="col-lg-12">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre Estudiante</th>                            
                            <th>Acciones</th>                            
                        </tr>
                        </thead>
                        <tbody id="list_estudiantes_usuario">
                        
                        </tbody>
                    </table>
                    </div>     
                    </div>       
                  
                </div>
                
              </div>
            </section>
            
            </div>
        </div>
    </div>
     
   