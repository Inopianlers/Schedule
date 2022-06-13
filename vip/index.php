<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
</head>


<body>
    <!-- ==== HEADER ===== -->
    <?php include '../template/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include '../template/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <div id="overlay-contact" onclick="contact()"></div>
        <div class="vip-wrap">
        <div class="back-btn-promo">
            <a href="../"><i class="far fa-arrow-left" aria-hidden="true"></i></a>
            <span>VIP</span>
        </div>
            <div>
                <img src="../assets/img/vip/vip_banner.png" alt="">
            </div>
            <div class="vip-bg">
                <img src="../assets/img/vip/vip_background.jpg" alt="">
                <div class="vip-t1">
                    <span class="language" data-translate="vipbenefit">VIP BENEFITS</span>
                </div>
                <div class="vip-table">
                    <img src="../assets/img/vip/vip_table_my.png" alt="">
                </div>
            </div>
        </div>




    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>
</body>

</html>