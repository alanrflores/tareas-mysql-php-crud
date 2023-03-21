<?php  

    include("db.php") ;
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tareas WHERE id = $id";
        $result_id = mysqli_query($conn, $query);

        if(!$result_id){
            die("Oh, ocurrio un error en la consulta!");
        }

        $_SESSION['message']  = 'Tarea eliminada satifactoriamente';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }
    
    
    
?>