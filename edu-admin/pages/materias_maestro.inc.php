<div class="offcanvas offcanvas-end settings-panel border-0" id="add_materias" tabindex="-1" aria-labelledby="settings-offcanvas" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="offcanvas-header align-items-start border-bottom flex-column">
    <div class="pt-1 w-100 mb-1 d-flex justify-content-between align-items-start">
        <div>
        <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-0"></span>Asignar materias</h5>                
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
            <p class="text-1000 fw-bold mb-2 line-clamp-1 me-5 lh-base" >Nombre Maestro: </p>            
            <span class="nombre_maestro"></span>
            
            </div>                      
        </div>
        <div class="col-lg-12 div_cambiar_status">
            <label for="">Nivel</label>
            <select class="form-select mt-2 select-niveles mb-2">
                <option value="">Seleccione una opción</option>
                <?php 
                    $queryGrupos="SELECT * FROM catalogo_niveles";
                    $sql = $dbConn->prepare($queryGrupos);        
                    $sql->execute();         

                    $dataSuccessResponse=$sql->fetchAll();
                    foreach($dataSuccessResponse as $row){
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nombre_nivel'] ?></option>
                <?php } ?>
            </select>                          
        </div>
        <div class="col-lg-12" >
            <select class="form-select" multiple aria-label="multiple select example" id="select_asignar_materias" style="height:200px;">
                
            </select>

        </div>
        <div class="col-lg-12 mt-3">
        <div class="d-grid gap-2">
                <button class="btn btn-primary btn_cambiar_status_comprobante" type="button">Asignar materia</button>
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
                <h3>Materias asignadas</h3>            
            </div>
            <div class="col-12 col-md-auto">
                <div class="row g-2 gy-3">                
                    <div class="col-auto">
                        <button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100 me-2" id="btn_agregar_materia_maestro" type="button">Agregar materias</button>                        
                    </div>
                </div>
            </div>
        </div>    
        <div class="row g-3 mb-3" id="viewMaterias_maestro">
        
        </div>              
    </div>
</div>
        