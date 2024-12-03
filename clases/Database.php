<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    class Database {

        const HOST       = "db" ;
        const USER       = "root" ;
        const CLAVE      = "" ;
        const DB_NAME    = "mibd" ;        
        
        private static ?Database $instancia = null ;   
        private ?PDOStatement $sqlp = null ;
        private PDO $pdo ;  
        
        private function __clone() {}

        /**  
         * Creamos la conexión a la base de datos      
         */
        private function __construct() {

            try {
                $this->pdo = new PDO("mysql:host=". self::HOST .";dbname=". self::DB_NAME.";charset=utf8mb4", self::USER, self::CLAVE) ;
            } catch(PDOException $excepcion) {
                die("**Se ha producido un error de conexión con la base de datos.") ;
            }
        }

        /**
         * Cerramos la conexión al motor de bases de datos
         *
         * @return void
         */
        public function __destroy() {
            $this->pdo = null ;
        }

        /**
         * Prepara la consulta y la ejecuta
         * @param String $sql
         * @param array $params
         * @return object
         */
        public function consulta(String $sql, array $params=[]):Database {
            
            // preparamos la consulta
            if ($this->sqlp==null) $this->sqlp = $this->pdo->prepare($sql) ;

            // vincular los parámetros especialmente si vamos a añadir restricciones
            // de tipo y tamaño.
            //foreach($params as $clave => $valor) $sqlp->bindValue($clave, $valor) ;
            
            // lanzamos la consulta
            $this->sqlp->execute($params) ;

            // devolvemos el mismo objeto
            return $this ;

        }

        /**
         * Recupera un registro del conjunto de resultado
         * @param String $clase
         * @return object
         */
        public function recuperarRegistro(String $clase = "StdClass"):object|false {
            try {
                return $this->sqlp->fetchObject($clase) ;
            } catch(Exception $excepcion) {
                die("**Se ha producido un error recuperando un valor de la base de datos.") ;
            }
        }

        /**
         * Devuelve el ID de la última inserción realizada    
         * @return integer
         */
        public function ultimoId(): int {
            return $this->pdo->lastInsertId() ;
        }

        /**
         * Cerramos el cursor e inicializamos la propiedad 
         * PDOStatement
         */
        public function cerrarConsulta() {
            $this->sqlp->closeCursor() ;
            return $this ;
            //$this->sqlp = null ;
        }

        /**
         * Crea, si no existe ya, una instancia de la clase DATABASE
         * y la devuelve.
         * @return ?Database
         */
        public static function iniciar():?Database {
            if (self::$instancia == null) self::$instancia = new Database ;
            return self::$instancia ;
        }
    }     