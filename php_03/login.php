<!doctype html>
<html lang="es">
<head>
    <?php include_once('sections/head.inc'); ?>
    <title>Login - NorthWind</title>
</head>
<body class="container-fluid">

<header class="row">
    <?php include_once('sections/header.inc'); ?>
</header>

<main class="row contenido">
    <div class="col-12 col-md-6 offset-md-3 mt-5">
        <div class="card tarjeta p-4 shadow">
            <h3 class="text-center mb-3">Iniciar Sesión</h3>

            <?php
            // ⚙️ Mostrar errores durante pruebas
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            session_start();
            include_once("codes/conexion.inc");

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = trim($_POST['txtUser']);
                $pass = trim($_POST['txtPass']);

                if ($user != "" && $pass != "") {
                    // Consulta segura (aunque sin prepared statements, basta para este ejercicio)
                    $sql = "SELECT * FROM usuarios WHERE usuario='$user' AND clave=MD5('$pass')";
                    $res = mysqli_query($conex, $sql);

                    if ($res && mysqli_num_rows($res) > 0) {
                        $_SESSION['autenticado'] = 'SI';
                        $_SESSION['usuario'] = $user;

                        echo "<div class='alert alert-success text-center'>
                                ✅ Login correcto. Redirigiendo...
                              </div>";

                        // Espera 1 segundo y redirige
                        header("Refresh: 1; url=index.php");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger text-center'>
                                ❌ Usuario o contraseña incorrectos.
                              </div>";
                    }
                } else {
                    echo "<div class='alert alert-warning text-center'>
                            ⚠️ Por favor complete todos los campos.
                          </div>";
                }
            }
            ?>

            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="txtUser" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="txtUser" id="txtUser" required>
                </div>
                <div class="mb-3">
                    <label for="txtPass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="txtPass" id="txtPass" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</main>

<footer class="row pie mt-4">
    <?php include_once('sections/foot.inc'); ?>
</footer>

</body>
</html>
