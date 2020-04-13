<?php
namespace Template{
    function TieuDe($tieuDe, $tk){
        echo "
            <div class='d-flex justify-content-around align-items-center'>
                <h1 class='text-center'>$tieuDe</h1>
                <a class='nav-link' href='/'>Quay lại trang quản lý</a>
                <div>
                    Bạn là: 
                    <span class='text-success'>$tk->tenTaiKhoan</span>
                    <a href='/auth/logout' class='text-danger'>Đăng xuất</a>
                </div>
            </div>
            <hr>
        ";
    }
}
