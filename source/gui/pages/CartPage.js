import {CommonPage} from './CommonPage';
import {Modal} from '../components/modal';
import img from '../../public/img/item.jpg';

export const CartPage = (tenTaiKhoan)=>{

    const content = `
        <div>
            <div class='mt-5 cart' id='cart'>
                <h2 class='mb-3'>Giỏ hàng của ${tenTaiKhoan}</h2>
                <div id='donHang' class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col' width=100>ID sách</th>
                                <th scope='col' width=100>Hình ảnh</th>
                                <th scope='col' width=400>Tên sách</th>                                                    
                                <th scope='col' width=100>Số lượng</th>
                                <th scope='col' width=100>Giá bán</th>
                                <th scope='col' width=150>Tổng tiền</th>
                                <th scope='col'></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class='text-right'>
                    Thành tiền: <span id='thanhTien'></span>
                    <button class='btn btn-primary' data-toggle="modal" data-target="#thanhToanModal">Thanh toán</button>
                </div>
            </div>
            <div>${Modal()}</div>
            <div class='mt-5 cart'>
                <h2 class='mb-3'>Đơn hàng đã đặt</h2>
                <div id='donHangDaDat'></div>
            </div>
        </div>
    `;

    return CommonPage(content);
}