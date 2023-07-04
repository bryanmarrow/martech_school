<?php

    include '../classes/classUsuario.php';

    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'insertar_registro':            
            $data = [
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'dob' => $_POST['dob'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'tipo_consulta' => 0
            ];           
            
            $data_response=$Usuarios->registrarUsuario($data);

            break;        
        default:
            $data_response=array(
                'respuesta' => 'error',
                'mensaje' => 'Acción no existe'
            );
            header('Content-Type: application/json');  
            break;
    }

    
    print json_encode($data_response, JSON_UNESCAPED_UNICODE); 