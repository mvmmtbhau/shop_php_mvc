<section>
    <div class="bg_in">
        <div class="wrapper_all_main">
            <div class="wrapper_all_main_right">
                <!--breadcrumbs-->
                <div class="breadcrumbs">
                    <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo BASE_URL?>">
                                <span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item">
                                <strong itemprop="name">
                                    Tất cả tin tức
                                </strong>
                            </span>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                </div>
                <!--breadcrumbs-->
                <div class="content_page">
                    <div class="box-title">
                        <div class="title-bar">
                            <h1>Tin tức</h1>
                        </div>
                    </div>
                    <div class="content_text">
                        <ul class="list_ul">
                            <?php
                            foreach ($listPost as $key => $pos) {
                            ?>
                                <li class="lists">
                                    <div class="img-list">
                                        <a href="<?php echo BASE_URL ?>Post/detailPost/<?php echo $pos['post_id']?>">
                                            <img src="<?php echo BASE_URL ?>app/public/uploads/post/<?php echo $pos['post_image']?>" alt="<?php echo $pos['post_image']?>" class="img-list-in">
                                        </a>
                                    </div>
                                    <div class="content-list">
                                        <div class="content-list_inm">
                                            <div class="title-list">
                                                <h3>
                                                    <a href="<?php echo BASE_URL ?>Post/detailPost/<?php echo $pos['post_id']?>"><?php echo $pos['post_title']?></a>
                                                </h3>
                                            </div>
                                            <div class="content-list-in">
                                                <p><span style="font-size:16px"><?php echo substr($pos['post_content'],0,200)?></span></p>
                                            </div>
                                            <div class="xt"><a href="<?php echo BASE_URL ?>Post/detailPost/<?php echo $pos['post_id']?> ">Xem thêm</a></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="clear"></div>
                        <div class="wp_page">
                            <div class="page">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
<div class="clear"></div>