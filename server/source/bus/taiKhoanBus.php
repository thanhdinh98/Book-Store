<?php
namespace Bus {

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/TaiKhoanDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/TaiKhoan.php');

    class TaiKhoanBus{
        private $taiKhoanDao;

        public function __construct(){
            $this->taiKhoanDao = new \Dao\TaiKhoan\TaiKhoanDao();
        }

        public function LoadKhachHangId($id){
            $result = $this->taiKhoanDao->LoadKhachHangId($id);
            if($result){
                \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                \mysqli_free_result($result);

                return new \Dto\TaiKhoan(
                    $id, $tenTaiKhoan,
                    $tenDangNhap, $matKhau, $email
                );
            }
            return null;
        }
    }
}