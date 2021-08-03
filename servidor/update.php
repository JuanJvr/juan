<?php
//incluir la clase conbd
 include ('conBD.php');

 //recibir los datos que se van actualizar

 $ididentificacion= $_POST['ididentificacion'];
 $apellidos= $_POST['apellidos'];
 $nombres= $_POST['nombres'];
 $celular= $_POST['celular'];
 $programa= $_POST['programa'];

//instanciar la clase con bd
$operacionBD= new conBD();

//crear la consulta sql para actualizar
$consultaBD="UPDATE estudiantes SET apellidos='$apellidos',nombres='$nombres',celular='$celular',programa='$programa' where ididentificacion='$ididentificacion' ";

//llamar al metodo agregar registro de la clase conbd
$operacionBD->AgregarResgistro($consultaBD,'update');

 ?>