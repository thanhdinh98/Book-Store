<?php
namespace Bus{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/NSXDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/NhaSanXuat.php');

    class NSXBus{
        private $NSXDao;
        
        public function __construct(){
            $this->NSXDao = new \Dao\NSXDao();
        }

        public function ThemNSX($nsx){
            return $this->NSXDao->ThemNSX($nsx);
        }

        public function LoadNSX($q){
            $mangNSX = [];
            $result = $this->NSXDao->LoadNSX($q);    
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangNSX, new \Dto\NhaSanXuat(
                        $id, $tenNSX
                    ));
                }
                \mysqli_free_result($result);
                return $mangNSX;
            }
            return null;
        }

        public function XoaNSX($id){
            return $this->NSXDao->XoaNSX($id);
        }

        public function LoadNSXId($id){
            $result = $this->NSXDao->LoadNSXId($id);
            if($result){
                \extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $nsx = new \Dto\NhaSanXuat(
                    $id, $tenNSX
                );
                \mysqli_free_result($result);
                return $nsx;
            }
            return null;
        }
    }
}