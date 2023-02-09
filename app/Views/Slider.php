<section>
    <div class="bg_in">
        <div class="col-md-7 col-xs-12 col-sm-12" style="padding: 0;margin-top:10px;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img width="100%" height="500px" src="<?php echo BASE_URL ?>app/public/images/banner-1.jpeg" alt="Siêu khuyến mãi">
                    </div>

                    <div class="item">
                        <img width="100%" height="500px" src="<?php echo BASE_URL ?>app/public/images/banner-2.jpeg" alt="Siêu khuyến mãi">
                    </div>

                    <div class="item">
                        <img width="100%" height="500px" src="<?php echo BASE_URL ?>app/public/images/banner-3.jpeg" alt="Siêu khuyến mãi">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-12" style="padding: 0;margin-left:30px;margin-top:5px;">
            <div class="row">
                <div class="panel  panel-warning panel-styling">
                    <div class="panel-heading">Tin tức cập nhật</div>
                    <div class="panel-body scrollable-panel">
                        <?php
                        foreach($postHome as $key => $pos){
                        ?>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">
                                <a href="<?php echo BASE_URL ?>Post/detailPost/<?php echo $pos['post_id']?>">
                                    <img src="<?php echo BASE_URL ?>app/public/uploads/post/<?php echo $pos['post_image']?>">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                <h4><?php echo $pos['post_title']?></h4>
                                <p><?php echo substr( $pos['post_content'],0,10)?></p>
                            </div>
                        </div>
                        <?php   
                        }
                        ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>