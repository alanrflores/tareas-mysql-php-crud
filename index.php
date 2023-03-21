<!-- <?php

#variables
#concatenación
$nombre = "Alan";
 $texto  = "Vamos a hacer el repaso de php con mysql,  con el señor: $nombre" ;
 $altura = 185;
$textofinal = "<h1>".$texto.",  y su altura es: ".$altura."</h1>";

#une las variables que tiene mas otro contenido
$textofinal .= "php 2023";
#get
echo $textofinal;

echo "<hr>";
echo $_GET["nombre"];

#arrays
$personas = ["Victor", "Alan", "Maxi"];
echo $personas[1];
?>

<h1>Listado</h1>
<ul>
 <?php 
 
    foreach ($personas as $nombre) {
        echo "<li>$nombre</li>";
    }
 ?>
</ul> -->

<?php include("db.php") ?>

<?php include("includes/header.php") ?>
  <div class="container p-4">
      <div class="row">
          <div class="col-md-4">
              <?php  if(isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"> 
                              <?= $_SESSION['message'] ?>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
             <?php  session_unset();  }  ?>
              <div class="card card-body">
                  <form action="save_task.php" method="POST">
                   <div class="form-group mt-2">
                       <input type="texto" name="titulo" class="form-control" placeholder="Titulo de tarea" autofocus>
                   </div>
                   <div class="form-group mt-2">
                       <textarea  name="descripcion" rows="2" class="form-control" placeholder="Descripcion de tarea" autofocus></textarea>
                   </div>
                   <input type="submit" class="btn btn-success btn-block m-2" name="save_task" value="Guardar tarea"> 
                  </form>
              </div>
          </div>
          <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Crear en</th>
                        <th>Comportamiento</th>
                   </tr>
                </thead>
                <tbody>
                    <?php 
                     $query =  "SELECT * FROM tareas";
                     $result_tasks = mysqli_query($conn,  $query);

                     while($row = mysqli_fetch_array($result_tasks)) { ?>
                         <tr>
                             <td> <?php   echo $row['titulo']   ?></td>
                             <td> <?php   echo $row['descripcion']   ?></td>
                             <td> <?php   echo $row['created_at']   ?></td>
                             <td>
                                 <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                 <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                             </td>
                         </tr>
                   
                   <?php   }  ?>
                </tbody>
            </table>
          </div>
      </div>
  </div>

<?php include("includes/footer.php") ?>