import GioHangBus from '../bus/gioHangBus';

export const LoadGioHang = async (idKH)=>{
    const gioHangBus = new GioHangBus();
    const result = await gioHangBus.LoadGioHang(idKH);
    if(!JSON.parse(result).error){
        const dsDonHang = JSON.parse(result).dsDonHang;
        for(let donHang of dsDonHang){
            const div = document.createElement('div');
            div.innerHTML = `
                <div>
                    <div class='float-left font-weight-bold mb-3 don-hang-${donHang.id}' data-id='${donHang.id}'>
                        Mã đơn hàng: 
                        <span class='font-italic'>${donHang.id}</span>
                    </div>
                    <div class='float-left ml-3'>
                        ${Number(donHang.trangThai) === 1 ? '<span class="text-success font-weight-bold font-italic">Đã giao hàng</span>' 
                        : '<span class="text-danger font-weight-bold font-italic">Chưa giao hàng</span>'}
                    </div>
                    <div class='float-right font-weight-bold'>
                        Tổng tiền: 
                        <span class='text-success'>${donHang.tongTien} đ</span>
                    </div>
                </div>
                <div class='table-responsive'>
                    <table class='table cart dtb-${donHang.id}' style='display: none;'>
                        <thead>
                            <tr>
                                <th scope='col' width=100>ID sách</th>
                                <th scope='col' width=100>Hình ảnh</th>
                                <th scope='col' width=400>Tên sách</th>                                                    
                                <th scope='col' width=100>Số lượng</th>
                                <th scope='col' width=100>Giá bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${donHang.chiTietDonHang.map(chiTietDonHang => {
                                return `
                                    <tr>
                                        <th scope='row' class='align-middle'>${chiTietDonHang.sach.id}</th>
                                        <td>
                                            <img src='${chiTietDonHang.sach.hinhAnh}' class='img-fluid'>
                                        </td>
                                        <td class='align-middle'>${chiTietDonHang.sach.tenSach}</td>
                                        <td class='align-middle'>${chiTietDonHang.soLuong}</td>
                                        <td class='align-middle gia-ban'>${chiTietDonHang.sach.donGia}</td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>
                </div>
            `;
            document.querySelector('#donHangDaDat').append(div);
        }
    }
}

export const ThemDonHang = async (donHang)=>{
    const gioHangBus = new GioHangBus();
    const result = await gioHangBus.ThemDonHang(donHang);
    if(!JSON.parse(result).error){
        localStorage.removeItem('donHang');
        localStorage.removeItem('items');

        window.location.href = '/gio-hang';
    }
}