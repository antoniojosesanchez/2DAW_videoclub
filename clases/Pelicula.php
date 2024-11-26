<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    class Pelicula {

        #private int $idPel ;
        public string $titulo ; 
        public ?string $poster ;                                    
        public float  $nota ;
        public string $argumento ;

        public function __construct() { }

        /**         
         * @return string
         */
        public function __toString(): string {

            return " <div class=\"item\">
                        <img src=\"{$this->poster}\" />
                        <h2>{$this->titulo}</h2>
                        <h5>{$this->nota}</h5>
                        <p>{$this->argumento}</p>
                        <p><a href=\"borrar.php?id=2&token={$_SESSION["_token"]}\" class=\"btn btn-danger\">Borrar</a> <a href=\"editar.php\" class=\"btn btn-primary\">Editar</a></p>
                    </div>" ;
        }

    }
    