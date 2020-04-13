<?php
namespace Bus\DonHang{

    require_once($_SERVER['DOCUMENT_ROOT'].'/dao/DonHangDao.php');

    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/DonHang.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/ChiTietDonHang.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/Sach.php');

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/apiBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/taiKhoanBus.php');

    class DonHangBus{

        private $donHangDao;
        private $apiBus;
        private $taiKhoanBus;

        public function __construct()
        {
            $this->donHangDao = new \Dao\DonHang();
            $this->apiBus = new \Bus\ApiBus();
            $this->taiKhoanBus = new \Bus\TaiKhoanBus();
        }

        public function LoadDonHang(){
            $result = $this->donHangDao->LoadDonHang();
            if($result){
                $mangDonHang = [];
                while($row = \mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    \extract($row);
                    $donHang = new \Dto\DonHang\DonHang(
                        $id, $tongTien, $trangThai
                    );

                    $ctdhResult = $this->donHangDao->LoadChiTietDonHang($id);

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
                        $donHang->khachHang = $this->taiKhoanBus->LoadKhachHangId($idKH);
                    }else return null;

                    array_push($mangDonHang, $donHang);
                }
                return $mangDonHang;
            }
            return null;
        }

        public function GiaoHang($id){
            return $this->donHangDao->GiaoHang($id);
        }
    }
}