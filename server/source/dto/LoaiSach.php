<?php
namespace Dto\LoaiSach{
    class LoaiSach{

        public $id;
        public $tenLoai;

        public function __construct($id, $tenLoai){
            $this->id = $id;
            $this->tenLoai = $tenLoai;
        }
    }
}