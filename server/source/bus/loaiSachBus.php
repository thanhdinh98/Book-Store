<?php
namespace Bus\LoaiSach {

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/LoaiSachDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/LoaiSach.php');

    class LoaiSachBus{
        private $loaiSachDao;

        public function __construct(){
            $this->loaiSachDao = new \Dao\LoaiSach\LoaiSachDao();
        }
        
        public function LoadLoaiSach($q){
            $mangLoaiSach = [];
            $result = $this->loaiSachDao->LoadLoaiSach($q);
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangLoaiSach, new \DTO\LoaiSach\LoaiSach($id, $tenLoai));
                }
                \mysqli_free_result($result);
                return $mangLoaiSach;
            }
            return null;
        }

        public function ThemLoaiSach($loaiSach){
            return $this->loaiSachDao->ThemLoaiSach($loaiSach);
        }

        public function LoadLoaiSachId($id){
            $result = $this->loaiSachDao->LoadLoaiSachId($id);
            if($result){
                \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $loaiSach = new \DTO\LoaiSach\LoaiSach(
                    $id, $tenLoai
                );
                \mysqli_free_result($result);
                return $loaiSach;
            }
            return null;
        }

        public function XoaLoaiSach($id){
            return $this->loaiSachDao->XoaLoaiSach($id);
        }
    }
}