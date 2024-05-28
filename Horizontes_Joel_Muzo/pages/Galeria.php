<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/css_galeria.css">
    <title>Galería de Imágenes</title>
</head>
<body>

      <?php
        require_once("../includes/header.php");
      ?>

    <!--
      Debajo de la barra de navegacion se mostrar un texto descriptivo y despues se mostrara una serie de imagenes con un texto mostrando
      el nombre de la ciudad. 
    -->
    <div class="container mt-4">
      <h1 class="text-center mb-5">"Explora Nuestro Mundo: Galería de Imágenes"</h1>
      <div class="gallery">

          <div class="gallery-item">
            <img src="https://www.clarin.com/2023/11/08/3HJ-Xh2sm_2000x1500__1.jpg" alt="">
            <div class="gallery-text">
                New York
            </div>
          </div>

          <div class="gallery-item">
            <img src="https://www.franciaturismo.net/es/wp-content/uploads/sites/17/paris-louvre-piramide-hd.jpg" alt="">
              <div class="gallery-text">
                Museo Louvre - Francia 
              </div>
          </div>
          <div class="gallery-item">
              <img src="https://plus.unsplash.com/premium_photo-1680582107403-04dfac02efc3?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZWRpZmljaW8lMjBkZSUyMGxhJTIwY2l1ZGFkJTIwNGslMjBmb25kbyUyMGRlJTIwcGFudGFsbGF8ZW58MHx8MHx8fDA%3D" alt="">
              <div class="gallery-text">
                  San Francisco
              </div>
          </div>
          <div class="gallery-item">
              <img src="https://images6.alphacoders.com/995/995889.jpg" alt="">
              <div class="gallery-text">
                  Singapore
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://www.viajestravelstore.com/archivos/imagenes/202307/petra-grandvoyage-01.jpg" alt="">
            <div class="gallery-text">
              Santuario de Petra - Jordania
            </div>
        </div>
        
          <div class="gallery-item">
            <img src="https://wallpapers.com/images/hd/new-york-street-bxwednq870vzgc6m.jpg" alt="">
              <div class="gallery-text">
                Times Square
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://humanidades.com/wp-content/uploads/2019/02/Buenos-aires-2-e1585704113704-800x416.jpg" alt="">
              <div class="gallery-text">
                Buenos Aires - Argentina
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://content3.cdnprado.net/imagenes/Documentos/imgsem/e8/e8dd/e8dd78ef-27f6-4cbc-af36-1054f92aaaac/a9a15aab-6bbb-6882-6be8-cda7b70dbc8e.jpg" alt="">
            <div class="gallery-text">
                Museo del prado
            </div>
        </div>

          <div class="gallery-item">
            <img src="https://viajes.nationalgeographic.com.es/medio/2023/05/02/table-mountain_0c9679bd_1585258312_230502130312_1000x667.jpg" alt="">
              <div class="gallery-text">
                Ciudad del Cabo - Sudafrica 
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://a.travel-assets.com/findyours-php/viewfinder/images/res70/511000/511218-queensland.jpg" alt="">
              <div class="gallery-text">
                Gold Coast - Australia 
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://a2.typepad.com/6a017c37f232ff970b01a73d7a0d62970d-pi" alt="">
              <div class="gallery-text">
                Gran Barrera de Coral - Australia 
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://happygringo.com/wp-content/uploads/2021/05/camila-cruise-in-the-ocean-at-galapagos-islands-ecuador-.jpg" alt="">
              <div class="gallery-text">
                Crucero islas galápagos
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://static.eldiario.es/clip/27d13b63-82d3-4955-b670-66aeff150d97_16-9-discover-aspect-ratio_default_0.jpg" alt="">
              <div class="gallery-text">
                Piramides de Giza - Egipto
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://media.admagazine.com/photos/618a5d9ab94700461d620f54/3:2/w_2250,h_1500,c_limit/93377.jpg" alt="">
              <div class="gallery-text">
                Museo Metropolitano de Arte - Estados Unidos
              </div>
          </div>

          <div class="gallery-item">
            <img src="https://i.blogs.es/3a5835/fhskvloj1ge/1366_2000.jpg" alt="">
              <div class="gallery-text">
                Paracaidismo en Dubái - Emiratos Árabes Unidos
              </div>
          </div>
      </div>
    </div>

    <?php
        require_once("../includes/footer.php");
    ?>
</body>
</html>
