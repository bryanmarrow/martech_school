<?php

    include '../classes/classTutor.php';
    
    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'obtenertutores_porusuario':         
            session_start();
            $datatutor = [                
                'id_usuario' => $_SESSION['id_usuario'],           
            ];     
            $obtenertutores=$tutor_controller->obtenertutores_por_usuario('proc_tutor_obtener_tutores_usuario', $datatutor);                        
            header('Content-Type: application/json');  
            print json_encode($obtenertutores, JSON_UNESCAPED_UNICODE); 
            break;   
        case 'insertar_tutor':
            session_start();
            $datatutor=[
                'nombre_tutor' => $_POST['nombre_tutor'],
                'apellidos_tutor' => $_POST['apellidos_tutor'],
                'dob_tutor' => $_POST['dob_tutor'],
                'foto_tutor' => '',
                'id_parentesco' => $_POST['id_parentesco'],
                'email_tutor' => $_POST['email_tutor'],
                'numtelefono_tutor' => $_POST['numtelefono_tutor'],
                'token_tutor' => rand(10000000,90000000),
                'id_usuario' => $_SESSION['id_usuario']
            ];
            
            $insertarTutor=$tutor_controller->insertar_tutor('proc_tutor_insertar_tutor', $datatutor); 
            header('Content-Type: application/json');  
            print json_encode($insertarTutor, JSON_UNESCAPED_UNICODE);
            break;
        case 'eliminar_tutor':
            session_start();
            $datatutor=[
                'id_tutor' => $_POST['id_tutor'],
                'id_usuario' => $_SESSION['id_usuario']
            ];
            $deletetutor=$tutor_controller->eliminar_tutor('proc_tutor_eliminar_tutor', $datatutor); 
            header('Content-Type: application/json');  
            print json_encode($deletetutor, JSON_UNESCAPED_UNICODE);
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

    
    