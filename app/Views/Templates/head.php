<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $site_desc; ?>">
    <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    <meta name="author" content="<?php echo $seo_authors; ?>">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Lense</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'> -->
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/css/owl.carousel.min.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/css/owl.theme.default.min.css'; ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/css/style.css'; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/css/custom.css'; ?>"/>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>


    <link href="<?php echo base_url() . '/css/bootstrap.css' ?>" rel="stylesheet" type="text/css" media="all"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url() . '/js/jquery.min.js' ?>"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?php echo base_url() . '/css/style.css' ?>" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="I wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <script type="text/javascript" src="<?php echo base_url() . '/js/move-top.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . '/js/easing.js' ?>"></script>
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- start menu -->
    <!--//slider-script-->
    <script src="<?php echo base_url() . '/js/owl.carousel.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . '/js/easyResponsiveTabs.js' ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true   // 100% fit in a container
            });
        });

    </script>
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- js -->
    <script src="<?php echo base_url() . '/js/bootstrap.js' ?>"></script>
    <!-- js -->
    <script src="<?php echo base_url() . '/js/simpleCart.min.js' ?>"></script>
    <!-- start menu -->
    <link href="<?php echo base_url() . '/css/memenu.css' ?>" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="<?php echo base_url() . '/js/memenu.js' ?>"></script>
    <script>$(document).ready(function () {
            $(".memenu").memenu();
        });
    </script>
    <!-- /start menu -->
</head>
<body>
<!--header-->
<div class="header-info">
    <div class="container">
        <div class="header-top-in">

            <ul class="support">
                <li><a href="mailto:info@example.com"><i class="glyphicon glyphicon-envelope"> </i>info@example.com</a>
                </li>
                <li><span><i class="glyphicon glyphicon-earphone" class="tele-in"> </i>0 462 261 61 61</span></li>
            </ul>
            <ul class=" support-right">
                <?php
                if ($_SESSION['isLoggedIn'] == 1) {
                    // Someone is logged in
                    if ($nav_item == "myProfile") {
                        ?>
                        <li><a class="nav-link text-danger" href="<?php echo base_url() . '/Login/myProfile' ?>">My
                                Profile</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a class="nav-link" href="<?php echo base_url() . '/Login/myProfile' ?>">My Profile</a></li>
                        <?php
                    }
                    ?>
                    <li><a class="nav-link" href="<?php echo base_url() . '/Login/logout' ?>">Logout</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="<?php echo base_url() . '/Login/login_form' ?>"><i class="glyphicon glyphicon-user"
                                                                                    class="men"> </i>Login</a></li>
                    <li><a href="<?php echo base_url() . '/User/create' ?>"><i class="glyphicon glyphicon-lock"
                                                                               class="tele"> </i>Create an Account</a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($_SESSION['isLoggedIn'] == 1) {
                    if ($nav_item == "Cart") {
                        ?>
                        <li style="border-left: 1px solid #ccc; padding-left: 20px;">
                            <div class="cart box_1">
                                <a href="<?php echo base_url() . '/Cart/view_cart' ?>">
                                    <div class="total">
                                        <!-- <span class="simpleCart_total"> </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> </span>) -->
                                        <p style="color: black"><b><?php echo $_SESSION['total'] ?> LKR
                                                (<?php echo $_SESSION['count'] ?>)</b></p></div>
                                    <img src="<?php echo base_url() . '/images/cart2-2.png' ?>" class="ml-2" alt=""/>
                                </a>
                                <!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li style="border-left: 1px solid #ccc; padding-left: 20px;">
                            <div class="cart box_1">
                                <a href="<?php echo base_url() . '/Cart/view_cart' ?>">
                                    <div class="total">
                                        <!-- <span class="simpleCart_total"> </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> </span>) -->
                                        <p><?php echo $_SESSION['total'] ?> LKR (<?php echo $_SESSION['count'] ?>)</p>
                                    </div>
                                    <img src="<?php echo base_url() . '/images/cart2-2.png' ?>" class="ml-2 alt=""/>
                                </a>
                                <!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <?php
                    }

                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-top">

        <div class="header-bottom">
            <div class="container">
                <div class="logo">
                    <h1><a href="<?php echo base_url() . '/Home'; ?>"><img
                                    src="<?php echo base_url() . '/images/logoA.png' ?>" alt="" height="50px"></a></h1>
                </div>
                <!---->

                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <?php
                        if ($nav_item == "Home") {
                            ?>
                            <li class="active"><a href="<?php echo base_url() . '/Home'; ?>">Home</a></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/Home'; ?>">Home</a></li><?php
                        }
                        ?>
                        <?php
                        if($nav_item == "OwnFrame"){
                            ?><li class="active"><a href="<?php echo base_url().'/ExploreGlasses/ownFrame'; ?>">Own Frame</a></li><?php
                        }
                        else{
                            ?><li class="grid"><a href="<?php echo base_url().'/ExploreGlasses/ownFrame'; ?>">Own Frame</a></li><?php
                        }
                        ?> 
                        <?php
                        if ($nav_item == "Men") {
                            ?>
                            <li class="active"><a href="<?php echo base_url() . '/ExploreGlasses/men'; ?>">Men</a>
                            </li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/ExploreGlasses/men'; ?>">Men</a>
                            </li><?php
                        }
                        ?>
                        <?php
                        if ($nav_item == "Women") {
                            ?>
                            <li class="active"><a href="<?php echo base_url() . '/ExploreGlasses/women'; ?>">Women</a>
                            </li></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/ExploreGlasses/women'; ?>">Women</a>
                            </li><?php
                        }
                        ?>
                        <?php
                        if ($nav_item == "Kids") {
                            ?>
                            <li class="active"><a href="<?php echo base_url() . '/ExploreGlasses/kids'; ?>">Kids</a>
                            </li></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/ExploreGlasses/kids'; ?>">Kids</a>
                            </li><?php
                        }
                        ?>
                        <?php
                        if ($nav_item == "Uni-sex") {
                            ?>
                            <li class="active"><a
                                    href="<?php echo base_url() . '/ExploreGlasses/unisex'; ?>">Uni-sex</a>
                            </li></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/ExploreGlasses/unisex'; ?>">Uni-sex</a>
                            </li><?php
                        }
                        ?>
                        <?php
                        if ($nav_item == "Explore") {
                            ?>
                            <li class="active"><a href="<?php echo base_url() . '/ExploreGlasses'; ?>">Explore</a>
                            </li></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="<?php echo base_url() . '/ExploreGlasses'; ?>">Explore</a>
                            </li><?php
                        }
                        ?>
                        <!-- <?php
                        if ($nav_item == "Contact") {
                            ?>
                            <li class="active"><a href="#">Contact</a></li></li><?php
                        } else {
                            ?>
                            <li class="grid"><a href="#">Contact</a></li><?php
                        }
                        ?> -->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!---->


                <div class="clearfix"></div>
                <!---->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

<!--    <div class="banner">-->
<!--        <div class="banner-top">-->
<!--            <h2>THIS IS I-WEAR</h2>-->
<!--            <p>Goggles or safety glasses are forms of protective eyewear<span>fthat usually enclose or protect the area surrounding the eye in order to prevent particulates.</span>-->
<!--            </p>-->
<!--        </div>-->
<!--        <div class="now">-->
<!---->
<!--            --><?php
//            if ($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == 2 && $_SESSION['user']['status'] == 1) {
//                ?>
<!--                <a class="morebtn" href="--><?php //echo base_url() . '/ExploreGlasses'; ?><!--">Explore</a>-->
<!--                --><?php
//            } else {
//                ?>
<!--                <a class="morebtn" href="--><?php //echo base_url() . '/ExploreGlasses'; ?><!--">Explore</a>-->
<!--                <a class="morebtn at-in" href="--><?php //echo base_url() . '/Login/login_form'; ?><!--">Shop Now</a>-->
<!--                --><?php
//            }
//            ?>
<!---->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--    </div>-->
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url(<?php echo base_url() . '/images/banner.jpg';?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate">
                        <h1 class="mb-4">Welcome to Vision Express Opticals</h1>
                        <p></p>
                        <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image:url(<?php echo base_url() . '/images/bg2.jpg';?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate">
                        <h1 class="mb-4"> Get specific about your goals and keep them visible</h1>
                        <p></p>
                        <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Try On</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
</div>

<script>
    var carousel = function() {
        $('.home-slider').owlCarousel({
            loop:true,
            autoplay: true,
            margin:0,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            nav:false,
            autoplayHoverPause: false,
            items: 1,
            navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


    };
    carousel();
</script>
<!---->
<!---->
<!-- <div class="sap_tabs">
    <div class="container">
    <label class="line"> </label>
    <h2>Latest Products</h2>
                 <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <ul class="resp-tabs-list">
                      <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Fashion Goggles</span></li>
                      <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Classic Goggles</span></li>
                      <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Sun Goggles</span></li>
                      <div class="clearfix"></div>
                  </ul>
                    <div class="resp-tabs-container"> -->


<!-- <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="tab_img">
                                      <div class="img-top simpleCart_shelfItem">
                                        
                                           <img src="<?php //echo base_url().'/images/pi2.jpg' ?>" class="img-responsive" alt=""/>
                                            
                                              <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                    <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Fashion Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                        
                                        </div>
                                        <div class="img-top simpleCart_shelfItem">
                                          
                                           <img src="<?php //echo base_url().'/images/pi3.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                     <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Classic Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-in">
                                                <p>NEW</p>
                                              </div>
                                             </div>
                                              <div class="img-top simpleCart_shelfItem">
                                          
                                           <img src="<?php //echo base_url().'/images/pi4.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                             <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                 <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Sun Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                             <div class="col-in col-in-1">
                                                <p>SALE <span>30%</span></p>
                                              </div>
                                            </div>
                                            <div class="clearfix"></div>
                                 </div>                                  
                          </div> -->
<!-- <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1"> -->
<!-- <div class="tab_img">
                                      <div class="img-top simpleCart_shelfItem">
                                        
                                           <img src="<?php //echo base_url().'/images/pi9.jpg' ?>" class="img-responsive" alt=""/>
                                            
                                              <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                 <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Fashion Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                        </div>
                                        <div class="img-top simpleCart_shelfItem">
                                           <img src="<?php //echo base_url().'/images/pi8.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Classic Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-in">
                                                <p>NEW</p>
                                              </div>
                                             </div>
                                              <div class="img-top simpleCart_shelfItem">
                                           <img src="<?php //echo base_url().'/images/pi10.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Sun Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                             <div class="col-in col-in-1">
                                                <p>SALE <span>30%</span></p>
                                              </div>
                                            </div>
                                            <div class="clearfix"></div>
                                 </div> -->
<!-- </div> -->
<!-- <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2"> -->
<!-- <div class="tab_img">
                                      <div class="img-top simpleCart_shelfItem">
                                        
                                           <img src="<?php // echo base_url().'/images/pi5.jpg' ?>" class="img-responsive" alt=""/>
                                            
                                              <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                 <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Fashion Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                        </div>
                                        <div class="img-top simpleCart_shelfItem">
                                          
                                           <img src="<?php //echo base_url().'/images/pi6.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                    <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Classic Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-in">
                                                <p>NEW</p>
                                              </div>
                                             </div>
                                              <div class="img-top simpleCart_shelfItem">
                                          
                                           <img src="<?php //echo base_url().'/images/pi7.jpg' ?>" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                 <ul class="round-top">
                                                    <li><a href="single.html"><i class="glyphicon glyphicon-search"> </i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                                                 </ul>
                                                 
                                                    <div class="agency ">
                                                    <div class="agency-left">
                                                        <h6 class="jean">Sun Goggles</h6>
                                                        <span class="dollor item_price">$50.00</span>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                    <div class="agency-right">
                                                        <ul class="social">
                                                            <li><a href="#"><i class="item_add"> </i></a></li>
                                                            <li><a href="#"><i class="text"> </i></a></li>
                                                        </ul>
                                                        <ul class="social-in">
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i> </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                            <li><a href="#"><i > </i></a></li>
                                                        </ul>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                 </div>
                                              </div>
                                             <div class="col-in col-in-1">
                                                <p>SALE <span>30%</span></p>
                                              </div>
                                            </div>
                                            <div class="clearfix"></div>
                                 </div> -->
<!-- </div>         -->
<!-- </div>
</div>
</div>
</div> -->


<!--start-shoes-->
<!-- <div class="goggles">
        <div class="container"> 
            <h2>Latest Goggles</h2>
            <div class="product-one">
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">                            
                            <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n1.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$12</span></a></p>
                    
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n2.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$14</span></a></p>
                        
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n3.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$13</span></a></p>
                        
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n4.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$16</span></a></p>
                        
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="product-one">
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n5.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$18</span></a></p>
                        
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n6.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$19</span></a></p>
                        
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n7.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$21</span></a></p>
                        
                    </div>
                </div>
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        
                        <a href="single.html">
                                <img src="<?php //echo base_url().'/images/n8.jpg' ?>" alt="" />
                                <div class="mask">
                                    <span>Quick View</span>
                                </div>
                            </a>
                        <h4>Aenean placerat</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$40</span></a></p>
                        
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div> -->
<!--end-shoes-->
<!---->
    