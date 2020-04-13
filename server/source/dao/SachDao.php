<?php
namespace Dao\Sach{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/sachMethods.php');

    class SachDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function ThemSach($sach){
            $connection = $this->dataProvider->open();
            $result = null;
            if($sach->id){
                $result = $this->dataProvider->excute(
                    $connection,
                    \DB\SachMethods\SuaSach($sach)
                );    
            }else{
                $result = $this->dataProvider->excute(
                    $connection,
                    \DB\SachMethods\ThemSach($sach)
                );    
            }

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function DanhSachSach($q){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\SachMethods\DanhSachSach($q)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function XoaSach($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\SachMethods\XoaSach($id)
            );

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LaySachId($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\SachMethods\LaySachId($id)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}