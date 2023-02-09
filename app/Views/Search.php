<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tukhoa = $_POST['search'];
}
?>

<section>
    <div class="bg_in">
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Từ khóa: <?php echo $tukhoa ?> </h1>
                </div>
            </div>
            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">
                    <?php
                    foreach ($search as $key => $value) {
                    ?>
                        <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $value['product_name'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $value['product_image'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $value['product_price'] ?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <div class="grids-list">
                                <div class="grids_in">
                                    <div class="content">
                                        <div class="img-right-pro">
                                            <a href="<?php echo BASE_URL ?>Product/DetailProduct/<?php echo $value['product_id'] ?>">
                                                <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $value['product_image'] ?>" data-original="image/iphone.png" alt="<?php echo $value['product_image'] ?>" />
                                            </a>
                                        </div>
                                        <div class="name-pro-right">
                                            <a href="<?php echo BASE_URL ?>Product/DetailProduct/<?php echo $value['product_id'] ?>">
                                                <h3><?php echo $value['product_name'] ?></h3>
                                            </a>
                                        </div>
                                        <input type="submit" class="btn btn-warning btn-sm" name="addcart" value="Đặt hàng">
                                        <div class="price_old_new">
                                            <div class="price">
                                                <span class="news_price"><?php echo number_format($value['product_price'], 0, ',', '.') . " Đ" ?></span>
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
        ?>
</section>
<!--end:body-->
<div class="clear"></div>