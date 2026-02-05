<main>
<div class="container">
    <div class="left-box">
        <h2>Danh Mục</h2>
        <!-- Danh sách danh mục -->
        <ul>
            <?php
                foreach($cat_list as $item) {
            ?>
            <li><a href="?page=product&id=<?=$item['id']?>">- <?=$item['name']?></a></li>
            <?php } ?>
            <!-- Thêm danh mục cần hiển thị -->
        </ul>
    </div>

    <div class="right-box">
        <div class="product-list">
            <!-- Danh sách sản phẩm -->
            <?php
                foreach($product_by_dm as $item) {
            ?>
            <div class="product">
                <img src="public/layout_shop/img/hinh1.webp" alt="">
                <h3><?=$item['name']?></h3>
                <p><?=$item['description']?></p>
            </div>
            <?php } ?>
           
        </div>

        <div class="pagination">
            <!-- Phân trang -->
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <!-- Thêm các trang khác cần hiển thị -->
        </div>
    </div>
</div>
</main>