import Ajax from "./ajax";
import {TheLoai} from '../api';

export default class TheLoaiDao{
    #ajax = null;
    
    constructor(){
        this.#ajax = new Ajax();
    }

    async LoadTheLoai(){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(TheLoai.loadTheLoai, body);
        if(result){
            return result;
        }
        return null;
    }

    async LoadTheLoaiId(g){
        const body = {
            method: 'get',
            mode: 'cors'
        };
        const result = await this.#ajax.SendRequest(TheLoai.loadTheLoaiId(g), body);
        if(result){
            return result;
        }
        return null;
    }
}