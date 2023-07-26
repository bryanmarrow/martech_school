<?php

    $rootPath = "../";  
    include $rootPath.'config/db.php';
        
        
    class Usuario {

        public $proc_stored;
        private $dataUsuario=array();
        public $email;

        public function validacion_UsuarioDuplicado($dataUsuario){
            $proc_stored='proc_usuario_validar_usuario_duplicado';
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);   
            
            // var_dump($responseAction);
            return $responseAction;        

        }

        public function validacion_UsuarioRegistrado($dataUsuario){
            $proc_stored='proc_usuario_validar_usuario_registrado';
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);   
            
            // var_dump($responseAction);
            return $responseAction;    
        }

        public function validacion_ConfirmacionRegistro($dataUsuario){
            $proc_stored='proc_usuario_validar_confirmacion_registro';
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);   
            
            // var_dump($responseAction);
            return $responseAction;    
        }

        public function validacion_UsuarioActivo($dataUsuario){
            $proc_stored='proc_usuario_validar_usuario_activo';
            $responseAction=getDataProcStored($proc_stored, $dataUsuario);
            return $responseAction;
        }

        public function validacion_UsuarioPassword($dataUsuario){
            $proc_stored='proc_usuario_validar_usuario_password';
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

    $Usuarios = new Usuario();