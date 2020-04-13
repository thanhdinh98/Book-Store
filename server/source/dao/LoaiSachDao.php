<?php
namespace Dao\LoaiSach{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/loaiSachMethods.php');

    class LoaiSachDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function LoadLoaiSach($q){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\LoaiSachMethods\LoadLoaiSach($q)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function ThemLoaiSach($loaiSach){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\LoaiSachMethods\ThemLoaiSach($loaiSach)
            );

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadLoaiSachId($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\LoaiSachMethods\LoadLoaiSachId($id)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function XoaLoaiSach($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\LoaiSachMethods\XoaLoaiSach($id)
            );

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}