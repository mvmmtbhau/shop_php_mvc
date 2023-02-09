<?php
$name = 'Danh mục chưa có sản phẩm';
foreach ($productByCategory as $key => $pro_name) {
    $name = $pro_name['category_name'];
}
?>
<section>
    <div class="bg_in">
        <div class="breadcrumbs">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo BASE_URL ?>">
                        <span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <span itemprop="name"><?php echo $name ?></span>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1><?php echo $name ?></h1>
                </div>
            </div>
            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">
                    <?php
                    foreach ($productByCategory as $key => $pro) {

                    ?>
                        <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $pro['product_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $pro['product_name'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $pro['product_image'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $pro['product_price'] ?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <div class="grids-list">
                                <div class="grids_in">
                                    <div class="content">
                                        <div class="img-right-pro">
                                            <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $pro['product_id'] ?>">
                                                <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $pro['product_image'] ?>" 
                                                data-original="image/iphone.png" alt="<?php echo $pro['product_image']?>" />
                                            </a>
                                        </div>
                                        <div class="name-pro-right">
                                            <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $pro['product_id'] ?>">
                                                <h3> <?php echo $pro['product_name'] ?></h3>
                                            </a>
                                        </div>
                                        <input type="submit" class="btn btn-warning btn-sm" name="addcart" value="Đặt hàng">
                                        <div class="price_old_new">
                                            <div class="price">
                                                <span class="news_price"> <?php echo number_format($pro['product_price'], 0, ',', '.') . ' Đ' ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
</section>