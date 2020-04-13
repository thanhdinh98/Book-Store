<?php
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
    <title>Trang quản lý</title>
</head>
<body>
    <div class="container">
        <?php \Template\TieuDe('Trang quản lý', $tk) ?>
        <ul class='nav'>
            <li class='nav-item'><a class='nav-link' href='/sach'>Quản lý sách</a></li>
            <li class='nav-item'><a class='nav-link' href='/nha-san-xuat'>Quản lý nhà sản xuất</a></li>
            <li class='nav-item'><a class='nav-link' href='/the-loai'>Quản lý thể loại</a></li>
            <li class='nav-item'><a class='nav-link' href='/don-hang'>Quản lý đơn hàng</a></li>
        </ul>
        <hr>
    </div>
</body>
</html>