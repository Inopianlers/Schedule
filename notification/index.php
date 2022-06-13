<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <?php include '../template/check_member_login.php';?>
    <style>
    body {
        background-repeat: no-repeat;
        background-attachment: fixed;
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
        <!-- ==== NOTIFICATION ===== -->
        <div class="back-btn">
            <a href="../myaccount"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
            <span class="language" data-translate="notification">NOTIFICATION</span>
        </div>
        <div class="noti-wrap">
            <div class="noti-head">
                <span class="language" data-translate="all_notification">All Notification</span>
            </div>
            <?php
        	$query_get_message = "SELECT * FROM direct_message WHERE f_member_id = '$member_id' AND f_delete = 'N' ORDER BY f_id DESC";
            mysqli_set_charset($conn, "utf8");
            $result_get_message = mysqli_query($conn, $query_get_message);
            $num_get_message = mysqli_num_rows($result_get_message);
            if($num_get_message > 0){

                while($row_get_message = mysqli_fetch_array($result_get_message)){
                    $message_title = $row_get_message['f_title'];
                    $message_content = $row_get_message['f_body'];
                    $message_datetime = $row_get_message['f_created_time'];
                    echo 
                    "
                    <div class='accordion'>
                        <div class='accordion-item-notif'>
                            <div class='accordion-title'>
                                <span>$message_title</span><br><span>$message_datetime</span>
                            </div>
                            <div class='accordion-content'>
                                <div class='accordion-summary-wrap'>
                                <div>
                                $message_title
                                </div>
                                </div>
                                <div class='ar-inner-content'>$message_content</div>
                            </div>
                        </div>
                    </div>
                    ";
                    
                }
            }
        ?>

        </div>





    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>
    <!-- SCRIPT  -->
    <script>
    var acc = document.getElementsByClassName("accordion-title");
    var i;
    $(document).ready(function() {
        call_balance();

    });

    $('#refresh_game_balance').click(function() {
        call_balance();

    });

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
        });
    }

    var height = document.getElementsByClassName("accordion-content").offsetHeight;
    console.log(height);
    </script>

</body>

</html>