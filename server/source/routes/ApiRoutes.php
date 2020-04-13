<?php
namespace Routes{

    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/ApiHandle.php');

    class Api{

        public static function Handle($parentUri, $uri, $method){
            
            if($uri === $parentUri){
                
                echo 'Welcome to api zone';
            }else if($uri === $parentUri.'/sach'){

                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    if($id){
                        \Handle\Api\LaySachId($id);
                    }else{
                        \Handle\Api\LoadSach($o, $qa, $g);
                    }
                }
            }else if($uri === $parentUri.'/the-loai'){

                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Api\LoadLoaiSachId($g);
                }else{
                    \Handle\Api\LoadLoaiSach();
                }
            }else if($uri === $parentUri.'/tong-so-trang'){

                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Api\TongSoTrang($g);
                }else{
                    \Handle\Api\TongSoTrang();
                }

            }else if($uri === $parentUri.'/sach/tim-kiem'){

                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Api\TimKiemSach($o, $qa, $t, $q);
                }
            }else if($uri === $parentUri.'/sach/tim-kiem/tong-so-trang'){

                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Api\TongTrangTimKiem($t, $q);
                }
            }else if($uri === $parentUri.'/auth/register'){

                if($method === 'POST'){
                    \Handle\Api\ThemTaiKhoan(\json_decode(file_get_contents('php://input')));
                }                
            }else if($uri === $parentUri.'/auth/login'){

                if($method === 'POST'){
                    \Handle\Api\LoginTK(\json_decode(file_get_contents('php://input')));
                }
            }else if($uri === $parentUri.'/auth/logout'){

                \Handle\Api\Logout();
            }else if($uri === $parentUri.'/gio-hang/them-don-hang'){

                if($method === 'POST'){
                    \Handle\Api\ThemDonHang(\json_decode(file_get_contents('php://input')));
                }
            }else if($uri === $parentUri.'/gio-hang'){

                if($method === 'POST'){
                    \Handle\Api\LoadGioHang(\json_decode(file_get_contents('php://input')));
                }
            }
            else{
                echo 'No api here';
            }
        }

    }
}