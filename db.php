<?php
//con esta funcion puedo guardar datos en esta sesion , almacenar
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_my_admin_crud'  
);

// if(isset($conn)) {
//     echo 'DB IS CONNECTED';
// }

?>