<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    class Plataforma {

        private int $idPla ;
        private String $nombre ;
        private ?String $enlace ;

        public function __construct() { }

        /**
         * @return integer
         */
        public function getId(): int { return $this->idPla ; }

        /**
         * @return string
         */
        public function getNombre(): string { return $this->nombre ; }
    }