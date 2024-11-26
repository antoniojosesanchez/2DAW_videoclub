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

    define("DUMMY", "https://dummyimage.com/250x250.png/000000/ffffff&text=videoclub") ;
    
    # actualizamos el tiempo de sesion
    $_SESSION["_tiempo"] = time() + 300;
    
    # definimos el token (evita ataques csrf)
    $_SESSION["_token"] = md5(time()) ;

    require_once "./clases/Pelicula.php" ;
    require_once "./libs/info.php" ;
     
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

    <div class="container"> 
       
        <?php require_once "./libs/menu.php" ; ?>

        <!-- buscamos y mostramos información de la película -->
        <?php

            try {
                $pdo = new PDO("mysql:host=db;dbname=mibd;charset=utf8mb4", "root", "") ;
            } catch(PDOException $excepcion) {
                die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>") ;
            }

            # construimos la sentencia sql
            $sql = "SELECT titulo, poster, nota, argumento FROM pelicula WHERE idPel=:id ;" ;

            # preparamos la consulta
            $sqlp = $pdo->prepare($sql) ;

            # asociamos los valores 
            $sqlp->bindValue(":id", $_GET["id"]) ;

            # lanzamos la consulta
            $sqlp->execute() ;

            # recuperamos el resultado
            $pelicula = $sqlp->fetchObject("Pelicula") ;

            //echo "<pre>".print_r($pelicula, true)."</pre>" ;            
        ?>

        <div class="card shadow m-4">            
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= $pelicula->poster??DUMMY ?>" />
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col"><h2><?= $pelicula->titulo ?></h2></div>
                            
                            <!-- estrellas -->
                            <form id="estrellas" action="modificar-score.php" method="post">
                                <input type="hidden" name="id" value="<?= $_GET["id"] ?>" />
                                <div class="estrellas">
                                    <input type="radio" name="rating" id="rating-5" value="5" <?= ($pelicula->nota==5)?"checked":"" ?>>
                                    <label for="rating-5">&#9733;</label>
                                    <input type="radio" name="rating" id="rating-4" value="4"  <?= ($pelicula->nota==4)?"checked":"" ?>>
                                    <label for="rating-4">&#9733;</label>
                                    <input type="radio" name="rating" id="rating-3" value="3"  <?= ($pelicula->nota==3)?"checked":"" ?>>
                                    <label for="rating-3">&#9733;</label>
                                    <input type="radio" name="rating" id="rating-2" value="2"  <?= ($pelicula->nota==2)?"checked":"" ?>>
                                    <label for="rating-2">&#9733;</label>
                                    <input type="radio" name="rating" id="rating-1" value="1"  <?= ($pelicula->nota==1)?"checked":"" ?>>
                                    <label for="rating-1">&#9733;</label>
                                </div>
                            </form>
                        </div>

                        <div class="row mt-4">
                            <div class="col"><?= $pelicula->argumento ?></div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Borrar</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

    </div>

</body>
</html>