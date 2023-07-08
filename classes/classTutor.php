<?php

    $rootPath = "../";  
    include $rootPath.'config/db.php';
        
        
    class Tutor {

        public $proc_stored;
        private $dataUsuario=array();
        public $email;

        public function obtenertutores_por_usuario($proc_stored, $dataUsuario){            
            $responseAction=getFetchDataProcStored($proc_stored, $dataUsuario);   
            
            // var_dump($responseAction);
            return $responseAction;        

        }
        public function insertar_tutor($proc_stored, $dataUsuario){
            $responseAction=inserDataProcStore($proc_stored, $dataUsuario);
            return $responseAction;
        }

        public function eliminar_tutor($proc_stored, $dataUsuario){
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);
            return $responseAction;
        }

    }

    function inserDataProcStore($proc_stored, $data_proc_tore){
        global $dbConn;
        try{
            $queryProcedimiento="CALL $proc_stored('".implode("','",$data_proc_tore)."')";
            $sql = $dbConn->prepare($queryProcedimiento);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetch();

            $datarespuesta=array(
                'respuesta' => 'success',
                'mensaje' => $dataSuccessResponse['MSG'],
                'id_agregado' => $dataSuccessResponse['ID_INSERTADO'],
                'data' => $data_proc_tore
            );

        }catch(PDOException $e){
            $datarespuesta=array(
                'respuesta' => 'error',
                'mensaje' => 'Error al registrar Usuario',
                'log_error' => $e->getMessage()
            );
        }
        return $datarespuesta;
    }

    function getDataProcStored($proc_stored, $data_proc_tore){
        global $dbConn;
        try{
            $queryProcedimiento="CALL $proc_stored('".implode("','",$data_proc_tore)."')";
            
            $sql = $dbConn->prepare($queryProcedimiento);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetch(PDO::FETCH_ASSOC);
            
            

            $datarespuesta=array(
                'respuesta' => 'success',
                'num_results' => $sql->rowCount(),
                'data' => $dataSuccessResponse
            );

        }catch(PDOException $e){
            $datarespuesta=array(
                'respuesta' => 'error',
                'mensaje' => 'Error al registrar Usuario',
                'log_error' => $e->getMessage()
            );
        }
        return $datarespuesta;

    }

    function getFetchDataProcStored($proc_stored, $data_proc_tore){
        global $dbConn;
        try{
            $queryProcedimiento="CALL $proc_stored('".implode("','",$data_proc_tore)."')";
            
            $sql = $dbConn->prepare($queryProcedimiento);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll(PDO::FETCH_ASSOC);
            
            

            $datarespuesta=array(
                'respuesta' => 'success',
                'num_results' => $sql->rowCount(),
                'data' => $dataSuccessResponse
            );

        }catch(PDOException $e){
            $datarespuesta=array(
                'respuesta' => 'error',
                'mensaje' => 'Error al registrar Usuario',
                'log_error' => $e->getMessage()
            );
        }
        return $datarespuesta;

    }

    function callProcStored($proc_stored, $data_proc_tore){
        global $dbConn;
        try{
            $queryProcedimiento="CALL $proc_stored('".implode("','",$data_proc_tore)."')";
            $sql = $dbConn->prepare($queryProcedimiento);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetch();

            $datarespuesta=array(
                'respuesta' => 'success',
                'mensaje' => $dataSuccessResponse['MSG'],
                'id_agregado' => $dataSuccessResponse['LAST_INSERT_ID']
            );

        }catch(PDOException $e){
            $datarespuesta=array(
                'respuesta' => 'error',
                'mensaje' => 'Error al registrar Usuario',
                'log_error' => $e->getMessage()
            );
        }
        return $datarespuesta;
    }


    $tutor_controller = new Tutor();