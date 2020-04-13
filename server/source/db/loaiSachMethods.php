<?php
namespace DB\LoaiSachMethods{
    
    function LoadLoaiSach($q){
        if($q){
            return "call usp_LoadLoaiSachQuery('$q')";
        }
        return 'call usp_LoadLoaiSach()';
    }

    function ThemLoaiSach($loaiSach){
        return "call usp_ThemLoaiSach('$loaiSach->id', '$loaiSach->tenLoai');";
    }

    function LoadLoaiSachId($id){
        return "call usp_LoadLoaiSachId('$id');";
    }

    function XoaLoaiSach($id){
        return "call usp_XoaLoaiSach('$id');";
    }
}