<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Thêm sách</title>
</head>
<body>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/handle/SachHandle.php');
        if(isset($_SERVER['QUERY_STRING'])){
            parse_str($_SERVER['QUERY_STRING']);
            $sach =  \Handle\Sach\LaySachId($id);
        }else{
            $sach = null;
        }
    ?>
    <div class="container">
        <h1 class='text-center'>Thêm Sách</h1>
        <hr>
        <form action="/sach/them" method='post'>
            <input type='text' name='id' value='<?php echo $sach ? $sach->id : '' ?>' hidden>
            <div class='d-flex name'>
                <span class='title'>Tên sách</span>
                <input type="text" class='form-control' name='tenSach' value='<?php echo $sach ? $sach->tenSach : '' ?>'>
            </div>
            <div class='d-flex name'>
                <span class='title'>Mô tả</span>
                <textarea type="text" class='form-control' name='moTa'><?php echo $sach ? $sach->moTa : '' ?></textarea>
            </div>
            <div class='d-flex name'>
                <span class='title'>Ngôn ngữ</span>
                <input type="text" class='form-control' name='ngonNgu' value='<?php echo $sach ? $sach->ngonNgu : '' ?>'>
            </div>
            <div class='d-flex name'>
                <span class='title'>Hình ảnh</span>
                <input type="text" class='form-control' name='hinhAnh' value='<?php echo $sach ? $sach->hinhAnh : '' ?>'>
            </div>
            <div class='d-flex name'>
                <span class='title'>Tác giả</span>
                <input type="text" class='form-control' name='tacGia' value='<?php echo $sach ? $sach->tacGia->tenTacGia : '' ?>'>
            </div>
            <div class='d-flex name'>
                <span class='title'>Nhà sản xuất</span>
                <input type="text" class='form-control' name='nSX' value='<?php echo $sach ? $sach->nhaSX->tenNSX : '' ?>'>
            </div>
            <div class='name'>
                <span class='title'>Loại sách</span>
                <select name='loaiSach'>
                    <option value='<?php echo $sach ? $sach->loaiSach->id : '' ?>' selected><?php echo $sach ? $sach->loaiSach->tenLoai : 'Choose...' ?></option>
                    <?php 
                        require_once($_SERVER['DOCUMENT_ROOT'].'/handle/LoaiSachHandle.php');
                        \Handle\LoaiSach\LoadLoaiSach();
                    ?>
                </select>
            </div>
            <div class='d-flex name'>
                <span class='title'>Đơn giá</span>
                <input type="text" class='form-control' name='donGia' value='<?php echo $sach ? $sach->donGia : '' ?>'>
            </div>
            <div class='text-center'>
                <input type="submit" class='btn btn-primary' value='Thêm Sách'>
            </div>
        </form>
        <div class='text-center mt-3'>
            <a href='/sach'>Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>