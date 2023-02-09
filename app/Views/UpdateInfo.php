<section>
    <div class="bg_in">
        <?php
        if (Session::get('message') && Session::get('message') != NULL) {
        ?>
            <div class="alert alert-<?php echo Session::get('type') ?>">
                <?php echo Session::get('message') ?>
            </div>
        <?php
            Session::set('message', '');
        }
        ?>
        <div class="content_page cart_page">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Cập nhật thông tin cá nhân</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                    <table class="table table-hover table-condensed">
                        <form action="<?php echo BASE_URL ?>User/updateInfo/<?php echo Session::get('customer_id') ?>" method="POST" autocomplete="off">
                            <thead>
                                <?php
                                foreach ($getInfo as $key => $value) {
                                ?>
                                    <tr class="tr tr_first">
                                        <th>Họ và Tên</th>
                                        <td>
                                            <input type="text" name="customer_name" value="<?php echo $value['customer_name'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr class="tr tr_first">
                                        <th>Điện thoại</th>
                                        <td>
                                            <input type="text" name="customer_phone" value="<?php echo $value['customer_phone'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr class="tr tr_first">
                                        <th>Địa chỉ</th>
                                        <td>
                                            <input type="text" name="customer_address" value="<?php echo $value['customer_address'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr class="tr tr_first">
                                        <th>Email</th>
                                        <td>
                                            <input type="text" readonly value="<?php echo $value['customer_email'] ?>">
                                        </td>
                                    </tr>
                                    <tr class="tr tr_first">
                                        <th><button type="submit" class="btn btn-success">Cập nhật</button></th>
                                    </tr>
                                <?php

                                }
                                ?>
                            </thead>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="clear"></div>