export const RegisterPage = ()=>{
    return `
        <div class='container'>
            <div class='row d-flex justify-content-center align-items-center full-height'>
                <div class='form-container text-center'>
                    <h2 class='text-center mb-3'>Book Store</h2>
                    <div id='username'>
                        <span><i class="fas fa-user"></i></span>
                        <input type='text' class='hide-border' placeholder='Tên tài khoản'>
                    </div>
                    <div id='loginName'>
                        <span><i class="fas fa-user-check"></i></span>
                        <input type='text' class='hide-border' placeholder='Tên đăng nhập'>
                    </div>
                    <div id='email'>
                        <span><i class="fas fa-envelope"></i></span>
                        <input type='text' class='hide-border' placeholder='Email'>
                    </div>
                    <div id='password'>
                        <span><i class="fas fa-key"></i></span>
                        <input type='password' class='hide-border' placeholder='Mật khẩu'>
                    </div>
                    <input type='submit' class='btn btn-outline-dark hide-border' value='Đăng ký' id='register'>
                    <div>
                        Bạn đã có tài khoản ? <a href='/auth/login' class='text-success'>Đăng nhập</a>
                    </div>
                    <ul class='list'>
                        <li><a href='/'>Quay lại trang chủ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    `;
}