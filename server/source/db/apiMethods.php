<?php
namespace DB\ApiMethods{

    function LoadSach($o, $qa, $g){
        if($g){
            return "call usp_LoadSachTheoTheLoai($o, $qa, '$g');";
        }
        return "call usp_LoadSach($o, $qa);";
    }

    function LoadLoaiSach(){
        return 'call usp_LoadLoaiSach();';
    }

    function TongSoTrang($g){
        if($g){
            return "call usp_TongSoTrangTheoTheLoai('$g');";    
        }
        return 'call usp_TongSoTrang();';
    }

    function LoadLoaiSachId($g){
        return "call usp_LoadLoaiSachId('$g');";
    }

    function TimKiemSach($o, $qa, $t, $q){
        return "call usp_TimKiemSach($o, $qa, '$t', '$q');";
    }

    function TongTrangTimKiem($t, $q){
        return "call usp_TongTrangTimKiem('$t', '$q');";
    }

    function LaySachId($id){
        return "call usp_LaySachId($id);";
    }

    function ThemTaiKhoan($taiKhoan){
        return "call usp_ThemTaiKhoan('$taiKhoan->tenTaiKhoan', '$taiKhoan->tenDangNhap', '$taiKhoan->matKhau', '$taiKhoan->email')";
    }

    function LoginTK($taiKhoan){
        return "call usp_LoginTK('$taiKhoan->tenDangNhap', '$taiKhoan->matKhau');";
    }

    function ThemDonHang($donHang){
        return "call usp_ThemDonHang($donHang->idDH, $donHang->idKH, $donHang->tongTien, '$donHang->sdt', '$donHang->diaChi');";
    }

    function ThemChiTietDonHang($item, $id){
        return "call usp_ThemChiTietDonHang($item->id, $id, $item->soLuong)";
    }

    function LoadGioHang($KH){
        return "call usp_LoadDonHang($KH->idKH);";
    }

    function LoadChiTietDonHang($idDH){
        return "call usp_LoadChiTietDonHang($idDH);";
    }
}