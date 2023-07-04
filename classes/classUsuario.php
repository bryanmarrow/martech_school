<?php

    $rootPath = "../";  
    include $rootPath.'config/db.php';
        
        
    class Usuario {

        public $proc_stored;
        private $dataUsuario=array();
        public $email;

        public function validacion_UsuarioDuplicado($dataUsuario){
            $proc_stored='proc_usuario_validarUsuarioDuplicado';
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);   
            
            // var_dump($responseAction);
            return $responseAction;        

        }

        public function registrarUsuario($dataUsuario){            
            $proc_stored='proc_usuario_registrar_usuario';  
            $responseAction=callProcStored($proc_stored, $dataUsuario);            
            return $responseAction;        
        }

    }

    function getDataProcStored($proc_stored, $data_proc_tore){
        global $dbConn;
        try{
            $queryProcedimiento="CALL $proc_stored('".implode("','",$data_proc_tore)."')";
            $sql = $dbConn->prepare($queryProcedimiento);        
            $sql->execute();         
            
            $dataSuccessResponse=$sql->fetchAll();
            
            

            $datarespuesta=array(
                'respuesta' => 'success',
                'num_results' => $sql->rowCount()
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

    $Usuarios = new Usuario();