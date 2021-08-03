<?php 
//1. imcluir la clase conBD

include('servidor/conBD.php');
//2.crear un objecto de tipo bd SE LLAMA INSTACIAR POO
$operacionBD= new conBD();
//3.realizar consulta para mostrar todos los datos de la tabla estudiantes
$conQuery=('SELECT * FROM estudiantes');

//4.acceder al metodo consultar y almacenamos la consulta dentro de un arrglo array
$estudiantes=$operacionBD->consultar($conQuery);

//5. ensayo para imprimir los datos en pantalla
//print_r($estudiantes);
//$estudiantes[0];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>lista estudiantes</title>
</head>
<body>
    <div class="container mt-5">
       <div class="row">
          <div class="col-md-3">
            <h3 class="text-center"> estudiante nuevo</h3>

            <form action="servidor/agregar.php" method="POST">
            <input type="text" class="from-control mb-3 " name="ididentificacion" placeholder="Identificacion">
            <input type="text" class="from-control mb-3 " name="apellidos" placeholder="Apellidos">
            <input type="text" class="from-control mb-3 " name="nombres" placeholder="Nombres">
            <input type="text" class="from-control mb-3 " name="celular" placeholder="Celular">
            <input type="text" class="from-control mb-3 " name="programa" placeholder="Programa"><br>
          
           
            <input type="submit" class="btn btn-primary" value="agregar" name="agregar">
          </form>
          </div>
    
          <div class="col-md-9">
           <h2 class="text-center">listado</h2>
            <table class="table">
               <thead>
               <tr>
               <td>identificacion</td>
               <td>apellidos</td>
               <td>nombres</td>
               <td>celular</td>
               <td>programa</td>
               </tr>
               </thead>
               <tbody>
               <?php 
                  foreach($estudiantes as $dato):?>
                      <tr>
                      <td><?=$dato["ididentificacion"]?></td>
                      <td><?=$dato["apellidos"]?></td>
                      <td><?=$dato["nombres"]?></td>
                      <td><?=$dato["celular"]?></td>
                      <td><?=$dato["programa"]?></td>

                      <td><a href="editar.php?id=<?php echo $dato["ididentificacion"]?>" class="btn btn-info">Editar</a></td>
                      <td><a href="servidor/eliminar.php?id=<?php echo $dato["ididentificacion"]?>" class="btn btn-danger">Eliminar</a></td>
                      </tr>




                  <?php endforeach ?>
               
               


               </tbody>
            </table>
          
          </div>
    </div>
    
    
    </div>
</body>
</html>