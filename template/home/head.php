<!-- IE11 and/or Edge -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Meta descrptions and meta title for google search results -->
<!-- ========================================================= -->
<meta charset="UTF-8">
<title>Mverse</title>
<meta name='description'
    content=''>
<meta name='keywords' content='' />
<meta name='author' content=''>
<meta name="google-site-verification" content="">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Meta descrptions URL -->
<!-- ========================================================= -->
<meta property='og:title' content=''>
<meta property='og:description'
    content=''>
<meta property="og:image" content="">
<meta property="og:url" content="www.b88club.com" />
<meta property="og:type" content="" />
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicons -->
<link rel="shortcut icon" type="image/png" href="assets/img/s9/Favi.png">
<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- owl -->
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/f43cd34353.js" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<!-- Security Policy -->
<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- cookie js -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<?php
        session_start();
        include_once 'dbh-inc.php';
        $member_id = $_SESSION['member_id'];
        $affmember_id = $_SESSION['affmember_id'];
        $after_login = $_SESSION['after_login'];
        $language = $_GET['language'];
        if(!$language){
            $language = $_SESSION['language'];
        }else{
            $_SESSION['language'] = $language;
        }
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $t = time();
        $today = date("Y-m-d", $t);
        $now = date("Y-m-d H:i:s", $t);

        //get member details from member id 
        $query_member_details = "SELECT * FROM member WHERE f_id='$member_id'";
        $result_member_details = mysqli_query($conn, $query_member_details);
        $row_member_details = mysqli_fetch_array($result_member_details);
        $member_username = $row_member_details['f_username'];
        $member_bank = $row_member_details['f_bank'];
        $member_bank_account_no = $row_member_details['f_bank_account_no'];
        $member_full_name = $row_member_details['f_full_name'];
        $member_group = $row_member_details['f_member_group'];
        $member_contact_no = $row_member_details['f_contact_no'];
        $member_currency_code = $row_member_details['f_currency_code'];
        $member_company_id = $row_member_details['f_company_id'];
        $member_email = $row_member_details['f_email'];
        $member_birthday = $row_member_details['f_dob'];
        $bPoint = $row_member_details['f_points'];
        $member_auto_button = $row_member_details['f_auto_button'];
        if($member_auto_button == 'N' ){
            $checked = 'checked';
        }
        else {
            $checked = '';
        }

        //get main wallet balance
        $query_main_wallet = "SELECT * FROM main_wallet WHERE f_member_id='$member_id' AND f_delete='N'";
        $result_main_wallet = mysqli_query($conn, $query_main_wallet);
        $row_main_wallet = mysqli_fetch_array($result_main_wallet);
        $main_wallet_balance = $row_main_wallet['f_balance'];

        // get withdrawal bank row
        $query_get_bank_row = "SELECT * FROM withdrawal_bank WHERE f_member_id='$member_id' AND f_currency_id = '$member_currency_code'";
        $result_get_bank_row = mysqli_query($conn, $query_get_bank_row);
        $num_get_bank_row = mysqli_num_rows($result_get_bank_row);

        // get currency name 
        $query_get_currency_name = "SELECT f_alias FROM currency WHERE f_id='$member_currency_code'";
        $result_get_currency_name = mysqli_query($conn, $query_get_currency_name);
        $row_get_currency_name = mysqli_fetch_array($result_get_currency_name);
        $member_currency_name = $row_get_currency_name['f_alias'];


        if ($_SESSION['language'] == "") {
            $_SESSION['language'] = "en";
        }


        if (isset($_SESSION['member_id'])) {
            $check_user_token = "SELECT * FROM member_token where f_username = '$member_username' AND f_delete = 'N'";
            $result_check_user_token = mysqli_query($conn, $check_user_token);
            $num_check_user_token = mysqli_num_rows($result_check_user_token);
            if($num_check_user_token > 0){
                // echo $num_check_user_token;
                $row_check_user_token = mysqli_fetch_array($result_check_user_token);
                $member_token = $row_check_user_token['f_token'];
                if($_SESSION['token'] != $member_token){
                    // echo "hi";
                    session_destroy();
                    echo "<script>window.location.href = 'login'</script>";
                }else{
                    // echo "halo";
                // echo $_SESSION['token'];
                }
            }
            // add hide class
            $hide= "hide";
            echo '<input type="hidden" id="session_lang" value="'.$_SESSION["language"].'"  readonly>';
        } else {
            $show1= "hidden";
            // header("Location: ../");
            $annoucement_pop_up = "";
            echo '<input type="hidden" id="session_lang" value="'.$_SESSION["language"].'" readonly>';
     
            
        }

        if($member_birthday != ''){
            $hide_modal_dob = "hidden";
        }else{
            $hide_div_dob = "hidden";

        }

  ?>