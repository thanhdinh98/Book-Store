export const Modal = ()=>{
    return `
        <div class="modal fade" id="thanhToanModal" tabindex="-1" role="dialog" aria-labelledby="thanhToanModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="thanhToanModalTitle">Điền thông tin giao hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body infos">
                        <div id='maDonHang' class='font-weight-bold'>Mã đơn hàng: <span class='font-italic'></span></div>
                        <div id='diaChi'>
                            Địa chỉ giao hàng:
                            <input type='text' class='form-control'>
                        </div>
                        <div id='sdt'>
                            Số điện thoại:
                            <input type='text' class='form-control'>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-success" id='datHang'>Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    `;
}
