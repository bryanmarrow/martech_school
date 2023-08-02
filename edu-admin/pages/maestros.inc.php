<div class="content">        
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
    <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
        <div class="row align-items-end justify-content-between pb-5 g-3">
        <div class="col-auto">
            <h3>Plantilla de Maestros</h3>            
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
        <?php 
                    $id_escuela=$_GET['id_escuela'];
                    
                    $queryGrupos="CALL proc_get_maestros('".$id_escuela."')";
                    $sql = $dbConn->prepare($queryGrupos);        
                    $sql->execute();         
                    
                    $dataSuccessResponse=$sql->fetchAll();

                    // var_dump($dataSuccessResponse);

                ?>
                <table class="table">
                    <thead>
                        <tr>                 
                            <th>#</th>           
                            <th scope="col">Nombre</th>                                                            
                            <th>Materias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dataSuccessResponse as $row){ ?>
                            <tr>
                                <td><?= $row['id_maestro'] ?></td>                                                                        
                                <td><?= $row['nombre_maestro'] ?></td>                                
                                <td><a href="materias_maestro?id_maestro=<?= $row['id_maestro'] ?>" class="btn btn-primary btn-sm">Materias</a> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    
    </div>
</div>
        