<?php
namespace Handle\Api{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/apiBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/TaiKhoan.php');

    function LoadSach($o, $qa, $g = null){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LoadSach($o, $qa, $g);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function LoadLoaiSach(){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LoadLoaiSach();
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function LoadLoaiSachId($g = null){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LoadLoaiSachId($g);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function TongSoTrang($g = null){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->TongSoTrang($g);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function TimKiemSach($o = null, $qa = null, $t = null, $q = null){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->TimKiemSach($o, $qa, $t, $q);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function TongTrangTimKiem($t = null, $q = null){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->TongTrangTimKiem($t, $q);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function LaySachId($id){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LaySachId($id);
        if($result !== null){
            echo \json_encode($result);
        }else{
            echo 'Có lỗi xảy ra!';
        }
    }

    function ThemTaiKhoan($taiKhoan){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->ThemTaiKhoan(new \Dto\TaiKhoan(
            null, $taiKhoan->tenTaiKhoan,
            $taiKhoan->tenDangNhap, $taiKhoan->matKhau, $taiKhoan->email
        ));
        if($result !== null){
            echo \json_encode('{"error": 0}');
        }else{
            echo \json_encode('{"error": 1}');
        }
    }

    function LoginTK($taiKhoan){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LoginTK(new \Dto\TaiKhoan(
            null, null,
            $taiKhoan->tenDangNhap, $taiKhoan->matKhau, null
        ));
        if($result !== null){        
            $jsonTK = \json_encode($result);
            echo \json_encode("{\"error\": 0, \"tk\": $jsonTK}");
        }else{
            echo \json_encode('{"error": 1}');
        }
    }

    function Logout(){
        echo \json_encode("{\"error\": 0}");  
    }

    function ThemDonHang($donHang){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->ThemDonHang($donHang);
        if($result){
            echo \json_encode('{"error": 0}'); 
        }else{
            echo \json_encode('{"error": 1}');
        }
    }

    function LoadGioHang($KH){
        $apiBus = new \Bus\ApiBus();
        $result = $apiBus->LoadGioHang($KH);
        if($result){
            $dsDonHang = \json_encode($result);
            echo \json_encode("{\"error\": 0, \"dsDonHang\": $dsDonHang}"); 
        }else{
            echo \json_encode('{"error": 1}');
        }
    }
}