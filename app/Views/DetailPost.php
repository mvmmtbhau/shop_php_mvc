<section>
    <?php
    foreach($detailPost as $key => $value){
        $name_post = $value['post_title'];
        $name_category = $value['category_post_name'];
        $id_category = $value['category_post_id'];
    }
    ?>
    <div class="bg_in">
        <div class="wrapper_all_main">
            <div class="wrapper_all_main_right">
            <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>Post/CategoryPost/<?php echo $id_category ?>">
                           <span itemprop="name"><?php echo $name_category ?></span></a>
                        <meta itemprop="position" content="2" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                           <strong itemprop="name">
                              <?php echo $name_post ?>
                           </strong>
                        </span>
                        <meta itemprop="position" content="3" />
                     </li>
                  </ol>
               </div>
                <!--breadcrumbs-->
                <div class="content_page">
                    <div class="box-title">
                        <div class="title-bar">
                            <h1><?php echo $name_post ?></h1>
                        </div>
                    </div>
                    <div class="content_text">
                    <?php echo $value['post_content'] ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--start:left-->
            <div class="wrapper_all_main_left">
            </div>
            <!--end:left-->
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="clear"></div>