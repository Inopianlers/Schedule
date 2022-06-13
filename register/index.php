<!DOCTYPE html>
<html lang="en">

<head>
    <?php
$page = "page_reg";
$aff_id = $_GET['aff_id'];
// echo "aff id = : $aff_id";
if($aff_id != '' || $aff_id != null){
    $cookie_name = "affiliate_id";
    $cookie_value = $aff_id;
    // echo $aff_id;
    // echo "<br>";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
    $_SESSION['aff_id2'] = $cookie_value;
    // echo "new_aff_id: ".$cookie_value;

}else{
    $exist_aff_id = $_SESSION['aff_id2'];
    // echo "reg_aff_id: ".$exist_aff_id;
}?>
    <?php include '../template/head.php';
    $cookie_affiliate =  $_COOKIE['affiliate_id'];
     if($aff_id != ''){
        $query_affiliate_link = "SELECT * from affiliate WHERE f_affiliate_code = '$aff_id'";
        $result_affiliate_link = mysqli_query($conn, $query_affiliate_link);
        $num_affiliate_link = mysqli_num_rows($result_affiliate_link);
        $row_affiliate_link = mysqli_fetch_array($result_affiliate_link);
        // $affiliate_name = $row_affiliate_link['f_affiliate_username'];
        $affiliate_name = $row_affiliate_link['f_affiliate_code'];
    
        $affilaite_readonly = "readonly";
    }else{
        // echo "i am here";
        $affilaite_readonly = "";
        $query_affiliate_link = "SELECT * from affiliate WHERE f_affiliate_code = '$cookie_affiliate'";
        $result_affiliate_link = mysqli_query($conn, $query_affiliate_link);
        $num_affiliate_link = mysqli_num_rows($result_affiliate_link);
        $row_affiliate_link = mysqli_fetch_array($result_affiliate_link);
        // $affiliate_name = $row_affiliate_link['f_affiliate_username'];
        $affiliate_name = $row_affiliate_link['f_affiliate_code'];
        if($affiliate_name != ''){
            $affilaite_readonly = "readonly";
        }else{
            $affilaite_readonly = "";
    
        }
    
    }   
    ?>
    <style>
    #SubmitBtn {
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        min-width: 100%;
        background: var(--second-color);
        color: #000;
        margin-top: 10px;
    }

    .back-btn-lr {
        position: relative;
        padding: 10px 0px 0px 20px;
    }

    /*==== INPUT PLACEHOLDER ==== */
    input[type="text"]:disabled::placeholder,
    input[type="number"]:disabled::placeholder,
    input[type="password"]:disabled::placeholder,
    input[type="email"]:disabled::placeholder {
        font-size: var(--extsmall-font-size);
        padding-left: 5px;
        color: #fff;
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
        <div class="back-btn-lr">
            <a href="../"><i class="far fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <div class="lr-wrap-regi">
            <div class="content-lr pt-0">
                <div class="lr-text-reg">
                    <span class="language" data-translate="create_account">CREATE ACCOUNT</span>
                </div>
                <div class="md-stepper-horizontal orange">
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
                    <div class="md-step ">
                        <div class="md-step-circle"><span>3</span>
                        </div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                    </div>
                </div>
                <form>
                    <div class="tab">
                        <label for="" class="input-label-lr language" data-translate="username">Username</label><br>
                        <div class="input-lr-regi"><input type="text" placeholder="Enter Username" id="reg_username"
                                onkeyup="check_data()" required>
                        </div>
                        <div class="errormsg" id="check-username"></div>

                        <label for="" class="input-label-lr language" data-translate="new_password">New
                            Password</label><br>
                        <div class="input-lr-regi"><input type="password" placeholder="Enter Password" id="reg_usrpass"
                                onkeyup="reg_checkpassword()" required>
                        </div>

                        <label for="" class="input-label-lr language" data-translate="confirm_password">Confirm
                            Password</label><br>
                        <div class="input-lr-regi"><input type="password" placeholder="Confirm Password"
                                id="reg_conusrpass" onkeyup="reg_checkpassword()" required>
                        </div>
                        <div class="errormsg" id="check-password"></div>

                        <hr class="line-lr" size="10" color="#808080">
                        <label for="" class="input-label-lr language" data-translate="referral_affiliate_id">Referral /
                            Affiliate ID</label><br>
                        <div class="input-lr-regi"><input type="text" placeholder="Referral / Affiliate ID(optional)"
                                id="aff_t" value="<?=$affiliate_name?>" <?=$affilaite_readonly?>>
                        </div>

                    </div>
                    <div class="tab">
                        <label for="" class="input-label-lr language" data-translate="phone_number">Phone
                            Number</label><br>
                        <div class="input-lr-regi"><input type="number" placeholder="Phone Number"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                autocomplete="off" minlength="10" maxlength="11" id="reg_phonenum" name="reg_phonenum"
                                onkeyup="check_phonenum()" required placeholder="Enter Phone Number">
                        </div>
                        <div class="errormsg" id="check-phonenum"></div>

                        <label for="" class="input-label-lr language" data-translate="code">Code</label><br>
                        <div class="input-lr-regi">
                            <input type="number" placeholder="Code" id="verify_code" name="verify_code"
                                oninput="this.className" onKeyPress="if(this.value.length==6) return false;"
                                pattern="[0-9]{6,}" placeholder="Code">
                            <button type="button" class="send-button" id="begin" disabled>
                                <!-- <span id="timing1" class="language" data-translate="send">Send</span>&nbsp;
                                <span id="timing"></span> -->
                                <span id="timing" class="language" data-translate="send">Send</span>&nbsp;<span
                                    id="countdowntimer"></span>
                            </button>
                        </div>

                        <div class="errormsg" id="check-otp-code"></div>

                        <input class="reg-checkvalidate" type="number" id="check_code" name="check_code"
                            placeholder="Enter Code" minlength="6" value="" hidden readonly />

                        <label for="" class="input-label-lr language" data-translate="email">Email</label><br>
                        <div class="input-lr-regi"><input type="email" placeholder="Email(optional)" id="reg_email"
                                onkeyup="check_email()">
                        </div>

                        <div class="errormsg" id="check-email"></div>


                        <label for="" class="input-label-lr language" data-translate="full_name">Full Name</label><br>
                        <div class="input-lr-regi"><input type="text" placeholder="Enter Full Name(As Per Bank)"
                                id="reg_fullname" required maxlength="50" onkeyup="check_email()">
                        </div>

                        <div class="errormsg" id="check-fullname"></div>

                    </div>
                    <div class="tab">
                    </div>
                    <div style="overflow:auto;">
                        <div>
                      
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="language"
                                data-translate="back">Back</button>
                                <button type="button" class="language" style="display:none;" data-translate="submit"
                                id="SubmitBtn" name="btn_register" onclick="register_process()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="lr-bt-txt-l">
            <div class="reminder-wrap-lr">
                <span>*<span class="language" data-translate="reminder">Reminder</span></span>
                <?php 
                        if($language == 'th'){
                            echo '
                            <p>ชื่อ-นามสกุลที่จะใช้ในการฝาก / ถอน  </p>
                            <p>ชื่อจะต้องตรงกับข้อมูลในธนาคารของคุณ</p>
                            ';
                        }elseif($language == 'bm'){
                            echo '
                            <p>Nama penuh akan digunakan untuk deposit / pengeluaran. </p>
                            <p>Nama <span>MESTI</span> sama dengan maklumat perbankan anda.</p>
                            ';
                        }else if($language == 'cn'){
                            echo '
                            <p>全名将用于存款/提款。 </p>
                            <p>名字<span>必须</span>与您的银行信息相同。</p>
                            ';
                        }else{
                            echo '
                            <p>Full name will be used for deposit/withdrawal.</p>
                            <p>The name <span>MUST</span> be same with your banking info.</p>
                            ';
                        }
                    ?>

            </div>
        </div>

        <p class="tc-bt-regi">
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
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>
</body>

<script>
var session = $('#session_lang').val();
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        // alert("this 0");
        // console.log("step 0");
        document.getElementById("SubmitBtn").style.display = "none";
        document.getElementById("nextBtn").style.display = "inline";
        document.getElementById("prevBtn").style.display = "none";
    } else if (n == 1) {
        // console.log("step 1");
        document.getElementById("SubmitBtn").style.display = "inline";
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("prevBtn").style.display = "inline";


    } else if (n == 2) {
        // console.log("step 2");
        document.getElementById("SubmitBtn").style.display = "none";
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("prevBtn").style.display = "inline";
    }
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
    console.log(n)
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
        if (!y[i].checkValidity()) {
            // add an "invalid" class to the field:
            //                        y[i].className += " invalid";
            // and set the current valid status to false
            // alert(y[i].validationMessage);
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        console.log(valid)
        // document.getElementsByClassName("step")[currentTab].className += " finish";
        document.getElementsByClassName("md-step")[currentTab + 1].className += " active";
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

<script type="text/javascript">
$('#reg_fullname').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z ]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#reg_phonenum').on('input', function(event) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

$('#reg_conusrpass').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#reg_usrpass').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#reg_username').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});
</script>

<!-- email format and check-->
<script>
function IsEmail(email) {
    // console.log(email)
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email == "") {
        return true;
    } else if (!regex.test(email)) {
        // console.log("halo rrrr")
        return false;
    } else {
        // console.log("halo rrrrasdas")
        return true;

    }
}

function check_email() {
    var lang = "<?php echo $language?>";
    var email = $('#reg_email').val();
    // console.log(email)
    if (IsEmail(email) == false) {
        if (lang == "th") {
            $("#check-email").html("อีเมลของคุณไม่ถูกต้อง")
        } else if (lang == "cn") {
            $("#check-email").html("您的电子邮件地址无效。")
        } else if (lang == "bm") {
            $("#check-email").html("Alamat e-mel anda tidak sah.")
        } else {
            $("#check-email").html("Your email is invalid.")
        }
        // $('#invalid_email').show();
        $("#SubmitBtn").prop('disabled', true);
    } else {
        $.ajax({
            url: "../controller/ajax/check_email_addr",
            data: {
                email: email
            },
            success: function(result) {

                console.log(result);
                if (result == 0) {
                    $("#SubmitBtn").prop('disabled', false);

                    if (lang == "th") {
                        $("#check-email").html("")
                    } else {
                        $("#check-email").html("")
                    }

                } else {
                    $("#SubmitBtn").prop('disabled', true);

                    if (lang == "th") {
                        $("#check-email").html("อีเมลนี้ลงทะเบียนแล้ว  โปรดลองอันอื่น")
                    } else {
                        $("#check-email").html("Email already registered. Please try another one.")
                    }

                }
            }
        });
        // console.log("asdasd")
    }
}
</script>
<!-- end email format and check-->

<script>
function check_phonenum() {
    var usercontactno = $('#reg_phonenum').val();
    // alert(usercontactno);
    var lang = "<?php echo $language?>";
    if (usercontactno.length < 10 || usercontactno == 0 || usercontactno == null) {

        $("#check-phonenum").show();

        if (lang == 'cn') {
            $("#check-phonenum").html("电话号码不能小于10个数位。");

        } else if (lang == 'bm') {
            $("#check-phonenum").html("Nombor telefon tidak boleh kurang dari 10 digit.");

        } else {
            $("#check-phonenum").html("Phone number cannot lower than 10 digits.");

        }
    } else {
        $.ajax({
            url: "../controller/ajax/check_phonenumber/index.php",
            data: {
                usercontactno: usercontactno
            },
            success: function(result) {
                console.log(result)
                if (result != 0) {
                    if (lang == "cn") {
                        $("#check-phonenum").html("电话号码已注册。");
                    } else if (lang == "bm") {
                        $("#check-phonenum").html("Nombor telefon sudah didaftarkan.");
                    } else {
                        $("#check-phonenum").html("Phone number already registered.");
                    }
                    $("#check-phonenum").show();
                    $("#nextBtn").attr("disabled", true);
                    $("#begin").attr("disabled", true);
                } else {
                    $("#check-phonenum").html("");
                    $("#check-phonenum").hide();
                    $("#nextBtn").attr("disabled", false);
                    $("#begin").attr("disabled", false);
                }

                // alert(result);
                //  $("#ckeck").html("<strong>" + result + "</strong> degrees");
            }
        });
    }

}
</script>

<script>
// check password length

function reg_checkpassword() {
    var pass = $('#reg_usrpass').val();
    var conPass = $('#reg_conusrpass').val();
    var lang = "<?php echo $language?>";
    var password_verify = false;
    console.log("first pass :" + pass.length + "conpass :" + conPass.length)
    // console.log(conPass.length)
    if (pass.length < 6 || conPass.length < 6) {

        // var lang = $('#session_lang').val();



        if (lang == "bm") {

            $("#check-password").html("Panjang kata laluan mestilah dari 6 aksara.");

        } else if (lang == "cn") {
            $("#check-password").html("密码长度必须为6个字符。");
        } else {

            $("#check-password").html("Password length must be from 6 characters.");

        }


        var password_verify = false;

    } else if (pass != conPass) {

        if (lang == "bm") {

            $("#check-password").html("Kata laluan mesti sama.");

        } else if (lang == "cn") {
            $("#check-password").html("密码必须相同。");
        } else {

            $("#check-password").html("Password must be same.");

        }

        var password_verify = false;


    } else {

        $("#check-password").html("");
        password_verify = true;
        // console.log(username_verify);

    }
    // if verify true check username
    if (password_verify == false) {
        // console.log("here")
        $("#nextBtn").attr("disabled", true);
    } else {
        check_data()
    }


}

function check_data() {
    var username = $('#reg_username').val();
    var pass = $('#reg_usrpass').val();
    var conPass = $('#reg_conusrpass').val();
    var lang = "<?php echo $language?>";
    var username_verify = false;
    // console.log("regpass:" + pass + " conpass: " + conPass);

    // console.log(username)

    // check username length
    if (username.length < 6 || username.length > 12) {
        // console.log("asd")

        if (lang == "bm") {

            $("#check-username").html(
                "Sila masukkan nama pengguna anda (panjang dari 6-12 aksara)"
            );

        } else if (lang == "cn") {
            $("#check-username").html(
                "请输入您的用户名（长度为 6-12 个字符）"
            );
        } else {

            $("#check-username").html(
                "Please enter your desired username (length from 6-12 characters)"
            );

        }


        var username_verify = false;

    } else if (username == '') {

        if (lang == "bm") {
            $("#check-username").html("Sila isi bidang ini.");
        } else if (lang == "cn") {
            $("#check-username").html("请填写此字段。");
        } else {
            $("#check-username").html("Plesae fill out the field");
        }


    } else {
        // console.log("here")
        $("#check-username").html("");
        username_verify = true;
        // console.log(username_verify);

    }
    // console.log(username_verify);
    // check member if verify true
    if (username_verify == true) {
        $.ajax({
            url: "../controller/ajax/check_username/index.php",
            data: {
                username: username
            },
            success: function(result) {
                console.log(result)

                if (result == 1) {
                    $("#check-username").html("");


                    if (lang == "bm") {

                        $("#check-username").html("Nama pengguna sudah diambil.");

                    } else if (lang == "cn") {
                        $("#check-username").html("用户名已被使用。");
                    } else {

                        $("#check-username").html("Username already taken.");

                    }

                    $("#nextBtn").attr("disabled", true);

                } else {
                    $("#check-username").html("");
                }

                if (result == 1 || pass != conPass) {
                    $("#nextBtn").attr("disabled", true);
                    console.log("first time")
                } else {
                    console.log("second time here")
                    $("#nextBtn").attr("disabled", false);
                }

            }
        });
    }
}
</script>

<!-- start limit user type input -->

<script>
$('#reg_fullname').on('keyup', function(e) {
    var fullname_input = $(this).val();
    var session = $('#session_lang').val();
    if ($.trim(fullname_input) == '' || $.trim(fullname_input) == null) {

        $("#check-fullname").show();
        if (session == 'cn') {
            $("#check-fullname").html("全名不能为空。");

        } else if (session == 'th') {
            $("#check-fullname").html("ชื่อ-นามสกุลต้องไม่ว่างเปล่า");

        } else {
            $("#check-fullname").html("Full name cannot be empty.");

        }
        $('#reg_fullname').val('');
        $('#nextBtn').prop('disabled', true);

    } else {
        $("#check-fullname").html("");
        $("#check-fullname").hide();
        $('#nextBtn').prop('disabled', false);
    }
});
</script>
<!-- end limit user type input -->

<!-- send otp code start -->
<script>
var lang = $('#session_lang').val();
$("#begin").click(function() {

    //get phone number
    $('#reg_phonenum').prop('readonly', true);

    var contact_no = $('#reg_phonenum').val();
    method = 1
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
                console.log(xhr.status);
            },
            success: function(response) {
                // console.log(response);
                var otp_code = response.return_msg;
                console.log(otp_code);
                $('#check_code').val(otp_code);
            }
        });
    }

    // var myTimer, timing = 5;
    // $('#timing1').html("");
    // $('#timing').html(timing);
    // $('#begin').prop('disabled', true);
    // myTimer = setInterval(function() {
    //     --timing;
    //     $('#timing').html(timing);

    //     if (timing === 0) {
    // alert('Too late! Try again');
    //         clearInterval(myTimer);
    //         $('#timing').hide();
    //         $('#timing1').html('Resend');
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

});
</script>
<!-- send otp code end -->

<!-- verify user otp code start -->

<script type="text/javascript">
$('#verify_code').on('keyup', function(e) {
    var system_code = $('#check_code').val();
    var user_code = $(this).val();
    var lang = "<?php echo $language?>";
    // console.log(user_code)

    if (system_code != user_code || user_code.length != 6) {
        // console.log("hahah")
        if (lang == "cn") {
            $("#check-otp-code").html("验证码不正确。");
        } else if (lang == "bm") {
            $("#check-otp-code").html("Kod OTP Tidak betul.");
        } else {
            $("#check-otp-code").html("OTP code does not match.");

        }

        // $("#reg_email:disabled::placeholder").css("color", "#fff");
        // $("#reg_fullname:disabled::placeholder").css("color", "#fff");
        // $('#SubmitBtn:disabled::placeholder').css('color', "#fff");

        $("#reg_email").attr("disabled", true);
        $("#reg_fullname").attr("disabled", true);
        $('#SubmitBtn').prop('disabled', true);

    } else {
        $("#check-otp-code").html("");
        $("#reg_email").attr("disabled", false);
        $('#reg_fullname').prop('disabled', false);
        $('#SubmitBtn').prop('disabled', false);
    }
});
</script>

<!-- verify user otp code start -->


<script>
function register_process() {
    // console.log("Entering");

    var username = $('#reg_username').val();
    var password = $('#reg_usrpass').val();
    var confirm_password = $('#reg_conusrpass').val();
    var contact_no = $('#reg_phonenum').val();
    var email = $('#reg_email').val();
    var fullname = $('#reg_fullname').val();

    <?php

        if(($aff_id != '' || $aff_id != null) && ($num_affiliate_link != '' || $num_affiliate_link != null || $num_affiliate_link != 0)){

            echo "var affiliate_name = $('#aff_t').val();";

        }else{

            if(($cookie_affiliate != '' || $cookie_affiliate != null) && ($num_affiliate_link != '' || $num_affiliate_link != null || $num_affiliate_link != 0)){

                echo "var affiliate_name = $('#aff_t').val();";

            }
            else{

                echo "var affiliate_name = $('#aff_t').val();";
            }


        }
    ?>
    var session = $('#session_lang').val();

    // Check Username Start
    if (username != '' && username.length >= 6) {
        // console.log("1");

        // Check Password & Confirm Password Start
        if (password != '' && confirm_password != '' && password == confirm_password) {
            // console.log("2");

            // Check Phone Number Start
            if (contact_no != '' && contact_no.length >= 9) {
                // console.log("3");


                // Check Email & Fullname Start
                if (fullname != '') {
                    // console.log("4");

                    overlay_icon();

                    $.ajax({
                        url: '../controller/ajax/register_process/',
                        type: 'GET',
                        data: {
                            username: username,
                            password: password,
                            confirm_password: confirm_password,
                            contact_no: contact_no,
                            email: email,
                            fullname: fullname,
                            affiliate_name: affiliate_name
                        },
                        beforeSend: function() {
                            console.log("register - start");
                        },
                        error: function(xhr) { // if error occured
                            console.log(xhr.statusText + xhr.responseText);
                        },
                        dataType: 'json',
                        contentType: "application/json; charset=UTF-8",
                        success: function(response) {
                            complete_overlay_icon()

                            console.log("register success")
                            var return_answer = response.answer;
                            var return_message = response.return_msg;

                            // If/Else Statemet Start
                            if (return_answer == 0) {
                                window.location.href = "../success"
                                // success
                            } else {
                                swal_lang(return_message, session)
                            }
                            // If/Else Statemet End
                        }

                    });

                }
                // Check Email & Fullname End

            }
            // Check Phone Number End

        }
        // Check Password & Confirm Password Start

    }
    // Check Username End

}
</script>


</html>