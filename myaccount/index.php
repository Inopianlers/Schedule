<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <?php include '../template/check_member_login.php';?>
</head>


<body>
    <!-- ==== HEADER ===== -->
    <?php include '../template/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include '../template/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <div id="overlay-contact" onclick="contact()"></div>
        <!-- ==== WALLET ===== -->
        <?php include '../template/wallet.php';?>
        <!-- ==== VERIFY ===== -->
        <?php include '../template/verify.php';?>
        <!-- ==== MY ACCOUNT ===== -->

        <div class="back-btn">
            <a href="../"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
            <span class="language" data-translate="my_account">MY ACCOUNT</span>
        </div>

        <div class="my-acc-wrap">
            <div class="my-acc-select">
                <div>
                    <a href="../userinfo" class="b-right">
                        <img class="my-acc-select-img" src="../assets/img/s9/myaccount/user_info.png" alt="">
                        <span class="language" data-translate="user_info">USER INFO</span>
                    </a>
                </div>
                <div>
                    <a href="../changepassword" >
                        <img class="my-acc-select-img" src="../assets/img/s9/myaccount/change_password.png" alt="">
                        <span class="language" data-translate="change_password">CHANGE PASSWORD</span>
                    </a>
                </div>
                <div>
                    <a href="../changegamepassword" class="b-right">
                        <img class="my-acc-select-img" src="../assets/img/s9/myaccount/change_game_password.png" alt="">
                        <span class="language" data-translate="change_game_password">CHANGE GAME PASSOWRD</span>
                    </a>
                </div>
                <div>
                    <a href="../notification" >
                        <img class="my-acc-select-img" src="../assets/img/s9/myaccount/notification.png" alt="">
                        <span class="language" data-translate="notification">NOTIFICATION</span>
                    </a>
                </div>
                <div>
                    <a href="../bankingdetails" class="b-right">
                        <img class="my-acc-select-img" src="../assets/img/s9/myaccount/banking_details.png" alt="">
                        <span class="language" data-translate="banking_details">BANKING DETAILS</span>
                    </a>
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