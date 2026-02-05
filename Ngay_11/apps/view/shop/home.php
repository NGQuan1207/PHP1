<main>
        <div class="container">
            <h2>Sản Phẩm Mới</h2>
            <div class="product-box">
                <?php
                    foreach($sp_phantrang as $product) {
                ?>
                <div class="product">
                    <img src="<?=$product['img']?>" alt="">
                    <h3><?=$product['name']?></h3>
                    <p><?=$product['description']?></p>
                    <p>Giá: <?=number_format($product['price'])?></p>
                    <button><a href="index.php?page=productdetail&id=<?=$product['id']?>" style="color:#fff">Xem chi tiết</a></button>
                </div>
               <?php } ?>
            </div>
            <div class="pagination">
                <!-- Phân trang -->
                <!-- 
                để phân trang cần xác định
                1. tổng số sản phẩm ta có
                2. Số sản phẩm muốn hiển thị trên 1 trang
                ++++> số trang = tổng sp/ số sp trên 1 trang
                        sau đó làm tròn số này lên
                 -->
                 <?php
                    // $tongsp = 20;
                    // $sp_1_trang = 3;
                    // sotrang = 20/3 = 6,666--> 
                    // trang 1: 1,2,3-->0
                    // trang 2: 4,5,6-->3
                    // trang 3: 7.8.9-->6


                    // $sotrang = ceil($tongsp/$sp_1_trang);
                    // echo $sotrang;

                    ?>
                <?php 
                    for($i=1; $i<=$sotrang;$i++) {
                ?>
                <a href="index.php?trang=<?=$i?>"><?=$i?></a>
                <?php  } ?>
                
                <!-- Thêm các trang khác cần hiển thị -->
            </div>
        </div>
    </main>