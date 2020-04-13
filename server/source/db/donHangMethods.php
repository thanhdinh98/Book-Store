<?php
namespace DB\DonHangMethods
{
    function LoadDonHang(){
        return 'call usp_LoadDonHangKhachHang();';
    }

    function LoadChiTietDonHang($id){
        return "call usp_LoadChiTietDonHang($id)";
    }

    function GiaoHang($id){
        return "call usp_GiaoHang($id)";
    }
}