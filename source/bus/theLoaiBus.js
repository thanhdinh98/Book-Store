import TheLoaiDao from '../dao/theLoaiDao';
import TheLoai from '../dto/TheLoai';

export default class TheLoaiBus{
    #theLoaiDao = null;

    constructor(){
        this.#theLoaiDao = new TheLoaiDao();
    }

    async LoadTheLoai(){
        const result = await this.#theLoaiDao.LoadTheLoai();
        if(result){
            const mangTheLoai = [];
            for(let theLoai of result){
                mangTheLoai.push(new TheLoai(theLoai.id, theLoai.tenLoai));
            }
            return mangTheLoai;
        }
        return null
    }

    async LoadTheLoaiId(g){
        const result = await this.#theLoaiDao.LoadTheLoaiId(g);
        if(result){
            return new TheLoai(result.id, result.tenLoai);
        }
        return null
    }
}