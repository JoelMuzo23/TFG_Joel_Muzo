<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../estilos/Reservados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Viajes Reservados</title>
</head>

<body>
  
    <?php
        require_once("../../../includes/header.php");
    ?>

  <?php
  /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start(); 
    if(isset($_SESSION["nombre"])){
  ?>

  <!-- 
      Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo y despues una lista mostrando las diferentes categorias, una vez le
      de mostrara la lista de los viajes que se haya seleccionado
     -->
     <div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Menú de Categorías</h2>
            <select class="form-select" id="select-categorias">
                <option value="">Selecciona una categoría</option>
                <option value="Ofertas">Ofertas</option>
                <option value="Hoteles">Hoteles</option>
                <option value="Ciudades">Ciudades</option>
                <option value="Playas">Playas</option>
                <option value="Espaciales">Espaciales</option>
                <option value="Crucero">Crucero</option>
                <option value="Cultural">Cultural</option>
                <option value="Aventuras">Aventuras</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>Lista de Viajes</h2>
            <div class="table-responsive" id="tabla-viajes">
                <p>Selecciona una categoría para ver los viajes reservados</p>
            </div> 
        </div>
    </div>
</div>

    <?php  
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
      }else{
        echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                  Acceso no autorizado. <br> 
                  <a href='../../Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                </div>";
      }
    ?>

    <?php
        require_once("../../../includes/footer.php");
        require_once("../../../scripts/script_reservados.php");
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>