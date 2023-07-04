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
                'password' => md5($_POST['password']),
                'tipo_consulta' => 0
            ];           
            
            $validarUsuarioDuplicado=$Usuarios->validacion_UsuarioDuplicado(array('email' => $data['email']));
            if($validarUsuarioDuplicado['num_results']==0){
                $data_response=$Usuarios->registrarUsuario($data);
            }
            if($validarUsuarioDuplicado['num_results']>0){
                $data_response=array(
                    'respuesta' => 'error',
                    'mensaje' => 'El email que ingresó ya fue registrado anteriormente'
                );
            }
            header('Content-Type: application/json');  
            print json_encode($data_response, JSON_UNESCAPED_UNICODE); 
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

    
    