export const Detail = (sach)=>{
    return `
        <div class='detail'>
            <div>
                <h3>${sach.tenSach}</h3>
            </div>
            <div class='info'>
                <div>Thể loại: <a href='#'>${sach.loaiSach === null ? '' : sach.loaiSach.tenLoai}</a></div>
                <div>Tác giả: <a href='#'>${sach.tacGia === null ? '' : sach.tacGia.tenTacGia}</a></div>
                <div>Nhà sản xuất: <a href='#'>${sach.nhaSX === null ? '' : sach.nhaSX.tenNSX}</a></div>
            </div>
            <div>
                <textarea class='form-control' readonly>${sach.moTa}</textarea>
            </div>
            <div class='price'>Giá bán: <span>${sach.donGia} đ</span></div>
            <div class='text-center'>
                <a href='#' id='them'><button class='btn btn-outline-primary'>Thêm vào giỏ hàng</button></a>
            </div>
            <div class='text-center cb'>
                <a href='/'>Quay lại trang chủ</a>
            </div>
        </div>
    `;
}
