<?php
namespace Handle\LoaiSach{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/loaiSachBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/LoaiSach.php');

    function LoadLoaiSach($q = ''){
        $loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
        $result = $loaiSachBus->LoadLoaiSach($q);
        if($result){
            foreach($result as $loai){
                echo "
                    <option value='$loai->id'>$loai->tenLoai</option>
                ";
            }
        }else return null;
    }

    function ThemLoaiSach($post){
        \extract($post);
        $loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
        $loaiSachBus->ThemLoaiSach(new \Dto\LoaiSach\LoaiSach(
            $idTheLoai, $tenTheLoai
        ));
    }

    function LoadLoaiSachId($id){
        $loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
        $loaiSach = $loaiSachBus->LoadLoaiSachId($id);
        if($loaiSach){
            return $loaiSach;
        }
        return null;
    }

    function XoaLoaiSach($id){
        $loaiSachBus = new \Bus\LoaiSach\LoaiSachBus();
        return $loaiSachBus->XoaLoaiSach($id);
    }
}