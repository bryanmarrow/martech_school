<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'obtenerestudiantes_porusuario':         
            session_start();
            $params = [                
                'id_usuario' => $_SESSION['id_usuario'],           
            ];     
            $obtener_estudiantes=getFetchDataProcStored('proc_estudiante_obtener_estudiantes_usuario', $params);                      
            // var_dump($obtener_estudiantes);
            header('Content-Type: application/json');  
            print json_encode($obtener_estudiantes, JSON_UNESCAPED_UNICODE); 
            break;   
        case 'obtener_cuotas_estudiante':            
            $params = [                
                'token_estudiante' => $_POST['token_estudiante'],           
            ];     
            $obtener_estudiantes=getFetchDataProcStored('proc_estudiante_obtener_grupos', $params);                                  
            header('Content-Type: application/json');  
            print json_encode($obtener_estudiantes, JSON_UNESCAPED_UNICODE); 
            break;
        case 'obtener_cuotas_asignadas':
            $params = [                
                'token_escuela' => $_POST['token_escuela'],           
            ];     
            $obtener_estudiantes=getFetchDataProcStored('proc_escuela_cuotas_asignadas', $params);                                  
            header('Content-Type: application/json');  
            print json_encode($obtener_estudiantes, JSON_UNESCAPED_UNICODE); 
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

