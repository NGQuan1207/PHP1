<?php
session_start();

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
        ['hinhAnh' => 'img/datrung.webp', 'tieuDe' => 'Đất rừng phương nam', 'theLoai' => 'Tình cảm, hài hước', 'luotXem' => 800, 'ngayTao' => '2024-01-25']
    ];
}

$tatCaPhim = $_SESSION['tatCaPhim'];

function themPhimMoi($phimMoi) {
    $_SESSION['tatCaPhim'][] = $phimMoi;
}

function themTheLoaiMoi($theLoaiMoi) {
    $_SESSION['theLoai'][] = $theLoaiMoi;
}
?>