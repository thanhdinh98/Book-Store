<?php
namespace Dto{
    class NhaSanXuat{

        public $id;
        public $tenNSX;

        public function __construct($id, $tenNSX){
            $this->id = $id;
            $this->tenNSX = $tenNSX;
        }
    }
}