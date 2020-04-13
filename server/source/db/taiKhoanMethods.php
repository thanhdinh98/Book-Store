<?php
namespace DB\TaiKhoanMethods{

    function LoadKhachHangId($id){
        return "call usp_LoadKhachHangId($id);";
    }
}