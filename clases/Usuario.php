<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    class Usuario {

        #private int $idUsu ;        
        #private string $clave ;     # la ponemos temporalmente pero NO SE DEBE HACER

        private  string $email ;
        private  string $nombre ; 
        private  string $apellido ; 
        private ?string $foto = null ;

        public function __construct() { }                

        # Patrón Singleton
        # Patrón Fabric
      
        public static function createFromEmail(string $email): Usuario {
            return new Usuario() ;
        }

        public static function createFromEmailAndName(string $email, string $nombre): Usuario {
            $usuario = new Usuario() ;
            $usuario->setEmail($email)->setNombre($nombre) ;
            return $usuario ;
        }

        public function setEmail(string $email) {
            $this->email = $email ;
            return $this ;
        }

        public function setNombre(string $nombre) {
            $this->nombre = $nombre ;
            return $this ;
        }

        /**
         * @return string
         */
        public function getEmail(): string {
            return $this->email ;
        }

        /**
         * @return string
         */
        public function getFoto(): string {
            return $this->foto ;
        }

        /**         
         * @param string $email
         * @param string $clave
         * @param string $nombre
         * @param string $apellidos
         */
        /*public function __construct(public  string $email,  
                                    public  string $nombre, 
                                    public  string $apellido, 
                                    public ?string $foto = null) { }*/

        /**
         * @return string
         */
        public function __toString(): string {
            return "{$this->nombre} {$this->apellido}" ;
        }
    }