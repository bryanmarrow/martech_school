<?php 

    session_start();
    if(count($_SESSION)==0){
        header("Location: login");
        exit();
    }
    $data_admin=$_SESSION['data_admin'];
    $nombre_admin=$data_admin['nombre_admin'];
    $apellidos_admin=$data_admin['apellidos_admin'];
    $roll_admin=$_SESSION['roll_admin'];
    $email_admin=$data_admin['email_admin'];
    $nombre_completo_admin=$data_admin['nombre_completo_admin'];
    
    

   

?>