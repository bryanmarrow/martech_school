<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';

    $action=$_POST['action'];

    $data_response=array();

    switch ($action) {
        case 'login_admins':            
            $params=array(
                'email_admin' => $_POST['email_admin'],
                'password_admin' => md5($_POST['password_admin'])
            );
            $resultado_login=getDataProcStored('proc_login_admins', $params);     
            switch($resultado_login['data']['respuesta']){
                case 'success':
                    session_start();
                    $_SESSION['id_admin']=$resultado_login['data']['id_admin'];
                    $_SESSION['roll_admin']=$resultado_login['data']['roll_admin'];
                    $_SESSION['data_admin']=$resultado_login['data'];                    

                    $response=array(
                        'respuesta'=>'success',
                        'data' => $resultado_login['data']
                    );
                    break;
                case 'error';
                    $response=array(
                        'respuesta'=>'error',
                        'mensaje' => $resultado_login['data']['mensaje']
                    );
                    break;
            }       
            header('Content-Type: application/json');
            echo json_encode($response);
            break;  
        case 'logout_admin':
            session_start();
            session_destroy();
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


    