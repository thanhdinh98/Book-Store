<?php
namespace Bus\Sach {

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/SachDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/Sach.php');

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/loaiSachBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/NSXBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/tacGiaBus.php');

    class SachBus{
        private $sachDao;
        private $loaiSachBus;
        private $nsxBus;
        private $tacGiaBus;

        public function __construct(){
            $this->sachDao = new \Dao\Sach\SachDao();
            $this->loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
            $this->nsxBus = new \Bus\NSXBus();
            $this->tacGiaBus = new \Bus\TacGiaBus();
        }
        
        public function ThemSach($sach){
            return $this->sachDao->ThemSach($sach);
        }

        public function DanhSachSach($q){
            $mangSach = [];
            $result = $this->sachDao->DanhSachSach($q);    
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangSach, new \DTO\Sach\Sach(
                        $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                        $this->tacGiaBus->LoadTacGiaId($idtacGia),
                        $this->nsxBus->LoadNSXId($idnhaSanXuat), 
                        $this->loaiSachBus->LoadLoaiSachId($idloaiSach)
                    ));
                }
                \mysqli_free_result($result);
                return $mangSach;
            }
            return null;
        }

        public function XoaSach($id){
            return $this->sachDao->XoaSach($id);
        }

        public function LaySachId($id){
            $result = $this->sachDao->LaySachId($id);
            if($result){
                $row = \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $sach = new \DTO\Sach\Sach(
                    $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                    $this->tacGiaBus->LoadTacGiaId($idtacGia),
                    $this->nsxBus->LoadNSXId($idnhaSanXuat), 
                    $this->loaiSachBus->LoadLoaiSachId($idloaiSach)
                );
                \mysqli_free_result($result);
                return $sach;
            }
            return null;
        }
    }
}