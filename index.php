<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    $visible = "d-none" ;

    if (!empty($_POST)):
        
        require_once "./libs/datos_usuarios.php" ;

        # buscamos si existe un usuario que coincida con el que se nos ha introducido
        $i = 0 ;
        #$encontrado = false ;
        while(($i < count($usuarios)) && 
              (!$usuarios[$i]->login($_POST["email"], $_POST["clave"]))) $i++ ;
            #$encontrado = $usuarios[$i]->login($_POST["email"], $_POST["clave"]) ;
            #$i++ ;
        #endwhile ;

        #echo $encontrado?"Se ha encontrado el usuario.":"Email o contraseña incorrecta." ;                 

        # si hemos encontrado al usuario redirigimos y matamos el proceso PHP.
        if ($i < count($usuarios)): 
            session_start() ;
            $_SESSION["_usuario"] = serialize($usuarios[$i]) ;
            die(header("location: buscar.php")) ;
        endif ;

        # si no hemos encontrado el usuario, mostramos el formulario de login con un mensaje de error
        # que el div se modifique            
        $visible = "" ;
                        
    endif ;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    

</head>
<body>
    
    <div class="container">
        <div class="card mt-4 mx-auto" style="width: 18rem;">

            <h1 class="card-title text-center">Videoclub</h1>
            <div class="card-body">

                <form action="index.php" method="post">

                    <!-- EMAIL -->
                    <div class="row">
                        <div class="col">
                            <input class="form-control" type="text" name="email" placeholder="email@videoclub.com"
                                   autofocus required />
                        </div>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control" type="password" name="clave" required  />
                        </div>
                    </div>

                    <div class="alert alert-danger mt-2 <?= $visible ?>">
                        Usuario o contraseña incorecta
                    </div>                    

                    <div class="row mt-2">
                        <div class="col">
                            <button class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end-card-body -->

        </div>  <!-- end-card -->

    </div>  <!-- end-container -->

</body>
</html>
