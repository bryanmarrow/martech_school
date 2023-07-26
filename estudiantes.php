<?php


  session_start();
  $rootPath = "./";  
  include $rootPath.'config/db.php';
  include  $rootPath.'controllers/user_session.php';  

  $nombreSeccion='Estudiantes';
  
  $title = isset($_GET['title'])? $_GET['title'] : $nombreSeccion.' - '.$nombrePagina;
  $description = isset($_GET['description'])? $_GET['description'] : $descripcionPagina;
  $keywords = isset($_GET['keywords'])? $_GET['keywords'] : $tagsPagina;
  $author = isset($_GET['author'])? $_GET['author'] : $authorPagina;
  $ogtitle = isset($_GET['ogtitle'])? $_GET['ogtitle'] : 'Mi cuenta - '.$nombrePagina;
  $ogdescription = isset($_GET['ogdescription'])? $_GET['ogdescription'] : $descripcionPagina;
  $ogimagen = isset($_GET['ogimagen'])? $_GET['ogimagen'] : $imagenPagina;

  
  
  require($rootPath."templates/header.php");
  require($rootPath."views/estudiantes_view.php");
  require($rootPath."templates/footer.php");



?>