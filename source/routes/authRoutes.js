import {LoginPage} from '../gui/pages/LoginPage';
import {loginUtils} from '../utils/loginUtils';

import {RegisterPage} from '../gui/pages/RegisterPage';
import {registerUtils} from '../utils/registerUtils';

import {Logout} from '../handle/authHandle';

import {ErrorPage} from '../gui/pages/404';

export const authRoutes = async (parentPath, pathName)=>{
    if(pathName === `${parentPath}/login`){
        document.querySelector('#main').innerHTML = LoginPage();
        loginUtils();
    }else if(pathName === `${parentPath}/register`){
        document.querySelector('#main').innerHTML = RegisterPage();
        registerUtils();
    }else if(pathName === `${parentPath}/logout`){
        await Logout();
    }else{
        document.querySelector('#main').innerHTML = ErrorPage();
    }
}