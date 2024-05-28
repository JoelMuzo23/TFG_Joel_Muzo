<?php
    require_once("includes/config.php");
    class Proyecto2{
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

            public function loginAdmin($correo, $contraseña){
                $sql = "SELECT id, nombre, correo, contraseña FROM admin";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                while($fila = $resultado->fetch()){
                    if($correo == $fila["correo"] && md5($contraseña) == $fila["contraseña"]){
                        $_SESSION["nombre"] = $fila["nombre"];
                        header("location: menu/AdminMenu.php");
                    }else{
                        echo "<div class='alert alert-danger mt-3 rounded-pill' role='alert'> Datos erroneos </div>";
                    }
                }
            }

    // Funcion para mostrar la lista de usuarios de la agencia        
            public function listarUsuarios(){
                $sql="SELECT id, nombre, apellido, correo, telefono FROM usuario";
                $resultado = $this->conex->prepare($sql);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado -> rowCount() > 0){
                    echo "
                    
                        <table class='table table-hover'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($fila = $resultado->fetch()){ 
                        echo "
                        <tr>
                            <td>". $fila["id"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["apellido"]  ."</td>
                            <td>". $fila["correo"]  ."</td>
                            <td>". $fila["telefono"]  ."</td>
                            <td> 
                                <a href='borrar cliente/Borrar_Cliente.php?id=" . $fila['id'] . "' class='btn btn-outline-danger '>Borrar</a>
                            </td>
                        </tr>";
                    }
                    echo "
                            </tbody> 
                        </table>";
                } else {
                    echo "<div class='alert alert-info'>No se encontraron usuarios.</div>";
                }
            }

    // Funciones para mostrar la lista de viajes en el menu del admin
        
        // Listado de los viajes la categoria de oferta        
        public function listarOfertasAdmin(){
            $sql = "SELECT id_oferta, nombre, pais, precio FROM oferta";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Pais</th>
                                <th scope='col'>Precio</th>
                                <th scope='col'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_oferta"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["pais"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td>
                                <a href='modificar viajes/Ofertas_form.php?id_oferta=" . $fila['id_oferta'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_oferta=" . $fila['id_oferta'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                        </tr>   
                    ";
                }
                echo "</tbody></table>";
            }
        }

    // Listado de los viajes la categoria de hoteles 
        public function listarHotelesAdmin(){
            $sql = "SELECT id_hotel, nombre, ciudad, precio FROM hotel";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Pais</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_hotel"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["ciudad"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                                <a href='modificar viajes/Hoteles_form.php?id_hotel=" . $fila['id_hotel'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_hotel=" . $fila['id_hotel'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                            
                        </tr>   
                    ";
                }
                echo "</tbody> </table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }
        
    // Listado de los viajes la categoria de ciudades
        public function listarCiudadesAdmin(){
            $sql = "SELECT id_ciudad, nombre, pais, precio FROM ciudad";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Pais</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_ciudad"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["pais"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                                <a href='modificar viajes/Ciudades_form.php?id_ciudad=" . $fila['id_ciudad'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_ciudad=" . $fila['id_ciudad'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                            
                        </tr>   
                    ";
                }
                echo "</tbody> </table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }

    // Listado de los viajes la categoria de playas 
        public function listarPlayasAdmin(){
            $sql = "SELECT id_playa, nombre, pais, precio FROM playa";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Pais</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_playa"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["pais"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                                <a href='modificar viajes/Playas_form.php?id_playa=" . $fila['id_playa'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_playa=" . $fila['id_playa'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                            
                        </tr>   
                    ";
                }
                echo "</tbody> </table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }

    // Listado de los viajes la categoria de espaciales 
        public function listarEspacialAdmin(){
            $sql = "SELECT id_espacio, destino, precio FROM espacio";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Destino</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_espacio"]  ."</td>
                            <td>". $fila["destino"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td>
                                <a href='borrar viaje/Borrar_Viajes.php?id_espacio=" . $fila['id_espacio'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                        </tr>   
                    ";
                }
                echo "</tbody><table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }

    // Listado de los viajes la categoria de crucero 
        public function listarCruceroAdmin(){
            $sql = "SELECT id_crucero, nombre, salida, precio FROM crucero";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>salida</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_crucero"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["salida"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                                <a href='modificar viajes/Crucero_form.php?id_crucero=" . $fila['id_crucero'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_crucero=" . $fila['id_crucero'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                        </tr>   
                    ";
                }
                echo "</tbody></table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }

    // Listado de los viajes la categoria de cultural 
        public function listarCulturalAdmin(){
            $sql = "SELECT id_cultura, nombre, ubicacion, precio FROM cultural";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Ubicacion</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_cultura"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["ubicacion"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                                <a href='modificar viajes/Cultural_form.php?id_cultura=" . $fila['id_cultura'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='borrar viaje/Borrar_Viajes.php?id_cultura=" . $fila['id_cultura'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
                            </td>
                        </tr>   
                    ";
                }
                echo "</tbody></table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }

    // Listado de los viajes la categoria de aventura 
        public function listarAventuraAdmin(){
            $sql = "SELECT id_aventura, nombre, ubicacion, precio FROM aventura";
            $resultado = $this->conex->query($sql);
            if($resultado){
                echo "
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Ubicacion</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>". $fila["id_aventura"]  ."</td>
                            <td>". $fila["nombre"]  ."</td>
                            <td>". $fila["ubicacion"]  ."</td>
                            <td>". $fila["precio"]  ."€</td>
                            <td> 
                            <a href='modificar viajes/Aventura_form.php?id_aventura=" . $fila['id_aventura'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                            <a href='borrar viaje/Borrar_Viajes.php?id_aventura=" . $fila['id_aventura'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a></td>
                        </tr>   
                    ";
                }
                echo "</tbody></table>";
            } else {
                echo "No se encontraron ofertas.";
            }
        }


    // Funciones para borrar clientes y viajes

        // Funcion para borrar clientes
            public function borrarCliente($id_cliente){
                $id_cliente = $_GET["id"];
                $sql = "DELETE FROM usuario WHERE id = :id";
                $datos = array(":id" => $id_cliente);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Clientes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar ofertas
            public function borrarOfertas($id_oferta){
                $id_oferta = $_GET["id_oferta"];
                $sql = "DELETE FROM oferta WHERE id_oferta = :id";
                $datos = array(":id" => $id_oferta);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar hoteles
            public function borrarHoteles($id_hotel){
                $id_hotel = $_GET["id_hotel"];
                $sql = "DELETE FROM hotel WHERE id_hotel = :id";
                $datos = array(":id" => $id_hotel);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar ciudades
            public function borrarCiudades($id_ciudad){
                $id_ciudad = $_GET["id_ciudad"];
                $sql = "DELETE FROM ciudad WHERE id_ciudad = :id";
                $datos = array(":id" => $id_ciudad);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar playas
            public function borrarPlayas($id_playa){
                $id_playa = $_GET["id_playa"];
                $sql = "DELETE FROM playa WHERE id_playa = :id";
                $datos = array(":id" => $id_playa);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar espacial
            public function borrarEspacio($id_espacio){
                $id_espacio = $_GET["id_espacio"];
                $sql = "DELETE FROM espacio WHERE id_espacio = :id";
                $datos = array(":id" => $id_espacio);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar espacial
            public function borrarCrucero($id_crucero){
                $id_crucero = $_GET["id_crucero"];
                $sql = "DELETE FROM crucero WHERE id_crucero = :id";
                $datos = array(":id" => $id_crucero);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar cultural
            public function borrarCultural($id_cultura){
                $id_cultura = $_GET["id_cultura"];
                $sql = "DELETE FROM cultural WHERE id_cultura = :id";
                $datos = array(":id" => $id_cultura);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

        // Funcion para borrar aventura
            public function borrarAventura($id_aventura){
                $id_aventura = $_GET["id_aventura"];
                $sql = "DELETE FROM aventura WHERE id_aventura = :id";
                $datos = array(":id" => $id_aventura);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: TiposAc.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error </div>';
                }
            }

    
    
    // Funciones para insertar los datos de los viajes 

        // Funcion para insertar los datos de ofertas
            public function insertarViajeOf($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $imagen_oferta, $imagen_oferta1, $imagen_oferta2, $imagen_oferta3){
                $sql = "INSERT INTO oferta (nombre, pais, descripcion, actividad, informacion, precio, imagen, imagen1, imagen2, imagen3) values (:nom, :pai, :descrip, :activ, :info, :preci, :imagen, :imagen1, :imagen2, :imagen3)";
                $datos = array(":nom" => $nombre, ":pai" => $pais, ":descrip" => $descripcion, ":activ" => $actividad, ":info" => $informacion,  ":preci" => $precio, ":imagen" => $imagen_oferta, ":imagen1" => $imagen_oferta1, ":imagen2" => $imagen_oferta2, ":imagen3" => $imagen_oferta3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado la oferta correctamente <a href="AdminMenu.php">Volver</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos de hoteles
            public function insertarViajeHo($nombre, $ciudad, $estrellas, $servicios, $precio, $imagen, $imagen1, $imagen2, $imagen3, $historia, $servicios_extend, $ubicacion){
                $sql = "INSERT INTO hotel (nombre, ciudad, estrellas, servicios, precio, imagen, imagen1, imagen2, imagen3, historia, servicios_extend, ubicacion) values (:nom, :ciu, :estre, :serv, :precio, :imagen, :imagen1, :imagen2, :imagen3, :historia, :servicio, :ubicacion)";
                $datos = array(":nom" => $nombre,  ":ciu" => $ciudad, ":estre" => $estrellas, ":serv" => $servicios, ":precio" => $precio, ":imagen" => $imagen, ":imagen1" => $imagen1, ":imagen2" => $imagen2, ":imagen3" => $imagen3, ":historia" => $historia, ":servicio" => $servicios_extend, ":ubicacion" => $ubicacion);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado el hotel correctamente <a href="AdminMenu.php">Volver</a>  </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos de ciudades
            public function insertarViajeCiu($nombre, $pais, $descripcion, $transporte, $informacion, $precio, $imagen_ciudad, $imagen_ciudad1, $imagen_ciudad2, $imagen_ciudad3){
                $sql = "INSERT INTO ciudad (nombre, pais, descripcion, transporte, informacion,  precio, imagen, imagen1, imagen2, imagen3) values (:nom, :pais, :descrip, :transpor, :info,  :precio, :imagen, :imagen1, :imagen2, :imagen3)";
                $datos = array(":nom" => $nombre,  ":pais" => $pais, ":descrip" => $descripcion, ":transpor" => $transporte, ":info" => $informacion,  ":precio" => $precio, ":imagen" => $imagen, ":imagen1" => $imagen_ciudad1 , ":imagen2" => $imagen_ciudad2 , ":imagen3" => $imagen_ciudad3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado la ciudad correctamente <a href="AdminMenu.php">Volver</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos de playas
            public function insertarViajePla($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $imagen_playa, $imagen_playa1, $imagen_playa2, $imagen_playa3){
                $sql = "INSERT INTO playa (nombre, pais, descripcion, actividad, informacion, precio, imagen, imagen1, imagen2, imagen3) values (:nom, :pais, :descrip, :activ, :info, :precio, :imagen, :imagen1, :imagen2, :imagen3)";
                $datos = array(":nom" => $nombre,  ":pais" => $pais, ":descrip" => $descripcion, ":activ" => $actividad, ":info" => $informacion, ":precio" => $precio, ":imagen" => $imagen_playa, ":imagen1" => $imagen_playa1, ":imagen2" => $imagen_playa2, ":imagen3" => $imagen_playa3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado la playa correctamente <a href="AdminMenu.php">Volver</a>  </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos del cultural
            public function insertarViajeCul($nombre, $ubicacion, $descripcion, $informacion, $precio, $imagen_cultural, $imagen_cultural1, $imagen_cultural2, $imagen_cultural3){
                $sql = "INSERT INTO cultural (nombre, ubicacion, descripcion, informacion, precio, imagen, imagen1, imagen2, imagen3) values (:nom, :ubi, :descrip, :info, :precio, :imagen, :imagen1, :imagen2, imagen3)";
                $datos = array(":nom" => $nombre,  ":ubi" => $ubicacion, ":descrip" => $descripcion,  ":info" => $informacion ,":precio" => $precio, ":imagen" => $imagen_cultural, ":imagen1" => $imagen_cultural1, ":imagen2" => $imagen_cultural2, ":imagen3" => $imagen_cultural3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado el museo correctamente <a href="AdminMenu.php">Volver</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos del crucero
            public function insertarViajeCru($nombre, $salida, $descripcion, $actividad, $informacion, $precio, $imagen_crucero, $imagen_crucero1, $imagen_crucero2, $imagen_crucero3){
                $sql = "INSERT INTO crucero (nombre, salida, descripcion, actividad, informacion, precio, imagen, imagen1, imagen2, imagen3) values (:nom, :salida, :descrip, :activ, :info,  :precio, :imagen, :imagen1, :imagen2, :imagen3)";
                $datos = array(":nom" => $nombre, ":salida" => $salida, ":descrip" => $descripcion, ":activ" => $actividad, ":info" => $informacion, ":precio" => $precio, ":imagen" => $imagen_crucero, ":imagen1" => $imagen_crucero1, ":imagen2" => $imagen_crucero2, ":imagen3" => $imagen_crucero3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado el crucero correctamente <a href="AdminMenu.php">Volver</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para insertar los datos del aventuras
            public function insertarViajeAve($nombre, $ubicacion, $actividad, $nivel,  $informacion,  $precio, $imagen_aventura, $imagen_aventura1, $imagen_aventura2, $imagen_aventura3){
                $sql = "INSERT INTO aventura (nombre, ubicacion, actividades, incluye, nivel, precio, imagen) values (:nom, :ubi, :acti, :nivel, :info,  :precio, :imagen, :imagen1, :imagen2, :imagen3)";
                $datos = array(":nom" => $nombre, ":ubi" => $ubicacion, ":acti" => $actividad, ":nivel" => $nivel, ":info" => $informacion, ":precio" => $precio, ":imagen" => $imagen_aventura, ":imagen1" => $imagen_aventura1, ":imagen2" => $imagen_aventura2, ":imagen3" => $imagen_aventura3);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    echo '<div class="alert alert-success mt-3 rounded-pill" role="alert"> Se ha ingresado un viaje de aventuras correctamente <a href="AdminMenu.php">Volver</a> </div>';
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

    // Funciones para mostrar formulario para modificar los datos del viaje
        
        // Funcion para mostrar el formulario los datos de ofertas
            public function formularioOfertas($id_oferta){
                $id_oferta = $_GET["id_oferta"];
                $sql = "SELECT id_oferta, nombre, pais, descripcion, actividad, informacion, precio FROM oferta WHERE id_oferta = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_oferta);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para modificar los datos del hotel
            public function formularioHoteles($id_hotel){
                $id_oferta = $_GET["id_hotel"];
                $sql = "SELECT id_hotel, nombre, ciudad, estrellas, servicios, precio, historia, servicio, ubicacion FROM hotel WHERE id_hotel = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_hotel);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para modificar los datos de la ciudad
            public function formularioCiudades($id_ciudad){
                $id_oferta = $_GET["id_ciudad"];
                $sql = "SELECT id_ciudad, nombre, pais, descripcion, transporte, informacion, precio FROM ciudad WHERE id_ciudad = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_ciudad);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }
        
        // Funcion para modificar los datos de la playa
            public function formularioPlayas($id_playa){
                $id_oferta = $_GET["id_playa"];
                $sql = "SELECT id_playa, nombre, pais, descripcion, actividad, informacion, precio FROM playa WHERE id_playa = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_playa);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para modificar los datos del crucero
            public function formularioCrucero($id_crucero){
                $id_oferta = $_GET["id_crucero"];
                $sql = "SELECT id_crucero, nombre, salida, descripcion, actividad, informacion, precio FROM crucero WHERE id_crucero = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_crucero);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para modificar los datos del museo
            public function formularioCultural($id_cultura){
                $id_oferta = $_GET["id_cultura"];
                $sql = "SELECT id_cultura, nombre, ubicacion, descripcion, informacion, precio FROM cultural WHERE id_cultura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_cultura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

        // Funcion para modificar los datos de las aventuras
            public function formularioAventura($id_aventura){
                $id_oferta = $_GET["id_aventura"];
                $sql = "SELECT id_aventura, nombre, ubicacion, actividades, nivel, informacion, precio FROM aventura WHERE id_aventura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_aventura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                return $resultado->fetch();
            }

    // Funciones para modificar los datos de la oferta
        
        // Funcion para modificar la oferta
            public function modificarOferta($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $id_oferta){
                $sql = "UPDATE oferta SET nombre = :nom, pais = :pai, descripcion = :descrip, actividad = :activ, informacion = :info,  precio = :preci WHERE id_oferta = :id";
                $datos = array(":nom" => $nombre, ":pai" => $pais, ":descrip" => $descripcion, ":activ" => $actividad, ":info =" => $informacion,  ":preci" => $precio, ":id" => $id_oferta);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar el hotel
            public function modificarHotel($nombre, $ciudad, $estrellas, $servicios, $precio, $historia, $servicio, $ubicacion, $id_hotel){
                $sql = "UPDATE hotel SET nombre = :nom, ciudad = :ciu, estrellas = :estre, servicios = :ser, precio = :preci, historia = :his, servicio = :servi, ubicacion = :ubi WHERE id_hotel = :id";
                $datos = array(":nom" => $nombre, ":ciu" => $ciudad, ":estre" => $estrellas, ":ser" => $servicios, ":preci" => $precio, ":his" => $historia , ":servi" => $servicio, ":ubi" => $ubicacion, ":id" => $id_hotel);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar la ciudad
            public function modificarCiudad($nombre, $pais, $descripcion, $transporte, $informacion, $precio, $id_ciudad){
                $sql = "UPDATE ciudad SET nombre = :nom, pais = :pai, descripcion = :descrip, transporte = :trans, informacion = :info,  precio = :preci WHERE id_ciudad = :id";
                $datos = array(":nom" => $nombre, ":pai" => $pais, ":descrip" => $descripcion, ":trans" => $transporte, ":info" => $informacion, ":preci" => $precio, ":id" => $id_ciudad);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar la playa
            public function modificarPlaya($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $id_playa){
                $sql = "UPDATE playa SET nombre = :nom, pais = :pai, descripcion = :descrip, actividad = :acti, informacion = :info, precio = :preci WHERE id_playa = :id";
                $datos = array(":nom" => $nombre, ":pai" => $pais, ":descrip" => $descripcion, ":acti" => $actividad , "informacion" =>  $informacion, ":preci" => $precio, ":id" => $id_playa);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar el crucero
            public function modificarCrucero($nombre, $salida, $descripcion, $actividad, $informacion, $precio, $id_crucero){
                $sql = "UPDATE crucero SET nombre = :nom, salida = :sali, descripcion = :descrip, actividad = :acti, informacion = :info, precio = :preci WHERE id_crucero = :id";
                $datos = array(":nom" => $nombre, ":sali" => $salida,  ":descrip" => $descripcion, ":acti" => $actividad, ":info" => $informacion, ":preci" => $precio, ":id" => $id_crucero);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar el cultural
            public function modificarCultural($nombre, $ubicacion, $descripcion, $informacion, $precio, $id_cultura){
                $sql = "UPDATE cultural SET nombre = :nom, ubicacion = :ubi, descripcion = :descrip, informacion = :info  precio = :preci WHERE id_cultura = :id";
                $datos = array(":nom" => $nombre, ":ubi" => $ubicacion, ":descrip" => $descripcion, ":info" => $informacion,  ":preci" => $precio, ":id" => $id_cultura);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

        // Funcion para modificar el aventura
            public function modificarAventura($nombre, $ubicacion, $actividades, $nivel, $informacion, $precio, $id_aventura){
                $sql = "UPDATE aventura SET nombre = :nom, ubicacion = :ubi, actividades = :acti, nivel = :nivel, informacion = :info, precio = :preci WHERE id_aventura = :id";
                $datos = array(":nom" => $nombre, ":ubi" => $ubicacion, ":acti" => $actividades, ":nivel" => $nivel, ":info" => $informacion , ":preci" => $precio, ":id" => $id_aventura);
                $resultado = $this->conex -> prepare($sql);
                if($resultado -> execute($datos)){
                    header("location: Listado_Viajes.php");
                }else{
                    echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert"> Error. Datos no introducidos </div>';
                }
            }

    // Funcion para listar los viajes no pagados
        
        // Funcion para listar los viajes no pagados de ofertas
            public function viajesOfertasReser() {
                $sql = "SELECT o.id_oferta, u.nombre as nombre_usuario, o.nombre, o.pais, ofe.numero_viajeros, ofe.precio_total FROM ofer_usu as ofe JOIN oferta as o ON ofe.id_oferta = o.id_oferta JOIN usuario as u ON ofe.id_usuario = u.id WHERE ofe.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_oferta"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados de hoteles
            public function viajesHotelesReser() {
                $sql = "SELECT h.id_hotel, u.nombre as nombre_usuario, h.nombre, h.ciudad, hote.numero_viajeros, hote.numero_habitaciones, hote.precio_total FROM hote_usu as hote JOIN hotel as h ON hote.id_hotel = h.id_hotel JOIN usuario as u on hote.id_usuario = u.id WHERE hote.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Habitaciones</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_hotel"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ciudad"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_habitaciones"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados de ciudades
            public function viajesCiudadesReser() {
                $sql = "SELECT c.id_ciudad, u.nombre as nombre_usuario, c.nombre, c.pais, ciu.numero_viajeros, ciu.precio_total FROM ciu_usu as ciu JOIN ciudad as c ON ciu.id_ciudad = c.id_ciudad JOIN usuario as u on ciu.id_usuario = u.id WHERE ciu.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_ciudad"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }

        // Funcion para listar los viajes no pagados de playas
            public function viajesPlayasReser() {
                $sql = "SELECT p.id_playa, u.nombre as nombre_usuario, p.nombre, p.pais, pla.numero_viajeros, pla.precio_total FROM pla_usu as pla JOIN playa as p ON pla.id_playa = p.id_playa JOIN usuario as u on pla.id_usuario = u.id WHERE pla.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_playa"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados del espacio
            public function viajesEspacialesReser() {
                $sql = "SELECT e.id_espacio, u.nombre, e.destino, esp.numero_viajeros, esp.precio_total FROM espa_usu as esp JOIN espacio as e ON esp.id_espacio = e.id_espacio JOIN usuario as u on esp.id_usuario = u.id WHERE esp.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Destino</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_espacio"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["destino"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados de cruceros
            public function viajesCrucerosReser() {
                $sql = "SELECT c.id_crucero, u.nombre as nombre_usuario, c.nombre, c.salida, cru.numero_viajeros, cru.numero_camarotes, cru.precio_total FROM cru_usu as cru JOIN crucero as c ON cru.id_crucero = c.id_crucero JOIN usuario as u on cru.id_usuario = u.id WHERE cru.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Salida</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Camarotes</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_crucero"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["salida"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_camarotes"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }

        // Funcion para listar los viajes no pagados culturales
            public function viajesCulturalesReser() {
                $sql = "SELECT cu.id_cultura, u.nombre as nombre_usuario, cu.nombre, cu.ubicacion, cul.numero_viajeros, cul.precio_total FROM cul_usu as cul JOIN cultural as cu ON cul.id_cultura = cu.id_cultura JOIN usuario as u on cul.id_usuario = u.id WHERE cul.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>ubicacion</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_cultura"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ubicacion"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados de aventuras
            public function viajesAventurasReser() {
                $sql = "SELECT a.id_aventura,  u.nombre as nombre_usuario, a.nombre, a.ubicacion, ave.numero_viajeros, ave.precio_total FROM ave_usu as ave JOIN aventura as a ON ave.id_aventura = a.id_aventura JOIN usuario as u on ave.id_usuario = u.id WHERE ave.estado_pago = 'no pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>ubicacion</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_aventura"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ubicacion"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes reservados.</div>";
                }
            }
    
    // Funcion para listar los viajes pagados
         
        // Funcion para listar los viajes no pagados de ofertas
            public function viajesOfertasPaga() {
                $sql = "SELECT o.id_oferta, u.nombre as nombre_usuario, o.nombre, o.pais, ofe.numero_viajeros, ofe.precio_total FROM ofer_usu as ofe JOIN oferta as o ON ofe.id_oferta = o.id_oferta JOIN usuario as u ON ofe.id_usuario = u.id WHERE ofe.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_oferta"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
        
        // Funcion para listar los viajes no pagados de hoteles
            public function viajesHotelesPaga() {
                $sql = "SELECT h.id_hotel, u.nombre as nombre_usuario, h.nombre, h.ciudad, hote.numero_viajeros, hote.numero_habitaciones, hote.precio_total FROM hote_usu as hote JOIN hotel as h ON hote.id_hotel = h.id_hotel JOIN usuario as u on hote.id_usuario = u.id WHERE hote.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Habitaciones</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_hotel"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ciudad"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_habitaciones"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
    
        // Funcion para listar los viajes no pagados de ciudades
            public function viajesCiudadesPaga() {
                $sql = "SELECT c.id_ciudad, u.nombre as nombre_usuario, c.nombre, c.pais, ciu.numero_viajeros, ciu.precio_total FROM ciu_usu as ciu JOIN ciudad as c ON ciu.id_ciudad = c.id_ciudad JOIN usuario as u on ciu.id_usuario = u.id WHERE ciu.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_ciudad"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }

        // Funcion para listar los viajes no pagados de playas
            public function viajesPlayasPaga() {
                $sql = "SELECT p.id_playa, u.nombre as nombre_usuario, p.nombre, p.pais, pla.numero_viajeros, pla.precio_total FROM pla_usu as pla JOIN playa as p ON pla.id_playa = p.id_playa JOIN usuario as u on pla.id_usuario = u.id WHERE pla.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_playa"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["pais"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
    
        // Funcion para listar los viajes no pagados del espacio
            public function viajesEspacialesPaga() {
                $sql = "SELECT e.id_espacio, u.nombre, e.destino, esp.numero_viajeros, esp.precio_total FROM espa_usu as esp JOIN espacio as e ON esp.id_espacio = e.id_espacio JOIN usuario as u on esp.id_usuario = u.id WHERE esp.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Destino</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_espacio"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["destino"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
    
        // Funcion para listar los viajes no pagados de cruceros
            public function viajesCrucerosPaga() {
                $sql = "SELECT c.id_crucero, u.nombre as nombre_usuario, c.nombre, c.salida, cru.numero_viajeros, cru.numero_camarotes, cru.precio_total FROM cru_usu as cru JOIN crucero as c ON cru.id_crucero = c.id_crucero JOIN usuario as u on cru.id_usuario = u.id WHERE cru.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Salida</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Camarotes</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_crucero"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["salida"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_camarotes"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }

        // Funcion para listar los viajes no pagados culturales
            public function viajesCulturalesPaga() {
                $sql = "SELECT cu.id_cultura, u.nombre as nombre_usuario, cu.nombre, cu.ubicacion, cul.numero_viajeros, cul.precio_total FROM cul_usu as cul JOIN cultural as cu ON cul.id_cultura = cu.id_cultura JOIN usuario as u on cul.id_usuario = u.id WHERE cul.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>ubicacion</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_cultura"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ubicacion"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
    
        // Funcion para listar los viajes no pagados de aventuras
            public function viajesAventurasPaga() {
                $sql = "SELECT a.id_aventura,  u.nombre as nombre_usuario, a.nombre, a.ubicacion, ave.numero_viajeros, ave.precio_total FROM ave_usu as ave JOIN aventura as a ON ave.id_aventura = a.id_aventura JOIN usuario as u on ave.id_usuario = u.id WHERE ave.estado_pago = 'pagado'";
                
                $resultado = $this->conex->query($sql);
                if ($resultado && $resultado->rowCount() > 0) {
                    echo "
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>ubicacion</th>
                                <th scope='col'>Viajeros</th>
                                <th scope='col'>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>". htmlspecialchars($fila["id_aventura"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre_usuario"]) ."</td>
                                <td>". htmlspecialchars($fila["nombre"]) ."</td>
                                <td>". htmlspecialchars($fila["ubicacion"]) ."</td>
                                <td>". htmlspecialchars($fila["numero_viajeros"]) ."</td>
                                <td>". htmlspecialchars($fila["precio_total"]) ."€</td>
                            </tr>
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-danger text-center'>No hay viajes pagados.</div>";
                }
            }
        
    
    }
