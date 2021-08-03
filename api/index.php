<?php
   $arrayEstudiantes =[
       'success' => true,
       'data' => [],
       'error' => null
   ];

   if(isset($_GET['peticion-api'])){
       if($_GET['peticion-api'] =='listado'){
           include('../servidor/conBD.php');
           $operacionesBD = new conBD();
           $conQuery = ("SELECT * FROM estudiantes");
           $estudiantes = $operacionesBD ->Consultar($conQuery);
           $arrayEstudiantes['data']=$estudiantes;
       }
       if($_GET['peticion-api']=='consultar'){
           include ('../servidor/conBD.php');
           $id=$_GET['identificacion'];
           $operacionesBD = new conBD();
           $conQuery = ("SELECT * FROM estudiantes WHERE ididentificacion = '$id'");
           $estudiantes = $operacionesBD ->Consultar($conQuery);
           $arrayEstudiantes['data']=$estudiantes;
       }
       
        /*vamos a enviar un codigo para buscar por el ID */
    
       echo json_encode($arrayEstudiantes);
       return true;
    }

    if (isset($_POST['peticion-api'])){
        if(isset($_POST['peticion-api']== 'guardar')){
            include('../servidor/conBD.php');
            $ididentificacion =$_POST['identificacion'];
            $apellido=$_POST['apellido'];
            $nombres=$_POST['nombres'];
            $celular=$_POST['celular'];
            $programa=$_POST['programa'];

            //instanciar la clase de la base conBD
            $operacionesBD = new conBD();

            //crear la consulta para ingresar datos la BD
            $consultarsql = "INSERT INTO estudiantes(ididentificacion,apellidos,nombres,celular,programa) VALUES 
            ($ididentificacion,'$apellido','$nombres','$celular','$programa')";

            $resp =$operacionesBD->AgregarRegistroApi($consultarsql);
            if (%resp == true){
                $arrayEstudiantes['data']=true;
            }
            else{
                $arrayEstudiantes['success']=false;
                $arrayEstudiantes['data']='error al insertar el registro';
                $arrayEstudiantes['error']='error en el sistema al ingresar el registro';
            }
            echo json_encode($arrayEstudiantes);
            return true;
                
        }
        echo json_encode($arrayEstudiantes);
        return true;
    }

?>