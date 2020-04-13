<?php
namespace Dto\DonHang{
    class DonHang{

        public $id;
        public $chiTietDonHang;
        public $tongTien;
        public $khachHang;
        public $trangThai;

        public function __construct($id, $tongTien, $trangThai){
            $this->id = $id;
            $this->tongTien = $tongTien;
            $this->trangThai = $trangThai;
        }
    }
}