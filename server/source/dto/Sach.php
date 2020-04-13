<?php
namespace Dto\Sach{

    class Sach{

        public $id;
        public $tenSach;
        public $moTa;
        public $ngonNgu;
        public $hinhAnh;
        public $donGia;
        public $tacGia;
        public $nhaSX;
        public $loaiSach;

        public function __construct(
            $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $donGia,
            $tacGia, $nhaSX, $loaiSach
        ){
            $this->id = $id;
            $this->tenSach = $tenSach;
            $this->moTa = $moTa;
            $this->ngonNgu = $ngonNgu;
            $this->hinhAnh = $hinhAnh;
            $this->donGia = $donGia;
            $this->tacGia = $tacGia;
            $this->nhaSX = $nhaSX;
            $this->loaiSach = $loaiSach;
        }
    }
}