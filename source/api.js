export const TheLoai = {
    loadTheLoai: 'http://localhost:5000/api/the-loai',

    loadTheLoaiId(g){
        return `http://localhost:5000/api/the-loai?g=${g}`;
    }
};

export const Sach = {

    LoadSach(options){
        if(options.g){
            return `http://localhost:5000/api/sach?o=${options.o}&qa=${options.qa}&g=${options.g}`;    
        }
        return `http://localhost:5000/api/sach?o=${options.o}&qa=${options.qa}`;
    },

    PhanTrang(g){
        if(g){
            return `http://localhost:5000/api/tong-so-trang?g=${g}`;
        }
        return 'http://localhost:5000/api/tong-so-trang';
    },

    TimKiemSach(options){
        return `http://localhost:5000/api/sach/tim-kiem?o=${options.paging.o}&qa=${options.paging.qa}&t=${options.search.t}&q=${options.search.q}`;
    },

    PhanTrangTimKiem(t, q){
        return `http://localhost:5000/api/sach/tim-kiem/tong-so-trang?t=${t}&q=${q}`;
    },

    LaySachId(id){
        return `http://localhost:5000/api/sach?id=${id}`;
    }
};

export const Auth = {
    Register(){
        return 'http://localhost:5000/api/auth/register';
    },

    Login(){
        return 'http://localhost:5000/api/auth/login';
    },

    Logout(){
        return 'http://localhost:5000/api/auth/logout';
    }
};

export const GioHang = {
    LoadGioHang(){
        return 'http://localhost:5000/api/gio-hang';
    },

    ThemDonHang(){
        return 'http://localhost:5000/api/gio-hang/them-don-hang';
    }
};