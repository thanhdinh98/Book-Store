<?php
namespace Dto{
    class QuanTriVien{

        public $id;
        public $tenTaiKhoan;
        public $tenDangNhap;
        public $matKhau;

        public function __construct(
            $id, $tenTaiKhoan,
            $tenDangNhap, $matKhau
        ){
            $this->id = $id;
            $this->tenTaiKhoan = $tenTaiKhoan;
            $this->tenDangNhap = $tenDangNhap;
            $this->matKhau = $matKhau;
        }
    }
}