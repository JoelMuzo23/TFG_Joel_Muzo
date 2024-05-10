<?php
    require_once("config.php");
    class Proyecto{
        protected $conex;
            public function __construct(){
                try{
                    $this->conex = new PDO(DSN, BBDD_USER, BBDD_PASSWORD);
                }catch(PDOException $e){
                    echo "Error" . $e->getMessage();
                }
            }
        
            public function __destruct(){
                $this->conex = null;
            }

    // Funciones para mostrar los diferentes viajes y hoteles de la agencia

        // Funcion para mostrar los viajes de la categoria de ofertas
            public function listarOfertas(){    
                $sql="SELECT id_oferta, nombre, pais, descripcion, actividad, precio, imagen FROM oferta";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado -> rowCount() > 0){
                    while ($fila = $resultado->fetch()){ 
                       echo "<div class='col-md-4 col-12 mb-4'>
                                <div class='card h-100'>
                                    <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                        <h6 class='card-subtitle text-muted mb-2'>". $fila['pais'] ."</h6>
                                        <p class='card-text'>". $fila['descripcion'] ."</p>
                                        <p class='card-text'><strong> Actividades: </strong>". $fila['actividad'] ."</p>
                                        <h6 class='card-subtitle text-muted mb-3'>". $fila['precio'] ." € por persona </h6>
                                        <a href='ReservaOferta.php?id=" . $fila['id_oferta'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

        // Funcion para mostrar los viajes de la categoria de ciudades
            public function listarCiudades(){
                $sql="SELECT id_ciudad, nombre, pais, descripcion, transporte, precio, imagen FROM ciudad";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado -> rowCount() > 0){
                    while ($fila = $resultado->fetch()){ 
                        echo "
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-4'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['pais'] ."</h6>
                                            <p class='card-text'>". $fila['descripcion'] ."</p>
                                            <p class='card-text'><strong> Transportes: </strong>". $fila['transporte'] ."</p>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona (Incluye vuelo y alojamiento)</h6>
                                            <a href='ReservaCiudades.php?id_ciudad=" . $fila['id_ciudad'] . "'class='btn btn-outline-dark'>Ver disponibilidad</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                    }
                }
            }

        // Funcion para mostrar los viajes de la categoria de playas
            public function listarPlayas(){
                $sql="SELECT id_playa, nombre, pais, descripcion, actividad, precio, imagen FROM playa";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado -> rowCount() > 0){
                    while ($fila = $resultado->fetch()){ 
                        echo"
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-4'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['pais'] ."</h6>
                                            <p class='card-text'>". $fila['descripcion'] ."</p>
                                            <p class='card-text'><strong> Actividades: </strong>". $fila['actividad'] ."</p>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                            <a href='ReservaPlaya.php?id=" . $fila['id_playa'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

        // Funciones para mostrar los viajes de la categoria de planetas
            public function listarPlanetas(){
                $sql="SELECT id_espacio, destino, descripcion, transporte, alojamiento, precio, imagen FROM espacio";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0) {
                    while ($fila = $resultado->fetch()){ 
                        echo "
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-5'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['destino'] ."</h5>
                                            <p class='card-text'>". $fila['descripcion'] ."</p>";
                                            if($fila["destino"] == "Luna"){
                                            echo "
                                                <p class='card-text'><strong> Alojamiento: </strong>". $fila['alojamiento'] ."</p>
                                                <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                                <a href='ReservaPlaneta.php?id=" . $fila['id_espacio'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>";
                                            }
                                    echo"</div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

            public function listarPlanetas2(){
                $sql="SELECT destino, descripcion, transporte, alojamiento, precio, imagen FROM espacio";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0) {
                    while ($fila = $resultado->fetch()){ 
                        if($fila["destino"] == "Luna"){
                            echo "
                                <div class='card mb-4'>
                                    <div class='row no-gutters'>
                                        <div class='col-md-5'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                        </div>
                                        <div class='col-md-7'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>". $fila['destino'] ."</h5>
                                                <p class='card-text'>". $fila['descripcion'] ."</p>
                                                <p class='card-text'><strong> Transportes: </strong>". $fila['transporte'] ."</p>
                                                <p class='card-text'><strong> Alojamiento: </strong>". $fila['alojamiento'] ."</p>
                                                <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                                <a href='#' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                }
            }

        // Funcion para mostrar los viajes de la categoria de cruceros
            public function listarCruceros(){
                $sql="SELECT id_crucero, nombre, salida, descripcion, actividad, precio, imagen FROM crucero";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0) {
                    while ($fila = $resultado->fetch()){ 
                        echo "
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-5'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                            <p class='card-text'><strong> Salida de: </strong>". $fila['salida'] ."</p>
                                            <p class='card-text'><strong> Descripcion: </strong>". $fila['descripcion'] ."</p>
                                            <p class='card-text'><strong> Actividades: </strong>". $fila['actividad'] ."</p>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                            <a href='ReservaCrucero.php?id=" . $fila['id_crucero'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

        // Funcion para mostrar los viajes de la categoria de culturales
            public function listarCulturales(){
                $sql="SELECT id_cultura, nombre, ubicacion, descripcion, precio, imagen FROM cultural";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0) {
                    while ($fila = $resultado->fetch()){ 
                        echo "
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-5'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['ubicacion'] ."</h6>
                                            <p class='card-text'><strong> Descripcion: </strong>". $fila['descripcion'] ."</p>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                            <a href='ReservaCultural.php?id=" . $fila['id_cultura'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

        // Funcion para mostrar los viajes de la categoria de Aventuras
            public function listarAventuras(){
                $sql="SELECT id_aventura ,nombre, ubicacion, actividades, nivel, precio, imagen FROM aventura";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0) {
                    while ($fila = $resultado->fetch()){ 
                        echo "
                            <div class='card mb-4'>
                                <div class='row no-gutters'>
                                    <div class='col-md-5'>
                                        <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $fila['nombre'] ."</h5>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['ubicacion'] ."</h6>
                                            <p class='card-text'><strong> Actividades: </strong>". $fila['actividades'] ."</p>
                                            <p class='card-text'><strong> Nivel: </strong>". $fila['nivel'] ."</p>
                                            <h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ." € por persona </h6>
                                            <a href='ReservaAventuras.php?id=" . $fila['id_aventura'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }

        // Funcion para mostrar los hoteles
            public function listarHoteles(){
                try{
                    $sql = "SELECT id_hotel, nombre, ciudad, estrellas, servicios, precio, imagen
                            FROM hotel";
                     $resultado = $this->conex->prepare($sql);
                     $resultado->execute();
                     $resultado->setFetchMode(PDO::FETCH_ASSOC);
             
                    if ($resultado->rowCount() > 0) {
                         while ($fila = $resultado->fetch()){
                            echo"<div class='col-md-4 col-12 mb-4'>";
                                echo "<div class='card h-100'>";
                                echo "<img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen']) ."' style='width: 100%; height: 200px; object-fit: cover;'>";
                                    echo "<div class='card-body'>";
                                        echo "<h5 class='card-title'>" . $fila['nombre'] . "</h5>";
                                        echo "<h6 class='card-subtitle text-muted mb-2'> ".  $fila['ciudad']  ."</h6>";
                                        if($fila['estrellas'] == 5){
                                            echo "<p> <strong>Estrellas: </strong>";
                                                for ($i = 0; $i < 5; $i++) {
                                                    echo "<span class='bi bi-star text-warning' style='font-size: 15px;'></span> ";
                                                }
                                            echo "</p>";
                                        }else{
                                            echo "<p> <strong>Estrellas: </strong>";
                                                for ($i = 0; $i < $fila['estrellas']; $i++) {
                                                    echo "<span class='bi bi-star text-warning' style='font-size: 15px;'></span> ";
                                                }
                                            echo "</p>";
                                        }
                                        echo "<p class='card-text'> <strong> Servicios: </strong> " . $fila['servicios'] . "</p>";
                                        echo "<h6 class='card-subtitle text-muted mb-2'>". $fila['precio'] ."€ por persona</h6>";
                                        echo "<a href='ReservaHotel.php?id=" . $fila['id_hotel'] . "' class='btn btn-outline-dark me-4'>Ver disponibilidad</a>";
                                        echo "<a href='detalle_hotel.php?id=" . $fila['id_hotel'] . "' class='btn btn-outline-warning'>Más Información</a>";
                                    echo"</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Detalles de la película no encontrada";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage(); 
                }
            }
    
    // Funcion para mostrar los detalles del hotel
    
            public function detallesHotel($id){
                $id_hotel = $_GET['id'];
                $sql = "SELECT nombre, ciudad, imagen1, imagen2, imagen3, historia, servicio, ubicacion FROM hotel WHERE id_hotel = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_hotel);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
            
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo"<div class='caja1'>";
                            echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
                                    <div class='carousel-inner'>";

                                    echo "<div class='carousel-item active'>";
                                        echo "<img src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) . "' 
                                            class='d-block'>";
                                        echo "<div class='carousel-caption'>";
                                            echo "<div class='texto'>";
                                                echo "<h1>" . $fila['nombre'] . "</h1>";
                                                echo "<h5>". $fila["ciudad"] ."</h5>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";

                                    echo "<div class='carousel-item'>";
                                        echo "<img src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) . "' 
                                                class='d-block'>";
                                        echo "<div class='carousel-caption'>";
                                            echo "<div class='texto'>";
                                                echo "<h1>" . $fila['nombre'] . "</h1>";
                                                echo "<h5>". $fila["ciudad"] ."</h5>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";

                                    echo "<div class='carousel-item'>";
                                        echo "<img src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) . "' 
                                                class='d-block'>";
                                        echo "<div class='carousel-caption'>";
                                            echo "<div class='texto'>";
                                                echo "<h1>" . $fila['nombre'] . "</h1>";
                                                echo "<h5>". $fila["ciudad"] ."</h5>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";

                              echo "</div>";
                            echo "</div>";
                        echo"</div>";
                        
                        echo "<div class='container mt-5'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h2 class='subtitulo'> Historia <hr> </h2>
                                        <p class='lead'> " . $fila["historia"] . "</p>
                                    </div>
                                </div>
                                <div class='row mt-5'>
                                    <div class='col-md-12'>
                                        <h2 class='subtitulo'> Servicios <hr> </h2>
                                        <p class='lead'> " . $fila["servicio"] . "</p>
                                    </div>
                                </div>
                                <div class='row mt-5'>
                                    <div class='col-md-12'>
                                        <h2 class='subtitulo'> Ubicacion <hr> </h2>
                                        <p class='lead'> " . $fila["ubicacion"] . "</p>
                                    </div>
                                </div>
                                <div class='row mt-2'>
                                    <div class='col-md-12 text-center'>
                                    <a href='' class='btn btn-outline-dark btn-lg me-4 stretched-link'>Ver disponibilidad</a>
                                    <a href='Hoteles.php' class='btn btn-outline-danger btn-lg me-4 stretched-link'>Volver</a>
                                    </div>
                                </div>
                              </div>
                        ";
                    }
                }else {
                    echo "No se encontraron detalles del hotel.";
                }
            }

    // Funciones para los datos del usuario
            
        // Funcion para insertar al usuario en la base de datos
            public function insertarUsuario($nombre, $apellido, $apellido2, $telefono, $correo, $contraseña){
                $sql = "INSERT INTO usuario (nombre, apellido, apellido2, telefono, correo, contraseña) values (:nom, :ape, :ape2, :telef, :correo,  :contra)";
                $datos = array("nom"=>$nombre, ":ape" => $apellido, ":ape2" => $apellido2, ":telef" => $telefono ,":correo" => $correo, ":contra" => $contraseña);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Datos Introducidos correctamente </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para realizar el login con el correo y la contraseña del usuario
            public function loginUsuario($correo, $contraseña){
                $sql = "SELECT id, nombre, apellido, apellido2, correo, contraseña FROM usuario";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                
                while($fila = $resultado->fetch()){
                    if($correo == $fila["correo"] && md5($contraseña) == $fila["contraseña"]){
                       $_SESSION["id"] = $fila["id"];
                       $_SESSION["nombre"] = $fila["nombre"];
                       $_SESSION["apellido"] = $fila["apellido"];
                       $_SESSION["apellido2"] = $fila["apellido2"];
                       $_SESSION["correo"] = $fila["correo"];
                       header("location: Inicio.php");
                    }else{
                        echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Datos Erroneos</div>';
                    }
                }
            }
            
        // Funcion para modifcar los datos del usuario
            public function modificarUsuario($id, $nombre, $apellido, $apellido2, $correo, $contraseña ){
                $sql = "UPDATE usuario SET nombre = :nom, apellido = :ape, apellido2 = :ape2, correo = :correo, contraseña = :contra WHERE id = :id ";
                $datos = array(":id" => $id, ":nom" => $nombre, ":ape" => $apellido, ":ape2" => $apellido2, ":correo" => $correo, ":contra" => $contraseña); 
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Inicio.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
                
            }   

    // Funciones para reservar viajes

            public function reservaOfertas($id_oferta){
                $id_oferta = $_GET["id"];
                $sql = "SELECT id_oferta, nombre, pais, informacion, imagen1, imagen2, imagen3 FROM oferta WHERE id_oferta = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_oferta);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                                    <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . " - ". $fila['pais'] ."</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>      
                                    
                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>

                                    
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mt-5'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de llegada </h4>
                                        <input id='fecha_llegada' name='fecha_llegada' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div><br>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <input type='hidden' name='id_oferta' value='" . $fila['id_oferta'] . "'>
                                    <input type='hidden' name='id_usuario' value='" . $_SESSION['id'] . "'>
                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>
                                </div>
                            </div>
                        </form>"; 
                    }
                }
            }
            
            public function reservaHotel($id_hotel){
                $id_hotel = $_GET["id"];
                $sql = "SELECT nombre, ciudad, servicio, imagen1, imagen2, imagen3  FROM hotel WHERE id_hotel = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_hotel);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                            <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . " - ". $fila['ciudad'] ."</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>  
                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["servicio"] ."</p>  
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mt-5'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de llegada </h4>
                                        <input id='fecha_llegada' name='fecha_llegada' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div><br>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaCiudades($id_ciudad){
                $id_ciudad = $_GET["id_ciudad"];
                $sql = "SELECT id_ciudad, nombre, pais, informacion, imagen1, imagen2, imagen3  FROM ciudad WHERE id_ciudad = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_ciudad);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        
                        echo "
                        <form>
                            <div class='reserva-card'>
                            <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . " - ". $fila['pais'] ."</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>

                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>

                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mt-5'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de llegada </h4>
                                        <input id='fecha_llegada' name='fecha_llegada' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div><br>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <input type='hidden' name='id_oferta' value='" . $fila['id_ciudad'] . "'>
                                    <input type='hidden' name='id_usuario' value='" . $_SESSION['id'] . "'>
                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>

                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaPlaya($id_playa){
                $id_playa = $_GET["id"];
                $sql = "SELECT id_playa, nombre, pais, informacion, imagen1, imagen2, imagen3 FROM playa WHERE id_playa = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_playa);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                                <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . " - ". $fila['pais'] ."</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>

                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>
                                    
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mt-5'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de llegada </h4>
                                        <input id='fecha_llegada' name='fecha_llegada' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div><br>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <input type='hidden' name='id_oferta' value='" . $fila['id_playa'] . "'>
                                    <input type='hidden' name='id_usuario' value='" . $_SESSION['id'] . "'>
                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>
                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaPlaneta($id_espacio){
                $id_espacio = $_GET["id"];
                $sql = "SELECT destino, informacion, imagen1, imagen2, imagen3   FROM espacio WHERE id_espacio = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_espacio);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                                <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['destino'] . "</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>

                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>
                                
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mt-5'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de llegada </h4>
                                        <input id='fecha_llegada' name='fecha_llegada' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div><br>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>

                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaCrucero($id_crucero){
                $id_crucero = $_GET["id"];
                $sql = "SELECT nombre, informacion, imagen1, imagen2, imagen3  FROM crucero WHERE id_crucero = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_crucero);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                            <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . "</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>

                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>
                                
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha de salida </h4>
                                        <input id='fecha_salida' name='fecha_salida' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de habitaciones </h4>
                                        <select class='form-control' id='habitacion'>
                                        </select>
                                    </div>

                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaCultural($id_cultura){
                $id_cultura = $_GET["id"];
                $sql = "SELECT nombre, informacion, imagen1, imagen2, imagen3  FROM cultural WHERE id_cultura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_cultura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form >
                            <div class='reserva-card'>
                            <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . "</h3>
                                <div class='card-body'>
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>
                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>
                                
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha </h4>
                                        <input id='fecha' name='fecha' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>

                                </div>
                            </div>
                        </form>";
                    }
                }
            }

            public function reservaAventura($id_aventura){
                $id_aventura = $_GET["id"];
                $sql = "SELECT nombre, informacion, imagen1, imagen2, imagen3 FROM aventura WHERE id_aventura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_aventura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                        <form>
                            <div class='reserva-card'>
                                <h3 class='card-title text-center mt-2 text-secondary'>" . $fila['nombre'] . "</h3>
                                <div class='card-body'>        
                                    <div class='row mt-3'>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen1']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen2']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                        <div class='col-md-4 col-4 mb-4'>
                                            <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($fila['imagen3']) ."' style='width: 100%; height: 200px; object-fit: cover;'>
                                        </div>
                                    </div>
                                    <h4 class='card-title text-center mt-2 text-secondary'> Descripción </h4>
                                    <p class='text-center mt-4'>". $fila["informacion"] ."</p>
                                
                                    <div class='form-group'>
                                        <h4 class='card-title text-center mt-5 text-secondary'> Selecciona la fecha </h4>
                                        <input id='fecha' name='fecha' class='form-control' type='date' min='" . date("Y-m-d") . "' required>
                                    </div>

                                    <div class='form-group mb-4'>
                                        <h4 class='card-title text-center mt-3 text-secondary'> Selecciona el numero de viajeros </h4>
                                        <select class='form-control' id='viajeros'>
                                        </select>
                                    </div>

                                    <div class='text-center'>
                                        <button type='submit' class='btn btn-outline-dark'>Reservar</button>
                                    </div>
                                </div>
                            </div>
                        </form>";
                    }
                }
            }

    //

            public function pago($id_usuario, $id_oferta,  $fecha_salida, $fecha_llegada){
                $sql = "INSERT INTO ofer_usu (id_usuario, id_oferta, fecha_salida, fecha_llegada) values (:id, :id_of, :fecha_salida, :fecha_llegada)";
                $datos = array("id"=>$id_oferta, ":id_of" => $id_oferta, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Comentario añadido correctamente <a href="recibo.php"> Ver resumen</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

    // Funciones para la zona de comentarios
        
        // Funcion para añadir el comentario que ha escrito el usuario en la base de datos
            public function añadirComentario($id_usuario, $viaje, $descripcion, $fecha){
                $sql = "INSERT INTO comentario (id_usuario, viaje, descripcion, fecha) values (:id, :via, :descrip, :fecha)";
                $datos = array("id"=>$id_usuario, ":via" => $viaje, ":descrip" => $descripcion, ":fecha" => $fecha);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Comentario añadido correctamente </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para listar los comentarios en cards
            public function listarComentario(){
                $sql = "SELECT c.viaje, u.nombre, u.apellido, c.descripcion, c.fecha 
                        FROM usuario as u 
                        JOIN comentario as c 
                        ON u.id = c.id_usuario";
                $resultado = $this->conex->query($sql);
                if($resultado){
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                        echo "
                        <div class='col-md-4 mb-5'>
                            <div class='card h-100'>
                                <div class='card-header bg-dark text-white'>
                                    <h6 class='card-title'>". $fila["viaje"] ."</h6>
                                </div>
                                <div class='card-body'>
                                    <h6 class='modal-subtitle text-secondary'>". $fila["nombre"] . " " . $fila["apellido"] ."</h6>
                                    <p>". $fila["descripcion"] ."</p>
                                </div>
                                <div class='card-footer bg-light'>
                                    <h6 class='text-secondary'>Fecha del comentario: ". $fila["fecha"] ."</h6>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }
            }

        // Funcion para mostrar el comentario del usuario
            public function mostarComentario($id){
                $sql = "SELECT c.id_comentario, c.viaje, u.nombre, u.apellido, c.descripcion, c.fecha 
                FROM usuario as u 
                JOIN comentario as c 
                ON u.id = c.id_usuario
                where u.id = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <div class='col-md-4 mt-4'>
                                <div class='card h-100'>
                                    <div class='card-header bg-dark text-white d-flex justify-content-between align-items-center'>
                                        <h6 class='card-title'>". $fila["viaje"] ."</h6>
                                        <a href='Borrar_comentario.php?id_comentario=". $fila["id_comentario"] ."' class='btn-close btn-close-white'></a>
                                    </div>
                                    <div class='card-body'>
                                        <h6 class='modal-subtitle text-secondary'>". $fila["nombre"] . " " . $fila["apellido"] ."</h6>
                                        <p>". $fila["descripcion"] ."</p>
                                    </div>
                                    <div class='card-footer bg-light'>
                                        <h6 class='text-secondary'>Fecha del comentario: ". $fila["fecha"] ."</h6>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }

        // Funcion para borrar el comentario del usuario.
            public function borrarComentario($id_comentario){
                $id_comentario = $_GET["id_comentario"];
                $sql = "DELETE FROM comentario WHERE id_comentario = :id";
                $datos = array(":id" => $id_comentario);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Mis_comentarios.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }
    }
?>