<section>
    <div class="bg_in">
        <div class="breadcrumbs">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo BASE_URL?>">
                        <span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="name">Sản phẩm hot</span>   
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Tất cả sản phẩm hot</h1>
                </div>
            </div>
            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">
                    <?php
                    foreach($productHot as $key => $pro){
                    ?>
                    <div class="grids">
                        <div class="grids_in">
                            <div class="content">
                                <div class="img-right-pro">
                                    <a href="<?php echo BASE_URL?>Product/detailProduct/<?php echo $pro['product_id']?>">
                                        <img class="lazy img-pro content-image" src="<?php echo BASE_URL?>app/public/uploads/product/<?php echo $pro['product_image']?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                    </a>
                                    <div class="content-overlay"></div>
                                    
                                </div>
                                <div class="name-pro-right">
                                    <a href="<?php echo BASE_URL?>Product/detailProduct/<?php echo $pro['product_id']?>">
                                        <h3> <?php echo $pro['product_name']?></h3>
                                    </a>
                                </div>
                                <div class="add_card">
                                    <a onclick="return giohang(579);">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng
                                    </a>
                                </div>
                                <div class="price_old_new">
                                    <div class="price">
                                        <span class="news_price"> <?php echo number_format($pro['product_price'],0,',','.'). ' Đ'?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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