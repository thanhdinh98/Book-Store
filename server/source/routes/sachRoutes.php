<?php
namespace Routes{

    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/SachHandle.php');

    class Sach{

        private static $themPage = '/views/sach/them.php';
        private static $indexPage = '/views/sach/index.php';
        private static $errPage = '/views/404.php';

        public static function Handle($parentUri, $uri, $method){

            if($uri === $parentUri){
                require_once($_SERVER['DOCUMENT_ROOT'].self::$indexPage);
    
            }else if($uri === $parentUri.'/them'){

                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$themPage);
                }else if($method === 'POST'){
                    if(!empty($_POST)){
                        \Handle\Sach\ThemSach($_POST);
                        header("Location: http://localhost:".$_SERVER['SERVER_PORT']."/sach");
                    }
                }
    
            }else if($uri === $parentUri.'/xoa'){
    
                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Sach\XoaSach($id);
                    header("Location: http://localhost:".$_SERVER['SERVER_PORT']."/sach");
                }
    
            }else if($uri === $parentUri.'/sua'){
                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$themPage);
                }
            }else{
                require_once($_SERVER['DOCUMENT_ROOT'].self::$errPage);
            }
        }    
    }
}