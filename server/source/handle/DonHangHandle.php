<?php
namespace Handle\DonHang{

    require_once($_SERVER['DOCUMENT_ROOT'].'/bus/DonHangBus.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/dto/DonHang.php');

    function LoadDonHang()
    {
        $donHangBus = new \Bus\DonHang\DonHangBus();
        $result = $donHangBus->LoadDonHang();
        if($result)
        {
            foreach($result as $donHang){
                $dsChiTietDonHang = $donHang->chiTietDonHang;
                echo "
                    <div class='mt-5'>
                        <h3>Khách hàng: ".$donHang->khachHang->tenTaiKhoan."</h3>                    
                        <h4>Mã đơn hàng: ".$donHang->id."</h4>
                        <a href='/don-hang/giao-hang?id=".$donHang->id."'>
                            <button class='float-right btn btn-primary'>Giao hàng</button>
                        </a>
                        <div class='table-responsive'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Tên sách</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>".implode('', array_map(
                                    function($ctdh){
                                        return "
                                            <tr>
                                                <td>".$ctdh->sach->tenSach."</td>
                                                <td>".$ctdh->sach->donGia."</td>
                                                <td>".$ctdh->soLuong."</td>
                                            </tr>
                                        ";
                                    }, $dsChiTietDonHang
                                ))."</tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                ";
            }
        }
        else echo "Loi";
    }

    function GiaoHang($id){
        $donHangBus = new \Bus\DonHang\DonHangBus();
        $result = $donHangBus->GiaoHang($id);
        if($result){
            header('Location: http://localhost:'.$_SERVER['SERVER_PORT'].'/don-hang');
        }else echo "Có lỗi xảy ra";
    }
}
