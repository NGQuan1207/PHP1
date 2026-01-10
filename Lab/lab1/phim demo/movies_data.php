<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['theLoai'])) {
    $_SESSION['theLoai'] = [
        ['bieuTuong' => 'fas fa-fire', 'ten' => 'Hành động'],
        ['bieuTuong' => 'fas fa-heart', 'ten' => 'Hài hước'],
        ['bieuTuong' => 'fas fa-star', 'ten' => 'Tâm lí'],
        ['bieuTuong' => 'fas fa-ghost', 'ten' => 'Kinh dị'],
        ['bieuTuong' => 'fas fa-film', 'ten' => 'Điện ảnh']
    ];
}

$theLoai = $_SESSION['theLoai'];

if (!isset($_SESSION['tatCaPhim'])) {
    $_SESSION['tatCaPhim'] = [
        ['hinhAnh' => 'img/latmat7.jpg', 'tieuDe' => 'Lật mặt 7', 'theLoai' => 'Tình cảm', 'luotXem' => 99000, 'ngayTao' => '2024-01-15'],
        ['hinhAnh' => 'img/connhot.webp', 'tieuDe' => 'Con nhót mót chồng', 'theLoai' => 'Hài hước', 'luotXem' => 55500, 'ngayTao' => '2024-01-20'],
        ['hinhAnh' => 'img/datrung.webp', 'tieuDe' => 'Đất rừng phương nam', 'theLoai' => 'Tình cảm, hài hước', 'luotXem' => 800, 'ngayTao' => '2024-01-25'],
        ['hinhAnh' => 'img/nai.jpg', 'tieuDe' => 'Mai', 'theLoai' => 'Tình cảm', 'luotXem' => 85600, 'ngayTao' => '2023-12-10'],
        ['hinhAnh' => 'img/nhabanu.webp', 'tieuDe' => 'Nhà bà nữ', 'theLoai' => 'Tình cảm Gia đình', 'luotXem' => 120000, 'ngayTao' => '2023-11-05'],
        ['hinhAnh' => 'img/cai-gia-cua-hanh-phuc-poster.webp', 'tieuDe' => 'Cái giá của hạnh phúc', 'theLoai' => 'Tình cảm', 'luotXem' => 132000, 'ngayTao' => '2023-10-20'],
        ['hinhAnh' => 'img/chichiemem2.webp', 'tieuDe' => 'Chị chị em em 2', 'theLoai' => 'Hài hước, Gia đình', 'luotXem' => 95000, 'ngayTao' => '2024-01-10'],
        ['hinhAnh' => 'img/trotan.webp', 'tieuDe' => 'Trò tàn', 'theLoai' => 'Kinh dị, Tâm lí', 'luotXem' => 67000, 'ngayTao' => '2023-12-25']
    ];
}

$tatCaPhim = $_SESSION['tatCaPhim'];

// thêm phim
function themPhimMoi($phimMoi) {
    $_SESSION['tatCaPhim'][] = $phimMoi;
}

// thêm thể loại
function themTheLoaiMoi($theLoaiMoi) {
    $_SESSION['theLoai'][] = $theLoaiMoi;
}
?>