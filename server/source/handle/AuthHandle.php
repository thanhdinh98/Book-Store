<?php
namespace Handle\Auth{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/authBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/QuanTriVien.php');

    function Login($post){
        \extract($post);
        $authBus = new \Bus\AuthBus();
        $result = $authBus->Login(
            new \Dto\QuanTriVien(
                null, null,
                $tenDN, $matKhau 
            )
        );

        if($result){
            $_SESSION['tk'] = $result;
        }
    }

    function Register($post){
        \extract($post);
        $authBus = new \Bus\AuthBus();
        $result = $authBus->Register(
            new \Dto\QuanTriVien(
                null, $tenTK,
                $tenDN, $matKhau 
            )
        );
    }

    function Logout(){
        session_destroy();
    }
}