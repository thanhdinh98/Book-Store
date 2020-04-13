<?php
namespace DB\SachMethods{
    function ThemSach($sach){
        return "call usp_ThemSach(
            '$sach->tenSach', '$sach->moTa', '$sach->ngonNgu', '$sach->hinhAnh',
            '".$sach->tacGia."', '".$sach->nhaSX."', '".$sach->loaiSach."', $sach->donGia
        );";
    }

    function DanhSachSach($q){
        if($q){
            return "call usp_DanhSachSachQuery('$q');";    
        }
        return 'call usp_DanhSachSach();';
    }

    function XoaSach($id){
        return "call usp_XoaSach($id);";
    }

    function LaySachId($id){
        return "call usp_LaySachId($id);";
    }

    function SuaSach($sach){
        return "call usp_SuaSach(
            '$sach->id', '$sach->tenSach', '$sach->moTa', '$sach->ngonNgu', '$sach->hinhAnh',
            '".$sach->tacGia."', '".$sach->nhaSX."', '".$sach->loaiSach."', $sach->donGia
        );";
    }
}