import AuthBus from '../bus/authBus';
import TaiKhoan from '../dto/TaiKhoan';

export const Login = async (tenDangNhap, matKhau)=>{
    const authBus = new AuthBus();
    const result = await authBus.Login(
        new TaiKhoan(null, tenDangNhap, matKhau, null)
    );

    if(!JSON.parse(result).error){
        localStorage.setItem('UID', JSON.stringify(JSON.parse(result).tk));
        window.location.href = '/';
    }
}

export const Register = async (tenTaiKhoan, tenDangNhap, matKhau, email)=>{
    const authBus = new AuthBus();
    const result = await authBus.Register(
        new TaiKhoan(tenTaiKhoan, tenDangNhap, matKhau, email)
    );

    if(!JSON.parse(result).error){
        window.location.href = '/auth/login';
    }else{
        alert('Có lỗi đăng ký');
    }
}

export const Logout = async () => {
    const authBus = new AuthBus();
    const result = await authBus.Logout();

    if(!JSON.parse(result).error){
        localStorage.clear();
        window.location.href = '/';
    }
}

export const CheckUser = ()=>{
    if(localStorage.getItem('UID')){
        const tk = JSON.parse(localStorage.getItem('UID'));
        const user = document.querySelector('#user > .user-status');
        user.innerHTML = `
            <div class='d-flex login'>
                <span>${tk.tenTaiKhoan}</span>
                <a href='/gio-hang'><i class="fas fa-shopping-cart"></i></a>
                |
                <a href='/auth/logout'>Logout</a>
            </div>
        `;
    }
}