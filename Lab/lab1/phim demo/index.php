<?php
// Include file dữ liệu phim
require_once 'movies_data.php';

$phimMoi = $tatCaPhim;
usort($phimMoi, function($a, $b) {
    return strtotime($b['ngayTao']) - strtotime($a['ngayTao']);
});
$phimMoi = array_slice($phimMoi, 0, 3);


$phimXemNhieu = $tatCaPhim;
usort($phimXemNhieu, function($a, $b) {
    return $b['luotXem'] - $a['luotXem'];
});
$phimXemNhieu = array_slice($phimXemNhieu, 0, 3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Hub</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-EEH3nJ1R0rO8zBswN/mO7wzLdMn+28mqwo+uoOxnpv/sbiXlHdRWu6c8y7IaEoKG" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>BHZ Movies</h1>
        <div class="header-right">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <a href="add_movie.php" class="btn-add-movie">
                <i class="fas fa-plus"></i> Thêm Phim
            </a>
            <a href="add_theloai.php" class="btn-add-movie" style="background: linear-gradient(45deg, #6f42c1, #5a32a3);">
                <i class="fas fa-tags"></i> Thêm Thể Loại
            </a>
        </div>
    </header>

    <main>
        <section class="hot-genres">
            <h2>THỂ LOẠI</h2>
            <div class="genre-grid">
                <?php foreach($theLoai as $item): ?>
                <div class="genre">
                    <i class="<?php echo $item['bieuTuong']; ?>"></i>
                    <p><?php echo $item['ten']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="favorite-movies">
            <h2>PHIM MỚI</h2>
            <div class="movie-grid">
                <?php foreach($phimMoi as $phim): ?>
                <div class="movie">
                    <img src="<?php echo $phim['hinhAnh']; ?>" alt="<?php echo $phim['tieuDe']; ?>" />
                    <h3><?php echo $phim['tieuDe']; ?></h3>
                    <p>Thể loại: <?php echo $phim['theLoai']; ?></p>
                    <p>Lượt xem: <?php echo number_format($phim['luotXem']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="popular-movies">
            <h2>PHIM XEM NHIỀU</h2>
            <div class="movie-grid">
                <?php foreach($phimXemNhieu as $phim): ?>
                <div class="movie">
                    <img src="<?php echo $phim['hinhAnh']; ?>" alt="<?php echo $phim['tieuDe']; ?>" />
                    <h3><?php echo $phim['tieuDe']; ?></h3>
                    <p>Thể loại: <?php echo $phim['theLoai']; ?></p>
                    <p>Lượt xem: <?php echo number_format($phim['luotXem']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 BHZCo. All rights reserved.</p>
    </footer>
</body>

</html>