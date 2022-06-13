<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $aff_id = $_GET['aff_id'];
        // echo "<br>";
        if($aff_id != '' || $aff_id != null){
            $cookie_name = "affiliate_id";
            $cookie_value = $aff_id;
            // echo $aff_id;
            // echo "<br>";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
            $_SESSION['aff_id2'] = $cookie_value;
            // echo "new_aff_id: ".$cookie_value;
    
        }else{
            $exist_aff_id = $_SESSION['aff_id2'];
            // echo "reg_aff_id: ".$exist_aff_id;
        }
    include 'template/home/head.php';
    include 'controller/base/api_credentials.php';

    if(isset($_SESSION['member_id'])){
        $annoucement_pop_up = "";
        // echo'<input type="text" id="session_lang" value='.$language.' hidden readonly>';

    }else{
        $annoucement_pop_up = "checkCookie()";
        //  echo'<input type="text" id="session_lang" value='.$language.' hidden readonly>';
    }

    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.0.2/interact.min.js"
        integrity="sha512-Ipef/NhGC7SlCer4041clfWKsriVhnGMcS15cVrl9j/NFtNmqeK28tbfOFwASlSfy4j8XjcpVw4HXvTvzgA8rA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preload" href="assets/js/slider.js" as="script">
    <style>
    .cs-icon {
        position: absolute;
        width: 15%;
        left: 10%;
        z-index: 2;
    }

    .livecasino-wrap a {
        width: 50%;
        position: relative;
    }

    .livecasino-wrap button {
        width: 100%;
        padding: 3px;
        border: none;
        background: transparent;
    }

    .new-icon-live {
        width: 15% !important;
        position: absolute;
        top: 4%;
        right: 8%;
    }

    .new-icon-live1 {
        width: 10% !important;
        position: absolute;
        top: 4%;
        right: 8%;
    }

    /* preload */
    #load1 {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        background-color: #000;
    }

    .overlay_logo1 {
        position: absolute;
        top: 40%;
        left: 25%;
        width: 50%;
        /* -webkit-animation: float 3s ease-in-out infinite;
        -moz-animation: float 3s ease-in-out infinite;
        animation: float 3s ease-in-out infinite; */
        z-index: 99;
    }

    @-webkit-keyframes float {
        0% {

            transform: translatey(0px);
        }

        50% {

            transform: translatey(-20px);
        }

        100% {

            transform: translatey(0px);
        }
    }

    @keyframes float {
        0% {

            transform: translatey(0px);
        }

        50% {

            transform: translatey(-20px);
        }

        100% {

            transform: translatey(0px);
        }
    }

    */ .banner-hg-bar {
        position: relative;
    }

    .hg-bar-tx {
        width: 50%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .custom-banner.owl-carousel .owl-dots .owl-dot span {
        background: #fff;
        display: inline-block;
        height: 3px;
        transition: all 250ms ease-out 0s;
        width: 15px;
        margin: 2px;
    }

    .custom-banner.owl-carousel .owl-dots {
        position: absolute;
        right: 50%;
        bottom: 0;
        transform: translate(50%, 0%);
    }

    .custom-banner .owl-dot.active span {
        background: var(--main-color) !important;
    }

    .custom-banner .owl-dot:focus {
        outline: none
    }

    .swal2-popup {
        padding: 1em 0 0.5rem !important;
        width: 13em !important;
        font-size: 1rem !important;
        margin-top: 50% !important;
    }

    .home-selection-btn {

        font-size: var(--small-font-size);

    }

    .home-selection-content {
        width: 80%;
    }

    .home-selection {
        width: 20%;
    }
    </style>


</head>


<body onload="<?=$annoucement_pop_up?>">
    <div id="load">
        <div class="overlay_logo">
            <img src="https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88gif.gif" alt="LOGO">
        </div>
    </div>

    <!-- ==== HEADER ===== -->
    <?php include 'template/home/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include 'template/home/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->

    <div class="body-wrap">


        <?php 
                    if (isset($_SESSION['member_id'])) {
                         include 'template/home/wallet.php';
                    } else {
                      
                    }
        ?>

        <div id="overlay-contact" onclick="contact()"></div>


        <!-- login popup -->

        <style>
        /* b88 announcement */
        .modal-dialog-loginpopup1 {
            width: 80% !important;
            margin: 45% auto 0% !important;
        }

        .modal-content-ann1 {
            height: 360px;
        }

        .modal-body-ann1 {
            padding: 0px !important;
        }

        .ann-wrap1 {
            position: relative;
        }

        .ann-text1 {
            background-color: #fff;
            padding: 25% 15px 0px;
        }

        .ann-text1 p {
            font-size: var(--small-font-size);
        }

        .modal-content-popup {
            width: 300px !important;
            margin: 0% auto !important;
            border: none !important;
            border-radius: none !important;
            background: transparent !important;

        }

        .modal-body-popup {
            padding: 0 !important;
        }

        .anntop {
            background: transparent !important;
            position: absolute;
            top: -40%;
            left: 0;
        }

        .hide-ann {
            background: transparent !important;
            border: none;
        }

        .hide-ann img {
            width: 50%;
            padding: 0px 10px 10px;
        }

        .imp-nt {

            color: #c09960;
        }
        </style>
        <!-- login popup -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-loginpopup1" role="document">
                <div class="modal-content modal-content-ann1">
                    <div class="modal-body modal-body-ann1">
                        <div class="ann-wrap1">
                            <div class="ann-img1">
                                <img src="assets/img/loginpopup/ann_top.png" alt="">
                            </div>
                            <div class="ann-logo1">
                                <img src="assets/img/loginpopup/ann_logo.png" alt="">
                                <br>
                                <span>ANNOUNCEMENT</span>
                            </div>
                            <div class="ann-text1">
                                <p>
                                Important Notice : Bank Easyway transport & services is permanently inactive. Please contact our 24/7 Live Chat or Telegram Customer Service for lasted Bank information.
                                </p>
                                <p>Sila ambil Perhatian : Bank Easyway transport & services ditutup secara kekal. Sila hubungi 24/7 Live Chat atau Telegram Customer kami untuk Bank information terbaru.</p>
                               
                            </div>

                            <button class="ann-btn1">
                                <img class="w-50" src="assets/img/loginpopup/acc_btn.png" alt="">
                                <span>Hide For Today</span>
                            </button>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> -->
        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-popup">

                    <div style="position: relative;">
                        <div class="anntop">
                            <img src="assets/img/loginpopup/anntop_w-10.png" alt="">
                        </div>

                        <div class="ann-text1">
                            <?php if($language=="en"){
                     echo'
                     <b class="imp-nt">Important Notice</b> <br>
                     <p>
                       Bank <b>Easyway transport & services is permanently inactive.</b> Please
                       contact our 24/7 Live Chat or Telegram Customer Service for lasted Bank information.
                   </p>';
                        }else if($language=="bm"){
                            echo'
                            <b class="imp-nt">Sila ambil Perhatian</b> <br>
                            Bank <b> Easyway transport & services ditutup secara kekal.</b> Sila
                            hubungi 24/7 Live Chat atau Telegram Customer kami untuk Bank information terbaru.</p> ';
                        }else{
                            echo'
                            <b class="imp-nt">Important Notice</b> <br>
                            <p>
                            Bank <b>Easyway transport & services is permanently inactive.</b> Please
                              contact our 24/7 Live Chat or Telegram Customer Service for lasted Bank information.
                          </p>';
                        }   ?>
                            <button class="hide-ann" data-dismiss="modal">
                                <img src="assets/img/loginpopup/annbottom_ok.png" alt="">
                            </button>


                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- banner -->
        <div class="owl-carousel owl-theme custom-banner">
            <?php if($language=="cn"){
                    $bannerlang = "cn";
                }else if($language=="bm"){
                    $bannerlang = "bm";
                }else{
                    $bannerlang = "en";
                }
                echo'<div><a><img src="assets/img/home/banner/'.$bannerlang.'/31-12-2021/1-mobile.jpg"></a></div>';
                echo'<div><a><img src="assets/img/home/banner/'.$bannerlang.'/31-12-2021/2-mobile.jpg"></a></div>';
                echo'<div><a><img src="assets/img/home/banner/'.$bannerlang.'/31-12-2021/3-mobile.jpg"></a></div>';
                echo'<div><a><img src="assets/img/home/banner/'.$bannerlang.'/31-12-2021/4-mobile.jpg"></a></div>';
                echo'<div><a><img src="assets/img/home/banner/'.$bannerlang.'/31-12-2021/5-mobile.jpg"></a></div>';
            ?>

        </div>
        <!-- announcement -->
        <div class="announcement">
            <span><i class="fal fa-bullhorn"></i></span>
            <marquee class="language" data-translate="announcement">
                <?php if($language=="cn"){
                    echo'<span>欢迎来到 B88 在线赌场。马来西亚最大的在线赌场。新会员可领取免费5个B points然后可用在B88mall换取礼物</span>';
                }else if($language=="bm"){
                    echo'<span>Selamat datang ke kasino dalam talian B88. Kasino Dalam Talian terbesar di Malaysia. Ahli baharu mendapat 5 Bpoint percuma untuk menuntut Hadiah percuma di B88malls</span>';
                }else{
                    echo'<span>Welcome to B88 Online casino. The biggest Online Casino in Malaysia. New members get free 5 Bpoints to claim free Gifts at B88malls</span>';
                }?>

            </marquee>
        </div>
        <!--  -->
        <div class="home-button <?php echo $hide;?>">
            <a href="login" class="language" data-translate="login">LOGIN</a>
            <a href="register" class="language" data-translate="register">JOIN NOW</a>
        </div>
        <!--  -->


        <!-- ============================================== -->
        <div class="home-selection-wrap">
            <!-- selection -->
            <div class="home-selection">
                <button class="home-selection-btn" onclick="openSelhome(event, 'HOME')" id="default"><span
                        class="language" data-translate="home">HOME</span></button>
                <button class="home-selection-btn" onclick="openSelhome(event, 'SLOTS')"><span class="language"
                        data-translate="slot">SLOTS</span></button>
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

                <button class="home-selection-btn" onclick="openSelhome(event, 'LIVECASINO')"><span class="language"
                        data-translate="live_casino">LIVE <br>
                        CASINO</span></button>
                <button class="home-selection-btn" onclick="openSelhome(event, 'SPORT')"><span class="language"
                        data-translate="sport">SPORT</span></button>
                <button class="home-selection-btn"><a href="vip"><span class="language"
                            data-translate="vip">VIP</span></a></button>
            </div>
            <!-- selection content -->
            <div id="HOME" class="home-selection-content">
                <div class="sc-up">
                    <div class="sc-t1">
                        <span class="language" data-translate="live_casino">Live Games</span>
                    </div>
                    <div class="owl-carousel owl-theme provider-banner">
                        <?php
                            $query_home_livec = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_casino_index != '0' ORDER BY f_casino_index";
                            $result_home_livec = mysqli_query($conn, $query_home_livec);
                            $num_home_livec = mysqli_num_rows($result_home_livec);
                            // echo $num_index_slotgame;

                            if($num_home_livec > 0){
                                while($row_home_livec = mysqli_fetch_array($result_home_livec)){
                                    $index_livec_id = $row_home_livec['f_id'];
                                    $index_livec_name = $row_home_livec['f_wallet_name'];
                                    $index_livec_code = $row_home_livec['f_code'];
                                    // $index_livec_image = $row_home_livec['f_image_link_casino'];
                                    $index_gametype = $row_home_livec['f_type'];
                                    // echo $index_livec_id

                                    if($index_livec_id == 6 || $index_livec_id == 9 || $index_livec_id == 15 || $index_livec_id == 13 || $index_livec_id == 20 || $index_livec_id == 39 ){
                                        if($index_livec_id == 39){
                                            $index_livec_name = "AESEXY";
                                        }

                                        if(isset($_SESSION['member_id'])){
                                            $slot_link = "target='_blank' href='controller/main/h5game/index.php?slot_provider_code=$index_livec_code&slot_operater_code=$f_gs_api_operator_code&slot_secret_key=$f_gs_api_secret_key&username=$member_username&slot_type=LC'";
                                        }else{
                                            $slot_link = "onclick = checkgameid()";
                                        }
                                        $hide = "";
                                        if($index_livec_id == 13 ||$index_livec_id == 39 || $index_livec_id == 24){
                                            $index_livec_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/livecasino/horizontal/$index_livec_name.png";
                                            echo "<div class='$hide'><a $slot_link><img src='$index_livec_image'><img class='new-icon-live1' src='assets/img/hot_game.gif'></a></div>";
                                        }else{
                                            $index_livec_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/livecasino/horizontal/$index_livec_name.png";
                                            echo "<div class='$hide'><a $slot_link><img src='$index_livec_image'></a></div>";
                                        }
                                        

                                    }else{
                                        $hide = "hide";
                                        $index_livec_image = "";
                                    }
                  
                                    // echo "<img src='$index_livec_image'>";

                                }
                            }
                        
                        ?>
                        <!-- <div class=""><a href="#"><img src='assets/img/livecasino/live_game_01.png'></a></div> -->
                        <!-- <div class=""><a href="#"><img src='assets/img/livecasino/live_game_02.png'></a></div> -->
                    </div>
                </div>
                <div class="sc-dw">
                    <div class="sc-t1">
                        <span class="language" data-translate="hot_games">Hot Games</span>
                    </div>

                    <div class='owl-carousel owl-theme provider-banner-hg'>

                        <!--  -->
                        <div class="banner-hg">
                            <?php
                                    $query_hotgame = "SELECT w.f_wallet_name,g.f_game_id,g.f_game_type,g.f_game_image_path,g.f_provider_code,g.f_game_name_en
                                    FROM games g
                                    JOIN wallet_code w ON g.f_provider_code = w.f_code
                                    WHERE g.f_id IN (
                                    SELECT MAX(g.f_id)
                                    FROM games g
                                    JOIN wallet_code wc ON g.f_provider_code = wc.f_code
                                    WHERE g.f_delete = 'N' AND wc.f_index != '0'
                                    GROUP BY g.f_provider_code) LIMIT 6
                                    ";
                                    $result_hotgame = mysqli_query($conn, $query_hotgame);
                                    $num_hotgame = mysqli_num_rows($result_hotgame);

                                    if($num_hotgame > 0){
                                        while($row_hotgame = mysqli_fetch_array($result_hotgame)){

                                            $pg_game_name = $row_hotgame['f_game_name_en'];
                                            $pg_game_provider_name = $row_hotgame['f_provider_code'];
                                            $pg_game_img_src = $row_hotgame['f_game_image_path'];
                                            $pg_game_type = $row_hotgame['f_game_type'];
                                            $pg_game_id = $row_hotgame['f_game_id'];
                                            $provider_name = $row_hotgame['f_wallet_name'];
                                            $slot_link = "href='provider?id=$pg_game_provider_name&name=$provider_name'";

                                            echo 
                                            "
                                            <button>
                                                <a $slot_link>
                                                    <div>
                                                        <img src='$pg_game_img_src'>
                                                    </div>
                                                    <div class='banner-hg-bar'>
                                                        <div class='hg-bar-tx'>
                                                            <span>$pg_game_name </span>
                                                        </div>
                                                        <div>
                                                            <img class='hg-bar-img' src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/slot/logo/$provider_name.png'>
                                                        </div>
                                                    </div>
                                                </a>
                                            </button>
                                            ";
                                            
                                        }
                                    }
                            ?>


                        </div>

                        <div class="banner-hg">
                            <?php
                                    $query_hotgame = "SELECT w.f_wallet_name,g.f_game_id,g.f_game_type,g.f_game_image_path,g.f_provider_code,g.f_game_name_en                         
                                    FROM games g
                                    JOIN wallet_code w ON g.f_provider_code = w.f_code
                                    WHERE g.f_id IN (
                                    SELECT MIN(g.f_id)
                                    FROM games g
                                    JOIN wallet_code wc ON g.f_provider_code = wc.f_code
                                    WHERE g.f_delete = 'N' AND wc.f_index != '0'
                                    GROUP BY g.f_provider_code) LIMIT 6
                                    ";
                                    $result_hotgame = mysqli_query($conn, $query_hotgame);
                                    $num_hotgame = mysqli_num_rows($result_hotgame);

            
                                    if($num_hotgame > 0){
                                        while($row_hotgame = mysqli_fetch_array($result_hotgame)){

                                            $pg_game_name = $row_hotgame['f_game_name_en'];
                                            $pg_game_provider_name = $row_hotgame['f_provider_code'];
                                            $pg_game_img_src = $row_hotgame['f_game_image_path'];
                                            $pg_game_type = $row_hotgame['f_game_type'];
                                            $pg_game_id = $row_hotgame['f_game_id'];
                                            $provider_name = $row_hotgame['f_wallet_name'];
                                            $slot_link = "href='provider?id=$pg_game_provider_name&name=$provider_name'";


                                            echo 
                                            "
                                            <button>
                                                <a $slot_link>
                                                    <div>
                                                        <img src='$pg_game_img_src'>
                                                    </div>
                                                    <div class='banner-hg-bar'>
                                                        <div class='hg-bar-tx'>
                                                            <span>$pg_game_name </span>
                                                        </div>
                                                        <div>
                                                            <img class='hg-bar-img' src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/slot/logo/$provider_name.png'>
                                                        </div>
                                                    </div>
                                                </a>
                                            </button>
                                            ";
                                            
                                        }
                                    }
                                ?>
                        </div>
                        <!--  -->
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
                    <?php
                    $query_index_slotgame = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_index != '0' ORDER BY f_index";
                    $result_index_slotgame = mysqli_query($conn, $query_index_slotgame);
                    $num_index_slotgame = mysqli_num_rows($result_index_slotgame); 
                    if($num_index_slotgame > 0){
                        while($row_index_slotgame = mysqli_fetch_array($result_index_slotgame)){
                            $index_slotgame_id = $row_index_slotgame['f_id'];
                            $index_slotgame_name = $row_index_slotgame['f_wallet_name'];
                            $index_slotgame_code = $row_index_slotgame['f_code'];
                            // $index_slotgame_image = $row_index_slotgame['f_image_link_slot'];
                            $index_gametype = $row_index_slotgame['f_type'];

                            
                            $hide = "";
                            $index_slotgame_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/slot/$index_slotgame_name.png";
                            


          
                                $slot_link = "href='provider?id=$index_slotgame_code&name=$index_slotgame_name'";
                            // add new here
                            if($index_slotgame_id == 26 || $index_slotgame_id == 37){
                                $hotIcon = '<img class="new-icon" src="assets/img/hot_game.gif" alt="">';
                            }else{
                                $hotIcon = '';
                            }

                            echo 
                            "
                            <button class='$hide'>
                                <a $slot_link>
                                    $hotIcon
                                    <img src='$index_slotgame_image' alt=''>
                                </a>
                            </button>

                            ";

                            
                        }
                    }
                ?>
                    <!-- <button>
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
                    <button>
                        <img src="assets/img/homeslot/slots_08.png" alt="">
                    </button> -->
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
                    <?php                    
                        $query_index_appgame = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_m_slot_index != '0' ORDER BY f_m_slot_index";
                        $result_index_appgame = mysqli_query($conn, $query_index_appgame);
                        $num_index_appgame = mysqli_num_rows($result_index_appgame);
                        if($num_index_appgame > 0){
                            while($row_index_appgame = mysqli_fetch_array($result_index_appgame)){
                                $index_appgame_id = $row_index_appgame['f_id'];
                                $index_appgame_name = $row_index_appgame['f_wallet_name'];
                                $index_appgame_code = $row_index_appgame['f_code'];
                                // $index_appgame_image = $row_index_appgame['f_image_link_slot'];
                                $index_gametype = $row_index_appgame['f_type'];

                                    if($index_appgame_id == 8){
                                        $index_appgame_name = 'XE88';
                                    }
                                    $hide_app = "";
                                    $index_appgame_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/mobileslots/$language/$index_appgame_name.png";
                                
                
                                if($app_mantainance == "M"){
                                    $slot_link1 = "onclick='game_maintance()'";
                                }else{
                                    $slot_link1 = "href='#'data-toggle='modal' data-target='#mbsltpopup' onclick='appGameid($index_appgame_id)'";
                                }
    
                                echo 
                                "
                                <button $slot_link1 class='$hide_app'>
                                    <img src='$index_appgame_image' alt=''>
                                </button> 
                                "
                                
                                ;
                            }

                        }

                    ?>

                    <button>
                        <img class="cs-icon" src="assets/img/coming_soon.png" alt="">
                        <?php 
                        if($language=="bm"){
                            $chlang = "bm";
                        }else if($language=="cn"){
                            $chlang = "cn";
                        }else if($language=="th"){
                            $chlang = "th";
                        }else{
                            $chlang = "en";
                        }
                        echo '<img style="opacity:50%" src="https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/mobileslots/'.$chlang.'/CLUBSUNCITY.png" alt="">';
                        ?>
                    </button>

                    <button>
                        <img class="cs-icon" src="assets/img/coming_soon.png" alt="">
                        <?php 
                        if($language=="bm"){
                            $chlang = "bm";
                        }else if($language=="cn"){
                            $chlang = "cn";
                        }else if($language=="th"){
                            $chlang = "th";
                        }else{
                            $chlang = "en";
                        }
                        echo '<img style="opacity:50%" src="https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/mobileslots/'.$chlang.'/LIONKING.png" alt="">';
                        ?>
                    </button>
                    <!-- <button>
                        <img class="cs-icon" src="assets/img/coming_soon.png" alt="">
                        <img style="opacity:50%" src="assets/img/homemobileslot/m_slots_07.png" alt="">
                    </button> -->
                </div>
            </div>
            <!-- MOBILESLOTS popup -->
            <div class="modal fade" id="mbsltpopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-mobileslots" role="document">
                    <div class="modal-content modal-content-mobileslots">

                        <div class="modal-body modal-body-mobileslots">
                            <div class="mobileslots-t1">
                                <span class="language" data-translate="your_access_information">Your Access
                                    Information</span>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="mobileslots-wrap">
                                <div class="mobileslots-details-wrap">
                                    <div class="mobileslots-img">
                                        <img id="popup_game_image" src="" alt="">
                                    </div>
                                    <div class="mobileslots-details">
                                        <div>
                                            <label for="" class="language" data-translate="username">Username</label>
                                            <input type="text" id="user_gameid_placeholder_lang" value="" readonly>
                                            <i class="fal fa-copy" onclick="copyToClipboardUsername()"
                                                aria-hidden="true" id="copy_gameuser"></i>
                                        </div>
                                        <div>
                                            <label for="" class="language" data-translate="password">Password</label>
                                            <input type="text" id="password_gameid_placeholder_lang" value="" readonly>
                                            <i class="fal fa-copy" onclick="copyToClipboardPassword()"
                                                aria-hidden="true" id="copy_gamepass"></i>
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

                                <div id="block_btndownload">
                                    <!-- <div class="mobileslots-button-wrap">
                                        <div class="mobileslots-button">
                                            <a href="#" id="popup_game_ios">
                                                <img src="assets/img/gameid/downloadbtn1-ios-and-win.png" alt=""></a>
                                        </div>
                                        <div class="mobileslots-button">
                                            <a href="#" id="popup_game_ios">
                                                <img src="assets/img/gameid/downloadbtn1-playnow.png" alt=""></a>
                                        </div>    
                                    </div> -->
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
                        <?php
                            $query_index_livec = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_casino_index != '0' ORDER BY f_casino_index LIMIT 4";
                            $result_index_livec = mysqli_query($conn, $query_index_livec);
                            $num_index_livec = mysqli_num_rows($result_index_livec);
                            // echo $num_index_slotgame;

                            if($num_index_livec > 0){
                                while($row_index_livec = mysqli_fetch_array($result_index_livec)){
                                    $index_livec_id = $row_index_livec['f_id'];
                                    $index_livec_name = $row_index_livec['f_wallet_name'];
                                    $index_livec_code = $row_index_livec['f_code'];
                                    $index_livec_image = $row_index_livec['f_image_link_casino'];
                                    $index_gametype = $row_index_slotgame['f_type'];
                                    // echo $index_livec_id                                  
                                    if($index_livec_id == 39){
                                            $index_livec_name = "AESEXY";
                                        }
                                    $hide = "";
                                    $index_livec_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/livecasino/$index_livec_name.png";

                                    if(isset($_SESSION['member_id'])){
                                        $slot_link = "target='_blank' href='controller/main/h5game/index.php?slot_provider_code=$index_livec_code&slot_operater_code=$f_gs_api_operator_code&slot_secret_key=$f_gs_api_secret_key&username=$member_username&slot_type=LC'";
                                    }else{
                                        $slot_link = "onclick = checkgameid()";
                                    }

                                    if($index_livec_id == 13 ||$index_livec_id == 39){
                                        $hot_icon = "<img class='new-icon-live' src='assets/img/hot_game.gif'>";
                                    }else{
                                        $hot_icon = "";
                                    }

                                    
                                        // add new here

                                    echo 
                                    "
                                    <a class='$hide' $slot_link>
                                        $hot_icon
                                        <button ><img src='$index_livec_image'></button>                                    
                                    </a>
                                    ";                                   
                                    
                                }
                            }
                        ?>
                        <!-- <button><img src='assets/img/homelivecasino/live_casino_01.png'></button>
                        <button><img src='../assets/img/homelivecasino/live_casino_02.png'></button>
                        <button><img src='../assets/img/homelivecasino/live_casino_03.png'></button>
                        <button><img src='../assets/img/homelivecasino/live_casino_04.png'></button> -->
                    </div>
                    <div class="livecasino-wrap">
                        <?php
                            $query_index_livec1 = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_casino_index > 4 ORDER BY f_casino_index LIMIT 4";
                            $result_index_livec1 = mysqli_query($conn, $query_index_livec1);
                            $num_index_livec1 = mysqli_num_rows($result_index_livec1);
                            //  echo $query_index_livec1;
                            if($num_index_livec1 > 0){
                                while($row_index_livec1 = mysqli_fetch_array($result_index_livec1)){
                                    $index_livec_id1 = $row_index_livec1['f_id'];
                                    $index_livec_name1 = $row_index_livec1['f_wallet_name'];
                                    $index_livec_code1 = $row_index_livec1['f_code'];
                                    // $index_livec_image1 = $row_index_livec1['f_image_link_casino'];
                                    $index_gametype1 = $row_index_livec1['f_type'];
                                    // echo $index_livec_name1;
    
                                    if($index_livec_id1 == 20 || $index_livec_id1 == 6 || $index_livec_id1 == 15 || $index_livec_id1 == 48 ){
                                        // if($index_livec_id1 == 39){
                                        //     $index_livec_name1 = "AESEXY";
                                        //     $hot_icon = "<img class='new-icon-live' src='assets/img/hot_game.gif'>";
                                        // }
                                        $hide1 = "";
                                        $index_livec_image1 = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/livecasino/$index_livec_name1.png";
                                    }else{
                                        $hide1 = "hide";
                                        $index_livec_image1 = "";
                                    }
    
                                    if(isset($_SESSION['member_id'])){
                                        $slot_link1 = "target='_blank' href='controller/main/h5game/index.php?slot_provider_code=$index_livec_code1&slot_operater_code=$f_gs_api_operator_code&slot_secret_key=$f_gs_api_secret_key&username=$member_username&slot_type=LC'";
                                    }else{
                                        $slot_link1 = "onclick = checkgameid()";
                                    }
                                    
                          
                                    echo 
                                    "
                                    <a class='$hide1' $slot_link1>      
                                        $hot_icon
                                        <button ><img src='$index_livec_image1'></button>                                    
                                    </a>                                   
                                    ";                                   
                                    
                                }
                            }
                        ?>
                        <!-- <button><img src='../assets/img/homelivecasino/live_casino_05.png'></button>
                        <button><img src='../assets/img/homelivecasino/live_casino_06.png'></buttona>
                            <button><img src='../assets/img/homelivecasino/live_casino_07.png'></button>
                            <button><img src='../assets/img/homelivecasino/live_casino_08.png'></button> -->
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
                    <?php
                    $query_index_sport = "SELECT * FROM wallet_code WHERE f_delete = 'N' AND f_sport_index != 0 ORDER BY f_sport_index ";
                    $result_index_sport = mysqli_query($conn, $query_index_sport);
                    $num_index_sport = mysqli_num_rows($result_index_sport);
                    // echo $num_index_slotgame;

                    if($num_index_sport > 0){
                        while($row_index_sport = mysqli_fetch_array($result_index_sport)){
                            $index_sport_id = $row_index_sport['f_id'];
                            $index_sport_name = $row_index_sport['f_wallet_name'];
                            $index_sport_code = $row_index_sport['f_code'];
                            $index_sport_image = $row_index_sport['f_image_link_sports'];
                            // echo $index_sport_id;

                            $hide = "";
                            $index_sport_image = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/sport/$language/$index_sport_name.jpg";
                        
                            
                            if(isset($_SESSION['member_id'])){
                                $slot_link = "target='_blank' href='controller/main/h5game/index.php?slot_provider_code=$index_sport_code&slot_operater_code=$f_gs_api_operator_code&slot_secret_key=$f_gs_api_secret_key&username=$member_username&slot_type=SB'";
                            }else{
                                $slot_link = "onclick = checkgameid()";
                            }


                            echo 
                            "
                            <a class='$hide' $slot_link>
                            <button >
                                <img src='$index_sport_image' alt=''>
                            </button>
                            </a>
                            ";                                
                        }
                    }
    
                    ?>
                    <!-- <button>
                        <img src="https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/sport/en/CMD.png" alt="">
                    </button>
                    <button>
                        <img src="assets/img/homesport/sports_02.png" alt="">
                    </button> -->
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

            <div class="more-tx"><a href="promotion"><span class="language"
                        data-translate="show_more">More</span>&nbsp;<i class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="owl-carousel owl-theme home-promo-banner">
            <?php
                    $query_sub_banner = "SELECT * FROM promotion WHERE f_status = 'A' AND f_delete = 'N' AND f_promo_limit = '1' ORDER BY f_id DESC LIMIT 6";
                    mysqli_set_charset($conn, "utf8");
                    $result_sub_banner = mysqli_query($conn, $query_sub_banner);
                    $num_sub_banner = mysqli_num_rows($result_sub_banner);
                    
                    // echo $num_sub_banner;
                    // echo "sini:$language;
                    if($num_sub_banner > 0){
                        while($row_sub_banner = mysqli_fetch_array($result_sub_banner)){

                            if($language == "th"){
                                $sub_banner_img = $row_sub_banner['f_content_img_mobile_th'];
                                $sub_banner_name = $row_sub_banner['f_promotion_name_th'];
                                $sub_banner_description = $row_sub_banner['f_description_th'];
            
                            }elseif($language == "bm"){
                                $sub_banner_img = $row_sub_banner['f_content_img_mobile_bm'];
                                $sub_banner_name = $row_sub_banner['f_promotion_name_bm'];
                                $sub_banner_description = $row_sub_banner['f_description_bm'];
                            }elseif($language == "cn"){
                                $sub_banner_img = $row_sub_banner['f_content_img_mobile_cn'];
                                $sub_banner_name = $row_sub_banner['f_promotion_name_cn'];
                                $sub_banner_description = $row_sub_banner['f_description_cn'];
                            }else{
                                $sub_banner_img = $row_sub_banner['f_content_img_mobile'];
                                $sub_banner_name = $row_sub_banner['f_promotion_name'];
                                $sub_banner_description = $row_sub_banner['f_description'];
                            }

                            echo 
                            "
                            <div class='promo-banner'>
                                <a href='promotion'><img src='$sub_banner_img' alt=''></a>
                            </div>                            
                            ";
                        }

                    }
                ?>
            <!-- <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="#"><img src="assets/img/promotion_banner.png" alt=""></a>
            </div> -->
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

            <div class="more-tx"><a href="../b88mall/m/" target="_blank">
                    <span class="language" data-translate="show_more">More</span>&nbsp;<i
                        class="fas fa-chevron-right"></i></a></div>
        </div>
        <div class="owl-carousel owl-theme home-mall-banner">
            <div class="promo-banner">
                <a href="../b88mall/m/" target="_blank"><img src="assets/img/82Q800T.jpg" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="../b88mall/m/" target="_blank"><img src="assets/img/CreditVoucher.jpg" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="../b88mall/m/" target="_blank"><img src="assets/img/Iphone13.jpg" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="../b88mall/m/" target="_blank"><img src="assets/img/OSIMUlnfinity.jpg" alt=""></a>
            </div>
            <div class="promo-banner">
                <a href="../b88mall/m/" target="_blank"><img src="assets/img/XIAOMIMI.jpg" alt=""></a>
            </div>
        </div>

        <!-- free spin -->
        <!-- <div class="draggable">
            <span id="closeFreeSpin"><i class="fas fa-times-circle" aria-hidden="true"></i></span>
            <a href="#"><img src="assets/img/free_spin.gif" alt=""></a>
        </div> -->

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
                <span>COPYRIGHT &copy; 2021 B88.<span class="language" data-translate="all_right_reserved">ALL RIGHTS
                        RESERVED</span>.</span>
            </div>
        </div>
    </div>
    <!-- ==== FOOTER ===== -->
    <?php include 'template/home/footer.php';?>
    <?php include 'template/home/footerlink.php';?>

    <!-- cookie -->
    <script>
    function checkCookie() {
        console.log("test date");
        var date = new Date();
        let dd = date.getDate();
        let mm = date.getMonth() + 1;
        const yyyy = date.getFullYear();
        today = `${mm}-${dd}-${yyyy}`;

        var exist_cookies = Cookies.get('date');

        if (exist_cookies == today) {
            console.log('success');
            console.log('same_date');

            // $('#loginmodal').css("display","none");

        } else {
            // debugger;
            console.log('failed');
            $('#exampleModal').modal('show');
            // $('#loginmodal').css("display","block");
            // console.log("haha");
            Cookies.set('date', today, {
                expires: 1
            })
        }

        // Cookies.set('date', today)
    }
    </script>

    <!-- preload -->

    <script>
    document.onreadystatechange = function() {
        var state = document.readyState
        if (state == 'complete') {
            setTimeout(function() {
                document.getElementById('load').style.visibility = "hidden";
            }, 1000);
        }
    }
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
    <script src="assets/js/slider.js" defer></script>

    <script>
    var h5Link = '';
    var deepLink = '';
    var product_id = '';
    var game_username = '';
    var game_password = '';
    var btnAutoUnlock = '<?=$member_auto_button?>';

    function appGameid(a) {
        // var a = $(this).attr('value');
        product_id = a;
        var member_id = "<?php echo $member_id?>";
        var live_casino = "";
        // console.log(product_id)
        // console.log(member_id)
        $.ajax({
            url: 'controller/ajax/check_gameid',
            type: 'GET',
            data: {
                product_id: product_id,
                member_id: member_id,
                live_casino: live_casino
            },
            beforeSend: function() {
                console.log(product_id, member_id, live_casino);
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(data) {
                game_username = data.user_game_id;
                game_password = data.user_game_pass;
                var game_image = data.user_game_img;
                deepLink = data.deepLink;
                h5Link = data.h5_link;
                // console.log(h5Link);
                // var game_download_link = data.android_link;
                // var game_download_link_ios = data.ios_ligame_download_link_iosnk;
                var containerBtnDownload = data.container_block;
                // console.log(containerBtnDownload)
                $('#user_gameid_placeholder_lang').val(game_username);
                $('#password_gameid_placeholder_lang').val(game_password);
                $("#popup_game_image").attr("src", game_image);
                // $("#popup_game_android").attr("href", game_download_link)
                // $("#popup_game_ios").attr("href", game_download_link_ios)
                $('#block_btndownload').html(containerBtnDownload)


            }
        });
    }

    let btnPlayNow = (link) => {
        // console.log(link)
        session = $('#session_lang').val()
        var member_id = "<?php echo $member_id?>";
        // console.log(btnAutoUnlock) 
        overlay_icon();



        if (session == 'bm') {
            var mbmsg1 =
                `Sila buka permainanan APP dan log masuk dengan  ${game_username} & ${game_password}. Semoga berjaya! `;
        } else if (session == 'cn') {
            var mbmsg1 = `请打开游戏应用程序并使用您的游戏 ${game_username} & ${game_password}。祝您好运！`;

        } else {
            var mbmsg1 =
                `Kindly open game's App login with your game ${game_username} & ${game_password}. Good Luck!`;
        }


        if (member_id != '') {


            if (btnAutoUnlock == 'N') {


                if (deepLink != '') {
                    playNowRestore(member_id, product_id, '', link);

                } else {

                    playNowRestore(member_id, product_id, 'withoutLink', link);


                }

            } else {

                if (deepLink != '') {

                    swal_mobileslot(mbmsg1, session, 'deeplink', link)

                } else {

                    swal_mobileslot(mbmsg1, session, '', link)


                }
                complete_overlay_icon()



            }
        } else {
            return_message = "<span  class='language' id='mbslot_msg'>Please login to continue.</span>";
            swal_mobileslot(return_message, session, '')
            complete_overlay_icon()
        }


        // Swal.fire({ 
        //     showConfirmButton: true,
        //     position: 'top',
        //     html: "<div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; Copied &nbsp;" +
        //         target.value + "</div>",
        //     type: "success"
        // });
    }
    </script>

    <script>
    function checkgameid() {

        var lang = $('#session_lang').val();

        if (lang == "th") {
            window.location.replace("login");
        } else {
            window.location.replace("login");
        }

    }
    </script>



    <!-- copy username -->
    <script>
    function copyToClipboardUsername() {
        const input = document.getElementById('user_gameid_placeholder_lang')
        var lang = $('#session_lang').val();
        if (isOS()) {
            let range = document.createRange()
            range.selectNodeContents(input)
            let selection = window.getSelection()
            selection.removeAllRanges()
            selection.addRange(range);
            input.setSelectionRange(0, 999999);
        } else {
            input.select()
        }


        document.execCommand("copy")

        input.blur()
        if (lang == "th") {
            var copyText = "คัดลอก";
        } else if (lang == "cn") {
            var copyText = "复制";
        } else if (lang == "bm") {
            var copyText = "Copied";
        } else {
            var copyText = "Copied";
        }
        Swal.fire({
            showConfirmButton: true,
            position: 'top',
            html: " <div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; " + copyText +
                " &nbsp;" +
                input.value + "</div>",
            type: "success"
        });

    }

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i)
    }
    </script>

    <!-- copy password -->
    <script>
    function copyToClipboardPassword() {

        const input = document.getElementById('password_gameid_placeholder_lang')
        var lang = $('#session_lang').val();
        if (isOS()) {
            let range = document.createRange()
            range.selectNodeContents(input)
            let selection = window.getSelection()
            selection.removeAllRanges()
            selection.addRange(range);
            input.setSelectionRange(0, 999999);
        } else {
            input.select()
        }
        document.execCommand("copy")
        input.blur()



        if (lang == "th") {
            var copyText = "คัดลอก";
        } else if (lang == "cn") {
            var copyText = "复制";
        } else if (lang == "bm") {
            var copyText = "Copied";
        } else {
            var copyText = "Copied";
        }


        Swal.fire({
            showConfirmButton: true,
            position: 'top',
            html: " <div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; " + copyText +
                " &nbsp;" +
                input.value + "</div>",
            type: "success"
        });

    }

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i)
    }
    </script>





    <script>
    // document.getElementById("copy_gamepass").addEventListener("click", function() {
    //     copyToClipboardMsg(document.getElementById("password_gameid_placeholder_lang"), "msg");
    // });

    // document.getElementById("copy_gameuser").addEventListener("click", function() {
    //     copyToClipboardMsg(document.getElementById("user_gameid_placeholder_lang"), "msg");
    // });

    document.getElementById("pasteTarget").addEventListener("mousedown", function() {
        this.value = "";
    });


    function copyToClipboardMsg(elem, msgElem) {
        var succeed = copyToClipboard(elem);
        var msg;
        if (!succeed) {
            msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
        } else {
            msg = "Text copied to the clipboard."
        }
        if (typeof msgElem === "string") {
            msgElem = document.getElementById(msgElem);
        }
        msgElem.innerHTML = msg;
        setTimeout(function() {
            // msgElem.innerHTML = "";
        }, 2000);
    }

    function copyToClipboard(elem) {
        var lang = $('#session_lang').val();
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        if (lang == "th") {

            Swal.fire({
                showConfirmButton: true,
                position: 'top',
                html: " <div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; คัดลอก &nbsp;" +
                    target.value + "</div>",
                type: "success"
            });


        } else if (lang == "cn") {

            Swal.fire({
                showConfirmButton: true,
                position: 'top',
                html: " <div class='swal-alert'><i class='green fas fa-check-circle'></i>复制 &nbsp;" +
                    target.value + "</div>",
                type: "success"
            });


        } else if (lang == "bm") {

            Swal.fire({
                showConfirmButton: true,
                position: 'top',
                html: " <div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; คัดลอก &nbsp;" +
                    target.value + "</div>",
                type: "success"
            });


        } else {

            Swal.fire({
                showConfirmButton: true,
                position: 'top',
                html: "<div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; Copied &nbsp;" +
                    target.value + "</div>",
                type: "success"
            });

        }

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
    </script>

    <script>
    $("#switch-toggle").on('change', function() {
        var session = $('#session_lang').val();
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            console.log("Current switch status: " + switchStatus);
            var member_id = <?=$member_id?>

            $.ajax({
                url: 'controller/ajax/update_button',
                type: 'GET',
                data: {
                    change_status: switchStatus,
                    member_id: member_id
                },
                // beforeSend: function(){

                //     console.log("side button :start")
                // },
                // complete: function (data) {

                //     console.log("side button :end")
                // },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                timeout: (15 * 1000),
                error: function(textstatus) { // if error occured
                    if (textstatus === "timeout") {

                        // Error During Ajax Process
                        msg =
                            "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i><span id=ajax_error class=language>Error Occured. Please try again.</span></div>";
                        swal_lang(msg, session, location);

                    } else {

                        // No Error Appear

                    }
                },
                success: function(response) {

                    console.log(response)
                    btnAutoUnlock = 'Y';

                }
            });

            var switchmsgtitle = "";
            var switchmsgcontent = "";
            if (session == "bm") {
                switchmsgtitle = "Pemindahan Auto Dompet Utama";
                switchmsgcontent =
                    "Anda telah mengaktifkan Auto Transfer. Luangkan masa sehingga 5 minit untuk sistem mengemas kini pilihan anda. Terima kasih.";
            } else if (session == "cn") {
                switchmsgtitle = "主钱包自动转移";
                switchmsgcontent = "您已启用自动转移。 系统将于最多 5 分钟的时间来更新您的首选项， 谢谢。";
            } else {
                switchmsgtitle = "Main Wallet Auto Transfer";
                switchmsgcontent =
                    "You have enable Auto Transfer. Please allow up to 5 minutes for the system to update your preferences. Thank you.";
            }

            Swal.fire({
                html: '<div class="auto_transfer_title ">' + switchmsgtitle + '</div>' +
                    '<div class="auto_transfer_content ">' + switchmsgcontent + '</div>',
                confirmButtonText: '<div class="auto_transfer_confirm_btn">OK</div>',
            })


        } else {
            var switchmsgtitle = "";
            var switchmsgcontent = "";
            if (session == "bm") {
                switchmsgtitle = "Pemindahan Auto Dompet Utama";
                switchmsgcontent =
                    " Anda telah melumpuhkan Auto Transfer. Luangkan masa sehingga 5 minit untuk sistem mengemas kini pilihan anda. Terima kasih";
            } else if (session == "cn") {
                switchmsgtitle = "主钱包自动转移";
                switchmsgcontent = "您已禁用自动转移。 系统将于最多 5 分钟的时间来更新您的首选项，谢谢。";
            } else {
                switchmsgtitle = "Main Wallet Auto Transfer";
                switchmsgcontent =
                    "You have disabled Auto Transfer. Please allow up to 5 minutes for the system to update your preferences. Thank you.";
            }

            switchStatus = $(this).is(':checked');
            console.log("Current switch status2: " + switchStatus);

            var member_id = <?=$member_id?>

            $.ajax({
                url: 'controller/ajax/update_button',
                type: 'GET',
                data: {
                    change_status: switchStatus,
                    member_id: member_id
                },
                // beforeSend: function(){

                //     console.log("side button :start")
                // },
                // complete: function (data) {

                //     console.log("side button :end")
                // },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                timeout: (15 * 1000),
                error: function(textstatus) { // if error occured
                    if (textstatus === "timeout") {

                        // Error During Ajax Process
                        msg =
                            "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i><span id=ajax_error class=language>Error Occured. Please try again.</span></div>";
                        swal_lang(msg, session, location);

                    } else {

                        // No Error Appear

                    }
                },
                success: function(response) {

                    console.log(response)
                    btnAutoUnlock = 'N';


                }
            });

            Swal.fire({
                html: '<div class="auto_transfer_title">' + switchmsgtitle + '</div>' +
                    '<div class="auto_transfer_content">' + switchmsgcontent + '</div>',
                confirmButtonText: '<div class="auto_transfer_confirm_btn">OK</div>',
            })

        }
    });
    </script>



</body>

</html>