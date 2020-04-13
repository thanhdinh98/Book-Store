<?php
namespace Bus {

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/AuthDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/QuanTriVien.php');

    class AuthBus{
        private $authDao;

        public function __construct(){
            $this->authDao = new \Dao\Auth\AuthDao();
        }
    
        public function Register($tk){
            return $this->authDao->Register($tk);
        }

        public function Login($tk){
            $result = $this->authDao->Login($tk);
            if($result){
                \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $taiKhoan = new \Dto\QuanTriVien(
                    $id, $tenTaiKhoan,
                    $tenDangNhap, $matKhau
                );
                return $taiKhoan;
                \mysqli_free_result($result);
            }
            return null;
        }
    }
}