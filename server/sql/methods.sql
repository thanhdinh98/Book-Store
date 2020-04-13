use BookStore;


-- Các hàm xử lý Sách ---------------------------------------------------------------------

drop procedure if exists usp_ThemSach;
DELIMITER //
create procedure usp_ThemSach(
    in tenSach text charset utf8,
    in moTa text charset utf8,
    in ngonNgu text charset utf8,
    in hinhAnh text,
    in tenTacGia text charset utf8,
    in nhaSX text charset utf8,
    in loaiSach text charset utf8,
    in giaBan float
)begin

    if not exists(select TacGia.id from TacGia where TacGia.tenTacGia = tenTacGia)then
        insert into TacGia(tenTacGia) values(tenTacGia);
    end if;
    if not exists(select NhaSanXuat.id from NhaSanXuat where NhaSanXuat.tenNSX = nhaSX)then
        insert into NhaSanXuat(tenNSX) values(nhaSX);
    end if;

    set @idTacGia = (select TacGia.id from TacGia where TacGia.tenTacGia = tenTacGia);
    set @idNSX = (select NhaSanXuat.id from NhaSanXuat where NhaSanXuat.tenNSX = nhaSX);

    insert into Sach(tenSach, moTa, ngonNgu, hinhAnh, idTacGia, idnhaSanXuat, idloaiSach, giaBan)
    values(tenSach, moTa, ngonNgu, hinhAnh, @idTacGia, @idNSX, loaiSach, giaBan);
end //
DELIMITER ;


drop procedure if exists usp_DanhSachSach;
DELIMITER //
create procedure usp_DanhSachSach()begin
    select * from Sach;
end //
DELIMITER ;


drop procedure if exists usp_XoaSach;
DELIMITER //
create procedure usp_XoaSach(in id int)begin
    delete from Sach where Sach.id = id;
end //
DELIMITER ;


drop procedure if exists usp_DanhSachSachQuery;
DELIMITER //
create procedure usp_DanhSachSachQuery(in ts text charset utf8)begin
    select * from Sach
    where match(Sach.tenSach) against (ts in NATURAL LANGUAGE MODE);
end //
DELIMITER ;


drop procedure if exists usp_LaySachId;
DELIMITER //
create procedure usp_LaySachId(in id int)begin
    select * from Sach where Sach.id = id;
end //
DELIMITER ;


drop procedure if exists usp_SuaSach;
DELIMITER //
create procedure usp_SuaSach(
    in id int,
    in tenSach text charset utf8,
    in moTa text charset utf8,
    in ngonNgu text charset utf8,
    in hinhAnh text,
    in tenTacGia text charset utf8,
    in nhaSX text charset utf8,
    in loaiSach text charset utf8,
    in giaBan float
)begin

    if not exists(select TacGia.id from TacGia where TacGia.tenTacGia = tenTacGia)then
        insert into TacGia(tenTacGia) values(tenTacGia);
    end if;
    if not exists(select NhaSanXuat.id from NhaSanXuat where NhaSanXuat.tenNSX = nhaSX)then
        insert into NhaSanXuat(tenNSX) values(nhaSX);
    end if;

    set @idTacGia = (select TacGia.id from TacGia where TacGia.tenTacGia = tenTacGia);
    set @idNSX = (select NhaSanXuat.id from NhaSanXuat where NhaSanXuat.tenNSX = nhaSX);

    update Sach set Sach.tenSach = tenSach, Sach.moTa = moTa, Sach.ngonNgu = ngonNgu,
    Sach.hinhAnh = hinhAnh, Sach.idTacGia = @idTacGia, Sach.idnhaSanXuat = @idNSX,
    Sach.idloaiSach = loaiSach, Sach.giaBan = giaBan where Sach.id = id;
end //
DELIMITER ;

-- Các hàm xử lý Tác Giả ---------------------------------------------------------------------


drop procedure if exists usp_LoadTacGiaId;
DELIMITER //
create procedure usp_LoadTacGiaId(in id int)begin
    select TacGia.id, TacGia.tenTacGia from TacGia where TacGia.id = id;
end //
DELIMITER ;

-- Các hàm xử lý Nhà Sản Xuất ---------------------------------------------------------------------

drop procedure if exists usp_LoadNSX;
DELIMITER //
create procedure usp_LoadNSX()begin
    select NhaSanXuat.id, NhaSanXuat.tenNSX from NhaSanXuat;
end //
DELIMITER ;


drop procedure if exists usp_LoadNSXQuery;
DELIMITER //
create procedure usp_LoadNSXQuery(in tenNSX text charset utf8)begin
    select NhaSanXuat.id, NhaSanXuat.tenNSX from NhaSanXuat where 
    match(NhaSanXuat.tenNSX) against (tenNSX in NATURAL LANGUAGE MODE);
end //
DELIMITER ;


drop procedure if exists usp_ThemNSX;
DELIMITER //
create procedure usp_ThemNSX(in tenNSX text charset utf8)begin
    if not exists(select * from NhaSanXuat where NhaSanXuat.tenNSX = tenNSX)then
        insert into NhaSanXuat(tenNSX) values(tenNSX);
    end if;
end //
DELIMITER ;


drop procedure if exists usp_XoaNSX;
DELIMITER //
create procedure usp_XoaNSX(in id int)begin
    delete from NhaSanXuat where NhaSanXuat.id = id;
end //
DELIMITER ;


drop procedure if exists usp_LoadNSXId;
DELIMITER //
create procedure usp_LoadNSXId(in id int)begin
    select * from NhaSanXuat where NhaSanXuat.id = id;
end //
DELIMITER ;


drop procedure if exists usp_SuaNSX;
DELIMITER //
create procedure usp_SuaNSX(
    in id int,
    in tenNSX text charset utf8
)begin
    update NhaSanXuat set NhaSanXuat.tenNSX = tenNSX where NhaSanXuat.id = id;
end //
DELIMITER ;



-- Các hàm xử lý Thể Loai ---------------------------------------------------------------------

drop procedure if exists usp_LoadLoaiSach;
DELIMITER //
create procedure usp_LoadLoaiSach()begin
    select * from LoaiSach;
end //
DELIMITER ;

drop procedure if exists usp_XoaLoaiSach;
DELIMITER //
create procedure usp_XoaLoaiSach(in id varchar(2))begin
    delete from LoaiSach where LoaiSach.id = id;
end //
DELIMITER ;


drop procedure if exists usp_LoadLoaiSachId;
DELIMITER //
create procedure usp_LoadLoaiSachId(in id varchar(10))begin
    select * from LoaiSach where LoaiSach.id = id;
end //
DELIMITER ;


drop procedure if exists usp_ThemLoaiSach;
DELIMITER //
create procedure usp_ThemLoaiSach(
    in id varchar(2),
    in tenLoai text charset utf8
)begin
    if not exists(select * from LoaiSach where LoaiSach.id = id)then
        insert into LoaiSach(id, tenLoai) values(id, tenLoai);
        else
            update LoaiSach set LoaiSach.tenLoai = tenLoai where LoaiSach.id = id;
    end if;
end //
DELIMITER ;


drop procedure if exists usp_LoadLoaiSachQuery;
DELIMITER //
create procedure usp_LoadLoaiSachQuery(in tenLoai text charset utf8)begin
    select * from LoaiSach 
    where match(LoaiSach.tenLoai) against (tenLoai in NATURAL LANGUAGE MODE);
end //
DELIMITER ;



-- Các hàm xử lý Xác Thực ---------------------------------------------------------------------

drop procedure if exists usp_Register;
DELIMITER //
create procedure usp_Register(
    in tenTK text charset utf8,
    in tenDN text,
    in matKhau text
)begin
    if not exists(select * from QuanTriVien where QuanTriVien.tenDangNhap = tenDN)then
        insert into QuanTriVien(tenTaiKhoan, tenDangNhap, matKhau)
        values(tenTK, tenDN, matKhau);
    end if;
end //
DELIMITER ;


drop procedure if exists usp_Login;
DELIMITER //
create procedure usp_Login(
    in tenDN text,
    in matKhau text
)begin
    select * from QuanTriVien 
    where QuanTriVien.tenDangNhap = tenDN and QuanTriVien.matKhau = matKhau;
end //
DELIMITER ;


-- Các hàm xử lý Đơn Hàng ---------------------------------------------------------------------


drop procedure if exists usp_LoadKhachHangId;
DELIMITER //
create procedure usp_LoadKhachHangId(in id int)
begin
    select * from TaiKhoan where TaiKhoan.id = id;
end //
DELIMITER ;

drop procedure if exists usp_LoadDonHangKhachHang;
DELIMITER //
create procedure usp_LoadDonHangKhachHang()
begin
    select * from DonHang;
end //
DELIMITER ;

drop procedure if exists usp_GiaoHang;
DELIMITER //
create procedure usp_GiaoHang(in id int)
begin
    update DonHang set DonHang.trangThai = 1 where DonHang.id = id;
end //
DELIMITER ;



-- Các hàm xử lý API ---------------------------------------------------------------------

drop procedure if exists usp_LoadSachTheoTheLoai;
DELIMITER //
create procedure usp_LoadSachTheoTheLoai(
    in o int,
    in qua int,
    in idTheLoai varchar(2)
)begin
    select * from Sach
    where Sach.idloaiSach = idTheLoai limit qua offset o;
end //
DELIMITER ;

drop procedure if exists usp_LoadSach;
DELIMITER //
create procedure usp_LoadSach(
    in o int,
    in qua int
)begin
    select *  from Sach
    limit qua offset o;
end //
DELIMITER ;


drop procedure if exists usp_TongSoTrang;
DELIMITER //
create procedure usp_TongSoTrang()begin
    select count(*) as tongSoTrang from Sach;
end //
DELIMITER ;

drop procedure if exists usp_TongSoTrangTheoTheLoai;
DELIMITER //
create procedure usp_TongSoTrangTheoTheLoai(in theLoai varchar(2))begin
    select count(*) as tongSoTrang from Sach where Sach.idloaiSach = theLoai;
end //
DELIMITER ;

drop procedure if exists usp_TimKiemSach;
DELIMITER //
create procedure usp_TimKiemSach(
    in o int,
    in qa int,
    in t varchar(3),
    in q text
)begin
    if t = 'ts' then 
    select * from Sach
    where match(Sach.tenSach) against (q in NATURAL LANGUAGE MODE) limit qa offset o;

    elseif t = 'nsx' then
    select Sach.id, Sach.tenSach, Sach.moTa, Sach.ngonNgu, Sach.hinhAnh,
            Sach.idtacGia, Sach.idnhaSanXuat, Sach.idloaiSach, Sach.giaBan from Sach, NhaSanXuat        
    where NhaSanXuat.id = Sach.idnhaSanXuat
    and match(NhaSanXuat.tenNSX) against (q in NATURAL LANGUAGE MODE) limit qa offset o;

    elseif t = 'tg' then
    select Sach.id, Sach.tenSach, Sach.moTa, Sach.ngonNgu, Sach.hinhAnh,
            Sach.idtacGia, Sach.idnhaSanXuat, Sach.idloaiSach, Sach.giaBan from Sach, TacGia
    where Sach.idtacGia = TacGia.id
    and match(TacGia.tenTacGia) against (q in NATURAL LANGUAGE MODE) limit qa offset o;
    end if;
end //
DELIMITER ;

drop procedure if exists usp_TongTrangTimKiem;
DELIMITER //
create procedure usp_TongTrangTimKiem(
    in t varchar(3),
    in q text
)begin
    if t = 'ts' then 
    select count(*) as tongSoTrang from Sach
    where match(Sach.tenSach) against (q in NATURAL LANGUAGE MODE);

    elseif t = 'nsx' then
    select count(*) as tongSoTrang from Sach, NhaSanXuat
    where NhaSanXuat.id = Sach.idnhaSanXuat
    and match(NhaSanXuat.tenNSX) against (q in NATURAL LANGUAGE MODE);

    elseif t = 'tg' then
    select count(*) as tongSoTrang from Sach, TacGia
    where TacGia.id = Sach.idtacGia 
    and match(TacGia.tenTacGia) against (q in NATURAL LANGUAGE MODE);
    end if;
end //
DELIMITER ;

drop procedure if exists usp_ThemTaiKhoan;
DELIMITER //
create procedure usp_ThemTaiKhoan(
    in tenTaiKhoan varchar(30),
    in tenDangNhap text,
    in matKhau text,
    in email text
)begin
    if not exists (select * from TaiKhoan where TaiKhoan.tenDangNhap = tenDangNhap) then
        insert into TaiKhoan(tenTaiKhoan, email, matKhau, tenDangNhap) 
        values (tenTaiKhoan, email, matKhau, tenDangNhap);
    end if;
end //
DELIMITER ;

drop procedure if exists usp_LoginTK;
DELIMITER //
create procedure usp_LoginTK(
    in tenDN text,
    in matKhau text
)begin
    select * from TaiKhoan 
    where TaiKhoan.tenDangNhap = tenDN and TaiKhoan.matKhau = matKhau;
end //
DELIMITER ;

drop procedure if exists usp_ThemDonHang;
DELIMITER //
create procedure usp_ThemDonHang(
    in id int,
    in idKH int,
    in tongTien float,
    in soDienThoai varchar(11),
    in diaChi text charset utf8
)begin
    insert into DonHang(id, idKH, tongTien, soDienThoai, diaChi, trangThai)
    values(id, idKH, tongTien, soDienThoai, diaChi, 0);
end //
DELIMITER ;

drop procedure if exists usp_ThemChiTietDonHang;
DELIMITER //
create procedure usp_ThemChiTietDonHang(
    in idSach int,
    in idDonHang int,
    in soLuong int
)begin
    insert into ChiTietDonHang(idSach, idDonHang, soLuong)
    values(idSach, idDonHang, soLuong);
end //
DELIMITER ;

drop procedure if exists usp_LoadDonHang;
DELIMITER //
create procedure usp_LoadDonHang(
    in idKH int
)begin
    select DonHang.id, DonHang.tongTien, DonHang.trangThai from DonHang where DonHang.idKH = idKH;
end //
DELIMITER ;

drop procedure if exists usp_LoadChiTietDonHang;
DELIMITER //
create procedure usp_LoadChiTietDonHang(
    in idDH int
)begin
    select Sach.id as idSach, Sach.tenSach, Sach.hinhAnh, Sach.giaBan, ChiTietDonHang.soLuong from ChiTietDonHang
    join Sach on ChiTietDonHang.idSach = Sach.id and ChiTietDonHang.idDonHang = idDH;
end //
DELIMITER ;
