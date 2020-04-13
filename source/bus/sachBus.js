import SachDao from '../dao/sachDao';
import Sach from '../dto/Sach';

export default class SachBus{
    #sachDao = null;

    constructor(){
        this.#sachDao = new SachDao();
    }

    async LoadSach(options){
        const result = await this.#sachDao.LoadSach(options);
        if(result){
            const mangSach = [];
            for(let sach of result){
                mangSach.push(new Sach(
                    sach.id, sach.tenSach, sach.moTa, sach.ngonNgu,
                    sach.hinhAnh,  sach.donGia, sach.tacGia, sach.nhaSX, sach.loaiSach
                ));
            }
            return mangSach;
        }
        return null
    }

    async TongSoTrang(g){
        const result = await this.#sachDao.TongSoTrang(g);
        if(result){
            return result.tongSoTrang;
        }
        return null
    }

    async TimKiemSach(options){
        const result = await this.#sachDao.TimKiemSach(options);
        if(result){
            const mangSach = [];
            for(let sach of result){
                mangSach.push(new Sach(
                    sach.id, sach.tenSach, sach.moTa, sach.ngonNgu,
                    sach.hinhAnh,  sach.donGia, sach.tacGia, sach.nhaSX, sach.loaiSach
                ));
            }
            return mangSach;
        }
        return null
    }

    async PhanTrangTimKiem(t, q){
        const result = await this.#sachDao.PhanTrangTimKiem(t, q);
        if(result){
            return result.tongSoTrang;
        }
        return null
    }

    async LaySachId(id){
        const sach = await this.#sachDao.LaySachId(id);
        if(sach){
            return new Sach(
                sach.id, sach.tenSach, sach.moTa, sach.ngonNgu,
                sach.hinhAnh,  sach.donGia, sach.tacGia, sach.nhaSX, sach.loaiSach
            );
        }
        return null;
    }
}