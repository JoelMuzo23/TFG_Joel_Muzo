<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_explora.css">
    <title>Cosas que hacer en Tokio</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">¡Explora Tokio!</h1>
            <!--Parrafo descriptivo-->
            <p>Descubre la vibrante capital de Japón</p>
        </div>
    </div>

    <!-- 
        Debajo se va mostrar una breve ayuda al cliente para que sepa lo que puede hacer o descubir más sobre ese viaje 
        en esta parte se va mostrar una descripcion de la ciudad y una lista de las cosas que puede el usuario visitar
        Tokio.
    -->
    <div class="container mt-1">
        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="fw-bold">Descripcion de Tokio</h4>
                <p class="text-justify">Tokyo es la capital de Japón y una de las ciudades más grandes y pobladas del mundo. 
                    Con una mezcla única de rascacielos futuristas, templos antiguos, bulliciosos mercados 
                    y tranquilos jardines, Tokyo ofrece una experiencia diversa para sus visitantes. 
                    La ciudad es conocida por su eficiencia, limpieza y seguridad, así como por su cultura pop, 
                    tecnología de vanguardia y deliciosa gastronomía.
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="fw-bold">Cosas que hacer en Tokio</h4>
                <div class="list-group">
                    <div class="list-group-item list-group-item-white text-dark">
                        <h5 class="mb-1">Tokyo Skytree</h5>
                        <p class="mb-1">Disfruta de impresionantes vistas panorámicas de la ciudad desde la torre de comunicaciones más alta del mundo.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Templo Sensoji</h5>
                        <p class="mb-1">Sumérgete en la espiritualidad japonesa explorando este antiguo templo budista en el histórico barrio de Asakusa.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Barrio de Shinjuku</h5>
                        <p class="mb-1">Explora el bullicioso distrito de Shinjuku, conocido por sus rascacielos, tiendas, restaurantes y vida nocturna vibrante.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Parque Ueno</h5>
                        <p class="mb-1">Relájate en este extenso parque urbano que alberga varios museos, un zoológico, templos y hermosos jardines.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3 mb-3">
                        <h5 class="mb-1">Barrio de Akihabara</h5>
                        <p class="mb-1">Sumérgete en la cultura otaku y la tecnología explorando las tiendas de electrónica, manga, anime y videojuegos en este famoso distrito de Tokyo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>