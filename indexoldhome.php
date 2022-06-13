<!DOCTYPE html>
<html lang="en">
<?php include 'template/home/head.php';?>

<body>
    <!-- ==== HEADER ===== -->
    <?php include 'template/home/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include 'template/home/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <div id="overlay-contact" onclick="contact()"></div>
        <!-- banner -->
        <div class="owl-carousel owl-theme custom-banner">
            <div> <a href="#"><img src='assets/img/homepage_banner.png'></a></div>
            <div><a href="#"><img src='assets/img/homepage_banner.png'></a></div>
        </div>
        <!-- announcement -->
        <div class="announcement">
            <span><i class="fal fa-bullhorn"></i></span>
            <marquee class="language" data-translate="announcement">
                Happy Weekend: Unlimited cashback will be calculated automatically...
            </marquee>
        </div>
        <!--  -->
        <div class="home-button">
            <a href="login" class="language" data-translate="login">LOGIN</a>
            <a href="register" class="language" data-translate="register">JOIN NOW</a>
        </div>
        <!--  -->


<!-- ============================================== -->
<div class="home-selection-wrap">
            <!-- selection -->
            <div class="home-selection">
                <button class="home-selection-btn" onclick="openSelhome(event, 'HOME')"
                    id="default"><span class="language" data-translate="home">HOME</span></button>
                <button class="home-selection-btn" onclick="openSelhome(event, 'SLOTS')"><span class="language" data-translate="slot">SLOTS</span></button>
                <button id="defmobslot" class="home-selection-btn" onclick="openSelhome(event, 'MOBILESLOTS')">
                <?php if($language=="cn"){
                    echo'<span>老虎机 <br>
                    <small>(手机应用)</small></span>';
                }else if($language=="th"){
                    echo'<span>สล็อตมือถือ</span>';
                }else{
                    echo'<span>MOBILE <br>
                    SLOTS</span>';
                }?>
                </button>
                <button class="home-selection-btn" onclick="openSelhome(event, 'LIVECASINO')"><span class="language" data-translate="live_casino">LIVE <br>
                        CASINO</span></button>
                <button class="home-selection-btn" onclick="openSelhome(event, 'SPORT')"><span class="language" data-translate="sport">SPORT</span></button>
                <button class="home-selection-btn"><a href="vip"><span class="language" data-translate="vip">VIP</span></a></button>
            </div>
            <!-- selection content -->
            <div id="HOME" class="home-selection-content">
                <div class="sc-up">
                    <div class="sc-t1">
                        <span class="language" data-translate="live_casino">Live Games</span>
                    </div>
                    <div class="owl-carousel owl-theme provider-banner">
                        <div><a href="#"><img src='assets/img/livecasino/live_game_01.png'></a></div>
                        <div><a href="#"><img src='assets/img/livecasino/live_game_02.png'></a></div>
                    </div>
                </div>
                <div class="sc-dw">
                    <div class="sc-t1">
                        <span class="language" data-translate="hot_games">Hot Games</span>
                    </div>
                    <div class="owl-carousel owl-theme provider-banner-hg">
                        <!--  -->
                        <div class="banner-hg">
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_01.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_02.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_03.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_01.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_02.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_03.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <!--  -->
                        <div class="banner-hg">
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_01.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_02.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_03.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_01.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_02.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                            <button>
                                <div>
                                    <img src='assets/img/hotgames/hotgame_03.png'>
                                </div>
                                <div class="banner-hg-bar">
                                    <div class="hg-bar-tx">
                                        <span>Panda Warrior <br> Asia Gaming </span>
                                    </div>
                                    <div>
                                        <img class="hg-bar-img" src='assets/img/hotgames/icon/game_provider_01.png'>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- temporary -->
            <!-- ==== SLOTS ==== -->
            <div id="SLOTS" class="home-selection-content">
                <div class="sc-t1">
                <?php if($language=="bm"){
                    echo'<span>Pilih Provider Favourite Anda</span>';
                }else if($language=="cn"){
                    echo'<span>最喜爱的游戏供应商</span>';
                }else if($language=="th"){
                    echo'<span> เลือกผู้ให้บริการที่คุณชื่นชอบ</span>';
                }else{
                    echo'<span>Choose Your Favourite Providers</span>';
                }?>
                    
                </div>
                <div class="selection-wrap-cont">
                    <button>
                        <img class="new-icon" src="assets/img/hot_game.gif" alt="">
                        <img src="assets/img/homeslot/slots_01.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_02.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_03.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_04.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_05.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_06.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homeslot/slots_07.png" alt="">
                    </button>
                </div>
            </div>
            <!-- ==== MOBILESLOTS ==== -->
            <div id="MOBILESLOTS" class="home-selection-content">
                <div class="sc-t1">
                <?php if($language=="bm"){
                    echo'<span>Pilih Provider Favourite Anda</span>';
                }else if($language=="cn"){
                    echo'<span>最喜爱的游戏供应商</span>';
                }else if($language=="th"){
                    echo'<span>เลือกผู้ให้บริการที่คุณชื่นชอบ</span>';
                }else{
                    echo'<span>Choose Your Favourite Providers</span>';
                }?>
                </div>
                <div class="selection-wrap-cont">
                    <button data-toggle="modal" data-target="#exampleModal">
                        <img src="assets/img/homemobileslot/m_slots_01.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homemobileslot/m_slots_02.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homemobileslot/m_slots_03.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homemobileslot/m_slots_04.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homemobileslot/m_slots_05.png" alt="">
                    </button>
                    <button href="#">
                        <img src="assets/img/homemobileslot/m_slots_06.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homemobileslot/m_slots_07.png" alt="">
                    </button>
                </div>
            </div>
            <!-- MOBILESLOTS popup -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-mobileslots" role="document">
                    <div class="modal-content modal-content-mobileslots">

                        <div class="modal-body modal-body-mobileslots">
                            <div class="mobileslots-t1">
                                <span class="language" data-translate="your_access_information">Your Access Information</span>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="mobileslots-wrap">
                                <div class="mobileslots-details-wrap">
                                    <div class="mobileslots-img">
                                        <img src="assets/img/gameid/game_id_01.png" alt="">
                                    </div>
                                    <div class="mobileslots-details">
                                        <div>
                                            <label for="" class="language" data-translate="username">Username</label>
                                            <input type="text" value="tester112" readonly>
                                            <i class="fal fa-copy" aria-hidden="true"></i>
                                        </div>
                                        <div>
                                            <label for="" class="language" data-translate="password">Password</label>
                                            <input type="text" value="Aaaa1111" readonly>
                                            <i class="fal fa-copy" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="mobileslots-step">
                                    <?php if($language=="bm"){
                                        echo' 
                                    <div>
                                        <p>1. Pilih pilihan deposit pilihan anda untuk tambah nilai di Halaman Deposit.</p>
                                    </div>
                                    <div>
                                        <p>2. Klik Muat Turun untuk memuat turun APP.</p>
                                    </div>
                                    <div>
                                        <p>3. Setelah memuat turun APP, buka halaman APP, dan lengkapkan dengan ID dan kata laluan untuk memasuki permainan.</p>
                                    </div>';
                                    }else if($language=="cn"){
                                        echo' 
                                    <div>
                                        <p>1. 请在存款页面选择存款选项以充值。</p>
                                    </div>
                                    <div>
                                        <p>2.单击下载以下载游戏APP。</p>
                                    </div>
                                    <div>
                                        <p>3.完成APP下载后打开页面，并输入已提供的账号和密码以进入游戏。</p>
                                    </div>';
                                    }else if($language=="th"){
                                        echo' 
                                    <div>
                                        <p>1. เลือกตัวเลือกการฝากเงินที่คุณต้องการเพื่อเติมเงินที่หน้าเงินฝาก</p>
                                    </div>
                                    <div>
                                        <p>2. คลิกปุ่มดาวน์โหลด เพื่อดาวน์โหลดแอพเกม</p>
                                    </div>
                                    <div>
                                        <p>3. หลังจากดาวน์โหลดแอพเกมเสร็จแล้ว ให้เปิดหน้าป้อนข้อมูลของแอพ และจัดเตรียม ID และรหัสผ่านเพื่อเข้าสู่เกม</p>
                                    </div>';
                                    }else{
                                        echo' 
                                    <div>
                                        <p>1. Select your preferable deposit options to top up at Deposit Page.</p>
                                    </div>
                                    <div>
                                        <p>2. Click the Download Button to download the game App.</p>
                                    </div>
                                    <div>
                                        <p>3. After the completes the APP download, open the APP input page. and equip you with an ID and password to enter the game.</p>
                                    </div>';
                                    }?>
                                   
                                </div>


                                <div class="mobileslots-button-wrap">
                                    <div class="mobileslots-button">
                                        <a href="#">
                                            <img src="assets/img/gameid/download_android.png" alt=""></a>
                                    </div>
                                    <div class="mobileslots-button">
                                        <a href="#">
                                            <img src="assets/img/gameid/download_ios.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ==== LIVECASINO ==== -->
            <div id="LIVECASINO" class="home-selection-content">
                <div class="sc-t1">
                <?php if($language=="bm"){
                    echo'<span>Live Kasino Games Yang Menarik</span>';
                }else if($language=="cn"){
                    echo'<span>热门真人娱乐游戏</span>';
                }else if($language=="th"){
                    echo'<span>เกมคาสิโนสดที่น่าตื่นเต้น</span>';
                }else{
                    echo'<span>Exciting Live Casino Games</span>';
                }?>
                    
                </div>
                <div class="owl-carousel owl-theme live-casino-game">
                    <div class="livecasino-wrap">
                        <button><img src='assets/img/homelivecasino/live_casino_01.png'></button>
                        <button><img src='assets/img/homelivecasino/live_casino_02.png'></button>
                        <button><img src='assets/img/homelivecasino/live_casino_03.png'></button>
                        <button><img src='assets/img/homelivecasino/live_casino_04.png'></button>
                    </div>
                    <div class="livecasino-wrap">
                        <button><img src='assets/img/homelivecasino/live_casino_05.png'></button>
                        <button><img src='assets/img/homelivecasino/live_casino_06.png'></buttona>
                            <button><img src='assets/img/homelivecasino/live_casino_07.png'></button>
                            <button><img src='assets/img/homelivecasino/live_casino_08.png'></button>
                    </div>
                </div>

            </div>
            <!-- ==== SPORT ==== -->
            <div id="SPORT" class="home-selection-content">
                <div class="sc-t1">
                <?php if($language=="bm"){
                    echo'<span>Pilih Provider Favourite Anda</span>';
                }else if($language=="cn"){
                    echo'<span>最喜爱的游戏供应商</span>';
                }else if($language=="th"){
                    echo'<span>เลือกผู้ให้บริการที่คุณชื่นชอบ</span>';
                }else{
                    echo'<span>Choose Your Favourite Providers</span>';
                }?>
                </div>
                <div class="selection-wrap-cont-max">
                    <button>
                        <img src="assets/img/homesport/sports_01.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homesport/sports_02.png" alt="">
                    </button>
                </div>
            </div>

        </div>
 

    
        <!-- ============================================= -->
        <!-- PROMOTION BANNER -->
        <div class="promotion-img">
        <div>
        <?php if($language =='bm')
        {
            echo'<img style="width:45%;" src="assets/img/homapagepromotion/homepage_promotion_bm.png" alt="">';
        }
        else if($language =='cn'){
            echo'<img style="width:45%;" src="assets/img/homapagepromotion/homepage_promotion_cn.png" alt="">';
        }
        else if($language =='th'){
            echo'<img style="width:45%;" src="assets/img/homapagepromotion/homepage_promotion_th.png" alt="">';
        }
        else{
            echo'<img src="assets/img/homapagepromotion/homepage_promotion_en.png" alt="">';
         }?>
         </div>

            <div class="more-tx"><a href="promotion"><span class="language" data-translate="show_more">More</span>&nbsp;<i class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="owl-carousel owl-theme home-promo-banner">
            <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div>
        </div>

        <!-- B88 MALL banner -->
        <div class="mall-img">
                    <div>
        <?php if($language =='bm')
        {
            echo'<img src="assets/img/homepage_b88mall.png" alt="">';
        }
        else if($language =='cn'){
            echo'<img src="assets/img/homepage_b88mall.png" alt="">';
        }
        else if($language =='th'){
            echo'<img src="assets/img/homepage_b88mall.png" alt="">';
        }
        else{
            echo'<img src="assets/img/homepage_b88mall.png" alt="">';
         }?>
         </div>
           
            <div class="more-tx"><a href="#"><span class="language" data-translate="show_more">More</span>&nbsp;<i class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="owl-carousel owl-theme home-mall-banner">
            <div class="promo-banner">
                <a href="#"><img src="assets/img/b88mall_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/b88mall_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/b88mall_banner.png" alt=""></a>
            </div>
        </div>

        <!-- footer logo -->
        <div class="footer-logo-wrap">

            <div class="footer-lg-r1">
                <div><span class="language" data-translate="follow_us">FOLLOW US</span></div>
                <div><span class="language" data-translate="payment_methods">PAYMENT METHOD</span></div>
                <div><span class="language" data-translate="licenses">LICENSES</span></div>
            </div>

            <div class="footer-lg-r2">
                <div>
                    <a href="#"><img src="assets/img/icon/follow_us_youtube.png" alt=""></a>
                    <a href="#"><img src="assets/img/icon/follow_us_facebook.png" alt=""></a>
                    <a href="#"><img src="assets/img/icon/follow_us_instagram.png" alt=""></a>
                </div>
                <div>
                    <a href="#"><img src="assets/img/icon/payment_method__eeziepay.png" alt=""></a>
                    <a href="#"><img src="assets/img/icon/payment_method_bank_transfer.png" alt=""></a>
                </div>
                <div>
                    <a href="#"><img src="assets/img/icon/licenses_pagcor.png" alt=""></a>
                </div>
            </div>
            <div class="footer-lg-r3">
                <span>COPYRIGHT &copy; 2021 B88.<span class="language" data-translate="all_right_reserved">ALL RIGHTS RESERVED</span>.</span>
            </div>
        </div>

    </div>
    <!-- ==== FOOTER ===== -->
    <?php include 'template/home/footer.php';?>
    <?php include 'template/home/footerlink.php';?>

    <script>

    </script>

    <!-- SCRIPT -->
    <script>
    function openSelhome(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("home-selection-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("home-selection-btn");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("default").click();
    </script>
    <!-- owl carousel -->

    <script>
    // main banner
    $(document).ready(function() {
        var owl = $('.custom-banner');
        owl.owlCarousel({
            items: 1,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: false,
            navigation: false
        });
    });
    // selection home livegames 
    $(document).ready(function() {
        var owl = $('.provider-banner');
        owl.owlCarousel({
            items: 1,
            margin: 1,
            stagePadding: 20,
            dots: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: true,
            navigation: false
        });
    });
    //selection home hotgames
    $(document).ready(function() {
        var owl = $('.provider-banner-hg');
        owl.owlCarousel({
            items: 1,
            dots: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: true,
            navigation: false
        });
    });
    // selection home live casino
    $(document).ready(function() {
        var owl = $('.live-casino-game');
        owl.owlCarousel({
            items: 1,
            dots: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: true,
            navigation: false
        });
    });
    // home promotion banner
    $(document).ready(function() {
        var owl = $('.home-promo-banner');
        owl.owlCarousel({
            items: 1,
            dots: true,
            loop: true,
            stagePadding: 50,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: true,
            navigation: false,

        });
    });
    // home b88mall banner
    $(document).ready(function() {
        var owl = $('.home-mall-banner');
        owl.owlCarousel({
            items: 1,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            pagination: false,
            navigation: false
        });
    });
    </script>
</body>

</html>