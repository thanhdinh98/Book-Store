export const LoginPage = ()=>{
    return `
        <div class='container'>
            <div class='row d-flex justify-content-center align-items-center full-height'>
                <div class='form-container text-center'>
                    <h2 class='text-center mb-3'>Book Store</h2>
                    <div id='username'>
                        <span><i class="fas fa-user"></i></span>
                        <input type='text' class='hide-border' placeholder='Tên đăng nhập'>
                    </div>
                    <div id='password'>
                        <span><i class="fas fa-key"></i></span>
                        <input type='password' class='hide-border' placeholder='Mật khẩu'>
                    </div>
                    <input type='submit' class='btn btn-outline-dark hide-border' value='Đăng Nhập' id='login'>
                    <div>
                        Bạn chưa có tài khoản ? <a href='/auth/register' class='text-danger'>Đăng ký</a>
                    </div>
                    <ul class='list'>
                        <li><a href='/'>Quay lại trang chủ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    `; 
}