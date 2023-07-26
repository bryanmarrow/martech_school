    <!-- Page content-->
    <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
        <div class="row pt-sm-2 pt-lg-0">

            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <?php include 'templates/sidebar_usuario.php'; ?>
            <!-- Page content-->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">            
            <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
              <div class="card-body">
                <div class="d-flex align-items-center pb-4 mt-sm-n1 mb-0 mb-lg-1 mb-xl-3"><i class="ai-map-pin text-primary lead pe-1 me-2"></i>
                  <h2 class="h4 mb-0"><?= $nombreSeccion ?></h2>
                </div>
                <div class="row mb-3 collapse" id="collapse_form_agregar_tutor">
                    <div class="col-lg-12">                        
                        <form id="form_agregar_tutor">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="nombre_tutor" placeholder="Ingresar nombre" required>
                                        <label for="fl-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="apellidos_tutor"  placeholder="Ingresar apellidos" required>
                                        <label for="fl-text">Apellidos</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="date" name="dob_tutor" placeholder="Fecha de nacimiento" required>
                                        <label for="fl-text">Fecha de nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="email" name="email_tutor"  placeholder="Email" required>
                                        <label for="fl-text">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="tel" name="numtelefono_tutor" placeholder="No. de celular" required>
                                        <label for="fl-text">No. celular</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="id_parentesco" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="0">Madre</option>
                                        <option value="1">Padre</option>     
                                        <option value="2">Abuelo</option>
                                        <option value="3">Abuela</option>
                                        <option value="4">Tio</option>
                                        <option value="5">Tia</option> 
                                        <option value="6">Tutor</option>                                    
                                    </select>
                                    <label for="fl-select">Parentesco</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Agregar tutor</button>
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
     
   