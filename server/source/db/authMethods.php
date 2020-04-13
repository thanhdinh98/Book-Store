<?php
namespace DB\AuthMethods{

    function Login($tk){
        return "call usp_Login('$tk->tenDangNhap', '$tk->matKhau');";
    }

    function Register($tk){
        return "call usp_Register('$tk->tenTaiKhoan', '$tk->tenDangNhap', '$tk->matKhau');";
    }
}