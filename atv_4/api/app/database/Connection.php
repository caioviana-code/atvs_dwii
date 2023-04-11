<?php

    namespace app\database;

    use PDO;

    use PDOException;

    class Connection {

        private static $pdo = null;

        public static function connection() {

            if(static::$pdo) {

                return static::$pdo;
            }

            try {

                $str_conn = "mysql:host=127.0.0.1;dbname=dwii";

                static::$pdo = new PDO($str_conn, 'root', '',[

                    // Erros gerados pelo PDO serão do tipo Exception
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    // Retorno dos dados vindos do BD serão no formato de objeto
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    
                    // Trabalhar com a condificação de caracteres UTF8
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]);

                return static::$pdo;

            } catch(PDOException $e) {

                var_dump($e->getMessage());
            }    
        }
    }
