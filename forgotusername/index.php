<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <style>
    input[type="text"]:read-only,
    input[type="number"]:read-only,
    input[type="email"]:read-only,
    input[type="text"]:disabled,
    input[type="number"]:disabled,
    input[type="email"]:disabled {
        padding-left: 5px;
        color: #000;
        background: #fff;
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
        <div class="back-btn-lr">
            <a href="../"><i class="far fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <div class="lr-wrap">
            <!-- <img class="lr-img-logo" src="../assets/img/b88_logo.png" alt=""> -->

            <div class="lr-text">
                <span class="language" data-translate="forgot_username">FORGOT USERNAME</span>
            </div>
            <div class="content-lr">
                <div>
                    <label for="" class="input-label-lr language" data-translate="phone_number">Phone Number</label><br>
                    <div class="input-lr"><input type="text" placeholder="Enter Phone Number" id="phone_number"
                            name="phone_number" onkeyup="check_phone_number()"
                            onKeyPress="if(this.value.length==11) return false;"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type="number" minlength="10" maxlength="11" required>

                    </div>
                    <div class="errormsg" id="check-phonenum"></div>

                    <label for="" class="input-label-lr language" data-translate="code">Code</label><br>

                    <div class="input-lr">
                        <input type="number" id="verify_code" name="verify_code" oninput="this.className"
                            onKeyPress="if(this.value.length==6) return false;" pattern="[0-9]{6,}" placeholder="Code"
                            required>

                        <input class="reg-checkvalidate" type="text" id="check_code" name="check_code"
                            placeholder="Enter Code" minlength="6" readonly hidden />
                        <button class="send-button" id="begin" disabled="">
                            <span id="timing" class="language" data-translate="send">Send</span>&nbsp;<span
                                id="countdowntimer"></span>
                        </button>
                    </div>
                    <div class="errormsg" id="check-otp-code"></div>


                    <div class="lr-btform">
                        <input class="lr-btn" type="button" value="Submit" id="submit_lang" disabled>
                    </div>

                </div>
            </div>
        </div>
        <div class="lr-bt-txt-l">
            <div class="reminder-wrap-lr">
                <span>*<span class="language" data-translate="reminder">Reminder</span></span>
                <?php if($language=="bm"){
                            echo"<p>1. Name Pengguna akan menghantar ke nombor telefon anda yang berdaftar.</p>";
                        }
                        else if($language=="cn"){
                            echo"<p>1. 用户名将发送到您的注册电话号码。</p>";

                        }else if($language=="th"){ 
                            echo"<p>1. ชื่อผู้ใช้ จะส่งไปยังหมายเลขโทรศัพท์ที่คุณลงทะเบียนไว้</p>";
                        }else{
                            echo"<p>1. Username will send to your registered phone number.</p>";
                        }?>
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

        <p class="copyright">Copyright © 2022 S9ASIA &nbsp;<span class="language" data-translate="all_right_reserved">All
                rights reserved</span>.</p>

    </div>
    <!-- FOOTERLINK -->
    <?php include '../template/footerlink.php';?>
    <!-- send password -->
    <script>
    $("#begin").click(function() {

        //get phone number
        $('#phone_number').prop('readonly', true);

        var contact_no = $('#phone_number').val();
        var method = 1
        //alert(contact_no);

        //send sms code to user
        if (contact_no != '') {
            $.ajax({
                url: '../controller/ajax/sms_provider/',
                type: 'GET',
                data: {
                    contact_no: contact_no,
                    method: method
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                crossDomain: true,
                beforeSend: function() {
                    // alert(contact_no);
                },
                error: function(xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    // console.log(xhr.status);
                },
                success: function(response) {
                    // alert(response);
                    var otp_code = response.return_msg;
                    // console.log(otp_code);
                    $('#check_code').val(otp_code);
                }
            });
        }
        // var lang = $('#session_lang').val();
        // var myTimer, timing = 90;
        // $('#timing1').html('');
        // $('#timing').html(timing);
        // $('#begin').prop('disabled', true);

        // myTimer = setInterval(function() {
        //     --timing;
        //     $('#timing').html(timing);

        //     if (timing === 0) {
        //         $('#timing').hide();


        //         clearInterval(myTimer);


        //         if (lang == "cn") {

        //             $('#timing1').html('重发');

        //         } else if (lang == "bm") {

        //             $('#timing1').html('resend');


        //         } else {

        //             $('#timing1').html('Resend');

        //         }

        //         $('#begin').prop('disabled', false);

        //     }
        // }, 1000);


        if (lang == "bm") {
            var resendTx = "Hantar Semula";
        } else if (lang == "cn") {
            var resendTx = "重发";
        } else {
            var resendTx = "Resend";
        }
        $('#begin').prop('disabled', true);
        var timeleft = 91;
        var countdown = document.getElementById("countdowntimer");
        var buttontextsend = document.getElementById("timing");
        buttontextsend.innerHTML = resendTx;
        var downloadTimer = setInterval(function() {
            timeleft--;
            countdown.innerHTML = timeleft;
            if (timeleft === 0) {
                clearInterval(downloadTimer);
                countdown.innerHTML = "";
                $('#begin').prop('disabled', false);
            }
        }, 1000);

    }); //end of click function
    </script>
    <!-- end send  -->

    <!-- Check Current Code Same As User Type Start-->
    <script type="text/javascript">
    var lang = $('#session_lang').val();
    $('#verify_code').on('keyup', function(e) {
        var system_code = $('#check_code').val();
        // console.log(system_code);
        var user_code = $(this).val();
        // console.log(user_code);

        if (system_code != user_code || user_code.length != 6) {
            // console.log("here")
            $('#submit_lang').prop('disabled', true);
            if (lang == "cn") {

                $('#check-otp-code').html(" 验证码不匹配!");


            } else if (lang == "bm") {

                $('#check-otp-code').html("Kod OTP tidak sepadan! ");


            } else {
                $('#check-otp-code').html("OTP code does not match.");
            }

        } else {
            $('#submit_lang').prop('disabled', false);
            $('#check-otp-code').html("");

        }
    });
    </script>
    <!-- Contact Number Typing Validation -->
    <script type="text/javascript">
    var lang = $('#session_lang').val();
    // var home_slot = $('#home_slot')
    // console.log("current: " + lang);
    $('#phone_number').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function check_phone_number() {
        var contact = $('#phone_number').val();

        if (contact != '') {
            $.ajax({
                url: '../controller/ajax/check_contact_no',
                type: 'GET',
                data: {
                    contact: contact
                },
                // dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                crossDomain: true,
                //  beforeSend: function() {
                //       alert(contact);
                //  },
                error: function(xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    // console.log(xhr.responseText);
                    // console.log(xhr.status);
                },
                success: function(response) {
                    //  alert(response);
                    if (response != "Yes") {

                        $("#check-phonenum").show();

                        if (lang == "cn") {

                            $("#check-phonenum").html("查无此号码");


                        } else if (lang == "bm") {

                            $("#check-phonenum").html("Nombor telefon tidak didapat.");


                        } else {
                            $("#check-phonenum").html("Phone number not found.");
                        }


                        $("#btn-log").attr("disabled", true);
                        $("#verify_code").attr("disabled", true);
                        // $("#new_username").attr("disabled", true);

                    } else {
                        $("#begin").attr("disabled", false);
                        $("#check-phonenum").html("");
                        $("#check-phonenum").hide();
                        $("#btn-log").attr("disabled", false);
                        $("#verify_code").attr("disabled", false);
                        // $("#new_username").attr("disabled", false);

                    }
                }
            });

        }
    }
    </script>
    <!-- Contact Number Typing Validation End-->

    <!-- Send Username Process Start -->
    <script>
    function swal_lang(return_message, session, reload_verify) {
        // console.log(session)
        Swal.fire({
            html: "<div class='d-flex align-items-center  justify-content-center swal-alert'><i class='fas fa-exclamation-circle alert_icon'></i>&nbsp;" +
                return_message + "</div>",
            showConfirmButton: false,
            showCloseButton: true,
            closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
            position: 'top',
            type: "success"
        }).then(function() {
            if (reload_verify == true) {
                page_reload = window.location = '../login';
                // console.log("here")
            } else {
                page_reload = '';
            }
        });

        if (session == 'th') {
            var lang = $(this).attr('id');
            // console.log(lang);

            var mydata = JSON.parse(thai);
            // console.log(mydata);
            $('.language').each(function(index, item) {
                $(this).text(mydata[0][$(this).attr('id')]);
                $(this).text(mydata[0][$(this).text()]);
            });
        } else if (session == 'bm') {
            var lang = $(this).attr('id');
            // console.log("here");

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
    }

    $('#submit_lang').click(function() {
        var contact_no = $('#phone_number').val();
        var method = 2
        // alert(contact_no);
        var session = $('#session_lang').val();

        //send sms code to user
        if (contact_no != '') {
            $.ajax({
                url: '../controller/ajax/sms_provider/',
                type: 'GET',
                data: {
                    contact_no: contact_no,
                    method: method
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                crossDomain: true,
                beforeSend: function() {
                    // alert(contact_no);
                    console.log(session);
                },
                error: function(xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.status);
                },
                success: function(response) {
                    // console.log(response);
                    var return_message = response.return_msg;
                    var reload_verify = response.code;
                    // console.log(return_message,reload_verify);
                    swal_lang(return_message, session, reload_verify)

                    // console.log(otp_code);
                    // $('#check_code').val(otp_code);
                }
            });
        }
    })
    </script>
    <!-- Send Username Process End -->
</body>

</html>