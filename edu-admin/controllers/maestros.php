<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'get_materias_maestro':                                              
            $id_maestro=$_POST['id_maestro'];
            
            $queryMaterias="CALL proc_get_materias_maestro('".$id_maestro."')";
            $sql = $dbConn->prepare($queryMaterias);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll(PDO::FETCH_ASSOC);   
                        
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;    
        case 'get_info_maestro':
            // var_dump($_POST);
            $id_maestro=$_POST['id_maestro'];
            
            $queryMaterias="CALL proc_get_info_maestro('".$id_maestro."')";
            $sql = $dbConn->prepare($queryMaterias);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetch(PDO::FETCH_ASSOC);   
                        
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;
        case 'get_materias_agregar':                        
            $id_maestro=$_POST['id_maestro'];
            $id_nivel=$_POST['id_nivel'];
            $params=array(
                'id_maestro' => $id_maestro
            );
            $params_nivel=array(
                'id_nivel' => $id_nivel
            );
            $getMateriasActuales=getFetchDataProcStored('proc_get_materias_maestro', $params);
            $getMateriasActivas=getFetchDataProcStored('proc_get_materias', $params_nivel);

            
            // $materiasactuales=array();                        
            // foreach($getMateriasActuales['data'] as $row){
            //     array_push($materiasactuales, $row['nombre_materia']);
            // }

            // $materiasactivas=array();                        
            // foreach($getMateriasActivas['data'] as $row){
            //     array_push($materiasactivas, $row['nombre_materia']);
            // }

            $materias_restantes=array_udiff($getMateriasActivas['data'], $getMateriasActuales['data'], function ($a, $b) {
                return strcmp($a['id_materia'], $b['id_materia']);
            });
            
            // var_dump($getMateriasActivas['data']);
            // var_dump($getMateriasActuales['data']);

            // var_dump($materias_restantes);

            header('Content-Type: application/json');
            echo json_encode($materias_restantes);
            break;
        default:
            $data_response=array(
                'respuesta' => 'error',
                'mensaje' => 'Acción no existe'
            );
            header('Content-Type: application/json');  
            print json_encode($data_response, JSON_UNESCAPED_UNICODE); 
            break;
    }


    