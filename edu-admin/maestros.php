<?php

  $rootPath = "./";  
  include $rootPath.'config/db.php';
  require 'templates/session_manager.php';
  
  $title = isset($_GET['title'])? $_GET['title'] : 'Comprobantes - '.$nombrePagina;
  $description = isset($_GET['description'])? $_GET['description'] : $descripcionPagina;
  $keywords = isset($_GET['keywords'])? $_GET['keywords'] : $tagsPagina;
  $author = isset($_GET['author'])? $_GET['author'] : $authorPagina;
  $ogtitle = isset($_GET['ogtitle'])? $_GET['ogtitle'] : 'Mi cuenta - '.$nombrePagina;
  $ogdescription = isset($_GET['ogdescription'])? $_GET['ogdescription'] : $descripcionPagina;
  $ogimagen = isset($_GET['ogimagen'])? $_GET['ogimagen'] : $imagenPagina;

  
  $params=array(
    'id_escuela' => $_GET['id_escuela']
  );
  $data_escuela=getDataProcStored('proc_get_info_escuela', $params)['data'];

  $nombre_escuela=$data_escuela['nombre_escuela'];
  

  require($rootPath."templates/header.php");
  require($rootPath."pages/maestros.inc.php");
  require($rootPath."templates/footer.php");



?>