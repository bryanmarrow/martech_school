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
                'token_estudiante' => $_POST['token_estudiante'],           
                'id_generacion' => intval($_POST['id_generacion'])
            ];               
            $obtener_estudiantes=getFetchDataProcStored('proc_cuotas_estudiante', $params);                                  
            header('Content-Type: application/json');  
            print json_encode($obtener_estudiantes, JSON_UNESCAPED_UNICODE); 
            break;
        case 'validar_cuota_pago':
            $cuotas_validadas=array();
            foreach ($_POST['cuotas'] as $row) {
                
                $params = [                
                    'token_estudiante' => $_POST['token_estudiante'],           
                    'id_generacion' => $_POST['id_generacion'],
                    'id_cuota' => $row['id_cuota']
                ];                   
                $obtener_estudiantes=getFetchDataProcStored('proc_validar_pago_cuota', $params);
                $obtener_estudiantes['nombre_cuota']=$row['nombre_cuota'];
                $obtener_estudiantes['monto_cuota']=$row['monto_cuota'];
                $obtener_estudiantes['id_cuota']=$row['id_cuota'];
                // var_dump($obtener_estudiantes);
                array_push($cuotas_validadas, $obtener_estudiantes);
            }                        
            header('Content-Type: application/json');  
            print json_encode($cuotas_validadas, JSON_UNESCAPED_UNICODE); 
            break;
        case 'cargar_comprobante':
            $image_base64='';                  
            if(!empty($_FILES['file_comprobante']['name'])){
                $data = file_get_contents($_FILES['file_comprobante']["tmp_name"]);
                $image_base64 = base64_encode($data);                     
            }
            $params = array(                    
                'token_estudiante' => $_POST['token_estudiante'],                
                'idcuota' => $_POST['idcuota'],
                'file_comprobante' => $image_base64,
                'id_generacion' => $_POST['id_generacion']                
            );                       
            $data_response=inserDataProcStore('proc_carga_comprobante', $params);
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

