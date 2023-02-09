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
        <div class="module_pro_all">
            <div class="pro_all_gird">
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
                <div class="contact_form">
                    <div class="contact_left">
                        <h3 class="title_signin">ĐỔI MẬT KHẨU</h3>
                        <form name="FormDatHang" method="POST" autocomplete="off" action="<?php echo BASE_URL ?>User/changePassword/<?php echo Session::get('customer_id') ?>">
                            <div class="content-box_contact">
                                <div class="row">
                                    <div class="input">
                                        <label>Current password: <span style="color:red;">*</span></label>
                                        <input type="password" name="customer_password" required class="clsip">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="row">
                                    <div class="input">
                                        <label>New password: <span style="color:red;">*</span></label>
                                        <input type="password" name="new_password" required class="clsip">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="row">
                                    <div class="input">
                                        <label>Confirm new password: <span style="color:red;">*</span></label>
                                        <input type="password" name="confirm_password" required class="clsip">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!---row---->
                                <div class="row btnclass">
                                    <div class="input ipmaxn ">
                                        <input type="submit" class="btn-gui" name="changePass" id="frmSubmit" value="Đổi mật khẩu">
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

</section>
<!--end:body-->
<div class="clear"></div>