export default class Sach{
    id;
    tenSach;
    moTa;
    ngonNgu;
    hinhAnh;
    donGia;
    tacGia;
    nhaSX;
    loaiSach;
    
    constructor(
        id, tenSach, moTa, ngonNgu, hinhAnh,
        donGia, tacGia, nhaSX, loaiSach
    ){
        this.id = id;
        this.tenSach = tenSach;
        this.moTa = moTa;
        this.ngonNgu = ngonNgu;
        this.hinhAnh = hinhAnh;
        this.donGia = donGia;
        this.tacGia = tacGia;
        this.nhaSX = nhaSX;
        this.loaiSach = loaiSach;
    }
}