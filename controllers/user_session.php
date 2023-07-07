<?php

    if(isset($_SESSION['id_usuario'])){
        $dataUserLog=$_SESSION['data_usuario'];
        $idUsuarioLog=$_SESSION['id_usuario'];
        $nombreUsuarioLog=$dataUserLog['nombre_usuario'];
        $apellidosUsuarioLog=$dataUserLog['apellidos_usuario'];
        $emailUsuarioLog=$dataUserLog['email_usuario'];
        $nombreCompletoUsuarioLog=$dataUserLog['nombrecompleto_usuario'];
        
    }else{
        header("Location:inicio-sesion");
    }