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

    


    $tutor_controller = new Tutor();