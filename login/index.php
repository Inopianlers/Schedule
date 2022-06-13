<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
</head>

<style>
.back-btn-lr {
    position: relative;
    padding: 10px 0px 0px 20px;
}

.back-btn-lr a {
    color: #fff;
}
</style>

<body>
    <!-- ==== HEADER ===== -->
    <?php include '../template/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include '../template/sidebar.php';?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <div id="overlay-contact" onclick="contact()"></div>
        <div class="back-btn-lr">
            <a href="../"><i class="far fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <div class="lr-wrap">
            <!-- <img class="lr-img-logo" src="../assets/img/b88_logo.png" alt=""> -->
            <div class="lr-text">
                <span class="language" data-translate="login">LOGIN</span>
            </div>
            <div class="content-lr">
                <form>
                    <input class="text_width" type="hidden" id="ip_address" name="ip_address" value="">
                    <input class="text_width" type="hidden" id="country" name="country" value="">
                    <input class="text_width" type="hidden" id="city" name="city" value="">
                    <input class="text_width" type="hidden" id="postal" name="postal" value="">
                    <input class="text_width" type="hidden" id="fingerprint" name="fingerprint" value="">
                    <label for="" class="input-label-lr language" data-translate="username">Username</label><br>
                    <div class="input-lr"><input type="text" placeholder="Enter Username" id="lg_username">
                    </div>
                    <label for="" class="input-label-lr language" data-translate="password">Password</label><br>
                    <div class="input-lr"><input type="password" placeholder="Enter Password" id="lg_password"></div>
                    <label>
                        <input type="checkbox" checked="checked" name="remember">
                        <span class="remember language" data-translate="keep_me_login">Keep me logged in</span>
                    </label>

                    <div class="lr-btform">
                        <span class="forgotup">
                            <a href="../forgotusername" class="language" data-translate="forgot_username">Forgot
                                Username</a>
                            <span class="language" data-translate="or">OR</span>
                            <a href="../forgotpassword" class="language" data-translate="forgot_password">Forgot
                                Password</a>?
                        </span>
                        <input id="login_btn" class="lr-btn" name="btn_login" type="button" onclick="login_process()"
                            value="Submit">
                    </div>

                </form>
            </div>
        </div>
        <div class="lr-bt-txt">
            <span id="donacc" class="language" data-translate="no_account">Don't have an account yet ?</span>
            <?php 
            if($language == 'th'){
                echo '
                <a href="../register">ที่นี่</a>
                <span>เพื่อลงทะเบียน.</span>
                ';
            }else if($language == 'bm'){
                echo '
                <a href="../register">SINI</a>
                <span>untuk mendaftar.</span>
                ';
            }else if($language == 'cn'){
                echo '
                <a href="../register">此处</a>
                <span>以注册。</span>
                ';
            }else{
                echo '
                <a href="../register">HERE</a>
                <span>to register.</span>
                ';
            }
        ?>

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

        <p class="copyright">Copyright © 2022 S9ASIA &nbsp;<span class="language" data-translate="all_right_reserved">All
                rights reserved</span>.</p>
    </div>
    <!-- FOOTERLINK -->
    <?php include '../template/footerlink.php';?>
    <!-- IP Address Details Start -->
    <script>
    var session = $('#session_lang').val();

    if (session == 'th') {
        var lang = $(this).attr('id');
        // console.log(lang);

        var mydata = JSON.parse(thailand);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else if (session == 'bm') {
        var lang = $(this).attr('id');
        // console.log(lang);

        var mydata = JSON.parse(malay);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });

    } else if (session == 'cn') {
        var lang = $(this).attr('id');

        var mydata = JSON.parse(chinese);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else {

    }
    </script>
    <script>
    $.ajax({
        dataType: "json",
        url: "https://ipapi.co/json/",
        success: function(data) {

            var ip = data.ip;
            var country = data.country_name;
            var city = data.city;
            var postal = data.postal;
            // console.log(data);
            // console.log(ip);
            // console.log(country);
            // console.log(city);
            // console.log(postal);

            $('#ip_address').val(ip);
            $('#country').val(country);
            $('#city').val(city);
            $('#postal').val(postal);
        }
    })
    </script>
    <!-- IP Address Details End -->

    <!-- user input limit start-->
    <script>
    $('#lg_username').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    $('#lg_password').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });
    </script>
    <!-- user input limit end-->

    <!-- remember me funtion start-->
    <script>
    $(function() {
        if (localStorage.chkbx && localStorage.chkbx != '') {
            $('#remember_me').attr('checked', 'checked');
            $('#lg_username').val(localStorage.usrname);
            $('#lg_password').val(localStorage.pass);
        } else {
            $('#remember_me').removeAttr('checked');
            $('#lg_username').val('');
            $('#lg_password').val('');
        }
    });
    </script>
    <!-- remember me funtion end-->

    <!-- login process start -->
    <script>
    function login_process() {

        // alert("hihi");

        var username = $('#lg_username').val();
        var password = $('#lg_password').val();
        var ip_address = $('#ip_address').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var postal = $('#postal').val();
        var fingerprint = $('#fingerprint').val();
        var session = $('#session_lang').val();
        // console.log(username)
        // console.log(password)
        // console.log(ip_address)
        // console.log(country)
        // console.log(city)
        // console.log(postal)
        // console.log(fingerprint)
        // console.log(session)


        // if(username != '' && password != ''){

        $.ajax({
            url: '../controller/ajax/verify_login/',
            type: 'GET',
            data: {
                username: username,
                password: password,
                ip_address: ip_address,
                country: country,
                city: city,
                postal: postal,
                fingerprint: fingerprint
            },
            beforeSend: function() {
                console.log("ok");
            },
            error: function(xhr) { // if error occured
                console.log(xhr.statusText + xhr.responseText);
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(response) {

                // console.log(response)
                var return_answer = response.answer;
                var member_id = response.member_id;
                return_message = response.return_msg;
                close_button = response.close_button;
                let errorCount = response.error_count;

                // alert(return_answer)

                // If/Else Statemet Start
                if (return_answer == 0) {

                    // success
                    window.location = "../";

                    if ($('#remember_me').is(':checked')) {
                        loginUsername = $('#lg_username').val();
                        loginPassword = $('#lg_password').val();
                        console.log(loginPassword)
                        // save username and password
                        localStorage.usrname = loginUsername;
                        localStorage.pass = loginPassword;
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }


                }else if(return_answer == 3){
                    // console.log("error")
                    swal_lang(return_message, session)

                } else if (return_answer == 1) {
                    swal_lang(return_message, session)

                } else {
                    swal_lang(return_message, session)

                }
                // If/Else Statemet End
            }
        });

    }
    </script>
    <!-- login process end -->
</body>

</html>