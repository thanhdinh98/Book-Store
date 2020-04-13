import Ajax from "./ajax";
import {Sach, Trang} from '../api';

export default class SachDao{
    #ajax = null;
    
    constructor(){
        this.#ajax = new Ajax();
    }

    async LoadSach(options){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Sach.LoadSach(options), body);
        if(result){
            return result;
        }
        return null;
    }

    async TongSoTrang(g){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Sach.PhanTrang(g), body);
        if(result){
            return result;
        }
        return null;
    }

    async TimKiemSach(options){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Sach.TimKiemSach(options), body);
        if(result){
            return result;
        }
        return null;
    }

    async PhanTrangTimKiem(t, q){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Sach.PhanTrangTimKiem(t, q), body);
        if(result){
            return result;
        }
        return null;
    }

    async LaySachId(id){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(Sach.LaySachId(id), body);
        if(result){
            return result;
        }
        return null;
    }
}