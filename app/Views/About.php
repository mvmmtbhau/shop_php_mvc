<section>
    <div class="bg_in">
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Thông tin về chúng tôi</h1>
                </div>
            </div>
            <div class="pro_all_gird">
                <?php
                foreach($info as $key => $val) {
                    echo $val['info_content'];
                }
                ?>
            </div>
        </div>
    </div>

</section>
<!--end:body-->
<div class="clear"></div>