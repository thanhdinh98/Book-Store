<?php
namespace Handle\NhaSanXuat{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/NSXBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/NhaSanXuat.php');

    function ThemNSX($post){
        \extract($post);
        $nsxBus = new \Bus\NSXBus();
        if($id){
            $nsxBus->ThemNSX(new \Dto\NhaSanXuat(
                $id, $NSX
            ));
        }else{
            $nsxBus->ThemNSX(new \Dto\NhaSanXuat(
                null, $NSX
            ));
        }
    }

    function LoadNSX($q = ''){
        $nsxBus = new \Bus\NSXBus();
        $result = $nsxBus->LoadNSX($q);
        if($result){
            foreach($result as $nsx){
                echo "
                    <li>
                        $nsx->tenNSX
                        <a href='/nha-san-xuat/sua?id=$nsx->id'>Sửa</a>
                        <a href='/nha-san-xuat/xoa?id=$nsx->id' class='text-danger'>Xóa</a>
                    </li>
                ";
            }
        }else return null;
    }

    function XoaNSX($id){
        $nsxBus = new \Bus\NSXBus();
        $nsxBus->XoaNSX($id);
    }

    function LoadNSXId($id){
        $nsxBus = new \Bus\NSXBus();
        $nsx = $nsxBus->LoadNSXId($id);
        if($nsx){
            return $nsx;
        }
        return null;
    }
}