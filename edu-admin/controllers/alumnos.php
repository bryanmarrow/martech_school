<?php


    $rootPath = "../";  
    include $rootPath.'config/db.php';
    include '../vendor/autoload.php';

    $action=$_POST['action'];


    switch ($action) {       
        case 'carga_alumnos_grupo':
            
            // $id_status=$_POST['id_status'];
            // $id_comprobante=$_POST['id_comprobante'];

            // $queryComprobanteStatus="CALL proc_comprobante_actualizar('".$id_status."', '".$id_comprobante."')";
            // $sql = $dbConn->prepare($queryComprobanteStatus);        
            // $sql->execute();         
            // $dataSuccessResponse=$sql->fetch();
           
            if($_FILES["file_carga_alumnos"]["name"] != '')
            {
             $allowed_extension = array('xls', 'csv', 'xlsx');
             $file_array = explode(".", $_FILES["file_carga_alumnos"]["name"]);
             $file_extension = end($file_array);

             if(in_array($file_extension, $allowed_extension))
             {
              $file_name = time() . '.' . $file_extension;
              move_uploaded_file($_FILES['file_carga_alumnos']['tmp_name'], $file_name);
              $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
              $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

              $spreadsheet = $reader->load($file_name);

              unlink($file_name);

              $data = $spreadsheet->getActiveSheet()->toArray();
                

              foreach($data as $key => $row)
              {
                
                    
                if($key == 0){

                }else{
                    // $randalf=generate_string($permitted_chars, 5);
                    // $sesion=$randalf.$rand;
                    
                    $query="CALL proc_agregar_estudiante_grupo('".$row[0]."', '".$row[1]."', '".$_POST['id_grupo']."')";                   
                    $sql = $dbConn->prepare($query);        
                    $sql->execute();  

                }
              }
              $message = '<div class="alert alert-success">Datos importados con éxito</div>';

             }
             else
             {
              $message = '<div class="alert alert-danger">Tipo de archivo no válido</div>';
             }
            }
            else
            {
             $message = '<div class="alert alert-danger">Por favor, seleccione un archivo</div>';
            }

            $dataSuccessResponse=array(
                'respuesta' => 'success',
                'mensaje' => 'Alumnos cargados correctamente'
            );
            header('Content-Type: application/json');
            echo json_encode($dataSuccessResponse);
            break;
    }



// //import.php

// include '../vendor/autoload.php';

// include '../config/dbconfig.php';



// $rand=rand(1000, 9000);
// $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
// function generate_string($input, $strength = 16) {
//     $input_length = strlen($input);
//     $random_string = '';
//     for($i = 0; $i < $strength; $i++) {
//         $random_character = $input[mt_rand(0, $input_length - 1)];  
//         $random_string .= $random_character;
//     }

//     return $random_string;
// }

// // echo generate_string($permitted_chars, 4);



// date_default_timezone_set('America/Mexico_City');
// $datepago=date("Y-m-d H:i:s");





// echo $message;

// ?>