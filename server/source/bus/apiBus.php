<?php
namespace Bus {

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/ApiDao.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/Sach.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/LoaiSach.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/Trang.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/TaiKhoan.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/DonHang.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/ChiTietDonHang.php');

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/loaiSachBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/NSXBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/tacGiaBus.php');    

    class ApiBus{
        private $apiDao;
        private $loaiSachBus;
        private $nsxBus;
        private $tacGiaBus;

        public function __construct(){
            $this->apiDao = new \Dao\Api\ApiDao();
            $this->loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
            $this->nsxBus = new \Bus\NSXBus();
            $this->tacGiaBus = new \Bus\TacGiaBus();
        }

        public function LoadSach($o, $qa, $g){
            $mangSach = [];
            $result = $this->apiDao->LoadSach($o, $qa, $g);
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangSach, new \DTO\Sach\Sach(
                        $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                        $this->tacGiaBus->LoadTacGiaId($idtacGia),
                        $this->nsxBus->LoadNSXId($idnhaSanXuat), 
                        $this->loaiSachBus->LoadLoaiSachId($idloaiSach)
                    ));
                }
                \mysqli_free_result($result);
                return $mangSach;
            }
            return null;
        }

        public function LoadLoaiSach(){
            $mangLoaiSach = [];
            $result = $this->apiDao->LoadLoaiSach();
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangLoaiSach, new \Dto\LoaiSach\LoaiSach(
                        $id, $tenLoai
                    ));
                }
                \mysqli_free_result($result);
                return $mangLoaiSach;
            }
            return null;
        }

        public function LoadLoaiSachId($g){
            $result = $this->apiDao->LoadLoaiSachId($g);
            $loaiSach = null;
            if($result){
                extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $loaiSach = new \Dto\LoaiSach\LoaiSach(
                    $id, $tenLoai
                );
                \mysqli_free_result($result);
                return $loaiSach;
            }
            return null;
        }

        public function TongSoTrang($g){
            $result = $this->apiDao->TongSoTrang($g);
            $trang = null;
            if($result){
                extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $trang = new \Dto\Trang($tongSoTrang);
                \mysqli_free_result($result);
                return $trang;
            }
            return null;
        }

        public function TimKiemSach($o, $qa, $t, $q){
            $mangSach = [];
            $result = $this->apiDao->TimKiemSach($o, $qa, $t, $q);
            if($result){
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    extract($row);
                    array_push($mangSach, new \DTO\Sach\Sach(
                        $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                        $this->tacGiaBus->LoadTacGiaId($idtacGia),
                        $this->nsxBus->LoadNSXId($idnhaSanXuat), 
                        $this->loaiSachBus->LoadLoaiSachId($idloaiSach)
                    ));
                }
                \mysqli_free_result($result);
                return $mangSach;
            }
            return null;
        }

        public function TongTrangTimKiem($t, $q){
            $result = $this->apiDao->TongTrangTimKiem($t, $q);
            if($result){
                extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $trang = new \Dto\Trang($tongSoTrang);
                \mysqli_free_result($result);
                return $trang;
            }
            return null;
        }

        public function LaySachId($id){
            $result = $this->apiDao->LaySachId($id);
            if($result){
                extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $sach = new \DTO\Sach\Sach(
                    $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                    $this->tacGiaBus->LoadTacGiaId($idtacGia),
                    $this->nsxBus->LoadNSXId($idnhaSanXuat), 
                    $this->loaiSachBus->LoadLoaiSachId($idloaiSach)
                );
                \mysqli_free_result($result);
                return $sach;
            }
            return null;
        }

        public function ThemTaiKhoan($taiKhoan){
            $result = $this->apiDao->ThemTaiKhoan($taiKhoan);
            if($result){
                return $result;
            }
            return null;
        }

        public function LoginTK($taiKhoan){
            $result = $this->apiDao->LoginTK($taiKhoan);
            if($result){
                extract(\mysqli_fetch_array($result, MYSQLI_ASSOC));
                $tk = new \Dto\TaiKhoan(
                    $id, $tenTaiKhoan, $tenDangNhap,
                    $matKhau, $email
                );
                \mysqli_free_result($result);
                return $tk;
            }
            return null;
        }

        public function ThemDonHang($donHang){
            $result = $this->apiDao->ThemDonHang($donHang);
            if($result){
                return $result;
            }
            return null;
        }

        public function LoadGioHang($KH){
            $result = $this->apiDao->LoadGioHang($KH);

            if($result){

                $dsDonHang = [];
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    \extract($row);
                    $donHang = new \Dto\DonHang\DonHang($id, $tongTien, $trangThai);
                    $ctdhResult = $this->apiDao->LoadChiTietDonHang($id);

                    if($ctdhResult){

                        $dsChiTietDonHang = [];
                        while($ctdhRow = \mysqli_fetch_array($ctdhResult, MYSQLI_ASSOC)){
                            \extract($ctdhRow);

                            array_push($dsChiTietDonHang, new \Dto\ChiTietDonHang\ChiTietDonHang(
                                new \DTO\Sach\Sach(
                                    $idSach, $tenSach, $moTa, $ngonNgu, $hinhAnh, $giaBan,
                                    null, null, null
                                ), $soLuong
                            ));
                        }

                        $donHang->chiTietDonHang = $dsChiTietDonHang;
                    }else return null;
                    array_push($dsDonHang, $donHang);
                }
                
                return $dsDonHang;
            }
            return null;
        }
    }
}