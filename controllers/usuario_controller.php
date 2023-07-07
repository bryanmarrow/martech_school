<?php

    include '../classes/classUsuario.php';
    
    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'iniciar_sesion':            
            $data = [                
                'email' => $_POST['email_inicio_sesion'],
                'password' => md5($_POST['password_inicio_sesion']),                
            ];     
            
            $validarUsuario=$Usuarios->validacion_UsuarioRegistrado(array('email' => $data['email']));            
            if($validarUsuario['num_results']==0){
                $data_response=array(
                    'respuesta' => 'error',
                    'mensaje' => 'Usuario no existente'
                );
            }
            if($validarUsuario['num_results']>0){
                $validarConfirmacion=$Usuarios->validacion_ConfirmacionRegistro($data);
                if($validarConfirmacion['num_results']==0){
    
                    $data_response=array(
                        'respuesta' => 'error',
                        'mensaje' => 'Correo electrónico aún no ha sido confirmado'
                    );
                }
                if($validarConfirmacion['num_results']>0){
                    $validarUsuarioActivo=$Usuarios->validacion_UsuarioActivo($data);
    
    
                    if($validarUsuarioActivo['num_results']==0){
                        $data_response=array(
                            'respuesta' => 'error',
                            'mensaje' => 'Su cuenta está inactiva, favor de revisar el motivo directamente con su administrador'
                        );  
                    }
                    if($validarUsuarioActivo['num_results']>0){
                        $validarUsuarioPassword=$Usuarios->validacion_UsuarioPassword($data);

                        // var_dump($validarUsuarioPassword);

                        if($validarUsuarioPassword['num_results']==0){
                            $data_response=array(
                                'respuesta' => 'error',
                                'mensaje' => 'La contraseña que ha ingresado es incorrecta.'
                            );  
                        }
                        if($validarUsuarioPassword['num_results']>0){       
                            session_start();                            
                            $_SESSION['data_usuario']=$validarUsuarioPassword['data'];                            
                            $_SESSION['id_usuario']=$validarUsuarioPassword['data']['id_usuario'];
                                                        

                            $data_response=array(
                                'respuesta' => 'success',
                                'data' => $validarUsuarioPassword['data']
                            );

                            
                        }
                    }
                }
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

    
    