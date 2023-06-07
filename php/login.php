<?php
session_start();
include("../db.php");


$username = $_POST['username'];
$password = $_POST['password'];
// Obtener los datos del formulario

// Consultar la base de datos para verificar la autenticación
$query = "SELECT * FROM users WHERE username=? AND password=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Autenticación exitosa, iniciar sesión
    $_SESSION['username'] = $username;
    header("Location: inicio.php"); // Redirigir a la página de inicio
} else {
    // Autenticación fallida, mostrar mensaje de error
    echo "Usuario o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
?>