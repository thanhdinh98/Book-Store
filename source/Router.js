import {authRoutes} from './routes/authRoutes';
import {sachRoutes} from './routes/sachRoutes';
import {gioHangRoutes} from './routes/gioHangRoutes';

import {ErrorPage} from './gui/pages/404';

export default function Router(){
    const pathName = window.location.pathname;
    const parentPath = window.location.pathname.split('/');

    if(pathName === '/'){
        window.location.href = '/sach?page=1'
    }else if(parentPath[1] === 'sach'){
        sachRoutes('/sach', pathName);
    }else if(parentPath[1] === 'auth'){
        authRoutes('/auth', pathName);
    }else if(parentPath[1] === 'gio-hang'){
        gioHangRoutes('/gio-hang', pathName);
    }else{
        document.querySelector('#main').innerHTML = ErrorPage();
    }
}