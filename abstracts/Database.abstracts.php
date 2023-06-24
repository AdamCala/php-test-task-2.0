<?php

    namespace abstracts;

    use mysqli;

    // * require config file with db credentials
    require_once 'config.php';

    abstract class Database{
        
        private $db_host;
        private $db_username;
        private $db_password;
        private $db_name;
        public $databaseConnection;

        // * assign credentials from config file to class properties
        function __construct(){
            $this->db_host = DB_HOST;
            $this->db_username = DB_USERNAME;
            $this->db_password = DB_PASSWORD;
            $this->db_name = DB_NAME;
        }

        // * close db connection
        public function closeConnection(){
            mysqli_close($this->databaseConnection);
        }

        // * open db connection
        public function openConnection(){
            $this->databaseConnection = new mysqli(
                $this->db_host,
                $this->db_username,
                $this->db_password,
                $this->db_name
            );  
            return $this->databaseConnection;
        }
    }