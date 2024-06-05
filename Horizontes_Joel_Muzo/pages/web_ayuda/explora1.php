<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_explora1.css">
    <title>Cosas que hacer en New York</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">¡Explora New York!</h1>
            <!--Parrafo descriptivo-->
            <p>Descubre la ciudad que nunca duerme</p>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="fw-bold">Descripcion de New York</h4>
                <p class="text-justify">Nueva York, conocida como la "Gran Manzana", es una de las ciudades más icónicas y cosmopolitas del mundo. 
                    Situada en la costa este de Estados Unidos, Nueva York es un centro global de finanzas, cultura, moda, arte 
                    y entretenimiento. La ciudad está formada por cinco distritos: Manhattan, Brooklyn, Queens, Bronx y Staten Island, 
                    cada uno con su propio carácter y atracciones únicas. Desde los imponentes rascacielos de Manhattan hasta los eclécticos 
                    barrios de Brooklyn, Nueva York ofrece una experiencia emocionante y diversa para sus visitantes.
                </p>
            </div>
        </div>

        <!-- 
            Debajo se va mostrar una breve ayuda al cliente para que sepa lo que puede hacer o descubir más sobre ese viaje 
            en esta parte se va mostrar una descripcion de la ciudad y una lista de las cosas que puede el usuario visitar
            New York.
        -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="fw-bold">Cosas que hacer en New York</h4>
                <div class="list-group">
                    <div class="list-group-item list-group-item-white text-dark">
                        <h5 class="mb-1">Times Square</h5>
                        <p class="mb-1">Sumérgete en el bullicio de este famoso cruce de calles, conocido por sus brillantes luces, carteles publicitarios y animación constante.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Central Park</h5>
                        <p class="mb-1">Escapa del ajetreo y el bullicio de la ciudad en este extenso parque urbano, donde puedes pasear, hacer picnic, montar en bicicleta o remar en bote.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Estatua de la Libertad y la Isla de Ellis</h5>
                        <p class="mb-1">Visita estos emblemáticos símbolos de libertad e inmigración, que ofrecen una mirada a la historia de Estados Unidos y vistas impresionantes del horizonte de Nueva York.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3">
                        <h5 class="mb-1">Broadway</h5>
                        <p class="mb-1"> Sumérgete en el mundo del teatro asistiendo a una obra de Broadway en uno de los muchos teatros del distrito de los teatros de Manhattan.</p>
                    </div>
                    <div class="list-group-item list-group-item-white text-dark mt-3 mb-3">
                        <h5 class="mb-1">Puente de Brooklyn</h5>
                        <p class="mb-1">Cruza este icónico puente peatonal y disfruta de vistas espectaculares del horizonte de Manhattan y la Estatua de la Libertad mientras caminas sobre el East River.</p>
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