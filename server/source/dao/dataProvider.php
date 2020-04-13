<?php
namespace Dao\DataProvider{
    class DataProvider{

        private $username;
        private $password;
        private $host;
        private $db;

        public function __construct(){
            $this->host = 'localhost';
            $this->db = 'BookStore';
            $this->username = 'root';
            $this->password = 'thanhdinh98.it';
        }

        public function open(){
            $connection = \mysqli_connect($this->host, $this->username, $this->password, $this->db);
            if(!$connection) {
                "Error: Unable to connect to MySQL." . PHP_EOL;
                return null;
            }
            \mysqli_set_charset($connection ,'utf8');
            \mysqli_query ($connection ,"set character_set_results='utf8'");
            return $connection;
        }

        public function close($connection){
            if($connection){
                \mysqli_close($connection);
            }
        }

        public function excute($connection ,$sp){
            if($connection){
                return \mysqli_query($connection ,$sp);
            }
            return null;
        }
    }
}