<?php
namespace Dao\TaiKhoan{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/taiKhoanMethods.php');

    class TaiKhoanDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function LoadKhachHangId($id)
        {
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection, 
                \DB\TaiKhoanMethods\LoadKhachHangId($id)
            );

            $this->dataProvider->close($connection);
            if(\mysqli_num_rows($result) > 0)
            {
                return $result;
            }
            return null;
        }
    }
}