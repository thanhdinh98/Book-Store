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
        require_once($_SERVER['DOCUMENT_ROOT'].'/handle/NSXHandle.php');
        if(isset($_SERVER['QUERY_STRING'])){
            parse_str($_SERVER['QUERY_STRING']);
            $nsx =  \Handle\NhaSanXuat\LoadNSXId($id);
        }else{
            $nsx = null;
        }
    ?>
    <div class="container">
        <h1 class='text-center'>Thêm nhà sản xuất</h1>
        <hr>
        <form action='/nha-san-xuat/them' method='post'>
            <input type='text' name='id' value='<?php echo $nsx ? $nsx->id : '' ?>' hidden>
            <div class='name'>
                <span class='title'>Tên nhà sản xuất:</span>
                <input type='text' class='form-control' name='NSX' value='<?php echo $nsx ? $nsx->tenNSX : '' ?>'>
            </div>
            <div class='text-center'>
                <input type='submit' class='btn btn-primary' value='Thêm'>
            </div>
        </form>
    </div>
    <div class='text-center mt-3'>
        <a href='/nha-san-xuat'>Quay lại trang chủ</a>
    </div>
</body>
</html>