<section>
    <div class="bg_in">
        <?php
        if (Session::get('message') && Session::get('message') != NULL) {
        ?>
            <div class="alert alert-<?php echo Session::get('type') ?> alert-dismissible fade in" role="alert">
                <strong><?php echo Session::get('message') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            Session::set('message', '');
        }
        ?>
        <div class="content_page cart_page">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Thông tin cá nhân</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <?php
                            foreach ($getInfo as $key => $value) {
                            ?>
                                <tr class="tr tr_first">
                                    <th>Họ và Tên</th>
                                    <td><?php echo $value['customer_name'] ?></td>
                                </tr>
                                <tr class="tr tr_first">
                                    <th>Điện thoại</th>
                                    <td><?php echo $value['customer_phone'] ?></td>
                                </tr>
                                <tr class="tr tr_first">
                                    <th>Địa chỉ</th>
                                    <td><?php echo $value['customer_address'] ?></td>
                                </tr>
                                <tr class="tr tr_first">
                                    <th>Email</th>
                                    <td><?php echo $value['customer_email'] ?></td>
                                </tr>
                                <tr class="tr tr_first">
                                    <th>
                                        <button type="submit">
                                            <a class="btn btn-success" href="<?php echo BASE_URL ?>User/updateForm/<?php echo Session::get('customer_id') ?>">Cập nhật</a>
                                        </button>
                                    </th>
                                </tr>
                            <?php

                            }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="box-title">
                <div class="title-bar">
                    <h1>Đơn hàng đã đặt</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                    <table class="table table-hover table-condensed">
                        <thead>

                            <tr class="tr tr_first">
                                <th>ID</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 0;
                            foreach ($getOrder as $key => $value) {
                                $id++;
                            ?>
                                <tr class="tr">
                                    <td>
                                        <?php echo $id; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['order_date'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['order_status'] == 0) {
                                            echo 'Đang xử lý';
                                        } else {
                                            echo 'Đã nhận hàng';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</section>
<div class="clear"></div>