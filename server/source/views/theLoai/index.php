<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/LoaiSachHandle.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/template.php');
    $tk = $_SESSION['tk'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Trang chủ</title>
</head>
<body>
    <div class="container">
        <?php
            \Template\TieuDe('Trang chủ thể loại', $tk)
        ?>
        <ul class='nav'>
            <li class='nav-item'><a class='nav-link' href='/the-loai/them'>Thêm Loại</a></li>
            <li class='nav-item'><a class='nav-link' href='/the-loai'>Quay lại trang chủ</a></li>
        </ul>
        <div>
            <input type="text" name='search'>
            <a href='' onclick="
                this.href = '/the-loai?q=' + encodeURIComponent(document.querySelector('input[name=search]').value);
            ">Search</a>
        </div>
        <hr>
        <select size='10'>
            <?php 
                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\LoaiSach\LoadLoaiSach($q);
                }else{
                    \Handle\LoaiSach\LoadLoaiSach();
                }
            ?>
        </select>
        <div>
            <a href='' onclick="
            const select = document.querySelector('select');
            this.href = '/the-loai/sua?id=' + select.options[select.selectedIndex].value;
        ">Sửa</a>
            <a href='' class='text-danger' onclick="
                const select = document.querySelector('select');
                this.href = '/the-loai/xoa?id=' + select.options[select.selectedIndex].value;
            ">Xóa</a>
        </div>
    </div>
</body>
</html>