<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    try {
        $pdo = new PDO("mysql:host=db;dbname=mibd;charset=utf8mb4", "root", "") ;
    } catch(PDOException $excepcion) {
        die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>") ;
    }

    # construimos la sentencia sql
    $sql = "UPDATE pelicula SET nota=:nota WHERE idPel=:id" ;

     # preparamos la consulta
     $sqlp = $pdo->prepare($sql) ;

     # asociamos los valores 
     $sqlp->bindValue(":nota", $_POST["rating"]) ;
     $sqlp->bindValue(":id", $_POST["id"]) ;

     # ejecutamos
     $sqlp->execute() ;

    #
    header("location: info.php?id={$_POST["id"]}") ;



