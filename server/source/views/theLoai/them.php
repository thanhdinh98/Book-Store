<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Admin</title>
</head>
<body>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/handle/LoaiSachHandle.php');
        if(isset($_SERVER['QUERY_STRING'])){
            parse_str($_SERVER['QUERY_STRING']);
            $loaiSach =  \Handle\LoaiSach\LoadLoaiSachId($id);
        }else{
            $loaiSach = null;
        }
    ?>
    <div class="container">
        <h1 class='text-center'>Thêm thể loại</h1>
        <hr>
        <form action="/the-loai/them" method='post'>
            <div class='d-flex name' >
                <span class='title'>ID</span>
                <input type="text" class='form-control' name='idTheLoai' value='<?php echo $loaiSach ? $loaiSach->id : '' ?>'
                    <?php echo $loaiSach ? 'hidden' : '' ?>
                >
            </div>
            <div class='d-flex name'>
                <span class='title'>Tên thể loại</span>
                <input type="text" class='form-control' name='tenTheLoai' value='<?php echo $loaiSach ? $loaiSach->tenLoai : '' ?>'>
            </div>
            <div class='text-center'>
                <input type="submit" class='btn btn-primary' value='Thêm'>
            </div>
        </form>
        <div class='text-center mt-3'>
            <a href='/the-loai'>Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>