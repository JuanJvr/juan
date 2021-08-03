<?php
//incluir nuestra clase de la base de datos
include ('conBD.php');

if(isset($_POST['agregar'])){
   
    //recibir todos los datos que viajan atravez del name
    $identificacion=$_POST['identificacion'];
    $apellidos=$_POST['apellidos'];
    $nombres=$_POST['nombres'];
    $celular=$_POST['celular'];
    $programa=$_POST['programa'];

    // instanciar la clase de la base de datos conBD
    $operacionBD= new conBD();

    //definir la consulta sql a ejecutar
    $consultarSQL="INSERT INTO estudiantes(ididentificacion,apellidos,nombres,celular,programa) values($identificacion, '$apellidos', '$nombres', '$celular','$programa')";

    //llamar metodo de la clase para agregar el registro
    $operacionBD->AgregarResgistro($consultarSQL,"insert");
    
}

?>