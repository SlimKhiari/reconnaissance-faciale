<?php

    class Database {

        private static $db = 'mysql';
        private static $host = 'localhost';
        private static $db_name = 'pif';
        private static $username = 'root';
        private static $password = '17981562';

        private static $dsn = '';

        public static function getConnection(): PDO {

            self::$dsn = self::$db .':host='. self::$host .';dbname='. self::$db_name;

            $pdo = new PDO(self::$dsn, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        }

    }

?>
