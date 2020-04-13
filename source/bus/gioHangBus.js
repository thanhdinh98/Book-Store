import GioHangDao from '../dao/gioHangDao';

export default class GioHangBus{
    #gioHangDao = null;

    constructor(){
        this.#gioHangDao = new GioHangDao();
    }

    async LoadGioHang(idKH){
        const result = await this.#gioHangDao.LoadGioHang(idKH);
        if(result){
            return result;
        }
        return null
    }

    async ThemDonHang(donHang){
        const result = await this.#gioHangDao.ThemDonHang(donHang);
        if(result){
            return result;
        }
        return null
    }
}