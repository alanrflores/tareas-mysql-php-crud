<?php 
// traigo la funcion conn de la base de datos para insertar los datos en la base de datos
include("db.php");

if(isset($_POST['save_task'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
   
    $query = "INSERT INTO tareas(titulo,  descripcion) VALUES ('$titulo', '$descripcion')";
    $result = mysqli_query($conn,  $query);

    if(!$result){
        die("Oh, ocurrio un error en la consulta!");
    }

    $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';


    header("Location: index.php");
}

?>