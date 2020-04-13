<?php
namespace Dao\Api{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/dataProvider.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/apiMethods.php');

    class ApiDao{

        private $dataProvider;

        public function __construct(){
            $this->dataProvider = new \Dao\DataProvider\DataProvider();
        }

        public function LoadSach($o, $qa, $g){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoadSach($o, $qa, $g)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadLoaiSach(){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoadLoaiSach()
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadLoaiSachId($g){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoadLoaiSachId($g)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function TongSoTrang($g){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\TongSoTrang($g)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function TimKiemSach($o, $qa, $t, $q){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\TimKiemSach($o, $qa, $t, $q)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function TongTrangTimKiem($t, $q){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\TongTrangTimKiem($t, $q)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LaySachId($id){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LaySachId($id)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function ThemTaiKhoan($taiKhoan){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\ThemTaiKhoan($taiKhoan)
            );    
            
            if(\mysqli_affected_rows($connection) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoginTK($taiKhoan){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoginTK($taiKhoan)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function ThemDonHang($donHang){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\ThemDonHang($donHang)
            );    
            
            if(\mysqli_affected_rows($connection) > 0){
                
                foreach($donHang->items as $item){
                    $result = $this->dataProvider->excute(
                        $connection,
                        \DB\ApiMethods\ThemChiTietDonHang($item, $donHang->idDH)
                    );
                    if(\mysqli_affected_rows($connection) <= 0) return null;
                }
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        public function LoadGioHang($KH){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoadGioHang($KH)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }

        function LoadChiTietDonHang($idDH){
            $connection = $this->dataProvider->open();
            $result = $this->dataProvider->excute(
                $connection,
                \DB\ApiMethods\LoadChiTietDonHang($idDH)
            );    
            
            if(\mysqli_num_rows($result) > 0){
                $this->dataProvider->close($connection);
                return $result;
            }
            return null;
        }
    }
}