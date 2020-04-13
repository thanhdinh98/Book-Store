<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/template.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/handle/DonHangHandle.php');
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
    <title>Quản lý đơn hàng</title>
</head>
<body>
    <div class='container'>
        <?php
            \Template\TieuDe('Quản lý đơn hàng', $tk);
        ?>

        <?php
            \Handle\DonHang\LoadDonHang();
        ?>
    </div>
</body>
</html>