<?php
namespace Dto\ChiTietDonHang{
    class ChiTietDonHang{

        public $sach;
        public $soLuong;

        public function __construct($sach, $soLuong){
            $this->sach = $sach;
            $this->soLuong = $soLuong;
        }
    }
}