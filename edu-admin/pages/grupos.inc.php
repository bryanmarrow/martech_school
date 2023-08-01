        <div class="content">        
            
                <div class="px-2">
                    <h2 class="my-4">Grupos</h2>
                   
                </div>                                    
                <div class="row justify-content-between align-items-end mb-4 g-3">
                <div class="col-12 col-sm-auto">
                    <select class="form-select" id="set_grupos_escuela">
                        
                    </select>
                </div>
                <div class="col-12 col-sm-auto">
                    
                    <div class="d-flex align-items-center">                    
                        <!-- <div class="mb-3">
                            <label class="form-label" for="customFile">File input example</label>
                            <input class="form-control" id="customFile" type="file" />
                        </div> -->
                        <div class="row mx-1">                            
                            <form action="" id="form_carga_alumnos_grupo">
                                <div class="col-sm-12">
                                    <input class="form-control" id="file_carga_alumnos" name="file_carga_alumnos" type="file" />
                                </div>
                            </form>
                        </div>
                        <button class="btn btn-success me-1 mb-1" id="btn_cargar_alumnos" type="button">Cargar alumnos</button>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="tabla_alumnos" class="table fs--1 mb-0 border-top border-200">
                            <thead>
                                <tr class="white-space-nowrap fs--1 ps-0 align-middle">                                    
                                    <th>#</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>CURP</th>                                    
                                </tr>
                            </thead>
                            <tbody>                   
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>