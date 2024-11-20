<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    session_start() ;
    if(!empty($_SESSION)) die(header("location: main.php")) ;

    $visible = "d-none" ;

    if (!empty($_POST)):
        
        # comprobar si existe el usuario en la base de datos

        # 1. establecemos una conexión con el servidor de base de datos y seleccionamos
        #    la base de datos que queremos utilizar.
        #
        # new mysqli(host, usuario, clave [, base_datos [, puerto]]) ;        
        #$db = new mysqli("db", "root", "") ;

        # seleccionar la base de datos con la que quiero trabajar (use mibd)
        #$db->select_db("mibd") ;   

        # 2. establecemos una conexión con el servidor de base de datos gestionando
        #    una posible excepción en la conexión.

        try {
            $sqli = new mysqli("db", "root", "", "mibd") ;            
        } catch(mysqli_sql_exception $excepcion) {
            die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>") ;
        }

        # buscamos el usuario en la base de datos
        $email = $sqli->real_escape_string($_POST["email"]) ;
        $clave = $sqli->real_escape_string($_POST["clave"]) ;
        $sql = "SELECT email, nombre, apellido, foto FROM usuario WHERE email = '{$email}' AND clave = '{$clave}' ;" ;        
        //echo $sql ;        

        # lanzamos la consulta
        $result = $sqli->query($sql) ;
    
        # comprobamos si hemos encontrado el usuario
        if ($result->num_rows > 0):

            # recuperamos el usuario
            require_once "./clases/Usuario.php" ;
            $usuario = $result->fetch_object("Usuario") ; 
            
            # cerrar la conexión con la base de datos
            $sqli->close() ;

            # guardamos los datos de usuario en la sesión
            $_SESSION["_tiempo"]  = time() + 300 ;
            $_SESSION["_usuario"] = serialize($usuario) ;

            # redirigimos a la página principal
            die(header("location: main.php")) ;            
        else:
            echo "No he encontrado el usuario<br/>" ;
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
                                   value="vazema3@wisc.edu"
                                   autofocus required />
                        </div>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control" type="password" name="clave" 
                                   value="12345678"
                                   required  />
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
