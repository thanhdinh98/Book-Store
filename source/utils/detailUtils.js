import {LaySachId} from '../handle/sachHandle';
import {LoadTheLoai} from '../handle/theLoaiHandle';
import {CheckUser} from '../handle/authHandle';

export const detailUtils = async (id, DetailPage)=>{

    const sach = await LaySachId(id);

    document.querySelector('#main').innerHTML = DetailPage(sach);

    CheckUser();
    LoadTheLoai();

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

    document.querySelector('#them').onclick = (e)=>{

        if(localStorage.getItem('UID')){
            if(localStorage.getItem('items')){

                const listSach = JSON.parse(localStorage.getItem('items'));
                let isDuplicate = false;

                for(let item of listSach){
                    if(item.id === sach.id){
                        item.soLuong += 1;
                        item.tongTien = Number(item.tongTien) + Number(item.tongTien);
                        isDuplicate = true;
                        break;
                    }
                }

                if(isDuplicate){
                    localStorage.setItem('items', JSON.stringify(listSach));
                }else{
                    sach.soLuong = 1;
                    sach.tongTien = sach.donGia;
                    listSach.push(sach);
                    localStorage.setItem('items', JSON.stringify(listSach));
                }
                
                
            }else{
                sach.soLuong = 1;
                sach.tongTien = sach.donGia;
                localStorage.setItem('items', `[${JSON.stringify(sach)}]`);
            }

            window.location.href = '/gio-hang';
        }else{
            window.location.href = '/auth/login';
        }
    }
}