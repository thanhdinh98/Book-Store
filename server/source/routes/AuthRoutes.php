<?php
namespace Routes{

    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/AuthHandle.php');

    class Auth{

        private static $loginPage = '/views/login.php';
        private static $registerPage = '/views/register.php';
        private static $errPage = '/views/404.php';

        public static function Handle($parentUri, $uri, $method){
            
            if($uri === $parentUri.'/login'){
                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$loginPage);
                }else if($method === 'POST'){
                    if(!empty($_POST)){
                        \Handle\Auth\Login($_POST);
                        header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/');
                    }
                }
            }else if($uri === $parentUri.'/register'){
                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$registerPage);
                }else if($method === 'POST'){
                    if(!empty($_POST)){
                        \Handle\Auth\Register($_POST);
                        header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                    }
                }
            }else if($uri === $parentUri.'/logout'){
                \Handle\Auth\Logout();
                header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
            }
            else{
                require_once($_SERVER['DOCUMENT_ROOT'].self::$errPage);
            }
        }
    }
}