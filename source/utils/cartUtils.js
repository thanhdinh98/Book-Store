import {LoadGioHang, ThemDonHang} from '../handle/gioHangHandle';
import {LoadTheLoai} from '../handle/theLoaiHandle';
import {CheckUser} from '../handle/authHandle';

export const cartUtils = async ()=>{

    CheckUser();
    LoadTheLoai();
    await LoadGioHang(JSON.parse(localStorage.getItem('UID')).id);

    (function CheckGioHang(){
        if(!localStorage.getItem('items') || localStorage.getItem('items') === '[]'){
            document.querySelector('#donHang').innerHTML = `
                <div class='text-center font-weight-bold font-italic'>Giỏ hàng chưa có sản phẩm !</div>
            `;
            document.querySelector('#donHang + div').innerHTML = '';
        }
    })();

    (function ThanhTien(){
        if(!localStorage.getItem('items') || localStorage.getItem('items') === '[]'){

        }else{
            const listSach = JSON.parse(localStorage.getItem('items'));
            let thanhTien = 0;
    
            for(let sach of listSach){
                thanhTien  += Number(sach.tongTien);
            }
        
            document.querySelector('#thanhTien').innerText = thanhTien + ' đ';
        }
    })();

    (function LoadDonHang(){

        const listSach = JSON.parse(localStorage.getItem('items'));
        if(listSach){

            const donHang = document.querySelector('#donHang tbody');
            if(donHang){

                donHang.innerHTML = '';
                for(let sach of listSach){
                    const item = document.createElement('tr');
                    item.innerHTML = `
                        <th scope='row' class='align-middle'>${sach.id}</th>
                        <td>
                            <img src='${sach.hinhAnh}' class='img-fluid'>
                        </td>
                        <td class='align-middle'>${sach.tenSach}</td>
                        <td class='align-middle'>
                            <input type='number' value='${sach.soLuong}' step=1 min=1 max=10
                                onchange="
                                    const listSach = JSON.parse(localStorage.getItem('items'));
                                    for(let sach of listSach){
                                        if(sach.id == ${sach.id}){
                                            sach.tongTien = Number(this.value) * Number(sach.donGia);
                                            sach.soLuong = this.value;
                                            break;
                                        }
                                    }
                                    localStorage.setItem('items', JSON.stringify(listSach));
                                    window.location.href = '/gio-hang';
                                "
                            >
                        </td>
                        <td class='gia-ban align-middle'>${sach.donGia}</td>
                        <td class='align-middle'>${sach.tongTien}</td>
                        <td class='text-danger align-middle'>
                            <i class="fas fa-trash-alt" onclick="
                                const xoa = confirm('Bạn có chắc muốn xóa món hàng ${sach.id} ?');
                                if(xoa){
                                    const listSach = JSON.parse(localStorage.getItem('items'));
                                    listSach.splice(listSach.findIndex(item => item.id == ${sach.id}), 1);
                                    localStorage.setItem('items', JSON.stringify(listSach));
                                    window.location.href = '/gio-hang';
                                }
                            ">
                        </i></td>
                    `;
                    donHang.append(item);
                }
            }
        }
    })();

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

    if(!localStorage.getItem('items') || localStorage.getItem('items') === '[]'){
    }else{
        document.querySelector('#cart button').onclick = ()=>{
            if(localStorage.getItem('items') !== '[]'){
                const maDonHang = Math.round(Math.random() * (9999 - 1000) + 1000);
    
                const listSach = JSON.parse(localStorage.getItem('items'));
                let thanhTien = 0;
                for(let sach of listSach){
                    thanhTien  += Number(sach.tongTien);
                }
        
                const donHang = {
                    idDH: maDonHang,
                    idKH: JSON.parse(localStorage.getItem('UID')).id,
                    tongTien: thanhTien,
                    items: JSON.parse(localStorage.getItem('items')).map((item)=>{
                        return {
                            id: item.id,
                            soLuong: item.soLuong
                        };
                    })
                };
                
                localStorage.setItem('donHang', JSON.stringify(donHang));
                document.querySelector('#maDonHang span').innerHTML = maDonHang;            
            }else{
                if(localStorage.getItem('donHang')){
                    localStorage.removeItem('donHang');
                }
            }
        }
    }

    document.querySelector('#datHang').onclick = (e)=>{
        e.preventDefault();
        if(localStorage.getItem('donHang')){
            const diaChi = document.querySelector('#diaChi input').value;
            const sdt = document.querySelector('#sdt input').value;
            if(diaChi === '' || sdt === ''){
                alert('Bạn cần nhập đầy đủ thông tin trước khi đặt hàng !');
            }else{
                const donHang = JSON.parse(localStorage.getItem('donHang'));
                donHang.diaChi = diaChi;
                donHang.sdt = sdt;

                ThemDonHang(donHang);
            }
        }else{
            alert('Bạn phải thêm sản phẩm vào giỏ hàng trước khi đặt hàng !');
        }
    }

    for(const div of document.querySelectorAll('div[class*="don-hang"]')){
        div.onclick = ()=>{
            const table = document.querySelector(`.dtb-${div.getAttribute('data-id')}`);
            if(table.getAttribute('style')){
                table.removeAttribute('style');
            }else{
                table.setAttribute('style','display: none;');
            }
        }
    }
}