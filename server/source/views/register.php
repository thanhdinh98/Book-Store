<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="container text-center">
        <h1>Đăng Ký</h1>
        <hr>
        <form action='/auth/register' method='post'>
            <div class='name'>
                <div class='text-center'>Họ và tên:</div>
                <input type='text' name='tenTK'>
            </div>
            <div class='name'>
                <div class='text-center'>Tên đăng nhập:</div>
                <input type='text' name='tenDN'>
            </div>
            <div class='name'>
                <div class='text-center'>Mật khẩu:</div>
                <input type='password' name='matKhau'>
            </div>
            <div class='name'>
                <input type='submit' class='btn btn-primary' value='Đăng ký'>
            </div>
        </form>
        <div>Bạn đã có tài khoản ? <a href='/auth/login' class='text-success'>Đăng nhập</a></div>
    </div>
</body>
</html>