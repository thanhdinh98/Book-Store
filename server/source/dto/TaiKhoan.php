<?php
namespace Dto{
    class TaiKhoan{

        public $id;
        public $tenTaiKhoan;
        public $tenDangNhap;
        public $matKhau;
        public $email;

        public function __construct(
            $id, $tenTaiKhoan,
            $tenDangNhap, $matKhau, $email
        ){
            $this->id = $id;
            $this->tenTaiKhoan = $tenTaiKhoan;
            $this->tenDangNhap = $tenDangNhap;
            $this->matKhau = $matKhau;
            $this->email = $email;
        }
    }
}