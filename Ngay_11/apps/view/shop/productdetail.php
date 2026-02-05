<header>
        <h1>Chi Tiết Sản Phẩm</h1>
    </header>
    <div class="container_cart">
        <div class="product-detail">
            <div class="product-image">
                <img src="public/layout_shop/img/hinh1.webp" alt="Product 1">
            </div>
            <div class="product-info">
                <h2><?=$product_dt[0]['name']?></h2>
                <p><?=$product_dt[0]['description']?></p>
                <p>Giá: <?=$product_dt[0]['price']?></p>
                <button class="order-button">Đặt Hàng</button>
            </div>
        </div>

        <div class="related-products">
            <h3>Sản Phẩm Liên Quan</h3>
            <?php
                foreach($product_rela as $item) {
            ?>
            <div class="product">
                <div class="product-image">
                    <img src="public/layout_shop/img/hinh1.webp" alt="Product 2">
                </div>
                <div class="product-info">
                    <h4><?=$item['name']?></h4>
                    <p>Giá: $<?=$item['price']?></p>
                </div>
            </div>
            
            <?php } ?>
            
        </div>
    </div>