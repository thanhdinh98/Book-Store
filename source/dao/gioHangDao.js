import Ajax from "./ajax";
import {GioHang} from '../api';

export default class GioHangDao{
    #ajax = null;
    
    constructor(){
        this.#ajax = new Ajax();
    }

    async LoadGioHang(idKH){
        const body = {
            method: 'post',
            mode: 'cors',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({idKH: idKH})
        };
        const result = await this.#ajax.SendRequest(GioHang.LoadGioHang(), body);
        if(result){
            return result;
        }
        return null;
    }

    async ThemDonHang(donHang){
        const body = {
            method: 'post',
            mode: 'cors',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(donHang)
        };
        const result = await this.#ajax.SendRequest(GioHang.ThemDonHang(), body);
        if(result){
            return result;
        }
        return null;
    }
}