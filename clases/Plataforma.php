<?php


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