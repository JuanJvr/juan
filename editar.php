<?php
//0. incluir la clase conBD
include ("servidor/conBD.php");

//1. instanciar, crear objeto de tipo conBD
$operacionBD= new conBD();

//2. capturar el identificacion para actualizar
$id=$_GET['id'];

//3. crear la consulta sql para cargar datos seleccionados
$consultaBD="SELECT * FROM estudiantes WHERE ididentificacion='$id'";

//4. llamar al metodo consultar, para recibir los datos, pero dentro de un array
$estudiantes=$operacionBD->consultar($consultaBD);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <h3 class="text-center">EDITAR DATOS</h3>

         
        


   
                    <?php
                        foreach($estudiantes as $dato):?>
                            <tr>
                            <form action="servidor/update.php" method="POST">
                                <input type="text" class="form-control mb-3" name="ididentificacion" placeholder="identificacion" value="<?=$dato["ididentificacion"]?>">
                                <input type="text" class="form-control mb-3" name="apellidos" placeholder="apellidos" value="<?=$dato["apellidos"]?>">
                                <input type="text" class="form-control mb-3" name="nombres" placeholder="nombres" value="<?=$dato["nombres"]?>">
                                <input type="text" class="form-control mb-3" name="celular" placeholder="celular" value="<?=$dato["celular"]?>">
                                <input type="text" class="form-control mb-3" name="programa" placeholder="programa" value="<?=$dato["programa"]?>">

                                <input type="submit" class="btn btn-primary" value="agregar" name="agregar">


                            </form> 
                    <?php endforeach?>
        </div>        
            
            
            
 

    </div>

</div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>






</body>
</html>