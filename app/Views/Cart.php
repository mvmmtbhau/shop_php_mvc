<section>
    <div class="bg_in">
        <div class="content_page cart_page">
            <div class="breadcrumbs">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                            <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                            <strong itemprop="name">
                                Giỏ hàng
                            </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
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
            <div class="box-title">
                <div class="title-bar">
                    <h1>Giỏ hàng của bạn</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr class="tr tr_first">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th style="width:100px;">Số lượng</th>
                                <th>Thành tiền</th>
                                <th style="width:50px; text-align:center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                            ?>
                                <form action="<?php echo BASE_URL ?>CartController/updateCart" method="post">
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $cart) {
                                        $subtotal = $cart['product_quantity'] * $cart['product_price'];
                                        $total += $subtotal;
                                    ?>
                                        <tr class="tr">
                                            <td data-th="Hình ảnh">
                                                <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL ?>app/public/uploads/product/<?php echo $cart['product_image'] ?>" alt="<?php echo $cart['product_image'] ?>" class="img-responsive" /></div>
                                            </td>
                                            <td data-th="Sản phẩm">
                                                <div class="col_table_name">
                                                    <h4 class="nomargin"><?php echo $cart['product_name'] ?></h4>
                                                </div>
                                            </td>
                                            <td data-th="Giá">
                                                <span class="color_red font_money">
                                                    <?php echo number_format($cart['product_price'], 0, ',', '.') . " Đ" ?>
                                                </span>
                                            </td>
                                            <td data-th="Số lượng">
                                                <div class="clear margintop5">
                                                    <div class="floatleft">
                                                        <input type="number" class="inputsoluong" name="qty[<?php echo $cart['product_id'] ?>]" value="<?php echo $cart['product_quantity'] ?>">
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </td>
                                            <td data-th="Thành tiền" class="text_center">
                                                <span class="color_red font_money"><?php echo number_format($subtotal, 0, ',', '.') . " Đ" ?></span>
                                            </td>
                                            <td class="actions aligncenter">
                                                <button type="submit" name="delete_cart" value="<?php echo $cart['product_id'] ?>" class="btn btn-sm btn-danger">Xóa</button>

                                                <button type="submit" name="update_cart" value="<?php echo $cart['product_id'] ?>" class="btn btn-sm btn-success">Cập nhật</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </form>
                                <tr>
                                    <td colspan="7" class="textright_text">
                                        <div class="sum_price_all">
                                            <span class="text_price">Tổng tiền thành toán</span>:
                                            <span class="text_price color_red"><?php echo number_format($total, 0, ',', '.') . " Đ" ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } else {
                                echo '<tr>
                                <td colspan="7">
                                    <div class="sum_price_all">
                                        <span class="text_price">Giỏ hàng trống</span>
                                    </div>
                                </td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="tr_last">
                                <td colspan="7">
                                    <a href="<?php echo BASE_URL ?>" class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                    <div class="clear"></div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="contact_form">
                    <div class="contact_left">
                        <div class="ch-contacts-details">
                            <div class="hiring-box">
                                <strong class="title">Chào bạn!
                                    <?php
                                    if (!Session::get('customer')) {
                                        echo ' Vui lòng đăng nhập để thanh toán';
                                    }
                                    ?>
                                </strong>
                                <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>yummyshop@webextrasite.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                                <p><a href="<?php echo BASE_URL ?>" class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact_right">
                        <div class="form_contact_in">
                            <div class="box_contact">
                                <div class="content-box_contact">
                                    <?php
                                    if (Session::get('customer')) {
                                        foreach ($customer as $key => $value) {
                                    ?>
                                            <form name="FormDatHang" method="POST" autocomplete="off" action="<?php echo BASE_URL ?>CartController/Order">
                                                <div class="row">
                                                    <div class="input">
                                                        <label>Họ và tên: </label>
                                                        <input type="text" name="name" required class="clsip" value="<?php echo $value['customer_name'] ?>">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!---row---->
                                                <div class="row">
                                                    <div class="input">
                                                        <label>Số điện thoại: </label>
                                                        <input type="text" name="phone" required class="clsip" value="<?php echo $value['customer_phone'] ?>">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!---row---->
                                                <div class="row">
                                                    <div class="input">
                                                        <label>Địa chỉ: </label>
                                                        <input type="text" name="address" required class="clsip" value="<?php echo $value['customer_address'] ?>">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!---row---->
                                                <div class="row">
                                                    <div class="input">
                                                        <label>Email: </label>
                                                        <input type="email" name="email" readonly required class="clsip" value="<?php echo $value['customer_email'] ?>">
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!---row---->
                                                <div class="row">
                                                    <div class="input">
                                                        <label>Lời nhắn (nếu có): </label>
                                                        <textarea type="text" name="message" style="resize:none;" class="clsipa"></textarea>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!---row---->
                                                <div class="row btnclass">
                                                    <div class="input ipmaxn ">
                                                        <?php
                                                        if (!Session::get('cart')) {
                                                            echo '<input type="submit" disabled class="btn-gui" name="order" id="frmSubmit" value="Gửi đơn hàng">';
                                                        } else {
                                                            echo '<input type="submit" class="btn-gui" name="order" id="frmSubmit" value="Gửi đơn hàng">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </form>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!---row---->
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>