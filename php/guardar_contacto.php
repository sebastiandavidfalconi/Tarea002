<?php

include('../db.php');
session_start();

// Obtener los valores enviados desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Validar los datos ingresados
if (empty($nombre) || strlen($nombre) > 50) {
    $_SESSION['mensaje'] = 'El nombre es requerido y debe tener hasta 50 caracteres.';
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
} elseif (empty($apellido) || strlen($apellido) > 50) {
    $_SESSION['mensaje'] = 'El apellido es requerido y debe tener hasta 50 caracteres.';
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
} elseif (empty($direccion) || strlen($direccion) > 100) {
    $_SESSION['mensaje'] = 'La dirección es requerida y debe tener hasta 100 caracteres.';
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
} elseif (empty($correo) || strlen($correo) > 100 || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mensaje'] = 'El correo electrónico es requerido y debe tener hasta 100 caracteres.';
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
} elseif (empty($telefono) || strlen($telefono) !== 10 || $telefono[0] !== '0') {
    $_SESSION['mensaje'] = 'El número de teléfono debe tener exactamente 10 caracteres y empezar con 0.';
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
}

// Si no hay errores, realizar la inserción en la base de datos
$query = "INSERT INTO contactos(nombre, apellido, direccion, correo, telefono) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $nombre, $apellido, $direccion, $correo, $telefono);

if ($stmt->execute()) {
    $_SESSION['mensaje'] = 'Contacto guardado de forma exitosa.';
    $_SESSION['tipo_mensaje'] = 'success';
    header('Location: inicio.php');
    exit;
} else {
    $_SESSION['mensaje'] = 'Error al guardar el contacto: ' . $stmt->error;
    $_SESSION['tipo_mensaje'] = 'error';
    header('Location: formulario.php');
    exit;
}

$stmt->close();
$conn->close();
?>