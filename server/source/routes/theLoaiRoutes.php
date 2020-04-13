<?php
namespace Routes{

    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/LoaiSachHandle.php');

    class TheLoai{

        private static $indexPage = '/views/theLoai/index.php';
        private static $themPage = '/views/theLoai/them.php';
        private static $errPage = '/views/404.php';

        public static function Handle($parentUri, $uri, $method){
            
            if($uri === $parentUri){
                require_once($_SERVER['DOCUMENT_ROOT'].self::$indexPage);
            }else if($uri === $parentUri.'/them'){
                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$themPage);
                }else if($method === 'POST'){
                    if(!empty($_POST)){
                        \Handle\LoaiSach\ThemLoaiSach($_POST);
                        header("Location: http://localhost:".$_SERVER['SERVER_PORT']."/the-loai");
                    }
                }
            }else if($uri === $parentUri.'/sua'){
                if($method === 'GET'){
                    require_once($_SERVER['DOCUMENT_ROOT'].self::$themPage);
                }
            }else if($uri === $parentUri.'/xoa'){
                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\LoaiSach\XoaLoaiSach($id);
                    header("Location: http://localhost:".$_SERVER['SERVER_PORT']."/the-loai");
                }
            }
            else{
                require_once($_SERVER['DOCUMENT_ROOT'].self::$errPage);
            }
        }
    }
}