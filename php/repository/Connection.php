<?php
    class Connection extends PDO {

        const HOSTNAME = "ec2-52-71-69-66.compute-1.amazonaws.com";
        const USERNAME = "wdchedzxtiwerx";
        const PASSWORD = "b7852def03f8658d9759d42dd459a0be33eac32b2d308ab3eea2b826f34180da";
        const SCHEMA = "daepfhb82m6k89";
        const PORT = 5432;

        private $conn;

        # magic method
        public function __construct() {
            $key = "strval";
            $dsn = "pgsql:host={$key(self::HOSTNAME)};dbname={$key(self::SCHEMA)};port={$key(self::PORT)}";
            $this->conn = new PDO($dsn, self::USERNAME, self::PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        }

        public function getConnection() {
            $this->conn->query("SET timezone TO 'America/Sao_Paulo'");
            return $this->conn;
        }
    } 