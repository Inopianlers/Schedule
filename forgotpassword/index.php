<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../template/head.php';?>
    <style>
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
                <span class="language" data-translate="forgot_password">FORGOT PASSWORD</span>
            </div>
            <div class="content-lr">
                <div class="md-stepper-horizontal orange step-pad">
                    <div class="md-step active">
                        <div class="md-step-circle"><span>1</span></div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step">
                        <div class="md-step-circle"><span>2</span></div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                </div>
                <form>
                    <div class="tab">
                        <label for="" class="input-label-lr language" data-translate="phone_number">Phone
                            Number</label><br>
                        <div class="input-lr"><input type="text" placeholder="Enter Phone Number" id="phone_number"
                                name="phone_number" onkeyup="check_phone_number()"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type="number" minlength="10" maxlength="11" required>
                        </div>
                        <div class="errormsg" id="check-phonenum"></div>

                        <label for="" class="input-label-lr language" data-translate="code">Code</label><br>

                        <div class="input-lr">
                            <input class="input__field" type="number" id="verify_code" name="verify_code"
                                oninput="this.className" onKeyPress="if(this.value.length==6) return false;"
                                pattern="[0-9]{6,}" placeholder="Code" required>
                            <input class="reg-checkvalidate" type="text" id="check_code" name="check_code"
                                placeholder="Enter Code" minlength="6" readonly hidden />
                            <button type="button" class="send-button" id="begin" disabled="">
                                <span id="timing" class="language" data-translate="send">Send</span>&nbsp;<span
                                    id="countdowntimer"></span>
                            </button>
                        </div>
                        <div style="color:red; font-size:8pt;" id="check-otp-code"></div>

                    </div>
                    <div class="tab">
                        <label for="" class="input-label-lr language" data-translate="new_password">New
                            Password</label><br>
                        <div class="input-lr"><input type="password" type="password" minlength="6" id="new_password"
                                name="new_password" placeholder="New Password" minlength="6" required>
                        </div>
                        <label for="" class="input-label-lr language" data-translate="confirm_password">Confirm
                            Password</label><br>
                        <div class="input-lr"><input type="password" minlength="6" id="confirm_password"
                                name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div style="color:red; font-size:8pt;" id="check-password"></div>


                    <div style="overflow:auto;">
                        <div>
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="language"
                                data-translate="back">Back</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            <button type="button" class="language" data-translate="submit" id="subBtn"
                                onclick="reset_password()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="lr-bt-txt-l">
            <div class="reminder-wrap-lr">
                <span>*<span class="language" data-translate="reminder">Reminder</span></span>
                <?php if($language=="bm"){
                            echo"<p>1. Masukkan nombor telefon berdaftar anda untuk menetapkan semula kata laluan anda.</p>";
                        }
                        else if($language=="cn"){
                            echo"<p>1. 输入您的注册电话号码以重设密码。</p>";
                        }else if($language=="th"){ 
                            echo"<p>1. ป้อนหมายเลขโทรศัพท์ที่ลงทะเบียนของคุณเพื่อรีเซ็ตรหัสผ่านของคุณ.</p>";
                        }else{
                            echo"<p>1. Enter your registered phone number to reset your password.</p>";
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
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab


    function showTab(n) {
        var session = $('#session_lang').val();
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("subBtn").style.display = "none";
            document.getElementById("nextBtn").style.display = "inline";

        } else if (n == 1) {

            document.getElementById("prevBtn").style.display = "inline";
            document.getElementById("subBtn").style.display = "inline";
            document.getElementById("nextBtn").style.display = "none";

        } else {}
        if (n == (x.length - 1)) {
            if (session == "bm") {
                document.getElementById("nextBtn").innerHTML = "Hantar";
            } else if (session == "cn") {
                document.getElementById("nextBtn").innerHTML = "提交";
            } else if (session == "th") {
                document.getElementById("nextBtn").innerHTML = "ส่ง";
            } else {
                document.getElementById("nextBtn").innerHTML = "Submit";
            }

        } else {

            if (session == "bm") {
                document.getElementById("nextBtn").innerHTML = "Seterus";
            } else if (session == "cn") {
                document.getElementById("nextBtn").innerHTML = "下一步";
            } else if (session == "th") {
                document.getElementById("nextBtn").innerHTML = "ถัดไป";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            // document.getElementsByClassName("step")[currentTab].className += " finish";
            document.getElementsByClassName("md-step")[currentTab].className += " active";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("md-step");
        for (i = 1; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }

        x[n].className += " active";
    }
    </script>

    <!-- FOOTERLINK -->
    <?php include '../template/footerlink.php';?>

    <!-- Contact Number Typing Validation -->
    <script type="text/javascript">
    $('#phone_number').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    </script>

    <script>
    $('#confirm_password').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    $('#new_password').bind('input', function() {
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

    <!-- check phone number -->
    <script type="text/javascript">
    //verify phone number input
    function check_phone_number() {
        var contact = $('#phone_number').val();
        var lang = $('#session_lang').val();
        // alert(contact);

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
                    console.log(xhr.responseText);
                    console.log(xhr.status);
                },
                success: function(response) {
                    console.log(response);
                    if (response != "Yes") {
                        // $("#check-phonenum").show();


                        console.log("current: " + lang);

                        if (lang == "cn") {


                            $("#check-phonenum").html("查无此号码");

                        } else if (lang == "bm") {


                            $("#check-phonenum").html("Nombor telefon tidak didapat.");


                        } else {


                            $("#check-phonenum").html("Phone number not found.");

                        }

                        $("#btn-log").attr("disabled", true);
                        $("#verify_code").attr("disabled", true);
                        $("#new_username").attr("disabled", true);
                        $('#nextBtn').attr("disabled", true);

                    } else {
                        $("#check-phonenum").html("");
                        // $("#check-phonenum").hide();
                        $("#btn-log").attr("disabled", false);
                        $("#verify_code").attr("disabled", false);
                        $("#new_username").attr("disabled", false);
                        $("#begin").attr("disabled", false);
                        $('#nextBtn').attr("disabled", false);



                    }
                }
            });

        }
    }
    </script>


    <!-- Check Current Code Same As User Type -->
    <script type="text/javascript">
    var lang = $('#session_lang').val();
    $('#verify_code').on('keyup', function(e) {
        var system_code = $('#check_code').val();
        // console.log(system_code);
        var user_code = $(this).val();
        // console.log(user_code);

        if (system_code != user_code || user_code.length != 6) {

            $('#nextBtn').prop('disabled', true);
            if (lang == "cn") {
                $('#check-otp-code').html("验证码不匹配");

            } else if (lang == "bm") {

                $('#check-otp-code').html("Kod OTP tidak sepadan.");


            } else {
                $('#check-otp-code').html("OTP code does not match.");

            }

        } else {
            $('#nextBtn').prop('disabled', false);
            $('#check-otp-code').html("");

        }
    });
    </script>
    <!-- Phone Number OTP End -->
    <!-- send password -->
    <script>
    $("#begin").click(function() {

        //get phone number
        $('#phone_number').prop('readonly', true);

        var contact_no = $('#phone_number').val();
        var method = 1
        console.log(contact_no);

        //send sms code to user
        if (contact_no != '') {
            $.ajax({
                url: '../controller/ajax/sms_provider/index.php',
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
                    console.log(xhr.status);
                },
                success: function(response) {
                    // alert(response);
                    var otp_code = response.return_msg;
                    console.log(otp_code);
                    $('#check_code').val(otp_code);
                }
            });
        }


        var lang = $('#session_lang').val();
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

    <!-- Check New Password match with Confirm Password -->
    <script type="text/javascript">
    var lang = $('#session_lang').val();

    if (lang == "bm") {
        var passwordmust = "Kata laluan tidak boleh kurang daripada 6 digit.";
        var passwordless = "Kata laluan mesti sama.";
    } else if (lang == "cn") {
        var passwordmust = "密码必须相同。";
        var passwordless = "密码不能少于 6 位数。";
    } else {
        var passwordmust = "Password must be same.";
        var passwordless = "Password cannot less than 6 digit.";
    }


    $('#confirm_password').on('keyup', function(e) {
        var new_password = $('#new_password').val();
        //   alert(new_password);
        var confirm_password = $(this).val();
        // alert(user_code);
        if (new_password.length < 6 || confirm_password.length < 6) {
            $('#check-password').html(passwordless);
            $('#subBtn').prop('disabled', true);
        } else if (new_password != confirm_password) {

            $('#check-password').html(passwordmust);
            $('#subBtn').prop('disabled', true);

        } else {
            $('#check-password').html("");
            $('#subBtn').prop('disabled', false);
        }
    });
    </script>

    <!-- Reset Password Start -->
    <script>
    var session = $('#session_lang').val();

    function swal_lang(session, return_message, reload_verify) {
        Swal.fire({
            html: "<div class='d-flex align-items-center  justify-content-center swal-alert'><i class='fas fa-exclamation-circle alert_icon'></i>&nbsp;<span class=language>" +
                return_message + "</span></div>",
            showConfirmButton: false,
            showCloseButton: true,
            closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
            position: 'top',
            type: "success"
        }).then(function() {
            if (reload_verify == true) {
                page_reload = window.location = '..';
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
    }


    function reset_password() {
        var contact_no = $('#phone_number').val();
        var system_code = $('#check_code').val();
        var user_code = $('#verify_code').val();
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        var session = $('#session_lang').val();

        console.log("hihi")
        if (contact_no != '' && contact_no.length >= 10 && contact_no.length <= 11 && system_code == user_code &&
            new_password == confirm_password) {

            password = confirm_password;
            // overlay_cover_ajax();
            // console.log("okok");

            // Change Password Ajax Start
            $.ajax({
                url: '../controller/ajax/forgot_password',
                type: 'GET',
                data: {
                    contact_no: contact_no,
                    password: password
                },
                // beforeSend: function () {
                //     console.log("change_password_process - ok");
                // },
                // error: function (xhr) { // if error occured
                //     console.log(xhr.statusText + xhr.responseText);
                // },
                timeout: (15 * 1000),
                error: function(textstatus) { // if error occured
                    if (textstatus === "timeout") {

                        // Error During Ajax Process
                        return_message =
                            "<span id=ajax_error class=language>Error Occured. Please try again.</span>";
                        swal_lang(session, return_message, reload_verify)
                    } else {

                        // No Error Appear

                    }
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(response) {

                    console.log(response);
                    return_message = response.return_msg;
                    reload_verify = response.return_result;
                    // location = result;
                    // console.log("return result:"+result)
                    // if(result == "1"){
                    // 	sweet_alert_format(msg, session);
                    // 	window.location.reload();
                    // }
                    // else{
                    // 	location = false;
                    // }

                    swal_lang(session, return_message, reload_verify)
                }
            });
            // Change Password Ajax End
        }
    }
    </script>
    <!-- Reset Password End -->
</body>

</html>