<?php

session_start();
if ($_POST) {
    $mensaje = null;

    if ($_POST['user'] == 'javier' && $_POST['psw'] == 'admin') {
        $_SESSION['user'] = $_POST['user'];
        header('Location: sections/index.php');
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cerificados Cursos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="libraries/bootstrap-5.3.0/css/bootstrap.css" /> -->

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <br>
                    <br>
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-header">
                                Inicio de sesión
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="usuario">
                                    <small id="helpId" class="form-text text-muted">Escriba su usuario</small>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="psw" id="psw" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Escriba la contraseña</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                <br /><br />
                                <?php if(isset($mensaje)){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong> <?php echo $mensaje ?> </strong>
                                    </div>
                                <?php
                                } ?>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>