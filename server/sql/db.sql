drop database if exists BookStore;
create database BookStore;
use BookStore;

drop table if exists Sach;
create table Sach(
    id int primary key auto_increment,
    tenSach text character set utf8 not null,
    moTa text character set utf8,
    ngonNgu text character set utf8,
    hinhAnh text not null,
    idtacGia int,
    idnhaSanXuat int,
    idloaiSach varchar(2),
    giaBan float,
    fulltext(tenSach)
)charset=utf8;

drop table if exists LoaiSach;
create table LoaiSach(
    id varchar(2) primary key,
    tenLoai text character set utf8 not null,
    fulltext(tenLoai)
)charset=utf8;

drop table if exists NhaSanXuat;
create table NhaSanXuat(
    id int primary key auto_increment,
    tenNSX text character set utf8 not null,
    fulltext(tenNSX)
)charset=utf8;

drop table if exists TacGia;
create table TacGia(
    id int primary key auto_increment,
    tenTacGia text character set utf8 not null,
    fulltext(tenTacGia)
)charset=utf8;

drop table if exists TaiKhoan;
create table TaiKhoan(
    id int primary key auto_increment,
    tenTaiKhoan varchar(30) not null unique,
    email text not null,
    matKhau text not null,
    tenDangNhap text character set utf8 not null,
    fulltext(tenDangNhap)
)charset=utf8;

drop table if exists QuanTriVien;
create table QuanTriVien(
    id int primary key auto_increment,
    tenTaiKhoan text not null,
    tenDangNhap text character set utf8 not null,
    matKhau text not null
)charset=utf8;

drop table if exists DonHang;
create table DonHang(
    id int primary key,
    idKH int,
    tongTien float,
    soDienThoai varchar(11) not null,
    diaChi text character set utf8 not null,
    trangThai int
)charset=utf8;

drop table if exists ChiTietDonHang;
create table ChiTietDonHang(
    id int primary key auto_increment,
    idSach int,
    idDonHang int,
    soLuong int
)charset=utf8;

alter table Sach add constraint UFK_Sach_TacGia
foreign key (idtacGia) references TacGia(id)
on delete set null;

alter table Sach add constraint UFK_Sach_NhaSanXuat
foreign key (idnhaSanXuat) references NhaSanXuat(id)
on delete set null;

alter table Sach add constraint UFK_Sach_LoaiSach
foreign key (idloaiSach) references LoaiSach(id)
on delete set null;

alter table DonHang add constraint UFK_DonHang_TaiKhoan
foreign key (idKH) references TaiKhoan(id)
on delete set null;

alter table ChiTietDonHang add constraint UFK_ChiTietDonHang_DonHang
foreign key (idDonHang) references DonHang(id)
on delete set null;

alter table ChiTietDonHang add constraint UFK_ChiTietDonHang_Sach
foreign key (idSach) references Sach(id)
on delete set null;