<?php

    
    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];


    switch ($action) {
        case 'get_comprobantes':
            $id_escuela=$_POST['id_escuela'];
            // var_dump($_POST);
            $queryGrupos="CALL proc_get_comprobantes_escuela('".$id_escuela."')";
            $sql = $dbConn->prepare($queryGrupos);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll();
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;        
        case 'actualizar_status_comprobante':
            $id_status=$_POST['id_status'];
            $id_comprobante=$_POST['id_comprobante'];

            $queryComprobanteStatus="CALL proc_comprobante_actualizar('".$id_status."', '".$id_comprobante."')";
            $sql = $dbConn->prepare($queryComprobanteStatus);        
            $sql->execute();         
            $dataSuccessResponse=$sql->fetch();
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;
    }