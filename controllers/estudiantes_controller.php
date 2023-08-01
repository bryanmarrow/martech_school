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
            // var_dump($_POST);
            $params = [                
                'token_estudiante' => $_POST['token_estudiante'],           
                'id_generacion' => $_POST['id_generacion'],
                'id_cuota' => $_POST['id_cuota']
            ];    
            $obtener_estudiantes=getFetchDataProcStored('proc_validar_pago_cuota', $params);                            
            header('Content-Type: application/json');  
            print json_encode($obtener_estudiantes, JSON_UNESCAPED_UNICODE); 
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
                'id_generacion' => $_POST['id_generacion'],
                'formato_comprobante' => $_POST['formato_comprobante']
            );                       
            $data_response=inserDataProcStore('proc_carga_comprobante', $params);
            header('Content-Type: application/json');  
            print json_encode($data_response, JSON_UNESCAPED_UNICODE); 
            break;
        case 'autocomplete_estudiantes':                    
            $params = [                
                'id_escuela' => $_POST['id_escuela'],                           
            ];    
            $obtener_estudiantes=getFetchDataProcStored('proc_busqueda_estudiante_autocomplete', $params);                                 
            $lista_html='<option value="">Seleccione una opción</option>';

            foreach($obtener_estudiantes['data'] as $row){                
                $lista_html.='<option value="'.$row['estudiante_id'].'">'.$row['nombre_completo_estudiante'].'</option>';
            }            
            echo $lista_html;            
            break;
        case 'agregar_estudiante':
            session_start();                
            $params = array(                    
                'id_estudiante' => $_POST['id_estudiante'],      
                'id_usuario' => $_SESSION['id_usuario'],                                             
            );                       
            $data_response=inserDataProcStore('proc_agregar_estudiante', $params);
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

