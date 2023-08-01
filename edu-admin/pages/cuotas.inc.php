<main class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php 
                        $id_escuela=$_GET['id_escuela'];
                        
                        $queryGrupos="CALL proc_get_comprobantes_escuela('".$id_escuela."')";
                        $sql = $dbConn->prepare($queryGrupos);        
                        $sql->execute();         
                        
                        $dataSuccessResponse=$sql->fetchAll();
 
                    ?>
                    <table class="table">
                        <thead>
                            <tr>                            
                                <th scope="col">Fecha</th>                            
                                <th scope="col"># Comprobante</th>                                                            
                                <th scope="col">Nombre Estudiante</th>
                                <th scope="col">Cuota</th>                            
                                <th scope="col">Ciclo Escolar</th>                            
                                <th scope="col">Grupo</th>                            
                                <th scope="col">Status</th>                            
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($dataSuccessResponse as $row){ ?>
                                <tr>
                                    <td><?= $row['create_date_comprobante'] ?></td>
                                    <td><?= $row['token_comprobante'] ?></td>                                    
                                    <td><?= $row['nombre_estudiante'] ?> <?= $row['apellidos_estudiante'] ?></td>                                                                                                                                                
                                    <td><?= $row['nombre_cuota'] ?></td>     
                                    <td><?= $row['nombre_ciclo_escolar'] ?></td>                                                                                                            
                                    <td><?= $row['nombre_grados'] ?> - <?= $row['nombre_grupo'] ?></td>                                    
                                    <td><?= $row['badge_status'] ?></td>                                    
                                    <td><a class="btn btn-dark btn-sm" href="detalles_grupo?id_grupo=<?= $row['id_comprobante'] ?>">Ver comprobante</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>