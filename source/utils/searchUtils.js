import {LoadTheLoai} from '../handle/theLoaiHandle';
import {TimKiemSach, PhanTrangTimKiem} from '../handle/sachHandle';
import {CheckUser} from '../handle/authHandle';

export const searchUtils = (t = null, q = null, p = null)=>{

    CheckUser();
    LoadTheLoai();
    PhanTrangTimKiem(t, q);
    TimKiemSach(t, q, p);


    document.querySelector('#search span').onclick = ()=>{
        const searchType = document.querySelector('#search select').value;
        const searchString = document.querySelector('#search input');

        if(searchString.value !== ''){

            window.location.href = `/sach/tim-kiem?page=1&t=${searchType}&q=${searchString.value}`;

        }else{
            alert('Vui lòng nhập thông tin vào thanh tìm kiếm !');
        }

        searchString.value = '';
    }
}