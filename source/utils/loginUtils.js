import {Login} from '../handle/authHandle';

export const loginUtils = ()=>{
    const username = document.querySelector('#username > input');
    const password = document.querySelector('#password > input');
    const login = document.querySelector('#login');

    login.onclick = (e)=>{
        e.preventDefault();
        if(username.value === '' || password.value === ''){
            alert('Vui lòng không bỏ trống tên tài khoản và mật khẩu !');
        }else{
            
            Login(username.value, password.value);

            username.value = '';
            password.value = '';
        }
    }
}