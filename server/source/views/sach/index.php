<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/SachHandle.php');
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
            \Template\TieuDe('Trang chủ sách', $tk);
        ?>
        <div>
            <ul class='nav'>
                <li class='nav-item'><a class='nav-link' href='/sach/them'>Thêm Sách</a></li>
                <li class='nav-item'><a class='nav-link' href='/sach'>Quay lại trang chủ</a></li>
            </ul>
            <div>
                <input type="text" name='search'>
                <a href='' onclick="
                    this.href = '/sach?q=' + encodeURIComponent(document.querySelector('input[name=search]').value);
                ">Search</a>
            </div>
        </div>
        <hr>
        <ul class='nav d-flex justify-content-center flex-wrap'>
            <?php 
                if(isset($_SERVER['QUERY_STRING'])){
                    parse_str($_SERVER['QUERY_STRING']);
                    \Handle\Sach\DanhSachSach($q);
                }else{
                    \Handle\Sach\DanhSachSach();
                }
            ?>
        </ul>
    </div>
</body>
</html>