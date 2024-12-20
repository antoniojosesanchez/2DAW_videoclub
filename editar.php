<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez    
     */

    session_start() ;    
    
    if ((empty($_SESSION)) || 
        (time() >= $_SESSION["_tiempo"])):            
            $_SESSION = [] ;
            die(header("location: http://localhost:8080/2DAW_videoclub/")) ;    # mejor redirigir al logout
    endif ;

    # actualizamos el tiempo de sesion
    $_SESSION["_tiempo"] = time() + 3000 ;

    # importamos librerías
    require_once "./clases/Database.php" ;
    require_once "./clases/Plataforma.php" ;
    require_once "./clases/Pelicula.php" ;

    # recupero la película
    if (isset($_GET["id"])):

        # recuperamos la base de datos
        $db = Database::iniciar() ;

        # recuperamos la película
        $pelicula = $db->preparar("SELECT titulo, poster, argumento FROM pelicula WHERE idPel = :idpel ;")
                       ->consulta([":idpel" => $_GET["id"]])
                       ->recuperarRegistro("Pelicula") ;

        # recuperamos las plataformas
        $db->preparar("SELECT P.idPla FROM plataforma P
                       JOIN plataforma_pelicula PP ON (PP.idPla = P.idPla)
                       WHERE PP.idPel=:idpel ;")
            ->consulta([":idpel" => $_GET["id"]]) ;

        # agrupamos las plataformas     
        $plataformas = array_map(function($item) { return $item[0] ; }, $db->recuperarTodo()) ;

    endif ;

    # definimos el token (evita ataques csrf)
    $_SESSION["_token"] = md5(time()) ;
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Videoclub</title>

    <link href="./assets/css/videoclub.css" rel="stylesheet" />

    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/videoclub.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    

</head>
<body>

    <div class="container mt-4">

        <form name="crear.php" method="post">

            <input type="hidden" name="_token" value="<?= $_SESSION["_token"] ?>" />

            <!-- -->
            <div class="row">
                <div class="col">
                    <label for="titulo">Título de la película: </label>
                    <input id="titulo" class="form-control" 
                           type="text" name="titulo" value="<?= $pelicula->titulo ?>"
                           required />
                </div>
            </div>

            <!-- -->
            <div class="row">
                <div class="col">
                    <label for="poster">Poster de la película: </label>
                    <input id="poster" class="form-control" 
                           type="text" name="poster" value="<?= $pelicula->poster ?>" />
                </div>
            </div>

            <!-- -->
            <div class="row">

                <div class="col-sm-8">
                    <label for="argumento">Argumento:</label>
                    <textarea id="argumento" class="form-control" 
                              name="argumento" rows="7" required><?= $pelicula->argumento ?></textarea>
                </div>

                <div class="col">
                    <label for="plat">Plataforma: </label>
                    <select id="plat" class="form-control" name="plat[]" size="8" required multiple>                        
                    <?php
                        $db = Database::iniciar() ;
                        $db->preparar("SELECT * FROM plataforma ;")
                           ->consulta() ;
                        
                        $item = $db->recuperarRegistro("Plataforma") ;                        

                        while($item):
                            # comprobamos si la plataforma está asociada a la película
                            $selected = in_array($item->getId(), $plataformas)?"selected":"" ;

                            # mostramos la opción correspondiente
                            echo "<option value=\"{$item->getId()}\" {$selected}>{$item->getNombre()}</option>" ;                
                            $item = $db->recuperarRegistro("Plataforma") ;
                        endwhile ;

                        $db->cerrarConsulta() ;
                    ?>
                    </select>
                </div> <!-- end-col select -->
            </div> <!-- end row -->

            <div class="row"> 
                <div class="col">
                    <button class="btn btn-dark w-25 m-2">Guardar</button>
                    <a class="btn btn-danger w-25 m-2" href="main.php">Cancelar</a>
                    <!--<button type="button" class="btn btn-danger" onclick="history.back() ;">Cancelar</button>-->
                    
                </div>
            </div>

        </form>

    </div>

</body>
</html>