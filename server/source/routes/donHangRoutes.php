<?php
namespace Routes{

    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/DonHangHandle.php');

    class DonHang{

        private static $errPage = '/views/404.php';
        private static $indexPage = '/views/donHang/index.php';

        public static function Handle($parentUri, $uri, $method){
            
            if($uri === $parentUri){
                require_once($_SERVER['DOCUMENT_ROOT'].self::$indexPage);
            }else if($uri === $parentUri.'/giao-hang'){
                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\DonHang\GiaoHang($id);
                }
            }
            else{
                require_once($_SERVER['DOCUMENT_ROOT'].self::$errPage);
            }
        }
    
    }
}
