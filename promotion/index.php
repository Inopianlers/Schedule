<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <style>
    body {

        background-attachment: fixed;
    }

    .modal-promo {
        width: 100%;
    }

    .promo-per-tx {
        font-size: var(--small-font-size);
    }

    .modal-body-promo p {
        margin: 0px;
    }

    .modal-body-promo ol {
        padding: 5px 25px 0px;
    }

    .modal-body-promo ol li {
        font-size: var(--small-font-size);
    }

    .animate-bottom {
        position: relative;
        animation: animatebottom 0.4s;
        height: 100%;

    }

    @keyframes animatebottom {
        from {
            bottom: -300px;
            opacity: 0;
        }

        to {
            bottom: 0;
            opacity: 1;
        }
    }

    .slideup-content {
        margin: 0px !important;
        /* height: 100% !important; */
    }

    .table {
        width: 100% !important;
    }


    /* .table td, .table th{
        padding:0px!important;
    }
    .table table {
        table-layout: fixed;
        width: 100% !important;
        font-size: 10px;
    }  */

    .table table {
        /* table-layout: fixed; */
        width: 100% !important;
        font-size: 10px;
    }

    .table table tr {
        width: 100%;
    }

    .table table tr td {
        vertical-align: middle !important;
        padding: 10.5pt 5.4pt !important;
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
        <div class="back-btn-promo">
            <a href="../"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
            <span class="language" data-translate="promotion">Promotion</span>
        </div>
        <!-- promo selection scroll bar -->
        <div>
            <div id="scroll-select-bar" class="owl-carousel owl-theme promo-select-scrollbar">
                <div class="promo-select active">
                    <span class="language" data-translate="show_all" onclick="filterSelection('0')">SHOW ALL</span>
                </div>

                <div class="promo-select">
                    <span class="language" data-translate="slot" onclick="filterSelection('4')">SLOTS</span>
                </div>
                <div class="promo-select">
                    <span class="language" data-translate="live_casino" onclick="filterSelection('2')">CASINO</span>
                </div>

                <div class="promo-select">
                    <span class="language" data-translate="sport" onclick="filterSelection('3')">SPORTS</span>
                </div>

                <!-- <div class="promo-select">
                    <span class="language" data-translate="lottery">Lottery</span>
                </div>
                <div class="promo-select">
                    <span class="language" data-translate="fishing">Fishing</span>
                </div> -->

            </div>
        </div>


        <div id="promotion_catergory">

        </div>
        <!-- promotion -->
        <!-- <div class="promo-cont">
            <div class="promo-wrap-v1">
                <div class="promo-sec-img">
                    <div class="promo-img">
                        <img src="../assets/img/promotion_banner.png" alt="">
                    </div>
                    <div class="promo-title">
                        <span>Welcome Bonus</span>
                    </div>
                    <div class="promo-desc">
                        <span>Welcome to B88 ! To celebrate our new members, we're giving you a <br>
                            Referral Bonus to welcome you jion us.</span>
                    </div>
                </div>
                <div class="promo-sec-btn">
                    <button class="v1" data-toggle="modal" data-target="#promopopup">
                        <img src="../assets/img/promotionbtn/promotion_more_info.png" alt="">
                    </button>
                    <button class="v1">
                        <img src="../assets/img/promotionbtn/promotion_join_now.png" alt="">
                    </button>
                </div>
            </div>

        </div> -->

        <!-- PROMO popup -->
        <!-- <div class="modal fade" id="promopopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-promo" role="document">
                <div class="modal-content modal-promo-content">
                    <div class="modal-body modal-body-promo">
                        <div class="promo-back" data-dismiss="modal" aria-label="Close">
                            <i class="far fa-chevron-left" aria-hidden="true"></i>
                            <span class="language" data-translate="back_promo">Back</span>
                        </div>
                        <div>
                            <img src="../assets/img/promotion_banner.png" alt="">
                        </div>
                        <div class="promo-pu-tl">
                            <span>Welcome bonus</span>
                        </div>
                        <div class="promo-pu-des">
                            <span class="language" data-translate="promotion_period">Promotion Period</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>

    <script>
    jQuery('.promo-cont').find('.promo-wrap:last').css('margin-bottom', '80px');
    var selector = ".promo-select";
    $(selector).on('click', function() {
        $(selector).removeClass('active');
        $(this).addClass('active');
    });
    $(document).ready(function() {
        var owl = $('.promo-select-scrollbar');
        owl.owlCarousel({
            items: 5,
            dots: false,
        });
    });
    </script>

    <script>
    var member_id = "<?php echo $member_id?>";
    var member_group = "<?php echo $member_group?>";
    var lang = $('#session_lang').val();
    // console.log(lang)
    filterSelection("0")

    function filterSelection(promotion_type) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        // if (c == "all") c = "";
        console.log(member_id, promotion_type, member_group, lang)
        $.ajax({
            url: '../controller/ajax/check_promo_catergory/',
            type: 'GET',
            data: {
                member_id: member_id,
                promotion_type: promotion_type,
                member_group: member_group,
                lang: lang
            },
            beforeSend: function() {
                // console.log("ok");
            },
            error: function(xhr) { // if error occured
                console.log(xhr.statusText + xhr.responseText);
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(response) {
                // console.log(response)
                var promotion_container = response.promotion_container;
                var promotion_container1 = response.promotion_script;

                // alert(promotion_container);
                $('#promotion_catergory').html(promotion_container);
                $('#promotion_container1').html(promotion_container1);


            }
        });
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    }
    </script>
    <script>
    var lang = $('#session_lang').val();

    if (lang == "th") {

        $("#mored").html("more1221");


    } else {

    }
    </script>

</body>

</html>