<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    class Usuario {

        private string $email ;
        private string $clave ;     # la ponemos temporalmente pero NO SE DEBE HACER

        private string $nombre ;
        private string $apellidos ;

        /**         
         * @param string $email
         * @param string $clave
         * @param string $nombre
         * @param string $apellidos
         */
        public function __construct(string $email, string $clave, string $nombre, string $apellidos) { 

            $this->email     = $email ;
            $this->clave     = $clave ;
            $this->nombre    = $nombre ;
            $this->apellidos = $apellidos ;
        }

        /**         
         * @param string $email
         * @param string $clave
         * @return void
         */
        public function login(string $email, string $clave): bool {
            return (($this->email == $email) && ($this->clave == $clave)) ;            
        }

        /**
         * @return string
         */
        public function __toString(): string {
            return "{$this->nombre} {$this->apellidos}" ;
        }

    }