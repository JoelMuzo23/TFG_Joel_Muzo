<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_comentario.css">
    <title>Comentario del viaje</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se moverá cuando baje -->
    <div class="parallax">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="display-4 fw-bold">¡Opiniones de Viajeros!</h1>
            <p>En esta página puedes poner un comentario de tu viaje.</p>
        </div>
    </div>

    <?php
    session_start();
    ?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2><u>Añade un comentario</u></h2>

                <?php
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        function limpiar($valor) {
                            $valor = htmlspecialchars($valor);
                            $valor = trim($valor);
                            return $valor;
                        }

                        $id_usuario = $_SESSION["id"];

                        if (!empty($_POST["viaje"])) {
                            $viaje = limpiar($_POST["viaje"]);
                        } else {
                            $error[] = "Debes de introducir el nombre del viaje";
                        }

                        if (!empty($_POST["descripcion"])) {
                            $descripcion = limpiar($_POST["descripcion"]);
                        } else {
                            $error[] = "Debes de introducir una descripcion";
                        }

                        $fecha = date('Y-m-d H:i:s');

                        if (empty($error)) {
                            require_once("../../Proyecto.php");
                            $comen = new Proyecto();
                            $comen->añadirComentario($id_usuario, $viaje, $descripcion, $fecha);
                        }
                    }
                ?>

                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="form-group mt-4">
                        <label for="viaje">Introduce el nombre del viaje:</label>
                        <input type="text" class="form-control" id="viaje" name="viaje" placeholder="Ej: París">
                    </div>

                    <div class="form-group mt-3">
                        <label for="descripcion">Introduce una breve descripcion de viaje:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ej: ¡Excelente viaje, definitivamente lo recomendaría!"></textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-outline-dark">Comentar</button>
                        <a class="btn btn-outline-danger" href="../Inicio.php">Volver</a>
                    </div>
                </form>

                <?php
                if (!empty($error)) {
                    foreach ($error as $datos) {
                        echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos . '</div>';
                    }
                } elseif (!empty($mensaje)) {
                    echo $mensaje;
                }

                } else {
                    echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'>
                        Acceso no autorizado. <br>
                        <a href='../Login.php'> Por favor, inicia sesión.</a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    require_once("../../includes/footer.php");
    ?>
</body>
</html>
