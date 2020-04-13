<?php
namespace Server{
    require_once('./Router.php');

    use \Router\Router;
    class Server{
        public static function Run(){
            if(isset($_SERVER['REQUEST_URI'])){
                Router::navigation(strtok($_SERVER["REQUEST_URI"],'?'), $_SERVER['REQUEST_METHOD']);
            }
        }

        public static function SetupCors(){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
        }
    }
}