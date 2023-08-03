<div class="content">        
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
    <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
        <div class="row align-items-end justify-content-between pb-5 g-3">
            <div class="col-auto">
                <h3>Plantilla de Maestros</h3>     
                <p><?= $nombre_escuela ?></p>       
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
                <table class="table table-striped nowrap" style="width:100%" id="tabla_maestros">
                    <thead>
                        <tr>                 
                            <th>#</th>           
                            <th scope="col">Nombre</th>                                                            
                            <th>Materias</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
</div>
        