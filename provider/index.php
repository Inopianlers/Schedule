<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
$slot_provider_code2 = $_GET['id'];
$slot_name = $_GET['name'];
include '../template/head.php';
include '../controller/base/api_credentials.php';
?>

    <style>
    body {

        background-attachment: fixed;
    }

    .search-wrap {
        padding: 10px;
    }

    .search {
        width: 100%;
        position: relative;
        display: flex;
    }

    .searchTerm {
        width: 100%;
        border: 3px solid #2B2B2B;
        background: #808080;
        border-right: none;
        padding: 5px;
        border-radius: 25px 0 0 25px;
        outline: none;
        color: #9DBFAF;
    }

    .searchTerm:focus {
        color: #fff;
    }

    .searchButton {
        width: 20%;
        height: 42px;
        border: 1px solid #808080;
        background: #808080;
        text-align: center;
        color: #fff;
        border-radius: 0 25px 25px 0;
        cursor: pointer;
        font-size: 20px;
    }

    .searchButton i {
        font-weight: 500;
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
        <div class="back-h">
            <a href="../">
                <i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;
            </a>
            <span class="language"><?=$slot_name?></span>
        </div>


        <div class="search-wrap">
            <div class="search">
                <input type="text" class="searchTerm" id='search_game' onkeyup='search_items()'>
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>


        <div class="owl-carousel owl-theme provider-select-scrollbar">
            <?php
            if($slot_provider_code2 == "PG" ){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_new' onclick='cater_filter(8)'>
                    <span class='language'>NEW</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                <div class='provider-select' id='cater_table' onclick='cater_filter(3)'>
                    <span class='language'>TABLE</span>
                </div>
                ";
            }else if($slot_provider_code2 == "PR" || $slot_provider_code2 == "JK" || $slot_provider_code2 == "SG" || $slot_provider_code2 == "CQ"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_new' onclick='cater_filter(8)'>
                    <span class='language'>NEW</span>
                </div>
                <div class='provider-select' id='cater_arcade' onclick='cater_filter(2)'>
                    <span class='language'>ARCADE</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                <div class='provider-select' id='cater_table' onclick='cater_filter(3)'>
                    <span class='language'>TABLE</span>
                </div>
                ";
            }elseif($slot_provider_code2 == "RE" || $slot_provider_code2 == "TT" || $slot_provider_code2 == "FI"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_new' onclick='cater_filter(8)'>
                    <span class='language'>NEW</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                ";
            }elseif($slot_provider_code2 == "PX"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_new' onclick='cater_filter(8)'>
                    <span class='language'>NEW</span>
                </div>
                <div class='provider-select' id='cater_arcade' onclick='cater_filter(2)'>
                    <span class='language'>ARCADE</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                ";
            }else if($slot_provider_code2 == "G8"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                ";
            }else if($slot_provider_code2 == "MP"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_arcade' onclick='cater_filter(2)'>
                    <span class='language'>ARCADE</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                ";
            }elseif($slot_provider_code2 == "JD"){
                echo 
                "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                </div>
                <div class='provider-select' id='cater_hot' onclick='cater_filter(6)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_new' onclick='cater_filter(8)'>
                    <span class='language'>NEW</span>
                </div>
                <div class='provider-select' id='cater_arcade' onclick='cater_filter(2)'>
                    <span class='language'>ARCADE</span>
                </div>
                <div class='provider-select' id='cater_card' onclick='cater_filter(9)'>
                    <span class='language'>CARD</span>
                </div>
                <div class='provider-select ' id='cater_slot' onclick='cater_filter(7)'>
                    <span class='language'>SLOT</span>
                </div>
                ";
            }else{
                echo "
                <div class='provider-select active' id='cater_all' onclick='cater_filter(0)'>
                    <span class='language'>ALL</span>
                 </div>
                <div class='provider-select' id='cater_top' onclick='cater_filter(1)'>
                    <span class='language'>HOT</span>
                </div>
                <div class='provider-select' id='cater_table' onclick='cater_filter(3)'>
                    <span class='language'>TABLE</span>
                </div>
                    ";
            }
        ?>
        </div>
        <input type="text" id='filter_game_id' value='' hidden>
        <div class="provider-wrap-outer" id="cater_data">

        </div>


        <!--provider popup -->

    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>
    <!-- SCRIPT -->

    <script>
    var session = $('#session_lang').val();

    if (session == 'th') {

        $("#search_game").attr("placeholder", "ค้นหา");
    } else if (session == 'bm') {
        $("#search_game").attr("placeholder", "Cari");
    } else if (session == 'cn') {
        $("#search_game").attr("placeholder", "搜索");
    } else {
        $("#search_game").attr("placeholder", "Search");
    }
    </script>
    <script>
    var selector = ".provider-select";
    $(selector).on('click', function() {
        $(selector).removeClass('active');
        $(this).addClass('active');
    });
    $(document).ready(function() {
        var owl = $('.provider-select-scrollbar');
        owl.owlCarousel({
            items: 5,
            dots: false,
        });
    });
    </script>


    <script>
    function game_maintance() {
        var lang = $('#session_lang').val();

        if (lang == "th") {

            Swal.fire({
                showConfirmButton: false,
                showCloseButton: true,
                closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
                position: "top",
                html: "<div class = 'd-flex align-items-center  justify-content-center swal-alert'> <i class='fas fa-exclamation-circle alert_icon'></i> &nbsp; ขออภัย เกมที่คุณเลือกอยู่ในระหว่างการปรับปรุง </div>",
                type: "success"
            }).then(function() {
                return false;
            });

        } else {


            Swal.fire({
                showConfirmButton: false,
                showCloseButton: true,
                closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
                position: "top",
                html: "<div class = 'd-flex align-items-center  justify-content-center swal-alert'> <i class='fas fa-exclamation-circle alert_icon'></i> &nbsp; Sorry, your selected game is under maintenance.</div>",
                type: "success"
            }).then(function() {
                return false;
            });


        }

    }

    function checkgameid() {

        var lang = $('#session_lang').val();

        if (lang == "th") {
            window.location.replace("../login");
            // Swal.fire({
            //     showConfirmButton: false,
            //     showCloseButton: true,
            //     closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
            //     position: "top",
            //     html: "<div class = 'd-flex align-items-center  justify-content-center swal-alert'> <i class='fas fa-exclamation-circle alert_icon'></i> &nbsp; โปรดเข้าสู่ระบบเพื่อดำเนินการต่อ </div>",
            //     type: "success"
            // }).then(function() {
            //     return false;
            // });

        } else {

            window.location.replace("../login");
            // Swal.fire({
            //     showConfirmButton: false,
            //     showCloseButton: true,
            //     closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
            //     position: "top",
            //     html: "<div class = 'd-flex align-items-center  justify-content-center swal-alert'> <i class='fas fa-exclamation-circle alert_icon'></i> &nbsp; Please login to continue.</div>",
            //     type: "success"
            // }).then(function() {
            //     return false;
            // });


        }


    }

    function cater_filter(catergory) {
        var provider_code = "<?php echo $slot_provider_code2?>";
        var member_username = "<?php echo $member_username?>";
        var filterGameid = $('#filter_game_id').val(catergory);
        var searchBar = $('#search_game').val('')


        $.ajax({
            url: '../controller/ajax/game_catergory/index.php',
            type: 'GET',
            data: {
                catergory: catergory,
                provider_code: provider_code,
                member_username: member_username
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(data) {
                var game_list = data.game_list;
                // console.log(game_list)
                $('#cater_data').html(game_list)

            }

        });
    }


    function search_items() {
        //
        console.log("searc");
        var g = $('#search_game').val().toLowerCase();
        var current_selection = $('#filter_game_id').val();
        var class_id_name = "";

        if (current_selection == "top") {
            class_ori = ".provider-wrap-outer .provider-wrap .provider-wrap-t1 .game-name";
        } else if (current_selection == "arcade") {
            class_ori = ".provider-wrap-outer .provider-wrap .provider-wrap-t1 .game-name";

        } else if (current_selection == "jackpot") {
            class_ori = ".provider-wrap-outer .provider-wrap .provider-wrap-t1 .game-name";
        } else if (current_selection == "lottery") {
            class_ori = ".provider-wrap-outer .provider-wrap .provider-wrap-t1 .game-name";
        } else {
            class_ori = ".provider-wrap-outer .provider-wrap .provider-wrap-t1 .game-name";
        }




        $(class_ori).each(function() {
            var s = $(this).text().toLowerCase();

            $(this).closest(".provider-wrap")[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    }

    // $(window).load(function(){
    //     $("#cater_all").mouseover();
    // });

    $(document).ready(function() {

        var catergory = 0;
        var provider_code = "<?php echo $slot_provider_code2?>";
        var member_username = "<?php echo $member_username?>";
        // console.log(member_username)


        $.ajax({
            url: '../controller/ajax/game_catergory/index.php',
            type: 'GET',
            data: {
                catergory: catergory,
                provider_code: provider_code,
                member_username: member_username
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(data) {

                var game_list = data.game_list;
                var num_rows = data.num_row;
                // console.log(num_rows);
                $('#cater_data').html(game_list)
                // $('#cater_data').html(game_list)

            }

        });

    });
    </script>


</body>

</html>