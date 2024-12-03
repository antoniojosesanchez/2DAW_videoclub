<?php

  /**
   * Desarrollo web en Entorno Servidor
   * curso 2024|25
   * 
   * @author Antonio J. Sánchez
   */

  // iniciamos el objeto CURL
  $curl = curl_init() ;

  // configuramos el objeto CURL
  curl_setopt_array($curl, [

    // endpoint de la API al que queremos acceder
    CURLOPT_URL            => "https://api.themoviedb.org/3/movie/now_playing?language=es-ES&page=1", 

    // tipo de protocolo (definido en la API para cada endpoint)
    CURLOPT_CUSTOMREQUEST  => "GET",

    // hace que devuelva el resultado y no lo imprima en pantalla directamente
    CURLOPT_RETURNTRANSFER => true,    

    // especifica el tipo de versión (la API debe indicar cuál)
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,

    // tiempo de espera (en segundos) para obtener una respuesta
    CURLOPT_TIMEOUT        => 30,    

    // opciones a añadir a la cabecera HTTP
    CURLOPT_HTTPHEADER     => [      

      // código de autorización  de acceso a la API
      "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2NzU4ZTRiNjI4Y2E1ZjZlMWI4ZDY5Y2U1Y2I2ZTZiOCIsIm5iZiI6MTUzOTE5MjU0Ni43MzUwMDAxLCJzdWIiOiI1YmJlMzZlMmMzYTM2ODU4ZjUwM2FiMTkiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.n1mFd7UL4_n01_5cNhDagOzGHKLwhh_ib2W6tv5w3ME",

      // tipo de información que esperamos recibir (también lo define la API)
      "accept: application/json",
    ],

  ]) ;

  // ejecutamos la petición a la API
  $response = curl_exec($curl) ;

  // obtenemos información sobre un posible error
  $error    = curl_error($curl) ;


  if ($error) {
    // si hay error mostramos un mensaje
    echo "Se ha producido un error $error<br/>" ;
  } else {

    // recuperamos la información y la decodificamos para obtener una 
    // estructura PHP que podamos manejar.
    $data = json_decode($response) ;

    // definimos constante para la ruta a las imágenes
    define("RUTA_IMAGENES", "https://image.tmdb.org/t/p/original") ;

    // añadimos las películas a la base de datos
    require_once "./clases/Database.php" ;

    $db = Database::iniciar() ;
    $sql_pelicula = "INSERT INTO pelicula(titulo, nota, poster, argumento) 
                     VALUES (:titulo, :nota, :poster, :argumento) ;" ;

    //$sql_plataforma = "INSERT INTO () VALUES () ;" ;
 
    foreach($data->results as $item):

      // insertamos la película
      $db->consulta($sql_pelicula, 
                          [":titulo"    => $item->original_title, 
                           ":nota"      => $item->vote_average, 
                           ":poster"    => RUTA_IMAGENES.$item->poster_path, 
                           ":argumento" => $item->overview])
          ->cerrarConsulta() ;

      // insertamos la/s relación/es con las plataformas

      
      echo "Se ha insertado {$item->original_title}<br/>" ;

    endforeach ;

    echo "ID de la última película añadida: ".$db->cerrarConsulta()->ultimoId()."<br/>" ;
    
    


    echo "<pre>".print_r($data, true)."</pre>" ;
  }


  curl_close($curl) ;

