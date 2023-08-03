        <div class="offcanvas offcanvas-end settings-panel border-0" id="view_comprobante" tabindex="-1" aria-labelledby="settings-offcanvas" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="offcanvas-header align-items-start border-bottom flex-column">
            <div class="pt-1 w-100 mb-1 d-flex justify-content-between align-items-start">
              <div>
                <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-0"></span>#Comprobante de pago</h5>                
              </div>
              <button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-0"> </span></button>
            </div>
            <!-- <button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs--2"></span>Reset to default</button> -->
          </div>
          <div class="offcanvas-body scrollbar px-card" >
              <div class="row">
                <div class="col-lg-12" id="vista_comprobante">                  
                </div>
                <div class="col-lg-12">                                   
                  <div class="py-3 border-bottom border-dashed mb-3">
                    <div class="d-flex flex-between-center">
                      <p class="text-warning me-5 text-800 fs--1 mb-2 fecha_comprobante"></p>                      
                    </div>
                    <p class="text-1000 fw-bold mb-2 line-clamp-1 me-5 lh-base" >Cuota: <span class="nombre_cuota"></span></p>
                    <p class="text-800 fs--1 mb-2">Ciclo Escolar: <span class="fw-bold text-primary ciclo_escolar_comprobante"></span></p>
                    <p class="text-1000 fw-bold mb-2 line-clamp-1 me-5 lh-base">Estudiante: <span class="estudiante_comprobante"></span></p>
                    <p class="fs--1 text-700 fw-bold mb-1">
                      <span class="fa-solid fa-clock text-800 me-1"></span>
                      Grupo: <span class="grupo_comprobante"></span>
                    </p>                    
                  </div>                      
                </div>
                <div class="col-lg-12 div_cambiar_status">
                  <select class="form-select mt-2 select-status mb-2">
                      <option value="">Seleccione una opción</option>
                      <?php 
                          $queryGrupos="SELECT * FROM catalogo_status_cuotas where status_status_cuota=0";
                          $sql = $dbConn->prepare($queryGrupos);        
                          $sql->execute();         

                          $dataSuccessResponse=$sql->fetchAll();
                          foreach($dataSuccessResponse as $row){
                      ?>
                          <option value="<?= $row['id_status'] ?>"><?= $row['nombre_status'] ?></option>
                      <?php } ?>
                    </select>              
                    
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary btn_cambiar_status_comprobante" type="button">Cambiar estatus</button>
                    </div>
                </div>
              </div>
            
          </div>
        </div>
        
        <div class="content">        
          <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
            <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
              <div class="row align-items-end justify-content-between pb-5 g-3">
                <div class="col-auto">
                  <h3>Comprobantes</h3>
                  <p class="text-700 lh-sm mb-0">Pagos recibidos por medio de los padres de familia</p>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="row g-2 gy-3">                
                    <div class="col-auto"><button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100 me-2" type="button">All products</button><button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100 action-btn" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h" data-fa-transform="shrink-2"></span></button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>          
              <div class="row">
                <div class="col-lg-12">
                <table id="tabla_comprobantes" class="table table-hover  fs--1 mb-0 border-top border-200 nowrap" style="width:100%">
                    <thead>
                        <tr class="white-space-nowrap fs--1 ps-0 align-middle">
                            <th></th> 
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Estudiante</th>
                            <th>Cuota</th>
                            <th>Ciclo Escolar</th>                        
                            <th>Status</th>       
                            <th></th>                 
                            <th></th>                 
                        </tr>
                    </thead>
                    <tbody>                   
                    </tbody>
                  </table>
                </div>
              </div>
         
          </div>
        </div>
        

       