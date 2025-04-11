<?php
 $urlContents = file_get_contents("https://api.arasaac.org/v1/pictograms/all/an");
   if(!$urlContents){
    $error = "no hemos encontrado el archivo";
  }else{
        $error = "todo ok";
        $array = json_decode($urlContents, true);
        echo $error;

/*        echo "<pre>";
        print_r($array);
        echo "</pre>";
 */       
    echo "<div style='display: flex; flex-wrap: wrap;'>"; // Contenedor para mostrar las imágenes en filas
    foreach ($array as $pictogram) {
        if (isset($pictogram['_id'])) {
            $imageId = $pictogram['_id'];
            $categories = $pictogram['categories'][0] ?? []; // Obtener categorías, si existen
            // Construir la URL de la imagen
            $imageUrl = "https://api.arasaac.org/api/pictograms/$imageId?download=false";
            // Mostrar la imagen
            echo "<div style='margin: 10px; text-align: center;'>";
            echo "<img src='$imageUrl' alt='Pictograma $imageId' style='width:150px; height:150px;'>";
            echo "<p>$categories </p>";
            echo "</div>";
        }
    }
    echo "</div>";
}