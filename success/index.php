<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <style>
    .lr-wrap {
        margin: 25% auto 0%;
    }

    .input-lr {
        height: 30px;
    }

    .tc-bt {
        padding: 20px 15px 0px;
    }

    .p.copyright {
        padding-top: 20px;
    }

    .custom-banner.owl-carousel .owl-dot.active span {
        background-color: #FBAE17 !important;
    }

    .custom-banner.owl-carousel .owl-dots .owl-dot span {
        background: #fff;
        display: inline-block;
        height: 7px;
        transition: all 250ms ease-out 0s;
        width: 7px;
        border-radius: 100%;
        margin: 2px;
    }

    .custom-banner .owl-dot.active span {
        background: #FBAE17;
    }

    .custom-banner.owl-carousel .owl-dots {
        position: absolute;
        right: 50%;
        bottom: 0;
        transform: translate(50%, 0%);
    }



    .custom-banner .owl-dot:focus {
        outline: none
    }
    </style>
</head>


<body>
    <!-- ==== HEADER ===== -->
    <?php include '../template/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include '../template/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <div id="overlay-contact" onclick="contact()"></div>
        <div class="lr-wrap">
            <div class="content-lr pt-0">
                <div class="md-stepper-horizontal orange">
                    <div class="md-step active">
                        <div class="md-step-circle"><span>1</span></div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step active">
                        <div class="md-step-circle"><span>2</span></div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step active">
                        <div class="md-step-circle"><span>3</span>
                        </div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                </div>
                <div class="lr-text-reg">
                    <span class="language" data-translate="create_account">CREATE ACCOUNT</span>
                </div>
            </div>
            <!-- <img class="lr-img-logo" src="../assets/img/b88_logo.png" alt=""> -->

            <div class="owl-carousel owl-theme custom-banner">
                <?php if($language=="cn"){
                    $bannerlang = "cn";
                }else if($language=="bm"){
                    $bannerlang = "bm";
                }else{
                    $bannerlang = "en";
                }
                echo'<div><a><img src="../assets/img/s9/TESTING BANNER.jpg"></a></div>';
                echo'<div><a><img src="../assets/img/s9/TESTING BANNER.jpg"></a></div>';
            ?>

            </div>

            <div class="success-tx">
                <span class="language" data-translate="congratulation">CONGRATULATIONS!</span>
                <br>

                <span>
                    <?php if($language=="bm"){
                            echo 'Berjaya mendaftar sebagai ahli!';
                        }else if($language=="cn"){
                            echo'成功注册为会员！';
                        }else if($language=="th"){
                            echo'ลงทะเบียนเป็นสมาชิกเรียบร้อยแล้ว!';
                        }else{
                            echo'Successfully register as a member!';
                        }?></span>
            </div>

            <div class="lr-btform">
                <a href="../deposit"><button class="lr-btn language" data-translate="deposit_now">Deposit
                        Now</button></a>
            </div>
        </div>


        <p class="tc-bt">
            <?php 
        if($language == 'th'){
            echo '
            เมื่อคลิกเพื่อลงทะเบียน ฉันขอยอมรับว่าฉันมีอายุมากกว่า 18 <br> ปี และได้อ่านและยอมรับ<a href="../tc">ข้อกำหนดและเงื่อนไข</a>ของคุณแล้ว
            ';
        }else if($language == 'bm'){
            echo '
            Dengan mengklik untuk MENDAFTAR, saya dengan ini mengakui bahawa saya berumur 18 <br> tahun ke atas dan telah membaca dan menerima <a href="../tc">Terma & Syarat</a> anda.
            ';
        }else if($language == 'cn'){
            echo '
            点击注册，即表示我已经年满18 <br> 岁，并且已阅读并接受您的<a href="../tc">条款和条件</a>。
            ';
        }else{
            echo '
            By clicking the REGISTER button, I hereby acknowledge that I am above 18 <br> years old and have read and accepted your <a href="../tc">Terms & Conditions</a>.
            ';
        }
    ?>
        </p>

        <p class="copyright">Copyright © 2022 S9ASIA <span class="language" data-translate="all_right_reserved">All
                rights reserved</span>.</p>


    </div>
    <!-- ==== FOOTERLINK =====  -->
    <script>
    // main banner
    $(document).ready(function() {
        var owl = $('.custom-banner');
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
    </script>
    <?php include '../template/footerlink.php';?>
</body>


</html>