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

    # constantes
    define("DUMMY", "https://dummyimage.com/250x250.png/000000/ffffff&text=videoclub") ;
    define("MAX_ITEMS", 6) ;
    
    # actualizamos el tiempo de sesion
    $_SESSION["_tiempo"] = time() + 300;

    # recuperamos la página actual
    $pagina = $_GET["pagina"]??1 ;

    try {
        $pdo = new PDO("mysql:host=db;dbname=mibd;charset=utf8mb4", "root", "") ;
    } catch(PDOException $exception) {
        die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>") ;
    }

    # recuperamos el usuario de la sesión.
    require_once "../clases/Usuario.php" ;
    $usuario = unserialize($_SESSION["_usuario"]) ;

    # obtenemos el total de páginas    
    $ini = ($pagina - 1) * MAX_ITEMS  ;
    $fin = MAX_ITEMS ;

    # recuperamos las películas
    $sql = "SELECT pelicula.*, plataforma.nombre as plataforma FROM pelicula
            JOIN plataforma_pelicula PP ON (pelicula.idPel = PP.idPel)
            JOIN plataforma ON (PP.idPla = plataforma.idPla)
            JOIN plataforma_usuario PU ON (plataforma.idPla = PU.idPla)
            JOIN usuario ON (PU.idUsu = usuario.idUsu)
            WHERE usuario.email = :email 
            LIMIT $ini, $fin ;" ;
   
    //die($sql) ;

    $sqlp = $pdo->prepare($sql) ;
    $sqlp->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR) ;
    $sqlp->execute() ;
    
    // Mostramos las películas
    while($objeto = $sqlp->fetchObject()):
    ?>
        <div class="card shadow-sm m-2" style="width:22rem;">
            <img class="card-img-top" src="<?= $objeto->poster??DUMMY ?>" />
            <div class="card-body text-center">
                <div class="card-title m-2"><h4><?= $objeto->titulo ?></h4></div>                    
                <h6><?= $objeto->plataforma ?></h6>
                <div class="estrellas text-center">
                    <?php 
                        // dibujamos las estrellas
                        for($i=1; $i<=5;$i++) echo ($i <= $objeto->nota)?"⭐":"✰" ;
                    ?>                            
                </div>
                <a class="btn btn-sm btn-primary mt-4" href="info.php?id=<?= $objeto->idPel ?>">Ver información</a>
            </div>
        </div>
    <?php
        endwhile ;

        # cerramos la conexión PDO
        $pdo = null ;
    
    ?>