<footer>
    <div class="footer_top_bootom">
        <div class="bg_in">
            <div class="footer footer_bottom">
                <div class="footer-col">
                    <h4>Liên kết</h4>
                    <div class="footer-col-content">
                        <ul>
                            <li><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
                            <li><a href="<?php echo BASE_URL ?>Product">Sản phẩm</a></li>
                            <li><a href="<?php echo BASE_URL ?>Post">Tin tức</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Hỗ trợ khách hàng</h4>
                    <div class="footer-col-content">
                        <ul>
                            <li><a href="#">Hướng dẫn mua hàng</a></li>
                            <li><a href="#">Chính sách bảo hành thiết bị</a></li>
                            <li><a href="#">Chính sách bảo mật thông tin</a></li>
                            <li><a href="#">Quy định và hình thức thanh toán</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Kết nối với chúng tôi</h4>
                    <div class="footer-col-content">
                        <ul class="social">
                            <li>
                                <a href="https://www.facebook.com/Yummy-Shop-111475075109013" class="fb">
                                    <img width="30px" height="30px" src="<?php echo BASE_URL ?>app/public/images/fb.jpg">
                                    Facebook
                                </a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Dịch vụ khách hàng</h4>
                    <div class="footer-col-content">
                        <ul class="icon_list">
                            <li>
                                <a href=".">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <p class="text_li">
                                        <span class="phone_footer">Hotline: 1900-1000</span>
                                        <span class="text_small">(Từ 8h đến 20h tất cả các ngày)</span>
                                    </p>
                                </a>
                            </li>
                            <div class="clear"></div>
                            <li><a><i class="fa fa-envelope" aria-hidden="true"></i> yummyshop@gmail.com</a></li>
                            <li><a><i class="fa fa-mouse-pointer" aria-hidden="true"></i> https://yummyshop.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
    <div class="copyright">
        <h4 class="tkw9999">&copy; WELCOME TO MY WEB</h4>
    </div>
</footer>

<link async rel="stylesheet" href="<?php echo BASE_URL ?>app/public/css/cssfooter.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer type="text/javascript" src="<?php echo BASE_URL ?>app/public/js/sweet-alert.js"></script>
<script defer type="text/javascript" src="<?php echo BASE_URL ?>app/public/js/jquery.flexslider-min.js"></script>
<script defer src="<?php echo BASE_URL ?>app/public/js/owl.carousel.js" type="text/javascript"></script>
<script defer src="<?php echo BASE_URL ?>app/public/js/jquery.lazyload.min.js" type="text/javascript"></script>
<script defer type="text/javascript" src="<?php echo BASE_URL ?>app/public/js/script_ex.js"></script>
<script defer type="text/javascript" src="<?php echo BASE_URL ?>app/public/js/script_menu.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="template/Default/js/sweet-alert.css"/> -->


<div style="height: 1840px;position: fixed;width: 100%;top: 0px;left: 0px;right: 0px;bottom: 0px;z-index: 1001;background: #000 none repeat scroll 0% 0%;opacity: 0.3;display: none;text-align:center" id="khungnen"></div>
<div style="display: none;left: 70%;margin-left: -309px;z-index: 1002;position: fixed;top: 40%;margin-top: 0px;" id="loadding">
    <img src="image/loader.gif" />
</div>
<script type="text/javascript">
    $(document).ready(function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 5; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: ['<svg width="10%" height="10%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                '<svg width="3%" height="3%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 2px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
            ],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: false,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();
            https: //thietbivanphong123.com/data/upload/ST8000VN004.jpg
                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });
</script>
</body>

</html>