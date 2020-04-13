import {LoadSach, PhanTrang} from '../handle/sachHandle';
import {LoadTheLoai, LoadTheLoaiId} from '../handle/theLoaiHandle'
import {CheckUser} from '../handle/authHandle';
import SachBus from '../bus/sachBus';

export const mainUtils = (g = null, p = 1)=>{

    CheckUser();
    LoadTheLoai(g);
    LoadSach(g, p);
    PhanTrang(g);
    if(g){
        LoadTheLoaiId(g);
    }

    for(let node of document.querySelectorAll('#filter span')){
        node.onclick = ()=>{
            const isChoose = node.getAttribute('ischoose');
            if(isChoose){
                node.removeAttribute('class');
                node.removeAttribute('ischoose');
            }else{
                node.removeAttribute('class');
                node.setAttribute('class', 'choose');
                node.setAttribute('ischoose', 'true');
            }
        }
    }

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