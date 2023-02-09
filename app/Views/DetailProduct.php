<?php
foreach ($detailProduct as $key => $value) {
   $name_product = $value['product_name'];
   $name_category = $value['category_name'];
   $id_category = $value['category_id'];
}
?>
<section>
   <?php
   foreach ($detailProduct as $key => $detail) {

   ?>
      <div class="bg_in">
         <div class="wrapper_all_main">
            <div class="wrapper_all_main_right no-padding-left" style="width:100%;">
               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>Product/CategoryProduct/<?php echo $id_category ?>">
                           <span itemprop="name"><?php echo $name_category ?></span></a>
                        <meta itemprop="position" content="2" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                           <strong itemprop="name">
                              <?php echo $name_product ?>
                           </strong>
                        </span>
                        <meta itemprop="position" content="3" />
                     </li>
                  </ol>
               </div>
               <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $detail['product_id'] ?>">
                  <input type="hidden" name="product_name" value="<?php echo $detail['product_name'] ?>">
                  <input type="hidden" name="product_image" value="<?php echo $detail['product_image'] ?>">
                  <input type="hidden" name="product_price" value="<?php echo $detail['product_price'] ?>">
                  <div class="content_page">
                     <div class="content-right-items margin0">
                        <div class="title-pro-des-ct">
                           <h1><?php echo $name_product ?></h1>
                        </div>
                        <div class="slider-galery ">
                           <div id="sync1" class="owl-carousel owl-theme">
                              <div class="item">
                                 <img src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $detail['product_image'] ?>" width="100%">
                              </div>
                           </div>
                        </div>
                        <div class="content-des-pro">
                           <div class="content-des-pro_in">
                              <div class="pro-des-sum">
                                 <div class="price">
                                 </div>
                                 <div class="color_price">
                                    <span class="title_price bg_green">Giá bán</span> <?php echo number_format($detail['product_price'], 0, ',', '.') ?> <span>vnđ</span>
                                    <div class="clear"></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="content-pro-des">
                              <div class="content_des">
                                 <?php echo $detail['product_desc'] ?>
                              </div>
                           </div>
                           <div class="ct">
                              <div class="number_price">
                                 <div class="custom pull-left">
                                    <input type="number" class="input-text qty" title="Qty" min="1" value="1" id="qty" name="product_quantity">
                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <div class="wp_a">
                                 <input type="submit" name="addCart" value="Đặt hàng" class="btn btn-warning">
                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </form>
            </div>
         </div>
         <div class="wrapper_all_main_right">
            <div class="clear"></div>
            <script type="text/javascript">
               CloudZoom.quickStart();

               jQuery(function($) {

                  var $userName = $('.name');

                  if ($userName.length) {

                     $userName.avatarMe({

                        className: 'avatar-me',

                        maxChar: 1

                     });

                  }

               });
            </script>
            <div class="clear"></div>
            <div class="module_pro_all">
               <div class="box-title">
                  <div class="title-bar">
                     <h3>Sản phẩm liên quan</h3>
                  </div>
               </div>
               <div class="pro_all_gird">
                  <div class="girds_all list_all_other_page ">
                     <?php
                     foreach ($related as $key => $relate) {
                     ?>

                        <form action="<?php echo BASE_URL ?>CartController/addCart" method="POST">
                           <input type="hidden" name="product_id" value="<?php echo $relate['product_id'] ?>">
                           <input type="hidden" name="product_name" value="<?php echo $relate['product_name'] ?>">
                           <input type="hidden" name="product_image" value="<?php echo $relate['product_image'] ?>">
                           <input type="hidden" name="product_price" value="<?php echo $relate['product_price'] ?>">
                           <input type="hidden" name="product_quantity" value="1">
                           <div class="grids">
                              <div class="grids_in">
                                 <div class="content">
                                    <div class="img-right-pro">
                                       <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $relate['product_id'] ?>">
                                          <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $relate['product_image'] ?>" data-original="image/iphone.png" alt="<?php $relate['product_image'] ?>" />
                                       </a>
                                    </div>
                                    <div class="name-pro-right">
                                       <a href="<?php echo BASE_URL ?>Product/detailProduct/<?php echo $relate['product_id'] ?>">
                                          <h3><?php echo $relate['product_name'] ?></h3>
                                       </a>
                                    </div>
                                    <div class="add_card">
                                       <input type="submit" class="btn btn-warning btn-sm" name="addcart" value="Đặt hàng">
                                    </div>
                                    <div class="price_old_new">
                                       <div class="price">
                                          <span class="news_price"><?php echo number_format($relate['product_price'], 0, ',', '.') . ' VNĐ' ?> </span>
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
         </div>

         <!--end:left-->
         <div class="clear"></div>
      </div>
      <div class="clear"></div>
      </div>
   <?php
   }
   ?>
   <script>
      jQuery(document).ready(function() {



         var div_fixed = jQuery('.product_detail_info').offset().top;

         jQuery(window).scroll(function() {

            if (jQuery(window).scrollTop() > div_fixed) {

               jQuery('.tabs-animation').addClass('fix_top');

            } else {

               jQuery('.tabs-animation').removeClass('fix_top');

            }

         });

         jQuery(window).load(function() {

            if (jQuery(window).scrollTop() > div_fixed) {

               jQuery('.tabs-animation').addClass('fix_top');

            }

         });

      });
   </script>
</section>