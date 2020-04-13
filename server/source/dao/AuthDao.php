<?php
namespace Dao\Auth{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/authMethods.php');

    class AuthDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function Login($tk){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\AuthMethods\Login($tk)
            );    

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function Register($tk){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\AuthMethods\Register($tk)
            );

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}