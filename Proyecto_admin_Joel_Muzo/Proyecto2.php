<?php
    require_once("config.php");
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
                        header("location: AdminMenu.php");
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
                                <a href='Borrar_Cliente.php?id=" . $fila['id'] . "' class='btn btn-outline-danger '>Borrar</a>
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
                                    <a href='Ofertas_form.php?id_oferta=" . $fila['id_oferta'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                    <a href='Borrar_Viajes.php?id_oferta=" . $fila['id_oferta'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                    <a href='Hoteles_form.php?id_hotel=" . $fila['id_hotel'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                    <a href='Borrar_Viajes.php?id_hotel=" . $fila['id_hotel'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                <td> <a href='Ciudades_form.php?id_ciudad=" . $fila['id_ciudad'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='Borrar_Viajes.php?id_ciudad=" . $fila['id_ciudad'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a></td>
                                
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
                                    <a href='Playas_form.php?id_playa=" . $fila['id_playa'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                    <a href='Borrar_Viajes.php?id_playa=" . $fila['id_playa'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                    <a href='Borrar_Viajes.php?id_espacio=" . $fila['id_espacio'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                    <a href='Crucero_form.php?id_crucero=" . $fila['id_crucero'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                    <a href='Borrar_Viajes.php?id_crucero=" . $fila['id_crucero'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                    <a href='Cultural_form.php?id_cultura=" . $fila['id_cultura'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                    <a href='Borrar_Viajes.php?id_cultura=" . $fila['id_cultura'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a>
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
                                <a href='Aventura_form.php?id_aventura=" . $fila['id_aventura'] . "' class='btn btn-outline-warning btn-sm'>Modificar</a>
                                <a href='Borrar_Viajes.php?id_aventura=" . $fila['id_aventura'] . "' class='btn btn-outline-danger btn-sm'>Borrar</a></td>
                            </tr>   
                        ";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No se encontraron ofertas.";
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
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Oferta.php?id_oferta=" . $fila['id_oferta'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre del viaje </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='pais'>Modifica el nombre del pais </label> 
                                    <input  type='text' class='form-control' id='pais' name='pais' placeholder='". $fila["pais"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='descripcion'>Modifica la descripcion de la oferta </label> 
                                    <textarea class='form-control' name='descripcion' id='descripcion' rows='3'>". $fila["descripcion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='actividad'>Modifica las actividades de la oferta </label> 
                                    <textarea class='form-control' name='actividad' id='actividad' rows='2'>". $fila["actividad"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion de la oferta </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='4'>". $fila["informacion"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del pais </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }

        // Funcion para modificar los datos del hotel
            public function formularioHoteles($id_hotel){
                $id_oferta = $_GET["id_hotel"];
                $sql = "SELECT id_hotel, nombre, ciudad, estrellas, servicios, precio, historia, servicio, ubicacion FROM hotel WHERE id_hotel = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_hotel);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Hotel.php?id_hotel=" . $fila['id_hotel'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre del hotel </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='ciudad'>Modifica la ciudad del hotel </label> 
                                    <input  type='text' class='form-control' id='ciudad' name='ciudad' placeholder='". $fila["ciudad"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='estrellas'>Modifica la ciudad del hotel </label> 
                                    <input type='number' class='form-control' id='estrellas' name='estrellas' placeholder='". $fila["estrellas"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='servicios'>Modifica los servicios del hotel </label> 
                                    <textarea class='form-control' name='servicios' id='servicios' rows='2'>". $fila["servicios"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del hotel </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='historia'>Modifica la historia del hotel </label> 
                                    <textarea class='form-control' name='historia' id='historia' rows='5'>". $fila["historia"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='servicio'>Modifica los servicios del hotel </label> 
                                    <textarea class='form-control' name='servicio' id='servicio' rows='5'>". $fila["servicio"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='ubicacion'>Modifica la ubicacion del hotel </label> 
                                    <textarea class='form-control' name='ubicacion' id='ubicacion' rows='5'>". $fila["ubicacion"] ."</textarea>
                                </div>

                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }
        
        // Funcion para modificar los datos de la ciudad
            public function formularioCiudades($id_ciudad){
                $id_oferta = $_GET["id_ciudad"];
                $sql = "SELECT id_ciudad, nombre, pais, descripcion, transporte, informacion, precio FROM ciudad WHERE id_ciudad = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_ciudad);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Ciudad.php?id_ciudad=" . $fila['id_ciudad'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre de la ciudad </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='pais'>Modifica el nombre del pais </label> 
                                    <input  type='text' class='form-control' id='pais' name='pais' placeholder='". $fila["pais"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='descripcion'>Modifica la descripcion de la ciudad </label> 
                                    <textarea class='form-control' name='descripcion' id='descripcion' rows='2'>". $fila["descripcion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='transporte'>Modifica los transportes de la ciudad </label> 
                                    <textarea class='form-control' name='transporte' id='transporte' rows='2'>". $fila["transporte"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion de la ciudad </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='2'>". $fila["informacion"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del viaje </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div>
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }
        
        // Funcion para modificar los datos de la playa
            public function formularioPlayas($id_playa){
                $id_oferta = $_GET["id_playa"];
                $sql = "SELECT id_playa, nombre, pais, descripcion, actividad, informacion, precio FROM playa WHERE id_playa = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_playa);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Playa.php?id_playa=" . $fila['id_playa'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre de la playa </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='pais'>Modifica el nombre del pais </label> 
                                    <input  type='text' class='form-control' id='pais' name='pais' placeholder='". $fila["pais"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='descripcion'>Modifica la descripcion de la playa </label> 
                                    <textarea class='form-control' name='descripcion' id='descripcion' rows='3'>". $fila["descripcion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='actividad'>Modifica las actividades de la playa </label> 
                                    <textarea class='form-control' name='actividad' id='actividad' rows='2'>". $fila["actividad"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion de la playa </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='2'>". $fila["informacion"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del viaje </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }

        // Funcion para modificar los datos del crucero
            public function formularioCrucero($id_crucero){
                $id_oferta = $_GET["id_crucero"];
                $sql = "SELECT id_crucero, nombre, salida, descripcion, actividad, informacion, precio FROM crucero WHERE id_crucero = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_crucero);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Crucero.php?id_crucero=" . $fila['id_crucero'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre del crucero </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='salida'>Modifica la salida del crucero </label> 
                                    <input  type='text' class='form-control' id='salida' name='salida' placeholder='". $fila["salida"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='descripcion'>Modifica la descripcion del crucero </label> 
                                    <textarea class='form-control' name='descripcion' id='descripcion' rows='3'>". $fila["descripcion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='actividad'>Modifica las actividades del crucero </label> 
                                    <textarea class='form-control' name='actividad' id='actividad' rows='2'>". $fila["actividad"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion del crucero </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='4'>". $fila["informacion"] ."</textarea>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del viaje </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }

        // Funcion para modificar los datos del museo
            public function formularioCultural($id_cultura){
                $id_oferta = $_GET["id_cultura"];
                $sql = "SELECT id_cultura, nombre, ubicacion, descripcion, informacion, precio FROM cultural WHERE id_cultura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_cultura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Cultural.php?id_cultura=" . $fila['id_cultura'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre del museo </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='ubicacion'>Modifica la ubicacion del museo </label> 
                                    <input  type='text' class='form-control' id='ubicacion' name='ubicacion' placeholder='". $fila["ubicacion"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='descripcion'>Modifica la descripcion del museo </label> 
                                    <textarea class='form-control' name='descripcion' id='descripcion' rows='3'>". $fila["descripcion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion del museo </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='4'>". $fila["informacion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del museo </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
            }

        // Funcion para modificar los datos de las aventuras
            public function formularioAventura($id_aventura){
                $id_oferta = $_GET["id_aventura"];
                $sql = "SELECT id_aventura, nombre, ubicacion, actividades, nivel, informacion, precio FROM aventura WHERE id_aventura = :id";
                $resultado = $this->conex->prepare($sql);
                $resultado->bindParam(':id', $id_aventura);
                $resultado->execute();
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                if($resultado->rowCount() > 0){
                    while ($fila = $resultado->fetch()){
                        echo "
                            <form method='post' action='Modificar_Aventura.php?id_aventura=" . $fila['id_aventura'] . "' enctype='multipart/form-data'>
                                <div class='form-group mt-4'>
                                    <label for='nombre'>Modifica el nombre de la aventura </label> 
                                    <input  type='text' class='form-control' id='nombre' name='nombre' placeholder='". $fila["nombre"] ."'  required>
                                </div>

                                <div class='form-group mt-4'>
                                    <label for='ubicacion'>Modifica la ubicacion de la aventura </label> 
                                    <input  type='text' class='form-control' id='ubicacion' name='ubicacion' placeholder='". $fila["ubicacion"] ."'  required>
                                </div> 


                                <div class='form-group mt-4'>
                                    <label for='actividades'>Modifica la actividades de la aventura </label> 
                                    <textarea class='form-control' name='actividades' id='actividades' rows='2'>". $fila["actividades"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='nivel'>Modifica el nivel de la aventura </label> 
                                    <input  type='text' class='form-control' id='nivel' name='nivel' placeholder='". $fila["nivel"] ."'  required>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='informacion'>Modifica la informacion de la aventura </label> 
                                    <textarea class='form-control' name='informacion' id='informacion' rows='4'>". $fila["informacion"] ."</textarea>
                                </div> 

                                <div class='form-group mt-4'>
                                    <label for='precio'>Modifica el precio del viaje </label> 
                                    <input  type='number' class='form-control' id='precio' name='precio' placeholder='". $fila["precio"] ."'  required>
                                </div> 
                                
                                <div class='mt-4'>
                                    <button type='submit' class='btn btn-outline-dark'>Modificar</button>
                                </div>
                            </form> 
                        ";
                    }
                }
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
    }