<?php
namespace Dto\TacGia{
    class TacGia{

        public $id;
        public $tenTacGia;

        public function __construct($id, $tenTacGia){
            $this->id = $id;
            $this->tenTacGia = $tenTacGia;
        }
    }
}