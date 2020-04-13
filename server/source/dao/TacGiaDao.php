<?php
namespace Dao{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/tacGiaMethods.php');

    class TacGiaDao{
        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function LoadTacGiaId($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\TacGiaMethods\LoadTacGiaId($id)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}