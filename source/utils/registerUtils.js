import {Register} from '../handle/authHandle';

export const registerUtils = ()=>{

    const username = document.querySelector('#username > input');
    const email = document.querySelector('#email > input');
    const password = document.querySelector('#password > input');
    const loginName = document.querySelector('#loginName > input');
    const register = document.querySelector('#register');

    register.onclick = (e)=>{
        e.preventDefault()

        if(username.value === '' || email.value === '' || password.value === '' || loginName === ''){
            alert('Vui lòng không bỏ trống tên tài khoản, mật khẩu, email !');
        }else{

            Register(username.value, loginName.value, password.value, email.value);

            username.value = '';
            email.value = '';
            password.value = '';
            loginName.value = '';
        }
    }
}