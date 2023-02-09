<section>
    <style>
        .title_signin,
        .title_signup {
            margin: 10px 0;
            padding: 0;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }

        input[type="radio"] {
            display: none;
        }
    </style>
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
        <div class="module_pro_all">
            <div class="pro_all_gird">
                <div class="contact_form">
                    <div class="contact_left">
                        <h3 class="title_signin">ĐĂNG NHẬP</h3>
                        <form name="FormDatHang" method="POST" autocomplete="off" action="<?php echo BASE_URL ?>User/signIn">
                            <div class="content-box_contact">
                                <div class="row">
                                    <div class="input">
                                        <label>Email: <span style="color:red;">*</span></label>
                                        <input type="email" name="customer_email" required class="clsip" placeholder="Nhập vào email">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="row">
                                    <div class="input">
                                        <label>Password: <span style="color:red;">*</span></label>
                                        <input type="password" name="customer_password" required class="clsip" placeholder="Nhập vào password">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="row btnclass">
                                    <div class="input ipmaxn ">
                                        <input type="submit" class="btn-gui" name="signin" id="frmSubmit" value="Đăng nhập">
                                        <input type="reset" class="btn-gui" value="Nhập lại">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="contact_right">
                        <div class="form_contact_in">
                            <div class="box_contact">
                                <h3 class="title_signup">ĐĂNG KÝ</h3>
                                <form name="FormDatHang" method="POST" autocomplete="off" action="<?php echo BASE_URL ?>User/signUp">
                                    <div class="content-box_contact">
                                        <div class="row">
                                            <div class="input">
                                                <label>Họ và tên: <span style="color:red;">*</span></label>
                                                <input type="text" name="customer_name" required class="clsip" placeholder="Nhập vào họ tên">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Số điện thoại: <span style="color:red;">*</span></label>
                                                <input type="text" name="customer_phone" required class="clsip" placeholder="Nhập vào sđt">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Địa chỉ: <span style="color:red;">*</span></label>
                                                <input type="text" name="customer_address" required class="clsip" placeholder="Nhập vào địa chỉ">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Email: <span style="color:red;">*</span></label>
                                                <input type="email" name="customer_email" required class="clsip" placeholder="Nhập vào email">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Password: <span style="color:red;">*</span></label>
                                                <input type="password" name="customer_password" required class="clsip" placeholder="Nhập vào mật khẩu">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row btnclass">
                                            <div class="input ipmaxn ">
                                                <input type="submit" class="btn-gui" name="signup" id="frmSubmit" value="Đăng ký tài khoản">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--end:body-->
<div class="clear"></div>