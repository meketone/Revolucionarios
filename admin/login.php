<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_POST) {
    include("bd.php");

    $usuario = (isset($_POST["usuario"])) ? $_POST["usuario"] : "";
    $password = (isset($_POST["password"])) ? $_POST["password"] : "";

    //VARIABLES PARA CAPTCHA
    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6Lfyrd4pAAAAALHLcj5u2bNfN4b6jllPvCvpLkhn";

    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

    //Conversion del JSON
    $atributos = json_decode($respuesta, TRUE);
    if (!$atributos['success']){
        $mensaje = "Error en el Captcha, intentelo de nuevo";
    } else {
        // No se cifra la contraseña ingresada por el usuario
        $sentencia = $conexion->prepare("SELECT *, count(*) n_usuario FROM `tbl_usuario` WHERE usuario=:usuario AND password=:password");
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":password", $password);
        $sentencia->execute();
        $lista_usuario = $sentencia->fetch(PDO::FETCH_LAZY);
        $n_usuario = $lista_usuario["n_usuario"];
        if ($n_usuario == 1) {
            $_SESSION["usuario"] = $lista_usuario["usuario"];
            $_SESSION["logueado"] = true;
            header("Location:index.php");
            exit; // Agrega esto para detener la ejecución del script después de la redirección
        } else {
            $mensaje = "Usuario o contraseña incorrectos...";
        }
    }
}
?>

<?php

include("bd.php");

$sentencia = $conexion->prepare("SELECT * FROM `tbl_usuario`");
$sentencia->execute();
$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/login.css">
    <!-- CAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <main>

        <div class="container">

            <div class="row">

                <div class="col"></div>

                <div class="col">
                    <br><br>
                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong> <?php echo $mensaje; ?>
                        </div>

                    <?php } ?>
                    <div class="card-text-center">
                        <div class="card-header">
                            <img src="../imagenes/Logo_color.png" alt="Logo Los Revolucionarios"> <!-- Ajusta la ruta al logo -->
                            <span>Inicio de Sesión</span>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="" />
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Password:</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="" />
                                </div>
                                <!--CAPCHA-->
                                <div class="mb-3">
                                    <div class="g-recaptcha" data-sitekey="6Lfyrd4pAAAAAHWZkEqbCVwPmZVzuKdTbpOAZ7tM"></div>
                                </div>

                                <button type="submit" class="button">Entrar</button>

                            </form>
                        </div>
                    </div>


                </div>

                <div class="col"></div>

            </div>

        </div>
                        
        <div class="container2">

            <div class="row">

                <div class="col"></div>

                <div class="col">
                    <br><br>
                    <div class="card text-center">
                        <div class="card-header"> Lista de usuarios </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Password</th>
                                        <th>Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario) { ?>
                                        <tr>
                                            <td><?php echo $usuario['ID']; ?></td>
                                            <td><?php echo $usuario['usuario']; ?></td>
                                            <td><?php echo $usuario['password']; ?></td>
                                            <td><?php echo $usuario['correo']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col"></div>

            </div>

        </div>


    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>