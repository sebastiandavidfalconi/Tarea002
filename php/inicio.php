<?php include("../db.php"); ?>

<?php include('../includes/header.php'); ?>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    exit();
}
$username = $_SESSION['username'];


?>
<script>
    document.querySelector('.formulario').addEventListener('submit', function (event) {
        event.preventDefault();

        // Obtener los valores de los campos del formulario
        var nombre = document.getElementById('nombre').value;
        var apellido = document.getElementById('apellido').value;
        var direccion = document.getElementById('direccion').value;
        var correo = document.getElementById('correo').value;
        var telefono = document.getElementById('telefono').value;

        // Validar el nombre
        var nombreError = document.getElementById('nombre-error');
        if (nombre.length === 0) {
            nombreError.textContent = 'El nombre es requerido.';
            nombreError.style.display = 'block';
            return false;
        } else if (nombre.length > 50) {
            nombreError.textContent = 'El nombre debe tener hasta 50 caracteres.';
            nombreError.style.display = 'block';
            return false;
        } else {
            nombreError.style.display = 'none';
        }

        // Validar el apellido
        var apellidoError = document.getElementById('apellido-error');
        if (apellido.length === 0) {
            apellidoError.textContent = 'El apellido es requerido.';
            apellidoError.style.display = 'block';
            return false;
        } else if (apellido.length > 50) {
            apellidoError.textContent = 'El apellido debe tener hasta 50 caracteres.';
            apellidoError.style.display = 'block';
            return false;
        } else {
            apellidoError.style.display = 'none';
        }

        // Validar la dirección
        var direccionError = document.getElementById('direccion-error');
        if (direccion.length === 0) {
            direccionError.textContent = 'La dirección es requerida.';
            direccionError.style.display = 'block';
            return false;
        } else if (direccion.length > 100) {
            direccionError.textContent = 'La dirección debe tener hasta 100 caracteres.';
            direccionError.style.display = 'block';
            return false;
        } else {
            direccionError.style.display = 'none';
        }

        // Validar el correo electrónico
        var correoError = document.getElementById('correo-error');
        if (correo.length === 0) {
            correoError.textContent = 'El correo electrónico es requerido.';
            correoError.style.display = 'block';
            return false;
        } else if (correo.length > 100) {
            correoError.textContent = 'El correo electrónico debe tener hasta 100 caracteres.';
            correoError.style.display = 'block';
            return false;
        } else {
            correoError.style.display = 'none';
        }

        // Validar el número de teléfono
        var telefonoError = document.getElementById('telefono-error');
        if (telefono.length !== 10 || telefono.charAt(0) !== '0') {
            telefonoError.textContent = 'El número de teléfono debe tener exactamente 10 caracteres y empezar con 0.';
            telefonoError.style.display = 'block';
            return false;
        } else {
            telefonoError.style.display = 'none';
        }

        // Si todas las validaciones son exitosas, enviar el formulario
        event.target.submit();
    });
</script>
<style>
   
</style>
<link rel="stylesheet" href="../css/index.css">

<div class="bg-inner">
    <main class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <?php if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                        </button>
                    </div>
                    <!-- php session_unset(); -->
                <?php } ?>
                <div class="card card-body" style="background-color: #202122;">
                    <h2>Guardar Contacto</h2>
                    <form class="formulario" action="guardar_contacto.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ingrese su nombre" maxlength="50" required>
                            <span id="nombre-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" id="apellido"
                                placeholder="Ingrese su apellido" maxlength="50" required>
                            <span id="apellido-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                placeholder="Ingrese su dirección" maxlength="100" required>
                            <span id="direccion-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" class="form-control" name="correo" id="correo"
                                placeholder="Ingrese su correo electrónico" maxlength="100"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                            <span id="correo-error" class="error-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Número de Teléfono:</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono"
                                placeholder="Ingrese su número de teléfono" pattern="0[0-9]{9}" required>
                            <small>Ejemplo: 0123456789</small>
                            <span id="telefono-error" class="error-message"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    <div style="margin-top: 20px">
                        <a href="logout.php" style="text-decoration:none;"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="red" class="bi bi-door-closed" viewBox="0 0 16 16">
                                <path d="M7.5 1v7h1V1h-1z" style="padding-right:200px" />
                                <path
                                    d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                            </svg>Salir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="table-responsive-xs">
                    <table class="table formulario table-bordered table-dark table-hover"
                        style="color: red !important; --bs-table-bg: #202122;--bs-table-color-state: var(--white)">
                        <thead>
                            <th colspan=6>
                                <h2>Contactos</h2>
                            </th>
                            <tr>

                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM contactos";
                            $result_tasks = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['apellido']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['direccion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['correo']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['telefono']; ?>
                                    </td>

                                    <td>
                                        <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="borrar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>



            </div>
    </main>
</div>
</div>
<?php include('../includes/footer.php'); ?>