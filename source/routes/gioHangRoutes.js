import {CartPage} from '../gui/pages/CartPage';

import {cartUtils} from '../utils/cartUtils';

import {ErrorPage} from '../gui/pages/404';

export const gioHangRoutes = (parentPath, pathName)=>{
    if(pathName === parentPath){

        if(localStorage.getItem('UID')){
            document.querySelector('#main').innerHTML = CartPage(JSON.parse(localStorage.getItem('UID')).tenTaiKhoan);
            cartUtils();
        }else{
            window.location.href = '/auth/login';
        }
    }else{
        document.querySelector('#main').innerHTML = ErrorPage();
    }
}