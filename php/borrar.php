<?php

include("../db.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM contactos WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "i", $id);
    if (mysqli_stmt_execute($statement)) {
        $_SESSION['mensaje'] = 'Se borró exitosamente';
        $_SESSION['tipo_mensaje'] = 'danger';
        header('Location: inicio.php');
    } else {
        die("Petición fallida.");
    }
}
?>