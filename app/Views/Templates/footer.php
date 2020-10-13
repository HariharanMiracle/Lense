<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-top">
            <h3>Quick Contact</h3>
            <form action="<?php echo base_url('Contact');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="form-group">
                    <input id="name" name="name" class="form-control form-control-sm" type="text" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <input id="subject" name="subject" class="form-control form-control-sm" type="text" placeholder="Enter your subject">
                </div>
                <div class="form-group">
                    <input id="email" name="email" class="form-control form-control-sm" type="email" placeholder="Enter your E-mail">
                </div>
                <div class="form-group">
                    <input id="number" name="number" class="form-control form-control-sm" type="text" placeholder="Enter your mobile number">
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" class="form-control form-control-sm"
                              placeholder="Enter your Message">Enter your Message</textarea>
                </div>
                <button class="btn btn-danger scndry-bg float-right" type="submit">Send Message</button>
            </form>
        </div>
        <div class="col-md-4 footer-middle">
            <h3>Top Rated Products</h3>
            <div class="fashion">
                <a href="#"><img class="img-responsive " src="<?php echo base_url() . '/images/f1.jpg' ?>" alt="">
                    <p>SALE</p></a>
            </div>
            <div class="product-go">
                <div class="grid-product">
                    <h6><a href="#">Fashion Combo Goggles</a></h6>
                    <div class="rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div>
                    <span class=" price-in"><small>$70.00</small> $40.00</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="product-go">
                <div class="fashion">
                    <a href="#"><img class="img-responsive " src="<?php echo base_url() . '/images/f2.jpg' ?>" alt="">
                        <p class="new1">NEW</p></a>
                </div>
                <div class="grid-product">
                    <h6><a href="#">Classic Combo Goggles</a></h6>
                    <div class="rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div>
                    <span class=" price-in"><small>$70.00</small> $40.00</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="product-go">
                <div class="fashion">
                    <a href="#"><img class="img-responsive " src="<?php echo base_url() . '/images/f3.jpg' ?>" alt="">
                        <p class="new1">NEW</p></a>
                </div>
                <div class="grid-product">
                    <h6><a href="#">sun Combo Goggles</a></h6>
                    <div class="rating">
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                        <span>☆</span>
                    </div>
                    <span class=" price-in"><small>$70.00</small> $40.00</span>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
        <div class="col-md-4 footer-bottom">
            <h3>Get In Touch</h3>
            <div class="logo-footer">
                <ul class="social">
                    <li><a href="#"><i class="fb"> </i> </a></li>
                    <li><a href="#"><i class="rss"> </i></a></li>
                    <li><a href="#"><i class="twitter"> </i></a></li>
                    <li><a href="#"><i class="dribble"> </i></a></li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="indo">
                <ul class="social-footer ">
                    <li><span>Phone: +62 226759804 </span></li>
                    <li><a href="mailto:info@example.com">Email: info@example.com</a>
                    </li>
                    <li><span>Address: No.666, Tb bla bla, Road </span></li>
                    <li><a href="#"><i class="glyphicon glyphicon-link" class="mes-in"> </i>http://example.com</a></li>
                </ul>
                <a href="#"><img src="<?php echo base_url() . '/images/pa.png' ?>" alt=""></a>
            </div>
        </div>
    </div>
        <div class="clearfix"></div>
        <p class="footer-class">Copyrights © <?php echo date("Y") . ' ' ?> I-Wear. All rights reserved | Design by <a
                    href="https://sysflicx.com/about.html">Sysflicx</a></p>

</div>


<!---->
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
        };
        */
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->

<!---->
</body>
</html>
<style>
    .tag {
        margin-top: 5px;
        display: inline-block;

        width: auto;
        height: 38px;

        background-color: #a19da8;
        /*background-color: red;*/
        -webkit-border-radius: 3px 4px 4px 3px;
        -moz-border-radius: 3px 4px 4px 3px;
        border-radius: 3px 4px 4px 3px;

        border-left: 1px solid #a19da8;
        /*border-left: 1px solid red;*/

        /* This makes room for the triangle */
        margin-left: 19px;

        position: relative;

        color: white;
        font-weight: 300;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 22px;
        line-height: 38px;

        padding: 0 10px 0 10px;
    }

    /* Makes the triangle */
    .tag:before {
        content: "";
        position: absolute;
        display: block;
        left: -19px;
        width: 0;
        height: 0;
        border-top: 19px solid transparent;
        border-bottom: 19px solid transparent;
        border-right: 19px solid #a19da8;
        /*border-right: 19px solid red;*/
    }

    /* Makes the circle */
    .tag:after {
        content: "";
        background-color: white;
        border-radius: 50%;
        width: 4px;
        height: 4px;
        display: block;
        position: absolute;
        left: -9px;
        top: 17px;
    }

    div.scrollbar {
        background-color: white;
        width: 100%;
        height: 200px;
        overflow: auto;
    }
</style>