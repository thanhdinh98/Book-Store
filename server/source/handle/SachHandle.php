<?php
namespace Handle\Sach{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/sachBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/Sach.php');

    function DanhSachSach($q = ''){
        $sachBus = new \Bus\Sach\SachBus();
        $result = $sachBus->DanhSachSach($q);
        if($result){
            foreach($result as $sach){
                echo "
                    <li class='list-item'>
                        <img src='$sach->hinhAnh' class='img-fluid item'>
                        <div class='book-title text-center'>$sach->tenSach</div>
                        <div class='book-author'>".$sach->tacGia->tenTacGia."</div>
                        <div class='book-author'>
                            Giá bán:
                            <span class='text-danger'>$sach->donGia</span>
                        </div>
                        <div class='d-flex justify-content-around'>
                            <a href='/sach/xoa?id=$sach->id'>
                                <button class='btn btn-outline-danger'>Xóa</button>
                            </a>
                            <a href='/sach/sua?id=$sach->id'>
                                <button class='btn btn-outline-primary'>Sửa</button>
                            </a>
                        </div>
                    </li>
                ";
            }
        }else return null;
    }

    function ThemSach($post){
        \extract($post);

        $tacGia = $tacGia === '' ? null : $tacGia;
        $nSX = $nSX === '' ? null : $nSX;
        $loaiSach = $loaiSach === '' ? null : $loaiSach;

        $sachBus = new \Bus\Sach\SachBus();
        if($id){
            $sachBus->ThemSach(new \Dto\Sach\Sach(
                $id, $tenSach, $moTa, $ngonNgu, $hinhAnh, (float)$donGia,
                $tacGia, $nSX, $loaiSach
            ));
        }else{
            $sachBus->ThemSach(new \Dto\Sach\Sach(
                null, $tenSach, $moTa, $ngonNgu, $hinhAnh, (float)$donGia,
                $tacGia, $nSX,  $loaiSach
            ));
        }
    }

    function XoaSach($id){
        $sachBus = new \Bus\Sach\SachBus();
        $sachBus->XoaSach($id);
    }

    function LaySachId($id){
        $sachBus = new \Bus\Sach\SachBus();
        $sach = $sachBus->LaySachId($id);
        if($sach){
            return $sach;
        }
        return null;
    }
}