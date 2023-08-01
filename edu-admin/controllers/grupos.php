<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];


    switch ($action) {
        case 'get_grupos_ciclo_escolar':

            $id_escuela=$_POST['id_escuela'];
            $id_generacion=$_POST['id_generacion'];
            $queryGrupos="CALL proc_get_grupos_escuela('".$id_escuela."', '".$id_generacion."')";
            $sql = $dbConn->prepare($queryGrupos);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll(PDO::FETCH_ASSOC);   
                        
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;     
        case 'get_alumnos_grupo':
            $id_grupo=$_POST['id_grupo'];
            $queryGrupos="CALL proc_get_alumnos_grupo('".$id_grupo."')";
            $sql = $dbConn->prepare($queryGrupos);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll(PDO::FETCH_ASSOC);   
                        
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;
        // case 'actualizar_status_comprobante':
        //     $id_status=$_POST['id_status'];
        //     $id_comprobante=$_POST['id_comprobante'];

        //     $queryComprobanteStatus="CALL proc_comprobante_actualizar('".$id_status."', '".$id_comprobante."')";
        //     $sql = $dbConn->prepare($queryComprobanteStatus);        
        //     $sql->execute();         
        //     $dataSuccessResponse=$sql->fetch();
        //     header('Content-Type: application/json');
        //     echo json_encode($dataSuccessResponse);
        //     break;
    }