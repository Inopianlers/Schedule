<script src="../assets/js/main.js"></script>
<script src="../assets/js/owl.carousel.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<!-- jquerytab -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="../langcn.json"></script>
<script src="../langen.json"></script>
<script src="../langbm.json"></script>
<script src="../langth.json"></script>



<script>
var session = $('#session_lang').val();;
var langtext = document.getElementById('lang-tx');

if (session == 'bm') {
    langtext.innerHTML = 'BM';
} else if (session == 'cn') {
    langtext.innerHTML = 'CN';
} else {
    langtext.innerHTML = 'EN';
}
</script>
<script>
document.onreadystatechange = function() {
    var state = document.readyState
    if (state == 'complete') {
        
            document.getElementById('load').style.visibility = "hidden";
       
    }
}
</script>

<!-- Change Language Start -->
<script type="text/javascript">
var currentLocation = window.location.href;

// console.log(currentLocation)
function melayu() {
    // var change = $('input[name=malay]').val();
    var change = "BM";
    console.log(change);
    // alert(change);
    $.ajax({
        dataType: 'json',
        type: "GET",
        url: "../controller/ajax/update_session/index.php",
        data: {
            change: change
        },

        success: function(result) {
            // console.log(result);
            //                    $('#bank_account_name').text(json.bank_account_name);
            window.location.replace(currentLocation);

        }
    });
};
</script>


<script type="text/javascript">
function inggeris() {
    var change = 'EN';
    // console.log('eng here');
    // console.log(change);
    $.ajax({
        dataType: 'json',
        type: "GET",
        url: "../controller/ajax/update_session/index.php",
        data: {
            change: change
        },

        success: function(result) {
            // console.log(result);
            //                    $('#bank_account_name').text(json.bank_account_name);
            window.location.replace(currentLocation);

        }
    });
};
</script>
<script type="module">
$(document).ready(function() {
    var session = $('#session_lang').val();
    console.log(session);
    if (session == "bm") {
        var lang = $(this).attr('data-translate');
        console.log(lang);

        var mydata = JSON.parse(malay);
        console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('data-translate')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else if (session == "cn") {
        var lang = $(this).attr('data-translate');
        // console.log(lang);

        var mydata = JSON.parse(chinese);
        console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('data-translate')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else if (session == "th") {
        var lang = $(this).attr('data-translate');
        // console.log(lang);

        var mydata = JSON.parse(thailand);
        console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('data-translate')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else {
        var lang = $(this).attr('id');
        console.log(lang);

        var mydata = JSON.parse(english);
        console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    }
})
</script>
<!-- Change Language End -->
<!-- PLACHOLDER,VALUE -->
<script>
$(document).ready(function() {
    var session = $('#session_lang').val();
    console.log(session);
    if (session == "bm") {
        var btn_submit = 'Hantar';
        var btn_login = 'LOG MASUK';
        var un_placeholder = "Username";
        var enun_placeholder = "Masukkan Username";
        var pw_placeholder = "Kata Laluan";
        var en_placeholder = "Masukkan Kata Laluan";
        var cpw_placeholder = "Sahkan kata Laluan";
        var vc_placeholder = "Kod Pengesahan";
        var pn_placeholder = "Nombor Telefon";
        var email_placeholder = "E-mel(Pilihan)";
        var id_placeholder = "ID Rujukan / Afiliasi(Pilihan)";
        var fn_placeholder = "Nama Penuh (Mengikuti Bank)";
        var btn_register = "Deposit";
        var btn_nextstep = "Seterus";
        var bank_amount_placeholder = "Min 30 / Max 30,000"
        var bank_amount_placeholder2 = "Min 20 / Max 50,000"
        var reload_bank_placeholder = "Pilih Bank Anda"
        var reload_amount_placeholder = "Minimum RM30 | Maksimum RM30,000"
        var noselectedbank = "Belum Pilih Bank";
        var bank_name = "Nama Bank";
        var account_name = "Nama Akaun";
        var account_number = "Nombor Akaun";
        var back_btn = "Balik";
        var more_details = "Maklumat";
        var apply_now = "Sertai";
        var join_now = "Mohon Sekarang";
        var search = "Cari...";
        var aff_placeholder = "ID Afiliasi";


    } else if (session == "cn") {
        var btn_submit = '提交';
        var btn_login = '登录';
        var un_placeholder = "用户名";
        var enun_placeholder = "输入用户名";
        var pw_placeholder = "密码";
        var en_placeholder = "输入密码"
        var cpw_placeholder = "确认密码";
        var vc_placeholder = "验证码";
        var pn_placeholder = "电话号码";
        var email_placeholder = "电子邮件(可选)";
        var id_placeholder = "推荐 / 代理ID(可选)";
        var fn_placeholder = "全名(与银行一致)";
        var btn_register = "马上存款";
        var btn_nextstep = "下一步";
        var bank_amount_placeholder = "最少 30 / 最多 30,000";
        var bank_amount_placeholder2 = "最少 20 / 最多 50,000";
        var reload_bank_placeholder = "??????";
        var reload_amount_placeholder = "??RM30 | ??RM30,000";
        var noselectedbank = "暂无银行选择";
        var bank_name = "银行名称";
        var account_name = "户口号码";
        var account_number = "户口名字";
        var back_btn = "返回";
        var more_details = "更多详情";
        var apply_now = "现在申请";
        var join_now = "现在加入";
        var search = "搜索...";
        var aff_placeholder = "代理ID";

    } else if (session == "th") {
        var btn_submit = 'ส่ง';
        var btn_login = "เข้าสู่ระบบ";
        var un_placeholder = "ชื่อผู้ใช้";
        var enun_placeholder = "ป้อนชื่อผู้ใช้";
        var pw_placeholder = "รหัสผ่าน";
        var vc_placeholder = "รหัส";
        var pn_placeholder = "หมายเลขโทรศัพท์";
        var email_placeholder = "อีเมล์ (ไม่จำเป็น)";
        var id_placeholder = "ไอดีผู้แนะนำ / ไอดีพันธมิตร(ไม่จำเป็น)";
        var fn_placeholder = "ชื่อ-นามสกุล (ตามธนาคาร)";
        var bank_name = "ชื่อธนาคาร";
        var account_name = "ชื่อบัญชี";
        var account_number = "เลขที่บัญชี";
        var more_details = "รายละเอียดเพิ่มเติม";
        var apply_now = "สมัครตอนนี้";
        var join_now = "เข้าร่วมตอนนี้";
        var search = "ค้นหา...";
        var en_placeholder = "ป้อนรหัสผ่าน"
        var cpw_placeholder = "ยืนยันรหัสผ่าน";
        var bank_amount_placeholder = "ต่ำสุด 30 / สูงสุด 30,000";
        var bank_amount_placeholder2 = "ต่ำสุด 200 / สูงสุด 50,000";
        var aff_placeholder = "รหัสพันธมิตร";
    } else {
        var btn_submit = 'Submit';
        var btn_login = 'LOGIN';
        var un_placeholder = "Username";
        var enun_placeholder = "Enter Username";
        var pw_placeholder = "Password";
        var en_placeholder = "Enter Password";
        var cpw_placeholder = "Confirm password";
        var vc_placeholder = "Code";
        var pn_placeholder = "Phone Number";
        var email_placeholder = "Email(Optional)";
        var id_placeholder = "Referral / Affiliate ID(optional)";
        var fn_placeholder = "Full Name (As Per Bank)";
        var btn_register = "Deposit";
        var btn_nextstep = "Next";
        var bank_amount_placeholder = "Min 30 / Max 30,000";
        var bank_amount_placeholder2 = "Min 20 / Max 50,000";
        var reload_bank_placeholder = "Select Your Bank";
        var reload_amount_placeholder = "Minimum RM30 | Maxinum RM30,000";
        var noselectedbank = "No Bank Seleceted Now";
        var more_details = "More Details";
        var apply_now = "Apply Now";
        var join_now = "Join Now";
        var search = "Search...";
        var aff_placeholder = "Affiliate ID";

    }

    // Login Part Start
    $(".login_header_btn").val(btn_login);
    $('#login_btn').val(btn_login);
    $('#lg_username').attr('placeholder', enun_placeholder);
    $('#lg_password').attr('placeholder', en_placeholder);
    // Login Part End

    // Register Part Start
    $('#reg_username').attr('placeholder', enun_placeholder);
    $('#reg_usrpass').attr('placeholder', en_placeholder);
    $('#reg_conusrpass').attr('placeholder', cpw_placeholder);
    $('#verify_code').attr('placeholder', vc_placeholder);
    $('#reg_phonenum').attr('placeholder', pn_placeholder);
    $('#reg_email').attr('placeholder', email_placeholder);
    $('#reg_fullname').attr('placeholder', fn_placeholder);
    $('#btn-register').val(btn_register);
    $('#btn-register2').val(btn_register);
    $("#reg_done_btn").val("Selesai");
    $("#nextBtn_1").val(btn_nextstep);
    $("#backBtn_1").val(back_btn);
    $("#aff_t").attr('placeholder', id_placeholder);
    // Register Part End

    // Forgot Username Start
    $('#phone_number').attr('placeholder', pn_placeholder);
    $('#verify_code_fgun').attr('placeholder', vc_placeholder);
    $('#nextBtn_fgun').val(btn_submit);
    // Forgot Username End

    // Forgot Password Start
    $('#phone_number_fgpw').attr('placeholder', pn_placeholder);
    $('#verify_code_fgpw').attr('placeholder', vc_placeholder);
    $('#nextBtn_fgpw').val(btn_nextstep);
    $('#nextBtn_fgpw_1').val(btn_nextstep);
    $('#new_password').attr('placeholder', pw_placeholder);
    $('#confirm_password').attr('placeholder', cpw_placeholder);
    $('#nextBtn_fgpw2').val(btn_submit);
    $('#nextBtn_fgpw_2').val(btn_submit);
    // Forgot Password End

    // Deposit QuickPay
    $('#quickpay_amount').attr('placeholder', bank_amount_placeholder);
    $('#truepay_submit').val(btn_submit);

    // Deposit BankTransfer
    $('#amount2').attr('placeholder', bank_amount_placeholder);
    $('#qr_pay_amt').attr('placeholder', bank_amount_placeholder);
    $("#bank_name").val(bank_name);
    $("#bank_account_name").val(account_name);
    $("#bank_account_no").val(account_number);
    $('#btn_deposit_bank_transfer').val(btn_submit);
    $('#btn_qr_pay').val(btn_submit);

    $('#t_selected_bank').attr('placeholder', noselectedbank);

    //Transfer
    $('#transfer_submit').val(btn_submit);
    $('#transfer_btn').val(btn_submit);


    //Withdraw
    $('#withdraw_btn').val(btn_submit);
    // $('#w_amount').attr('placeholder', bank_amount_placeholder);

    //banking details

    $('#addbank_btn').val(btn_submit);
    $("#current_password").attr('placeholder', en_placeholder);
    $("#new_password").attr('placeholder', en_placeholder);
    $("#confirm_password1").attr('placeholder', cpw_placeholder);
    $("#change_password").val(btn_submit);
    //Change Game Password
    $("#new_gamepassword").attr('placeholder', en_placeholder);
    $("#confirm_gamepassword").attr('placeholder', cpw_placeholder);
    $('#change_gamepassword').val(btn_submit);

    //SLOT
    $(".slot_searchbtn").attr('placeholder', search);

    //PROMOTION
    $(".promo_details").val(more_details);
    $(".promo_apply_now").val(apply_now);
    $(".promo_join_now").val(join_now);
})
</script>

<script>
function swal_lang(return_message, session, reload_verify) {
    Swal.fire({
        html: "<div class='swal-alert'>  <i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
            return_message + "</div>",
        showConfirmButton: false,
        scrollbarPadding: false,
        showCloseButton: true,
        closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
        position: 'center',
        type: "success"
    }).then(function() {
        if (reload_verify == true) {
            page_reload = window.location.reload();
            // console.log("here")
        } else if (reload_verify == 'history') {
            page_reload = window.location.replace("../history/?redirect=click_dep");
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
</script>

<!-- Check Balance Start -->
<script>
function checkGameBalance(callback) {
    if (callback) {
        callback();
    }
}

function checkWalletBalance(wallet_id, callback) {
    member_id = "<?php echo $member_id; ?>";
    // alert(member_id + " : " + wallet_id);   
    // overlay_icon();

    $.ajax({
        url: '../controller/ajax/check_wallet_balance/index.php',
        type: 'GET',
        data: {
            member_id: member_id,
            wallet_id: wallet_id
        },
        beforeSend: function() {

            console.log(wallet_id + " :start")
        },
        complete: function(data) {

            // console.log(wallet_id + " :end")
        },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        success: function(response) {

            // console.log(response);

            var kiss918_balance = response.kiss918_balance;
            var pussy_balance = response.pussy_balance;
            var xe88_balance = response.xe88_balance;
            var evo888_balance = response.evo888_balance;
            var scr888_balance = response.scr888_balance;
            var mega2_balance = response.mega2_balance;
            var newtown_balance = response.newtown_balance;

            // var mega_balance = response.balance;
            <?php
                        $query_get_wallet_code = "SELECT * FROM wallet_code WHERE f_id != 1 AND f_delete = 'N'";
                        $result_get_wallet_code = mysqli_query($conn, $query_get_wallet_code);
                        $num_get_wallet_code = mysqli_num_rows($result_get_wallet_code);

                        if($num_get_wallet_code > 0){
                            while($row_get_wallet_code = mysqli_fetch_array($result_get_wallet_code)){
                            $wallet_f_id = $row_get_wallet_code['f_id'];
                            
                            echo "var balance_".$wallet_f_id." = response.balance_".$wallet_f_id.";";
                            // echo "console.log('game_".$wallet_f_id.": '+balance_".$wallet_f_id.");";
                            // echo "$('#game_".$wallet_f_id."').val(balance_".$wallet_f_id.");";
                            }
                        }
                        ?>
            // Correct Result
            if (wallet_id == 2) {
                $('#game_2').html(kiss918_balance);
            } else if (wallet_id == 3) {
                $('#game_3').html(pussy_balance);
            } else if (wallet_id == 5) {
                $('#game_5').html(balance_5);
            } else if (wallet_id == 6) {
                $('#game_6').html(balance_6);
            } else if (wallet_id == 7) {
                $('#game_7').html(balance_7);
            } else if (wallet_id == 8) {
                $('#game_8').html(xe88_balance);
            } else if (wallet_id == 9) {
                $('#game_9').html(balance_9);
            } else if (wallet_id == 12) {
                $('#game_12').html(balance_12);
            } else if (wallet_id == 13) {
                $('#game_13').html(balance_13);
            } else if (wallet_id == 14) {
                $('#game_14').html(balance_14);
            } else if (wallet_id == 15) {
                $('#game_15').html(balance_15);
            } else if (wallet_id == 20) {
                $('#game_20').html(balance_20);
            } else if (wallet_id == 23) {
                $('#game_23').html(balance_23);
            } else if (wallet_id == 24) {
                $('#game_24').html(balance_24);
            } else if (wallet_id == 25) {
                $('#game_25').html(balance_25);
            } else if (wallet_id == 26) {
                $('#game_26').html(balance_26);
            } else if (wallet_id == 28) {
                $('#game_28').html(balance_28);
            } else if (wallet_id == 39) {
                $('#game_39').html(balance_39);
            } else if (wallet_id == 43) {
                $('#game_43').html(scr888_balance);
            } else if (wallet_id == 44) {
                $('#game_44').html(mega2_balance);
            } else if (wallet_id == 46) {
                $('#game_46').html(newtown_balance);
            } else if (wallet_id == 48) {
                $('#game_48').html(balance_48);
            }

        }

    });
}

function call_balance() {
    var member_id = '<?=$member_id?>';
    var company_id = '<?=$member_company_id?>';
    ajaxLoad()
    $.ajax({
        url: '../controller/ajax/member_wallet_code',
        type: 'GET',
        data: {
            member_id: member_id,
            company_id: company_id
        },
        // beforeSend: function(){

        //     console.log("side button :start")
        // },
        // complete: function (data) {

        //     console.log("side button :end")
        // },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        success: function(response) {

            // console.log(response)

            // for(var j=0; j < response[i]; j++){
            //   console.log("Wallet id: "+ response[i]);
            //   // checkWalletBalance(response[i]);
            // }

            $.each(response, function(i, item) {
                checkWalletBalance(item);
            });

        }
    });
}
</script>
<!-- Check Balance End -->

<!-- Check Balance Start -->
<script>
function checkGameBalance1(callback) {
    if (callback) {
        callback();
    }
}

function checkWalletBalance1(wallet_id, callback) {
    member_id = "<?php echo $member_id; ?>";
    // alert(member_id + " : " + wallet_id);   
    // overlay_icon();

    $.ajax({
        url: '../controller/ajax/check_wallet_balance/index.php',
        type: 'GET',
        data: {
            member_id: member_id,
            wallet_id: wallet_id
        },
        beforeSend: function() {

            console.log(wallet_id + " :start")
        },
        complete: function(data) {

            // console.log(wallet_id + " :end")
        },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        success: function(response) {

            // console.log(response);

            var kiss918_balance = response.kiss918_balance;
            var pussy_balance = response.pussy_balance;
            var xe88_balance = response.xe88_balance;
            var evo888_balance = response.evo888_balance;
            var scr888_balance = response.scr888_balance;
            var mega2_balance = response.mega2_balance;
            var newtown_balance = response.newtown_balance;

            // var mega_balance = response.balance;
            <?php
                        $query_get_wallet_code = "SELECT * FROM wallet_code WHERE f_id != 1 AND f_delete = 'N'";
                        $result_get_wallet_code = mysqli_query($conn, $query_get_wallet_code);
                        $num_get_wallet_code = mysqli_num_rows($result_get_wallet_code);

                        if($num_get_wallet_code > 0){
                            while($row_get_wallet_code = mysqli_fetch_array($result_get_wallet_code)){
                            $wallet_f_id = $row_get_wallet_code['f_id'];
                            
                            echo "var balance_".$wallet_f_id." = response.balance_".$wallet_f_id.";";
                            // echo "console.log('game_".$wallet_f_id.": '+balance_".$wallet_f_id.");";
                            // echo "$('#game_".$wallet_f_id."').val(balance_".$wallet_f_id.");";
                            }
                        }
                        ?>

            // Correct Result
            if (wallet_id == 2) {
                $('#game_wallet_balance_2').html(kiss918_balance);
            } else if (wallet_id == 3) {
                $('#game_wallet_balance_3').html(pussy_balance);
            } else if (wallet_id == 5) {
                $('#game_wallet_balance_5').html(balance_5);
            } else if (wallet_id == 6) {
                $('#game_wallet_balance_6').html(balance_6);
            } else if (wallet_id == 7) {
                $('#game_wallet_balance_7').html(balance_7);
            } else if (wallet_id == 8) {
                $('#game_wallet_balance_8').html(xe88_balance);
            } else if (wallet_id == 9) {
                $('#game_wallet_balance_9').html(balance_9);
            } else if (wallet_id == 12) {
                $('#game_wallet_balance_12').html(balance_12);
            } else if (wallet_id == 13) {
                $('#game_wallet_balance_13').html(balance_13);
            } else if (wallet_id == 14) {
                $('#game_wallet_balance_14').html(balance_14);
            } else if (wallet_id == 15) {
                $('#game_wallet_balance_15').html(balance_15);
            } else if (wallet_id == 20) {
                $('#game_wallet_balance_20').html(balance_20);
            } else if (wallet_id == 23) {
                $('#game_wallet_balance_23').html(balance_23);
            } else if (wallet_id == 24) {
                $('#game_wallet_balance_24').html(balance_24);
            } else if (wallet_id == 25) {
                $('#game_wallet_balance_25').html(balance_25);
            } else if (wallet_id == 26) {
                $('#game_wallet_balance_26').html(balance_26);
            } else if (wallet_id == 28) {
                $('#game_wallet_balance_28').html(balance_28);
            } else if (wallet_id == 39) {
                $('#game_wallet_balance_39').html(balance_39);
            } else if (wallet_id == 43) {
                $('#game_wallet_balance_43').html(scr888_balance);
            } else if (wallet_id == 44) {
                $('#game_wallet_balance_44').html(mega2_balance);
            } else if (wallet_id == 46) {
                $('#game_wallet_balance_46').html(newtown_balance);
            } else if (wallet_id == 48) {
                $('#game_wallet_balance_48').html(balance_48);
            }

        }

    });
}

function call_balance1() {
    var member_id = '<?=$member_id?>';
    var company_id = '<?=$member_company_id?>';
    ajaxLoad()
    $.ajax({
        url: '../controller/ajax/member_wallet_code',
        type: 'GET',
        data: {
            member_id: member_id,
            company_id: company_id
        },
        // beforeSend: function(){

        //     console.log("side button :start")
        // },
        // complete: function (data) {

        //     console.log("side button :end")
        // },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        success: function(response) {

            // console.log(response)

            // for(var j=0; j < response[i]; j++){
            //   console.log("Wallet id: "+ response[i]);
            //   // checkWalletBalance(response[i]);
            // }

            $.each(response, function(i, item) {
                checkWalletBalance1(item);
            });

        }
    });
}
</script>
<!-- Check Balance End -->

<!-- Restore Wallet Balance (From Game Balance To Main Wallet) Start-->
<script type="text/javascript">
function restoreWallet() {

    overlay_icon();

    var member_id = "<?php echo $member_id;?>";
    // alert (member_id);

    if (member_id != '' || member_id != null) {
        $.ajax({
            url: '../controller/ajax/restore_wallet/',
            type: 'GET',
            data: {
                member_id: member_id
            },
            beforeSend: function() {

                console.log(member_id + " :start")
            },
            complete: function(data) {

                console.log(member_id + " :end")
            },
            // dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(response) {

                // console.log(response);
                if (response) {
                    window.location.reload();
                }

            }
        });
    }
}
</script>
<!-- Restore Wallet Balance (From Game Balance To Main Wallet) End-->

<script>
function overlay_icon() {
    $('#overlaylogo').show()
}

function complete_overlay_icon() {
    $('#overlaylogo').hide()
}

function ajaxLoad() {
    $(document).on({
        ajaxStart: function() {
            $('#overlaylogo').show()
        },
        ajaxStop: function() {
            $('#overlaylogo').hide()
        }
    });
}
</script>

<script>
function searchResults() {
    member_id = '<?=$member_id?>';
    var company_id = '<?=$company_id?>';
    var username = '<?=$member_username?>';


    $.ajax({
        url: '../controller/ajax/member_turnover',
        type: 'GET',
        data: {
            member_id: member_id,
            ticketType: "ticketNum"
        },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        // timeout: (15 * 1000),
        error: function(xhr) { // if error occured
            console.log(xhr.statusText + xhr.responseText);
        },
        beforeSend: function() {
            // console.log(member_id)
        },
        success: function(response) {
            console.log(response)
            // username = response.fullRequestUrl;
            // console.log(response[0])
            if (response[0] != 0) {
                // $('#tunroverInterface').attr('disabled', true);
                $('#turnoverCount').html(response[0])
                getTicketInfo(response[1], member_id, company_id, username)
            } else {
                $('#turnoverCount').html(0)
                $('#tunroverInterface').removeAttr("data-toggle");
            }

        }

    });
}

function getTicketInfo(ticketId, member_id, company_id, username) {



    var session = $('#session_lang').val();
    console.log(session);

    if (session == "bm") {
        var reminderWallet = 'Memerlukan beberapa minit untuk dikemas kini!';
        var providerTxt = 'Provider';
        var promoTxt = 'Promosi';
        var WinoverTurnoverTarget = 'Winover / Turnover Target';
    } else if (session == "cn") {
        var reminderWallet = '需几分钟以更新！';
        var providerTxt = '游戏商';
        var promoTxt = '优惠';
        var WinoverTurnoverTarget = '总赢倍数/流水量';
    } else if (session == "th") {
        var reminderWallet = 'อาจใช้เวลาสักครู่ในการอัปเดต!';
        var providerTxt = 'Provider';
        var promoTxt = 'โปรโมชั่น';
        var WinoverTurnoverTarget = 'Winover / Turnover Target';
    } else {
        var reminderWallet = 'May take few minutes to be update!';
        var providerTxt = 'Provider';
        var promoTxt = 'Promotion';
        var WinoverTurnoverTarget = 'Winover / Turnover Target';
    }



    var my_table = '';
    $.ajax({
        url: '../controller/ajax/member_turnover',
        type: 'GET',
        data: {
            member_id: member_id,
            ticketType: "checkBalance",
            ticketId: ticketId,
            company_id: company_id,
            username: username
        },
        dataType: 'json',
        contentType: "application/json; charset=UTF-8",
        // timeout: (15 * 1000),
        error: function(xhr) { // if error occured
            console.log(xhr.statusText + xhr.responseText);
        },
        beforeSend: function() {
            // console.log(member_id)
        },
        success: function(response) {
            console.log(response)
            $.each(response, function(key, row) {

                // $.each( row, function( key1, row1 ) {
                // console.log(row)


                // console.log(row[key]);
                // console.log(row[key])

                my_table += "<div class='wt-wrap'>" +
                    "<div class='wt-form'>" +
                    "<div class='wt-form-tl'>" +
                    "<span class='language' data-translate='Provider'>" + providerTxt + "</span>" +
                    "</div>" +
                    "<div class='wt-form-dl'>" +
                    "<span>" + row[3] + "</span>" +
                    "</div>" +
                    "</div>" +
                    "<div class='wt-form'>" +
                    "<div class='wt-form-tl'>" +
                    "<span class='language' data-translate='promotion'>" + promoTxt + "</span>" +
                    "</div>" +
                    "<div class='wt-form-dl'>" +
                    "<span>" + row[4] + "</span>" +
                    "</div>" +
                    "</div>" +
                    "<div class='wt-form'>" +
                    "<div class='wt-form-tl'>" +
                    "<span class='language' data-translate='winoverturnovertarger'>" +
                    WinoverTurnoverTarget + "</span>" +
                    "</div>" +
                    "<div class='wt-form-dl'>" +
                    "<span>" + row[2] + "/" + row[1] + "</span>" +
                    "</div>" +
                    "</div>" +
                    "<div class='wt-reminder'>" +
                    "<i class='fas fa-exclamation-circle'></i>&nbsp;<span class='wt_reminder language' data-translate='reminder-wt'>" +
                    reminderWallet + "</span>" +
                    "</div>" +
                    "</div>"
                // my_table += "<div>hahaha</div>"
                $('#turnover_body').html(my_table);

                // });

                // console.log(my_table);


            });


            // console.log(response)

        }

    });
}

searchResults();
</script>

<!-- Auto Transfer Start -->
<script>
$("#switch-toggle").on('change', function() {
    var session = $('#session_lang').val();
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        console.log("Current switch status: " + switchStatus);
        var member_id = <?=$member_id?>

        $.ajax({
            url: '../controller/ajax/update_button',
            type: 'GET',
            data: {
                change_status: switchStatus,
                member_id: member_id
            },
            // beforeSend: function(){

            //     console.log("side button :start")
            // },
            // complete: function (data) {

            //     console.log("side button :end")
            // },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            timeout: (15 * 1000),
            error: function(textstatus) { // if error occured
                if (textstatus === "timeout") {

                    // Error During Ajax Process
                    msg =
                        "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i><span id=ajax_error class=language>Error Occured. Please try again.</span></div>";
                    swal_lang(msg, session, location);

                } else {

                    // No Error Appear

                }
            },
            success: function(response) {

                console.log(response)

            }
        });

        var switchmsgtitle = "";
        var switchmsgcontent = "";
        if (session == "bm") {
            switchmsgtitle = "Pemindahan Auto Dompet Utama";
            switchmsgcontent =
                "Anda telah mengaktifkan Auto Transfer. Luangkan masa sehingga 5 minit untuk sistem mengemas kini pilihan anda. Terima kasih.";
        } else if (session == "cn") {
            switchmsgtitle = "主钱包自动转移";
            switchmsgcontent = "您已启用自动转移。 系统将于最多 5 分钟的时间来更新您的首选项， 谢谢。";
        } else {
            switchmsgtitle = "Main Wallet Auto Transfer";
            switchmsgcontent =
                "You have enable Auto Transfer. Please allow up to 5 minutes for the system to update your preferences. Thank you.";
        }

        Swal.fire({
            html: '<div class="auto_transfer_title ">' + switchmsgtitle + '</div>' +
                '<div class="auto_transfer_content ">' + switchmsgcontent + '</div>',
            confirmButtonText: '<div class="auto_transfer_confirm_btn">OK</div>',
        })


    } else {
        var switchmsgtitle = "";
        var switchmsgcontent = "";
        if (session == "bm") {
            switchmsgtitle = "Pemindahan Auto Dompet Utama";
            switchmsgcontent =
                " Anda telah melumpuhkan Auto Transfer. Luangkan masa sehingga 5 minit untuk sistem mengemas kini pilihan anda. Terima kasih";
        } else if (session == "cn") {
            switchmsgtitle = "主钱包自动转移";
            switchmsgcontent = "您已禁用自动转移。 系统将于最多 5 分钟的时间来更新您的首选项，谢谢。";
        } else {
            switchmsgtitle = "Main Wallet Auto Transfer";
            switchmsgcontent =
                "You have disabled Auto Transfer. Please allow up to 5 minutes for the system to update your preferences. Thank you.";
        }

        switchStatus = $(this).is(':checked');
        console.log("Current switch status2: " + switchStatus);

        var member_id = <?=$member_id?>

        $.ajax({
            url: '../controller/ajax/update_button',
            type: 'GET',
            data: {
                change_status: switchStatus,
                member_id: member_id
            },
            // beforeSend: function(){

            //     console.log("side button :start")
            // },
            // complete: function (data) {

            //     console.log("side button :end")
            // },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            timeout: (15 * 1000),
            error: function(textstatus) { // if error occured
                if (textstatus === "timeout") {

                    // Error During Ajax Process
                    msg =
                        "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i><span id=ajax_error class=language>Error Occured. Please try again.</span></div>";
                    sweet_alert_format(msg, session, location);

                } else {

                    // No Error Appear

                }
            },
            success: function(response) {

                console.log(response)

            }
        });

        Swal.fire({
            html: '<div class="auto_transfer_title">' + switchmsgtitle + '</div>' +
                '<div class="auto_transfer_content">' + switchmsgcontent + '</div>',
            confirmButtonText: '<div class="auto_transfer_confirm_btn">OK</div>',
        })

    }
});
</script>
<!-- Auto Transfer End -->
<script>
window.__lc = window.__lc || {};
window.__lc.license = 10102823;;
(function(n, t, c) {
    function i(n) {
        return e._h ? e._h.apply(null, n) : e._q.push(n)
    }
    var e = {
        _q: [],
        _h: null,
        _v: "2.0",
        on: function() {
            i(["on", c.call(arguments)])
        },
        once: function() {
            i(["once", c.call(arguments)])
        },
        off: function() {
            i(["off", c.call(arguments)])
        },
        get: function() {
            if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
            return i(["get", c.call(arguments)])
        },
        call: function() {
            i(["call", c.call(arguments)])
        },
        init: function() {
            var n = t.createElement("script");
            n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t
                .head.appendChild(n)
        }
    };
    !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
}(window, document, [].slice))
</script>
<noscript><a href="https://www.livechatinc.com/chat-with/10102823/" rel="nofollow">Chat with us</a>, powered by <a
        href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>