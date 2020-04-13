<?php
namespace Router{
    
    require_once('./routes/sachRoutes.php');
    require_once('./routes/theLoaiRoutes.php');
    require_once('./routes/NSXRoutes.php');
    require_once('./routes/AuthRoutes.php');
    require_once('./routes/ApiRoutes.php');
    require_once('./routes/donHangRoutes.php');

    class Router{

        private static $indexPage = './views/index.php';
        private static $errPage = './views/404.php';

        public static function navigation($uri, $method){

            $router = preg_split('/\//', $uri);
            session_start();

            if($uri === '/'){

                if(!isset($_SESSION['tk'])){
                    header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                }else{
                    require_once(self::$indexPage);
                }
            }else if($router[1] === 'sach'){

                if(!isset($_SESSION['tk'])){
                    header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                }else{
                    \Routes\Sach::Handle('/sach', $uri, $method);
                }
            }else if($router[1] === 'the-loai'){

                if(!isset($_SESSION['tk'])){
                    header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                }else{
                    \Routes\TheLoai::Handle('/the-loai', $uri, $method);
                }
            }else if($router[1] === 'nha-san-xuat'){

                if(!isset($_SESSION['tk'])){
                    header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                }else{
                    \Routes\NhaSanXuat::Handle('/nha-san-xuat', $uri, $method);
                }
            }else if($router[1] === 'auth'){

                \Routes\Auth::Handle('/auth', $uri, $method);
            }else if($router[1] === 'api'){

                \Routes\Api::Handle('/api', $uri, $method);
            }else if($router[1] === 'don-hang'){

                if(!isset($_SESSION['tk'])){
                    header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/auth/login');
                }else{
                    \Routes\DonHang::Handle('/don-hang', $uri, $method);
                }
            }
            else{
                require_once(self::$errPage);
            }
        }
    }
}