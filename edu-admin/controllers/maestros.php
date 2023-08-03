<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'get_maestros_escuela':
            $id_escuela=$_POST['id_escuela'];
                    
            $queryGrupos="CALL proc_get_maestros('".$id_escuela."')";
            $sql = $dbConn->prepare($queryGrupos);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll();
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;
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

            $materias_restantes=array_udiff($getMateriasActivas['data'], $getMateriasActuales['data'], function ($a, $b) {
                return strcmp($a['id_materia'], $b['id_materia']);
            });

            header('Content-Type: application/json');
            echo json_encode($materias_restantes);
            break;
        case 'agregar_materias_maestro':
            $materias_asignar_maestro=$_POST['materias_para_asignar'];            
            $id_maestro=$_POST['id_maestro'];

            
            try{
                $result_proc=array();
                for ($i=0; $i < count($materias_asignar_maestro); $i++) { 
                    $params=array(
                        'id_materia' => $materias_asignar_maestro[$i],
                        'id_maestro' => $id_maestro
                    );
                    $asignar_materia=callProcStored('proc_asignar_materia', $params);
                    array_push($result_proc, $asignar_materia);
                }
                $response=array(
                    'respuesta'=> 'success',
                    'mensaje' => 'Materias asignadas correctamente'
                );
            }catch(PDOException $e){
                $response=array(
                    'respuesta'=> 'error',
                    'mensaje' =>  $e->getMessage()
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
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


    