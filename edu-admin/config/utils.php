<?php

  //Abrir conexion a la base de datos
  function connect($db)
  {
      try {
          $options=[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
          ];
          $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password'], $options);
          
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          return $conn;
      } catch (PDOException $exception) {
          exit($exception->getMessage());
      }
  }


 //Obtener parametros para updates
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}

  //Asociar todos los parametros a un sql
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->bindValue(':'.$param, $value);
		}
		return $statement;
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
            'id_agregado' => $dataSuccessResponse['LAST_INSERT_ID'],
            'data_insert' => $data_proc_tore
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
 ?>