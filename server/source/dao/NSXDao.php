<?php
namespace Dao{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/nsxMethods.php');

    class NSXDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function ThemNSX($nsx){
            $connection = $this->dataProvider->open();
            $result = null;
            if($nsx->id){
                $result = $this->dataProvider->excute(
                    $connection,
                    \DB\NSXMethods\SuaNSX($nsx)
                );    
            }else{
                $result = $this->dataProvider->excute(
                    $connection,
                    \DB\NSXMethods\ThemNSX($nsx)
                );
            }

            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadNSX($q){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\NSXMethods\LoadNSX($q)
            );
        
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function XoaNSX($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\NSXMethods\XoaNSX($id)
            );
            
            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadNSXId($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\NSXMethods\LoadNSXId($id)
            );

            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}