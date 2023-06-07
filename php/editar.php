<?php

include("../db.php");
$nombre = '';
$apellido = '';
$direccion = '';
$correo = '';
$telefono = '';

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM contactos WHERE id=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $direccion = $row['direccion'];
        $correo = $row['correo'];
        $telefono = $row['telefono'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Validar los datos ingresados
    if (empty($nombre) || strlen($nombre) > 50) {
        $_SESSION['mensaje'] = 'El nombre es requerido y debe tener hasta 50 caracteres.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: editar.php?id=' . $id);
        exit;
    } elseif (empty($apellido) || strlen($apellido) > 50) {
        $_SESSION['mensaje'] = 'El apellido es requerido y debe tener hasta 50 caracteres.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: editar.php?id=' . $id);
        exit;
    } elseif (empty($direccion) || strlen($direccion) > 100) {
        $_SESSION['mensaje'] = 'La dirección es requerida y debe tener hasta 100 caracteres.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: editar.php?id=' . $id);
        exit;
    } elseif (empty($correo) || strlen($correo) > 100 || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = 'El correo electrónico es requerido y debe tener hasta 100 caracteres.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: editar.php?id=' . $id);
        exit;
    } elseif (empty($telefono) || strlen($telefono) !== 10 || $telefono[0] !== '0') {
        $_SESSION['mensaje'] = 'El número de teléfono debe tener exactamente 10 caracteres y empezar con 0.';
        $_SESSION['tipo_mensaje'] = 'error';
        header('Location: editar.php?id=' . $id);
        exit;
    }

    $query = "UPDATE contactos SET nombre=?, apellido=?, direccion=?, correo=?, telefono=? WHERE id=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "sssssi", $nombre, $apellido, $direccion, $correo, $telefono, $id);
    mysqli_stmt_execute($statement);

    $_SESSION['mensaje'] = 'Contacto actualizado de forma exitosa';
    $_SESSION['tipo_mensaje'] = 'warning';
    header('Location: inicio.php');
}

?>
<link rel="stylesheet" href="../css/index.css">
<?php include('../includes/header.php'); ?>
<div class="cuerpo">
<main class="container">
    <div class="row">
        <div class="card card-body" style="--bs-card-bg: #202122;--bs-card-color-state: var(--white): display:flex; justify-content:center; align-items:center">
            <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" class="formulario col-md-8    ">
            <h1>Editar</h1>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre"
                        maxlength="50" required>
                    <small class="form-text text-muted">Ingrese un nombre de hasta 50 caracteres.</small>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" id="apellido"
                        placeholder="Ingrese su apellido" maxlength="50" required>
                    <small class="form-text text-muted">Ingrese un apellido de hasta 50 caracteres.</small>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        placeholder="Ingrese su dirección" maxlength="100" required>
                    <small class="form-text text-muted">Ingrese una dirección de hasta 100 caracteres.</small>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="correo" id="correo"
                        placeholder="Ingrese su correo electrónico" maxlength="100"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                    <small class="form-text text-muted">Ingrese un correo electrónico válido de hasta 100
                        caracteres.</small>
                </div>
                <div class="form-group">
                    <label for="telefono">Número de Teléfono:</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono"
                        placeholder="Ingrese su número de teléfono" pattern="0[0-9]{9}" required>
                    <small class="form-text text-muted">Ingrese un número de teléfono válido de 10 dígitos que comience
                        con
                        0.</small>
                </div>
                <button class="btn-success" name="update">Guardar</button>
            </form>
        </div>

        <?php include('../includes/footer.php'); ?>