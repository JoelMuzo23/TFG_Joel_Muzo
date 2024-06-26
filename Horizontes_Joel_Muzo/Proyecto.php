<?php
    require_once("includes/config.php");
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
                                        <a href='disponibilidad/DisponibilidadOferta.php?id=" . $fila['id_oferta'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                            <a href='../disponibilidad/DisponibilidadCiudades.php?id_ciudad=" . $fila['id_ciudad'] . "'class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                            <a href='../disponibilidad/DisponibilidadPlaya.php?id=" . $fila['id_playa'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                                <a href='../disponibilidad/DisponibilidadPlaneta.php?id=" . $fila['id_espacio'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>";
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
                                            <a href='../disponibilidad/DisponibilidadCrucero.php?id=" . $fila['id_crucero'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                            <a href='../disponibilidad/DisponibilidadCultural.php?id=" . $fila['id_cultura'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                            <a href='../disponibilidad/DisponibilidadAventuras.php?id=" . $fila['id_aventura'] . "' class='btn btn-outline-dark'>Ver disponibilidad</a>
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
                                        echo "<a href='disponibilidad/DisponibilidadHotel.php?id=" . $fila['id_hotel'] . "' class='btn btn-outline-dark me-4'>Ver disponibilidad</a>";
                                        echo "<a href='detalles_hotel/detalle_hotel.php?id=" . $fila['id_hotel'] . "' class='btn btn-outline-warning'>Más Información</a>";
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
                return $resultado->fetch();
            }

    // Funciones para los datos del usuario
            
        public function datosUsuario($id){
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }
            
    // Funcion para insertar al usuario en la base de datos

        public function insertarUsuario($nombre, $apellido, $apellido2, $telefono, $correo, $contraseña){
            $sql = "SELECT COUNT(*) FROM usuario WHERE correo = :correo";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindValue(':correo', $correo);
            $resultado->execute();
            $existe = $resultado->fetchColumn();

            if ($existe > 0) {
                echo '<div class="alert alert-danger mt-3 rounded-pill text-center" role="alert">El usuario ya existe. Por favor, usa datos diferentes.</div>';
            } else {
                $sql = "INSERT INTO usuario (nombre, apellido, apellido2, telefono, correo, contraseña) VALUES (:nom, :ape, :ape2, :telef, :correo, :contra)";
                $datos = array(":nom" => $nombre, ":ape" => $apellido, ":ape2" => $apellido2, ":telef" => $telefono, ":correo" => $correo, ":contra" => $contraseña);
                $resultado = $this->conex->prepare($sql);

                if ($resultado->execute($datos)) {
                    header("location: Inicio.php");
                } else {
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">Error. Datos no introducidos.</div>';
                }
            }
        }
        

    // Funcion para realizar el login con el correo y la contraseña del usuario
    
        public function loginUsuario($correo, $contraseña) {
            $sql = "SELECT id, nombre, apellido, apellido2, correo, contraseña FROM usuario WHERE correo = :correo";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':correo', $correo);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $fila = $resultado->fetch();
        
            if ($fila && md5($contraseña) == $fila["contraseña"]) {
                $_SESSION["id"] = $fila["id"];
                $_SESSION["nombre"] = $fila["nombre"];
                $_SESSION["apellido"] = $fila["apellido"];
                header("Location: Inicio.php");
                exit();
            } else {
                echo '<div class="alert alert-danger mt-3 rounded-pill text-center" role="alert">Datos Erroneos</div>';
            }
        }
            
                
    // Funcion para modifcar los datos del usuario

        public function modificarUsuario($id, $nombre, $apellido, $apellido2, $contraseña ){
            $sql = "UPDATE usuario SET nombre = :nom, apellido = :ape, apellido2 = :ape2, contraseña = :contra WHERE id = :id ";
            $datos = array(":id" => $id, ":nom" => $nombre, ":ape" => $apellido, ":ape2" => $apellido2, ":contra" => $contraseña); 
            $resultado = $this->conex -> prepare($sql);
            if($resultado -> execute($datos)){
                header("location: ../Inicio.php");
            }else{
                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
            }
            
        }   

    // Funciones para que el usuario seleccione los datos de la reserva

        public function dispoOfertas($id_oferta){
            $id_oferta = $_GET["id"];
            $sql = "SELECT id_oferta, nombre, pais, informacion, precio, imagen1, imagen2, imagen3 FROM oferta WHERE id_oferta = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_oferta);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }
            
        public function dispoHotel($id_hotel){
            $id_hotel = $_GET["id"];
            $sql = "SELECT id_hotel, nombre, ciudad, servicio, precio, imagen1, imagen2, imagen3  FROM hotel WHERE id_hotel = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_hotel);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoCiudades($id_ciudad){
            $id_ciudad = $_GET["id_ciudad"];
            $sql = "SELECT id_ciudad, nombre, pais, informacion, precio, imagen1, imagen2, imagen3  FROM ciudad WHERE id_ciudad = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_ciudad);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoPlaya($id_playa){
            $id_playa = $_GET["id"];
            $sql = "SELECT id_playa, nombre, pais, informacion, precio, imagen1, imagen2, imagen3 FROM playa WHERE id_playa = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_playa);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoPlaneta($id_espacio){
            $id_espacio = $_GET["id"];
            $sql = "SELECT id_espacio, destino, informacion, precio, imagen1, imagen2, imagen3 FROM espacio WHERE id_espacio = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_espacio);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoCrucero($id_crucero){
            $id_crucero = $_GET["id"];
            $sql = "SELECT id_crucero, nombre, informacion, precio, imagen1, imagen2, imagen3  FROM crucero WHERE id_crucero = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_crucero);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoCultural($id_cultura){
            $id_cultura = $_GET["id"];
            $sql = "SELECT id_cultura, nombre, informacion, precio, imagen1, imagen2, imagen3  FROM cultural WHERE id_cultura = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_cultura);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

        public function dispoAventura($id_aventura){
            $id_aventura = $_GET["id"];
            $sql = "SELECT id_aventura, nombre, informacion, precio, imagen1, imagen2, imagen3 FROM aventura WHERE id_aventura = :id";
            $resultado = $this->conex->prepare($sql);
            $resultado->bindParam(':id', $id_aventura);
            $resultado->execute();
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            return $resultado->fetch();
        }

    // Funciones para añadir los datos del viaje a la base de datos
        
        // Funcion para reservar viajes a ofertas

            public function reservaOferta($id_oferta, $id_usuario, $fecha_salida,  $fecha_llegada, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO ofer_usu (id_oferta, id_usuario, fecha_salida, fecha_llegada, numero_viajeros, precio_total, estado_pago) values (:id_of, :id_us, :fecha_salida, :fecha_llegada, :num_via, :pre_tot, :estado)";
                $datos = array("id_of"=>$id_oferta, ":id_us" => $id_usuario, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }
        
        // Funcion para reservar viajes a hoteles 

            public function reservaHotel($id_hotel, $id_usuario, $fecha_salida,  $fecha_llegada, $viajeros, $habitacion, $precio_total, $estado){
                $sql = "INSERT INTO hote_usu (id_hotel, id_usuario, fecha_salida, fecha_llegada, numero_viajeros, numero_habitaciones, precio_total, estado_pago) values (:id_ho, :id_us, :fecha_salida, :fecha_llegada, :num_via, :num_hab, :pre_tot, :estado)";
                $datos = array("id_ho"=>$id_hotel, ":id_us" => $id_usuario, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada, ":num_via" => $viajeros, ":num_hab" => $habitacion, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            } 
            
        // Funcion para reservar viajes a ciudades

            public function reservaCiudad($id_ciudad, $id_usuario, $fecha_salida, $fecha_llegada, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO ciu_usu (id_ciudad, id_usuario, fecha_salida, fecha_llegada, numero_viajeros, precio_total, estado_pago) values (:id_ciu, :id_us, :fecha_salida, :fecha_llegada, :num_via, :pre_tot, :estado)";
                $datos = array("id_ciu"=>$id_ciudad, ":id_us" => $id_usuario, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }
        
        // Funcion para reservar viajes a playas

            public function reservaPlaya($id_playa, $id_usuario, $fecha_salida, $fecha_llegada, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO pla_usu (id_playa, id_usuario, fecha_salida, fecha_llegada, numero_viajeros, precio_total, estado_pago) values (:id_pla, :id_us, :fecha_salida, :fecha_llegada, :num_via, :pre_tot, :estado)";
                $datos = array("id_pla" => $id_playa, ":id_us" => $id_usuario, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }
        
        // Funcion para reservar viajes al espacio

            public function reservaEspacio($id_espacio, $id_usuario, $fecha_salida, $fecha_llegada, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO espa_usu (id_espacio, id_usuario, fecha_salida, fecha_llegada, numero_viajeros, precio_total, estado_pago) values (:id_espa, :id_us, :fecha_salida, :fecha_llegada, :num_via, :pre_tot, :estado)";
                $datos = array("id_espa" => $id_espacio, ":id_us" => $id_usuario, ":fecha_salida" => $fecha_salida, ":fecha_llegada" => $fecha_llegada, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }

        // Funcion para reservar viajes en crucero

            public function reservaCrucero($id_crucero, $id_usuario, $fecha, $viajeros, $camarote, $precio_total, $estado){
                $sql = "INSERT INTO cru_usu (id_crucero, id_usuario, fecha, numero_viajeros, numero_camarotes, precio_total, estado_pago) values (:id_cru, :id_us, :fecha, :num_via, :num_cam, :pre_tot, :estado)";
                $datos = array("id_cru" => $id_crucero, ":id_us" => $id_usuario, ":fecha" => $fecha, ":num_via" => $viajeros, "num_cam" => $camarote, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }


        // Funcion para reservar viajes culturales
            
            public function reservaCultural($id_cultura, $id_usuario, $fecha, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO cul_usu (id_cultura, id_usuario, fecha, numero_viajeros, precio_total, estado_pago) values (:id_cul, :id_us, :fecha, :num_via, :pre_tot, :estado)";
                $datos = array("id_cul" => $id_cultura, ":id_us" => $id_usuario, ":fecha" => $fecha, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }


        // Funcion para reservar viajes sobre aventuras   

            public function reservaAventura($id_aventura, $id_usuario, $fecha, $viajeros, $precio_total, $estado){
                $sql = "INSERT INTO ave_usu (id_aventura, id_usuario, fecha, numero_viajeros, precio_total, estado_pago) values (:id_ave, :id_us, :fecha, :num_via, :pre_tot, :estado)";
                $datos = array("id_ave" => $id_aventura, ":id_us" => $id_usuario, ":fecha" => $fecha, ":num_via" => $viajeros, ":pre_tot" => $precio_total, ":estado" => $estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Viaje Reservado correctamente <br> Ver mis reservas <a href="../menu_usuario/Mis_reservas.php"> Ver </a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error</div>';
                }
            }


    // funciones para mostrar los viajes reservados
        
        // Funcion para mostrar los viajes reservados de ofertas

            public function listarReservasOf(){ 
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT ofe.id_reserva, o.nombre, ofe.fecha_salida, ofe.fecha_llegada, ofe.numero_viajeros, o.precio 
                        FROM ofer_usu as ofe 
                        JOIN oferta as o 
                        ON ofe.id_oferta = o.id_oferta 
                        WHERE ofe.id_usuario = :id AND ofe.estado_pago = 'no pagado' ";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
            
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha Salida</th>
                                    <th class='col'>Fecha Llegada</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        
                        $fecha_salida = DateTime::createFromFormat('Y-m-d', $fila["fecha_salida"])->format('d/m/Y');
                        $fecha_llegada = DateTime::createFromFormat('Y-m-d', $fila["fecha_llegada"])->format('d/m/Y');
            
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha_salida  ."</td>
                                <td>". $fecha_llegada  ."</td>
                                <td>". $fila["precio"] . "€</td>
                                <td> 
                                    <a href='../pagos/PagoOferta.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a>
                                    <a href='acciones/Borrar_reserva_oferta.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                } else {
                    echo "
                    <div class='text-center'>
                        No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                    </div>";
                }
            }
        

        // Funcion para mostrar los viajes reservados en hoteles

            public function listarReservasHo(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT hote.id_reserva, h.nombre, hote.fecha_salida, hote.fecha_llegada, hote.numero_viajeros, h.precio 
                        FROM hote_usu as hote 
                        JOIN hotel as h 
                        ON hote.id_hotel = h.id_hotel 
                        WHERE hote.id_usuario = :id AND  hote.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha Salida</th>
                                    <th class='col'>Fecha Llegada</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha_salida = DateTime::createFromFormat('Y-m-d', $fila["fecha_salida"])->format('d/m/Y');
                        $fecha_llegada = DateTime::createFromFormat('Y-m-d', $fila["fecha_llegada"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha_salida  ."</td>
                                <td>". $fecha_llegada  ."</td>
                                <td>". $fila["precio"]  ."€</td>
                                <td> 
                                    <a href='../pagos/PagoHotel.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a>
                                    <a href='acciones/Borrar_reserva_hotel.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Hoteles.php'> Realizar reserva</a>
                </div>";
                }
            }

        // Funcion para mostrar los viajes reservados de ciudades 
            
            public function listarReservasCiu(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT ciu.id_reserva, c.nombre, ciu.fecha_salida, ciu.fecha_llegada, ciu.numero_viajeros, c.precio 
                        FROM ciu_usu as ciu 
                        JOIN ciudad as c 
                        ON ciu.id_ciudad = c.id_ciudad 
                        WHERE ciu.id_usuario = :id AND ciu.estado_pago = 'no pagado' ";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha Salida</th>
                                    <th class='col'>Fecha Llegada</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha_salida = DateTime::createFromFormat('Y-m-d', $fila["fecha_salida"])->format('d/m/Y');
                        $fecha_llegada = DateTime::createFromFormat('Y-m-d', $fila["fecha_llegada"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha_salida  ."</td>
                                <td>". $fecha_llegada  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoCiudad.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a>
                                    <a href='acciones/Borrar_reserva_ciudad.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }

        // Funcion para mostrar los viajes reservados de playas

            public function listarReservasPla(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT pla.id_reserva, p.nombre, pla.fecha_salida, pla.fecha_llegada, pla.numero_viajeros, p.precio 
                        FROM pla_usu as pla 
                        JOIN playa as p 
                        ON pla.id_playa = p.id_playa 
                        WHERE pla.id_usuario = :id AND pla.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha Salida</th>
                                    <th class='col'>Fecha Llegada</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha_salida = DateTime::createFromFormat('Y-m-d', $fila["fecha_salida"])->format('d/m/Y');
                        $fecha_llegada = DateTime::createFromFormat('Y-m-d', $fila["fecha_llegada"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha_salida  ."</td>
                                <td>". $fecha_llegada  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoPlaya.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a>
                                    <a href='acciones/Borrar_reserva_playa.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }
        
        // Funcion para mostrar los viajes reservados espaciales

            public function listarReservasEsp(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT espa.id_reserva, e.destino, espa.fecha_salida, espa.fecha_llegada, espa.numero_viajeros, e.precio 
                        FROM espa_usu as espa 
                        JOIN espacio as e 
                        ON espa.id_espacio = e.id_espacio 
                        WHERE espa.id_usuario = :id AND espa.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha Salida</th>
                                    <th class='col'>Fecha Llegada</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha_salida = DateTime::createFromFormat('Y-m-d', $fila["fecha_salida"])->format('d/m/Y');
                        $fecha_llegada = DateTime::createFromFormat('Y-m-d', $fila["fecha_llegada"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["destino"]  ."</td>
                                <td>". $fecha_salida  ."</td>
                                <td>". $fecha_llegada  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoEspacio.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a> 
                                    <a href='acciones/Borrar_reserva_espacio.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }
        
        // Funcion para mostrar los viajes reservados cruceros
            
            public function listarReservasCru(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT cru.id_reserva, c.nombre, cru.fecha, cru.numero_viajeros, c.precio 
                        FROM cru_usu as cru 
                        JOIN crucero as c 
                        ON cru.id_crucero = c.id_crucero 
                        WHERE cru.id_usuario = :id AND cru.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha = DateTime::createFromFormat('Y-m-d', $fila["fecha"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoCrucero.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a> 
                                    <a href='acciones/Borrar_reserva_crucero.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }

        // Funcion para mostrar los viajes reservados culturales

            public function listarReservasCul(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT cul.id_reserva, cu.nombre, cul.fecha, cul.numero_viajeros, cu.precio 
                        FROM cul_usu as cul 
                        JOIN cultural as cu 
                        ON cul.id_cultura = cu.id_cultura 
                        WHERE cul.id_usuario = :id AND cul.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha = DateTime::createFromFormat('Y-m-d', $fila["fecha"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoCultural.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a> 
                                    <a href='acciones/Borrar_reserva_cultural.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }

        // Funcion para mostrar los viajes reservados aventuras

            public function listarReservasAve(){
                $id_usuario = $_SESSION["id"];
                $sql = "SELECT ave.id_reserva, a.nombre, ave.fecha, ave.numero_viajeros, a.precio 
                        FROM ave_usu as ave 
                        JOIN aventura as a 
                        ON ave.id_aventura = a.id_aventura 
                        WHERE ave.id_usuario = :id AND ave.estado_pago = 'no pagado'";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_usuario);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    echo "
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th class='col'>Nombre</th>
                                    <th class='col'>Fecha</th>
                                    <th class='col'>Precio</th>
                                    <th class='col'>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                    while ($fila = $resultado->fetch()){
                        $fecha = DateTime::createFromFormat('Y-m-d', $fila["fecha"])->format('d/m/Y');
                        echo "
                            <tr>
                                <td>". $fila["nombre"]  ."</td>
                                <td>". $fecha  ."</td>
                                <td>". $fila["precio"] ."€</td>
                                <td> 
                                    <a href='../pagos/PagoAventura.php?id=" . $fila['id_reserva'] . "' class='btn btn-outline-success btn-sm'>Pagar</a> 
                                    <a href='acciones/Borrar_reserva_aventura.php?id=" . $fila['id_reserva']. "' class='btn btn-outline-danger btn-sm'> <i class='fas fa-trash-alt'></i> </a>
                                </td>
                            </tr>   
                        ";
                    }
                    echo "</tbody> </table>";
                }else{
                echo "
                <div class='text-center'>
                    No hay reservas. <a href='../Viajes.php'> Realizar reserva</a>
                </div>";
                }
            }


    // Funciones para borrar las reservas del cliente

        // Funcion para borrar los viajes reservados de ofertas
            public function borrarReservaOferta($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM ofer_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de hotel
            public function borrarReservaHotel($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM hote_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de ciudad
            public function borrarReservaCiudad($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM ciu_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de playa
            public function borrarReservaPlaya($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM pla_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de espacio
            public function borrarReservaEspacio($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM espa_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de crucero
            public function borrarReservaCrucero($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM cru_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de ofertas
            public function borrarReservaCultural($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM cul_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar los viajes reservados de ofertas
            public function borrarReservaAventura($id){
                $id = $_GET["id"];
                $sql = "DELETE FROM ave_usu WHERE id_reserva = :id";
                $datos = array(":id" => $id);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_reservas.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

    // Funciones para mostrar los metodos de pago que se usaran en pago
            
        // Funcion para mostrar el metodo de pago de la oferta 

            public function metodoPagoOferta($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT ofe.id_reserva, o.nombre, o.precio, ofe.precio_total, ofe.fecha_salida, ofe.fecha_llegada, o.imagen, ofe.numero_viajeros 
                        FROM ofer_usu as ofe
                        JOIN oferta as o ON ofe.id_oferta = o.id_oferta
                        JOIN usuario as u on ofe.id_usuario = u.id
                        WHERE ofe.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para mostrar el metodo de pago  del hotel

            public function metodoPagoHotel($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT hote.id_reserva, h.nombre, h.precio, hote.precio_total, hote.fecha_salida, hote.fecha_llegada, h.imagen, hote.numero_viajeros, hote.numero_habitaciones 
                        FROM hote_usu as hote
                        JOIN hotel as h ON hote.id_hotel = h.id_hotel
                        JOIN usuario as u on hote.id_usuario = u.id
                        WHERE hote.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para mostrar el metodo de pago  de la ciudad

            public function metodoPagoCiudad($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT ciu.id_reserva, c.nombre, c.precio, ciu.precio_total,  ciu.fecha_salida, ciu.fecha_llegada, c.imagen, ciu.numero_viajeros 
                        FROM ciu_usu as ciu
                        JOIN ciudad as c ON ciu.id_ciudad = c.id_ciudad
                        JOIN usuario as u on ciu.id_usuario = u.id
                        WHERE ciu.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }   

        // Funcion para mostrar el metodo de pago  de la playa

            public function metodoPagoPlaya($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT pla.id_reserva, p.nombre, p.precio, pla.precio_total,  pla.fecha_salida, pla.fecha_llegada, p.imagen, pla.numero_viajeros 
                        FROM pla_usu as pla
                        JOIN playa as p ON pla.id_playa = p.id_playa
                        JOIN usuario as u on pla.id_usuario = u.id
                        WHERE pla.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }  
        
        // Funcion para mostrar el metodo de pago  del espacio
            
            public function metodoPagoEspacio($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT espa.id_reserva, e.destino, e.precio, espa.precio_total, espa.fecha_salida, espa.fecha_llegada, e.imagen, espa.numero_viajeros 
                        FROM espa_usu as espa
                        JOIN espacio as e ON espa.id_espacio = e.id_espacio
                        JOIN usuario as u on espa.id_usuario = u.id
                        WHERE espa.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para mostrar el metodo de pago  del crucero

            public function metodoPagoCrucero($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT cru.id_reserva, c.nombre, c.precio, cru.precio_total, cru.fecha, c.imagen, cru.numero_viajeros, cru.numero_camarotes
                        FROM cru_usu as cru
                        JOIN crucero as c ON cru.id_crucero = c.id_crucero
                        JOIN usuario as u on cru.id_usuario = u.id
                        WHERE cru.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para mostrar el metodo de pago  cultural

            public function metodoPagoCultural($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT cul.id_reserva, cu.nombre, cu.precio, cul.precio_total, cul.fecha, cu.imagen, cul.numero_viajeros
                        FROM cul_usu as cul
                        JOIN cultural as cu ON cul.id_cultura = cu.id_cultura
                        JOIN usuario as u on cul.id_cultura = u.id
                        WHERE cul.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para mostrar el metodo de pago  de la aventura

            public function metodoPagoAventura($id_reserva){
                $id_reserva = $_GET["id"];
                $sql = "SELECT ave.id_reserva, a.nombre, a.precio, ave.precio_total, ave.fecha, a.imagen, ave.numero_viajeros
                        FROM ave_usu as ave
                        JOIN aventura as a ON ave.id_aventura = a.id_aventura
                        JOIN usuario as u on ave.id_aventura = u.id
                        WHERE ave.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

    // Funcion para el recibo
        
        // Funcion para realizar el recibo de ofertas
            
            public function pagoOferta($id_reserva, $estado){
                $sql="UPDATE ofer_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboOferta.php?id=$id_reserva");
                }
            }

            public function pagoHotel($id_reserva, $estado){
                $sql="UPDATE hote_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboHotel.php?id=$id_reserva");
                }
            }

            public function pagoCiudad($id_reserva, $estado){
                $sql="UPDATE ciu_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboCiudad.php?id=$id_reserva");
                }
            }

            public function pagoPlaya($id_reserva, $estado){
                $sql="UPDATE pla_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboPlaya.php?id=$id_reserva");
                }
            }
            
            public function pagoEspacio($id_reserva, $estado){
                $sql="UPDATE espa_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboEspacio.php?id=$id_reserva");
                }
            }

            public function pagoCrucero($id_reserva, $estado){
                $sql="UPDATE cru_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboCrucero.php?id=$id_reserva");
                }
            }

            public function pagoCultural($id_reserva, $estado){
                $sql="UPDATE cul_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboCultural.php?id=$id_reserva");
                }
            }

            public function pagoAventura($id_reserva, $estado){
                $sql="UPDATE ave_usu SET estado_pago = :estado WHERE id_reserva = :id_reserva"; 
                $datos = array(":id_reserva" => $id_reserva, ":estado"=>$estado);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location:recibo/ReciboAventura.php?id=$id_reserva");
                }
            }
        
    // Funciones para generar los detalles del PDF

        // Funcion para generar los detalles del PDF de ofertas

            public function detallesPDFOfer($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT o.nombre, ofe.precio_total, ofe.fecha_salida, ofe.fecha_llegada, o.imagen, ofe.numero_viajeros, u.correo, u.telefono
                        FROM ofer_usu as ofe
                        JOIN oferta as o ON ofe.id_oferta = o.id_oferta
                        JOIN usuario as u on ofe.id_usuario = u.id
                        WHERE ofe.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para generar los detalles del PDF de hotel

            public function detallesPDFHote($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT h.nombre, hote.precio_total, hote.fecha_salida, hote.fecha_llegada, h.imagen, hote.numero_viajeros, hote.numero_habitaciones, u.correo, u.telefono
                        FROM hote_usu as hote
                        JOIN hotel as h ON hote.id_hotel = h.id_hotel
                        JOIN usuario as u on hote.id_usuario = u.id
                        WHERE hote.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para generar los detalles del PDF de la ciudad

            public function detallesPDFCiu($id_reserva){
                $id_reserva = $_GET["id_ciudad"]; 
                $sql = "SELECT c.nombre, ciu.precio_total, ciu.fecha_salida, ciu.fecha_llegada, c.imagen, ciu.numero_viajeros, u.correo, u.telefono
                        FROM ciu_usu as ciu
                        JOIN ciudad as c ON ciu.id_ciudad = c.id_ciudad
                        JOIN usuario as u on ciu.id_usuario = u.id
                        WHERE ciu.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para generar los detalles del PDF de la playa

            public function detallesPDFPla($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT p.nombre, pla.precio_total, pla.fecha_salida, pla.fecha_llegada, p.imagen, pla.numero_viajeros, u.correo, u.telefono
                        FROM pla_usu as pla
                        JOIN playa as p ON pla.id_playa = p.id_playa
                        JOIN usuario as u on pla.id_usuario = u.id
                        WHERE pla.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
    
        // Funcion para generar los detalles del PDF del espacio

            public function detallesPDFEsp($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT e.destino, espa.precio_total, espa.fecha_salida, espa.fecha_llegada, e.imagen, espa.numero_viajeros, u.correo, u.telefono
                        FROM espa_usu as espa
                        JOIN espacio as e ON espa.id_espacio = e.id_espacio
                        JOIN usuario as u on espa.id_usuario = u.id
                        WHERE espa.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para generar los detalles del PDF del crucero

            public function detallesPDFCru($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT c.nombre, cru.precio_total, cru.fecha, c.imagen, cru.numero_viajeros, cru.numero_camarotes, u.correo, u.telefono
                        FROM cru_usu as cru
                        JOIN crucero as c ON cru.id_crucero = c.id_crucero
                        JOIN usuario as u on cru.id_usuario = u.id
                        WHERE cru.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para generar los datos bancarios  cultural

            public function detallesPDFCul($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT c.nombre, cul.precio_total, cul.fecha, c.imagen, cul.numero_viajeros, u.correo, u.telefono
                        FROM cul_usu as cul
                        JOIN cultural as c ON cul.id_cultura = c.id_cultura
                        JOIN usuario as u on cul.id_usuario = u.id
                        WHERE cul.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para generar los detalles del PDF de la aventura

            public function detallesPDFAve($id_reserva){
                $id_reserva = $_GET["id"]; 
                $sql = "SELECT a.nombre, ave.precio_total, ave.fecha, a.imagen, ave.numero_viajeros, u.correo, u.telefono
                        FROM ave_usu as ave
                        JOIN aventura as a ON ave.id_aventura = a.id_aventura
                        JOIN usuario as u on ave.id_usuario = u.id
                        WHERE ave.id_reserva = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_reserva);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

    // Funciones para la zona de comentarios
        
        // Funcion para añadir el comentario que ha escrito el usuario en la base de datos

            public function añadirComentario($id_usuario, $viaje, $descripcion, $fecha){
                $sql = "INSERT INTO comentario (id_usuario, viaje, descripcion, fecha) values (:id, :via, :descrip, :fecha)";
                $datos = array("id"=>$id_usuario, ":via" => $viaje, ":descrip" => $descripcion, ":fecha" => $fecha);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill text-center" role="alert"> Comentario añadido correctamente <a href="../Blog.php"> Ver Comentarios </a> </div>';
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
                        WHERE u.id = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id);
                $resultado->execute();
                $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $comentarios;
            }

        // Funcion para borrar el comentario del usuario.

            public function borrarComentario($id_comentario){
                $id_comentario = $_GET["id_comentario"];
                $sql = "DELETE FROM comentario WHERE id_comentario = :id";
                $datos = array(":id" => $id_comentario);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: ../Mis_comentarios.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }
    }
?>