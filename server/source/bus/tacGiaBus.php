<?php
namespace Bus{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/TacGiaDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/TacGia.php');

    class TacGiaBus{
        private $tacGiaDao;

        public function __construct(){
            $this->tacGiaDao = new \Dao\TacGiaDao();
        }

        public function LoadTacGiaId($idTacGia){
            $result = $this->tacGiaDao->LoadTacGiaId($idTacGia);
            if($result){
                \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $tacGia = new \Dto\TacGia\TacGia(
                    $id, $tenTacGia
                );
                \mysqli_free_result($result);
                return $tacGia;
            }
            return null;
        }
    }
}