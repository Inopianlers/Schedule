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

        <form action="" class="form-padding">

            <label class="input-label">
                <span class="input-label-tx language" data-translate="account_name">Account Name</span>
                <span class="required-tx">*</span>
            </label>
            <input type="text" class="input-form" value="<?=$member_full_name?>" readonly>
            <br>
            <label class="input-label">
                <span class="input-label-tx language" data-translate="withdrawal_bank">Withdrawal Bank</span>
                <span class="required-tx">*<span class="language" data-translate="required_fill_in">Required to fill
                        in</span></span>
            </label>
            <select class="form-control" id="withdraw_bank_id" onchange="show_bank_details()">
                <?php
                $query_withdrawal_bank_row = "SELECT * FROM withdrawal_bank WHERE f_member_id='$member_id' AND f_delete ='N'";
                mysqli_set_charset($conn, "utf8");
                $result_withdrawal_bank_row = mysqli_query($conn, $query_withdrawal_bank_row);
                $num_withdrawal_bank_row = mysqli_num_rows($result_withdrawal_bank_row);
                if($num_withdrawal_bank_row > 0){
                    while($row_withdrawal_bank_row = mysqli_fetch_array($result_withdrawal_bank_row) ){
                        $withdrawal_bank_id = $row_withdrawal_bank_row['f_id'];
                        $withdrawal_bank_code = $row_withdrawal_bank_row['f_bank_code'];
                        $withdrawal_account_number = $row_withdrawal_bank_row['f_account_number'];
                        // get bank name
                        $query_get_bank_name = "SELECT * FROM bank_code WHERE f_id = '$withdrawal_bank_code' ";
                        $result_get_bank_name = mysqli_query($conn, $query_get_bank_name);
                        $row_get_bank_name = mysqli_fetch_array($result_get_bank_name);
                        $withdrawal_bank_name = $row_get_bank_name['f_bank_name'];
                        echo 
                        "
                        <option value='$withdrawal_bank_id'>$withdrawal_bank_name &nbsp;&nbsp $withdrawal_account_number</option>
                        ";

                    }
                }
            ?>

                <?php
                $query_member_group_withdraw = "SELECT * FROM member_group WHERE f_id = '$member_group'";
                $result_member_group_withdraw = mysqli_query($conn, $query_member_group_withdraw);
                $row_member_group_withdraw = mysqli_fetch_array($result_member_group_withdraw);
                // echo $query_member_group_withdraw;
                $min_withdraw = $row_member_group_withdraw['f_min_withdraw'];
                $max_withdraw = $row_member_group_withdraw['f_max_withdraw'];

                if($member_group == "" || $member_group == null){

                    $min_withdraw = 30;
                    $max_withdraw = 30000;

                }
                
                if($language == 'th'){

                    $w_amount_placeholder = "ต่ำสุด ".$min_withdraw." / สูงสุด ".$max_withdraw;

                }else if($language == 'bm'){
                    $w_amount_placeholder = "Min ".$min_withdraw." / Max ".$max_withdraw;
                } 

                else if($language == 'cn'){
                    $w_amount_placeholder = "最少 ".$min_withdraw." / 最多 ".$max_withdraw;

                }
                else{

                    $w_amount_placeholder = "Min ".$min_withdraw." / Max ".$max_withdraw;

                }
            ?>
            </select>
            <br>
            <label class="input-label">
                <span class="input-label-tx language" data-translate="bank_name">Bank Name</span>
                <span class="required-tx">*</span>
            </label>
            <input type="text" class="input-form" value="" id='bankName' readonly>
            <br>
            <label class="input-label">
                <span class="input-label-tx language" data-translate="account_number">Account No.</span>
                <span class="required-tx">*</span>
            </label>
            <input type="text" class="input-form" value="" id="bankAccNo" readonly>
            <br>
            <label class="input-label">
                <span class="input-label-tx language" data-translate="withdrawal_amount">Withdrawal Amount</span>
                <span class="required-tx">*<span class="language" data-translate="required_fill_in">Required to fill
                        in</span></span>
            </label>
            <input type="number" class="input-form"  id="w_amount" step="0.01"
            placeholder="<?=$w_amount_placeholder?>" class="field__input" min="<?=$min_withdraw?>"
            max="<?=$max_withdraw?>" name="withdraw_amount"
            onkeypress="return event.keyCode === 8 || event.charCode >= 46 && event.charCode <= 57"
            required>
            <br>
            <input class="submit-btn" type="button" value="Submit" id="withdraw_btn">

            <div class="reminder-wrap">
                <span><span class="language" data-translate="reminder">Reminder</span>:</span>
                <?php if($language=='bm'){
                    echo"<p>1. Hubungi LIVECHAT 24/7 kami jika transaksi anda belum selesai lebih dari 10 minit.</p>
                    <p>2. Nama akaun bank pengeluaran mesti sepadan dengan nama penuh yang didaftarkan, ahli tidak membenarkan pengeluaran ke akaun bank pihak ketiga.</p>
                    <p>3. Sebilangan penyedia permainan memerlukan masa penyegerakan laporan selama 15 hingga 30 minit, harap beri kami tempoh penyegerakan yang diperlukan.</p>
                    <p>4. Pastikan turnover anda telah tercapai, dan kirimkan transaksi pengeluaran setelah 30 minit untuk mengelakkan sistem ditolak secara automatik.</p>
                    <p>5. Sekiranya terdapat perbezaan atau anda mungkin mempunyai pertanyaan penarikan lebih lanjut, sila hubungi LIVECHAT 24/7 kami.Terima Kasih.</p>";
                }else if($language=='cn'){
                    echo"<p>1. 如果您的交易等待时间超过 10 分钟，请与我们24/7的在线客服联系。</p>
                    <p>2. 提款银行账户名称必须与注册全名一致，会员不得提款至第三方银行账户。</p>
                    <p>3.部分游戏供应商需要15到30分钟的报告同步时间，请给予我们所需的同步时间。</p>
                    <p>4. 请确保您达到所需的流水量，并在30分钟后提交提款交易，以免系统自动拒绝。</p>
                    <p>5. 如果有任何差异或您可能有任何提款问题，请联系我们24/7的在线客服。谢谢。</p>";
                }else if($language=='th'){
                    echo"<p>1. โปรดตรวจสอบกับแชทสดของเราได้ตลอด 24 ชั่วโมงทุกวัน หากธุรกรรมของคุณรอดำเนินการนานกว่า 10 นาที</p>
                    <p>2. ชื่อบัญชีธนาคารที่ถอน จะต้องตรงกับชื่อนามสกุลที่ลงทะเบียนสมาชิกไว้ ไม่อนุญาตให้ถอนไปยังบัญชีธนาคารของบุคคลที่สาม</p>
                    <p>3. ผู้ให้บริการเกมบางค่าย ต้องการเวลาซิงค์รายงาน 15 ถึง 30 นาที โปรดอดทนรอกับเราในช่วงเวลาซิงค์ที่จำเป็น</p>
                    <p>4. โปรดตรวจสอบให้แน่ใจว่าการเทิร์นโอเวอร์ที่ต้องการของคุณบรรลุเป้าหมาย และส่งรายการถอนหลังจาก 30 นาที เพื่อหลีกเลี่ยงการปฏิเสธอัตโนมัติของระบบ</p>
                    <p>5. หากมีความคลาดเคลื่อนหรือคุณอาจมีคำถามอื่น ๆ เกี่ยวกับการถอนเงิน โปรดติดต่อแชทสดของเราได้ตลอด 24 ชั่วโมงทุกวัน ขอบคุณค่ะ</p>";
                }else{
                    echo"<p>1.Kindly check with our 24/7 LIVECHAT if your transaction is pending for more than 10 minutes.</p>
                <p> 2.Withdrawal bank account name must match with registered full name , member is not allow withdrawal to 3rd party bank account.</p>
                <p> 3.Some game provider requires 15 till 30 minutes of report sync time , kindly bear with us during the required sync time.</p>
                <p>4.Please make sure your required turnover is achieve , and submit the withdrawal transaction after 30 minutes to avoid system auto reject.</p>
                <p> 5.If there is any discrepancy or you may have any other further withdrawal inquiries,kindly contact our 24/7 LIVECHAT.Thank you.</p>";
                }?>
            </div>
        </form>

    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK ===== -->
    <?php include '../template/footerlink.php';?>

    <script>
    var num_bank_row = "<?php echo $num_get_bank_row?>";
    if (num_bank_row != 0) {

    } else {
        // console.log("jaja")
        var lang = "<?php echo $language ?>";
        // console.log(lang);
        $(document).ready(function() {
            if (lang == "cn") {
                // swal({
                //     text: "无银行资料，请添加银行资料。",
                //     type: "success"
                // }).then(function() {
                //     window.location = "../bankingdetails";
                // });

                Swal.fire({
                    html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>无银行信息，请添加银行信息。</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'top',
                    type: "success"
                }).then(function() {
                    window.location = "../bankingdetails";
                });

            } else if (lang == "bm") {

                Swal.fire({
                    html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>Butiran bank tidak dijumpai, sila tambah butiran bank.</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'top',
                    type: "success"
                }).then(function() {
                    window.location = "../bankingdetails";
                });

            } else {
                Swal.fire({
                    html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>No bank details found, please add bank details.</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'top',
                    type: "success"
                }).then(function() {
                    window.location = "../bankingdetails";
                });
            }
        });
    }
    </script>

    <!-- Get Member Withdrawal Bank Details Start -->
    <script>
    $(document).ready(function() {
        show_bank_details()
    });

    function show_bank_details() {
        var member_id = '<?=$member_id?>';
        var withdraw_bank_id = $('#withdraw_bank_id').val();
        console.log(withdraw_bank_id)
        // console.log("Current bank id: "+withdraw_bank_id);
        // console.log("member_id: "+member_id)

        var session = $('#session_lang').val();

        if (member_id != '' || member_id != null) {
            if (withdraw_bank_id != '' && withdraw_bank_id != null) {

                $.ajax({
                    url: '../controller/ajax/withdrawal_bank_details/',
                    type: 'GET',
                    data: {
                        member_id: member_id,
                        withdraw_bank_id: withdraw_bank_id
                    },
                    beforeSend: function() {
                        // console.log("withdrawal bank details - ok");
                        // console.log(member_id,withdraw_bank_id);
                    },
                    error: function(xhr) { // if error occured

                        console.log(xhr.statusText + xhr.responseText);

                    },
                    error: function(xhr) { // if error occured

                        console.log(xhr.statusText + xhr.responseText);
                    },
                    dataType: 'json',
                    // contentType: "application/json; charset=UTF-8",
                    contentType: "application/x-javascript; charset:windows-874",
                    success: function(response) {

                        // console.log(response)
                        var return_msg = response.return_msg;
                        var member_fullname = response.member_fullname;
                        var member_acc_number = response.member_acc_number;
                        var member_bank_name = response.member_bank_name;
                        // console.log(return_msg)

                        // Check Member Withdrawal Details Start
                        if (return_msg == true) {
                            // console.log("here")
                            $('#withdrawal_acc_name').val(member_fullname);
                            $('#bankAccNo').val(member_acc_number);
                            $('#bankName').val(member_bank_name);

                        } else {
                            console.log("asdasdsa")
                            let msg = "";

                            if (session == "th") {

                                msg =
                                    "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i>เกิดข้อผิดพลาด กรุณาติดต่อฝ่ายบริการลูกค้า</div>";

                            } else if (session == "cn") {
                                msg =
                                    "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i>发生错误，请联系客服!</div>";
                            } else if (session == "bm") {
                                msg =
                                    "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i>Ralat berlaku, sila hubungi khidmat pelanggan!</div>";
                            } else {

                                msg =
                                    "<div class='d-flex align-items-center justify-content-center'><i class='fas fa-exclamation-circle alert_icon'></i>Error occured. Kindly contact customer service.</div>";

                            }

                            // Swal.fire({
                            //     html: msg,
                            //     showConfirmButton: false,
                            //     position: 'top',
                            // }).then(function() {
                            //     $("#withdraw_btn").attr("disabled", true);

                            // });

                            Swal.fire({
                                html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                                    msg + "</div>",
                                showConfirmButton: false,
                                scrollbarPadding: false,
                                showCloseButton: true,
                                closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
                                position: 'top',
                                type: "success"
                            }).then(function() {
                                $("#withdraw_btn").attr("disabled", true);
                                // activaTab('tab1')
                            });

                        }
                        // Check Mmeber Withdrawal Details End
                    }

                });

            }
        }
    }
    </script>
    <!-- Get Member Withdrawal Bank Details End -->

    <script>
    var session = $('#session_lang').val();

    $("#withdraw_btn").click(function() {
        var member_id = "<?= $member_id?>";
        var withdraw_amount = document.getElementById("w_amount")
        var withdraw_bank_id = $("#withdraw_bank_id").val()
        var return_message = '';
        // console.log(withdraw_amount.value)

        // console.log(member_id, withdraw_amount, withdraw_bank_id)
        var session = $('#session_lang').val();
        // console.log(session);    

        if (member_id != '0' && member_id != '' && member_id != null) {

            if (withdraw_bank_id != '0' && withdraw_bank_id != null) {

                if (withdraw_amount.value != '' && withdraw_amount.value != null && withdraw_amount.value !=
                    0) {
                    // console.log("haha")

                    if (!withdraw_amount.validity.stepMismatch) {

                        if (!withdraw_amount.validity.rangeUnderflow) {

                            if (!withdraw_amount.validity.rangeOverflow) {
                                overlay_icon()

                                $.ajax({
                                    url: '../controller/ajax/withdrawal_submit/',
                                    type: 'GET',
                                    data: {
                                        member_id: member_id,
                                        withdraw_amount: withdraw_amount.value,
                                        withdraw_bank_id: withdraw_bank_id
                                    },
                                    dataType: 'json',
                                    contentType: "application/x-javascript; charset:windows-874",
                                    beforeSend: function() {
                                        console.log(withdraw_amount);

                                    },
                                    timeout: (15 * 1000),
                                    error: function(xhr, status, error) {
                                        var errorMessage = xhr.status + ': ' + xhr.statusText
                                        console.log('Error - ' + errorMessage);
                                    },
                                    success: function(response) {
                                        complete_overlay_icon()

                                        // console.log(response)
                                        return_message = response.withdraw_msg;
                                        var reload_verify = response.withdraw_location;
                                        var script_lang = response.script_lang;
                                        var session = $("#session_lang").val()
                                        // console.log(session)                 
                                        swal_lang(return_message, session, reload_verify)

                                    }

                                });

                            } else {
                                return_message =
                                    "<span id='wdw_msg2' class=language>Maximum withdrawal is RM</span><span>&nbsp;<?=$max_withdraw?>.</span><span id='withdraw_msg9' class=language></span>";
                                swal_lang(return_message, session)
                            }

                        } else {
                            return_message =
                                "<span id='wdw_msg1' class=language>Minimum withdrawal is RM</span><span>&nbsp;<?=$min_withdraw?>.</span><span id='withdraw_msg9' class=language></span>";
                            swal_lang(return_message, session)
                        }

                    } else {
                        return_message =
                            "<span id='public_3' class=language>Amount format wrong! Exp: 100.00</span>";
                        swal_lang(return_message, session)
                    }

                } else {
                    return_message = "<span id='public_2' class=language>Amount cannot be empty</span>";
                    swal_lang(return_message, session)
                }

            } else {
                return_message = "<span id='public_6' class=language>Please select bank</span>";
                swal_lang(return_message, session)
            }

        } else {
            return_message = "<span id='public_1' class=language>Member id not found</span>";
            swal_lang(return_message, session)
        }
    });
    </script>
</body>

</html>