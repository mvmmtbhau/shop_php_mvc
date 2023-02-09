<section>
    <div class="bg_in">
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Sản phẩm HOT</h1>
                    <a class="read_more" href="<?php echo BASE_URL ?>Product/productHot">
                        Xem thêm
                    </a>
                </div>
            </div>
            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">
                    <?php
                    foreach ($productHot as $key => $pro) {
                    ?>
                        <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $pro['product_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $pro['product_name'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $pro['product_image'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $pro['product_price'] ?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <div class="grids">
                                <div class="grids_in">
                                    <div class="content">
                                        <div class="img-right-pro">
                                            <a href="<?php echo BASE_URL ?>Product/DetailProduct/<?php echo $pro['product_id'] ?>">
                                                <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $pro['product_image'] ?>" data-original="image/iphone.png" alt="<?php echo $pro['product_image'] ?>" />
                                            </a>
                                        </div>
                                        <div class="name-pro-right">
                                            <a href="<?php echo BASE_URL ?>Product/DetailProduct/<?php echo $pro['product_id'] ?>">
                                                <h3><?php echo $pro['product_name'] ?></h3>
                                            </a>
                                        </div>
                                        <input type="submit" class="btn btn-warning btn-sm" name="addcart" value="Đặt hàng">
                                        <div class="price_old_new">
                                            <div class="price">
                                                <span class="news_price"><?php echo number_format($pro['product_price'], 0, ',', '.') . " Đ" ?></span>
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
        <?php
        foreach ($category as $key => $cate) {
        ?>
            <div class="module_pro_all">
                <div class="box-title">
                    <div class="title-bar">
                        <h1><?php echo $cate['category_name'] ?></h1>
                        <a class="read_more" href="<?php echo BASE_URL ?>Product/CategoryProduct/<?php echo $cate['category_id'] ?>">
                            Xem thêm
                        </a>
                    </div>
                </div>
                <div class="pro_all_gird">
                    <div class="girds_all list_all_other_page ">
                        <?php
                        foreach ($productHome as $key => $pro_cate) {
                            if ($cate['category_id'] == $pro_cate['category_id']) {
                        ?>
                                <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $pro_cate['product_id'] ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $pro_cate['product_name'] ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $pro_cate['product_image'] ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $pro_cate['product_price'] ?>">
                                    <input type="hidden" name="product_quantity" value="1">
                                    <div class="grids">
                                        <div class="grids_in">
                                            <div class="content">
                                                <div class="img-right-pro">
                                                    <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $pro_cate['product_id'] ?>">
                                                        <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $pro_cate['product_image'] ?>" data-original="image/iphone.png" alt="<?php echo $pro_cate['product_image'] ?>" />
                                                    </a>
                                                </div>
                                                <div class="name-pro-right">
                                                    <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $pro_cate['product_id'] ?>">
                                                        <h3> <?php echo $pro_cate['product_name'] ?></h3>
                                                    </a>
                                                </div>
                                                <input type="submit" class="btn btn-warning btn-sm" name="addcart" value="Đặt hàng">
                                                <div class="price_old_new">
                                                    <div class="price">
                                                        <span class="news_price"> <?php echo number_format($pro_cate['product_price'], 0, ',', '.') . ' Đ' ?> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        <?php
                            }
                        }
                        ?>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        <?php

        }
        ?>

</section>
<!--end:body-->
<div class="clear"></div>