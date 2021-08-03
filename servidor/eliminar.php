<?php
//incluir la clase con bd
 include ('conBD.php');

 //recibir el identificador el dato a eliminar
 $id= $_GET['id'];
 // instanciar la clase con bd,creando un nuevoobjeto de tipo bd
 $operacionBD= new conBD();
 //crear la consulta sql para eliminar el dato
 $consultaSQL= "DELETE FROM estudiantes where ididentificacion='$id'";
 //llamar al metodo para eliminar el registro seleccinado
 $operacionBD->AgregarResgistro($consultaSQL, 'delete');
 


?>