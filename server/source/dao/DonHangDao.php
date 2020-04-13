<?php 
namespace Dao{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/donHangMethods.php');

    class DonHang{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function LoadDonHang(){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\DonHangMethods\LoadDonHang()
            );    

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadChiTietDonHang($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\DonHangMethods\LoadChiTietDonHang($id)
            );    

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function GiaoHang($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\DonHangMethods\GiaoHang($id)
            );    

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}