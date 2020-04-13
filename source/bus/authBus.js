import AuthDao from '../dao/authDao';
import TaiKhoan from '../dto/TaiKhoan';

export default class AuthBus{
    #authDao = null;

    constructor(){
        this.#authDao = new AuthDao();
    }

    async Register(taiKhoan){
        const result = await this.#authDao.Register(taiKhoan);
        if(result){
            return result;
        }
        return null
    }

    async Login(taiKhoan){
        const result = await this.#authDao.Login(taiKhoan);
        if(result){
            return result;
        }
        return null
    }

    async Logout(){
        const result = await this.#authDao.Logout();
        if(result){
            return result;
        }
        return null
    }
}