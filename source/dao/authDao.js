import Ajax from "./ajax";
import {Auth} from '../api';

export default class AuthDao{
    #ajax = null;
    
    constructor(){
        this.#ajax = new Ajax();
    }

    async Register(taiKhoan){
        const body = {
            method: 'post',
            mode: 'cors',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(
                {
                    tenDangNhap: taiKhoan.tenDangNhap,
                    tenTaiKhoan: taiKhoan.tenTaiKhoan,
                    matKhau: taiKhoan.matKhau,
                    email: taiKhoan.email
                }
            )
        };
        const result = await this.#ajax.SendRequest(Auth.Register(), body);
        if(result){
            return result;
        }
        return null;
    }

    async Login(taiKhoan){
        const body = {
            method: 'post',
            mode: 'cors',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(
                {
                    tenDangNhap: taiKhoan.tenDangNhap,
                    matKhau: taiKhoan.matKhau
                }
            )
        };
        const result = await this.#ajax.SendRequest(Auth.Login(), body);
        if(result){
            return result;
        }
        return null;
    }

    async Logout(){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Auth.Logout(), body);
        if(result){
            return result;
        }
        return null;
    }
}