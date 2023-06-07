<?php
session_start();
session_destroy(); // Cerrar la sesión

header("Location: ../index.php"); // Redirigir al usuario al formulario de inicio de sesión
exit();
?>