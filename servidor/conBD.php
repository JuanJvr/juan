<?php

//crear una clase metodos para conectar,consultar,agregar,eliminar

class conBD{
//declarar las propiedadees o atributos

public $usuario="root";
public $passaword="";
public $serverBD="mysql:host=localhost;";
public $nomBD="curso152";

//crear un constructor
public function __construct(){}


//crear metodos

public function conectar(){
 try{
    //$datos= $this->serverBD.$this->nomBD;
    $conexion=new PDO("mysql:host=localhost;dbname=curso152","root","");

    return($conexion);
 }
 catch(PDOExeption $mensajeResgistros){
    header("location:error.php");
 }
}
//public function AgregarResgistroApi($consultaSQL, $tipoConsulta)
//esta linea agregarregistroapi es solo para consumir o consultar api, la de arriba es para el proyecto

public function AgregarResgistroApi($consultaSQL){
  //1.conectarme  ala base de datos
  
  $conexion=$this->conectar();
  $conexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try{
    //2.preparar la base de datos para ejecutar una consulta sql que puede ser para agregar o eliminar
    
    $operacion=$conexion->prepare($consultaSQL);
    
    //3.ejecutar la consulta que acaba de recibir
    
    $resultado=$operacion->execute();
    
    //4.claisficar la consulta
    //$this->ClasificarConsulta($tipoConsulta);

    // return es para consumir api de lo contrario se debe borrar o eliminar
    
    return $resultado;


 
  }
  catch(PDOExeption $mensajeResgistros){
      header("location.error.php");
   
  }


}

public function consultar($conQuery){
    //1.conectarme a la base de datos
    $conexion=$this->conectar();
    //2.preparar la bd para enviar una consulta sql
    $operacion= $conexion->prepare($conQuery);
    //3.instrucion fecth_assoc-->enviar los datos en forma de array
    $operacion-> setFetchMode(PDO::FETCH_ASSOC);
    //4.ejecutar la instrucion
    $resultado=$operacion->execute();
    //5.retornar la informacion solicitada
    return($operacion->fetchAll());

}

public function ClasificarConsulta($tipoConsulta){
switch($tipoConsulta){
    case 'insert':
        $_SESSION["mensaje"]="registro agregado o insertado";
        header("location:../index1.php");
    break;
    case 'delete':
            $_SESSION["mensaje"]="registro eliminado...";
            header("location:../index1.php");
    break;
    case 'update':
        $_SESSION["mensaje"]="registro actualizado";
        header("location:../index1.php");
    break;
        
}

}

}


?>