<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    input[type="file"] {
        color: transparent;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        background: transparent;
        font-size: .8rem;
        width: 250px;
    }
    .bank-sel-wrap {
    display: flex;
    flex-wrap: wrap;
    margin-top: 5px;
}
.bank-sel-wrap>div {
    width: 15%;
    margin: 0px 1% 0 0 !important;
}

    </style>
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

        <!-- DEPOSIT -->
        <!-- Truepay Function Start -->
        <?php
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,6));
            $partner_id = $today . $rand;

            
            //truepay part start
            $Secret_key = '6ZHFVRfKrAFe4Er2';
            $merchant_code = 'flexgaming901my';
            $get_deposit_action_name = 'getDPLink';
            $randnum = strtoupper(substr(uniqid(sha1(time())),0,4));
            // $trxid = "D".$today . $randnum;
            $trxid = "D".$today.$rand.$member_id;

            //for deposit function
            function sendRequest($postUrl, $portPort, $content){
                // print_r($content);
                // exit;
                global $argv;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $postUrl);
                curl_setopt($ch, CURLOPT_PORT, $portPort);
            
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
                
                $tmp = array();
                foreach($content as $k => $v){
                    $tmp[] = $k."=".$v;
                }
                // echo "<br>";
                // print_r ($tmp);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, implode("&",$tmp));
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($content));
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: '.strlen(implode("&",$tmp))));
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: '.strlen(http_build_query($content))));
                curl_setopt($ch, CURLOPT_POST, true);
                $postResult = curl_exec($ch);
            
                curl_close($ch);

                // echo "khai: ".$content."<br>";
                // print_r($content);
                // echo "<br>";

                $result = json_decode($postResult);
                $result_d = $result->d;
                $result_url = $result_d->url;
                
                // echo "result_now:";
                // print_r($postResult);


                // echo "<script>console.log($result_url)</script>";

                // echo "<br>";
                // echo $postResult;
                // echo "<br>";
                // echo $result_url;
                // exit;
                // window.open('".$result_url."','_blank');

                echo "<script>
                        let a= document.createElement('a');
                        a.target= '_self';
                        a.href= '".$result_url."';
                        a.click();
                    </script>
                    ";
            }

            //truepay part end

            //get truepay_id in bank_id start
            $bank_name = 'TRUEPAY';
            $query_bank_id = "SELECT * FROM bank WHERE f_bank_account_name = '$bank_name' AND f_delete = 'N'";
            $result_bank_id = mysqli_query( $conn, $query_bank_id );
            $row_bank_id = mysqli_fetch_array( $result_bank_id );
            $current_bank_id = $row_bank_id['f_id'];

            //get bank code from bank_code
            $bankname = 'Truepay';
            $query_bank_code = "SELECT f_id FROM bank_code WHERE f_bank_name = '$bankname' AND f_delete = 'N'";
            $result_bank_code = mysqli_query( $conn, $query_bank_code );
            $row_bank_code = mysqli_fetch_array( $result_bank_code );
            $current_bank_code = $row_bank_code['f_id'];
            //get truepay_id in bank_id end

            //truepay part end

            $query_bank_selected = "SELECT b.f_id, b.f_bank_account_name, b.f_bank_account_no, b.f_bank_code FROM bank b JOIN member_group_bank_relation m ON b.f_id = m.f_bank_id WHERE b.f_delete='N' AND b.f_display != '3' AND (b.f_bank_purpose = '1' OR b.f_bank_purpose = '3') AND b.f_status='1' AND b.f_bank_code != '48' AND m.f_member_group_id = '$member_group' AND m.f_delete = 'N' ORDER BY b.f_id ASC LIMIT 1";
            $result_bank_selected = mysqli_query($conn, $query_bank_selected);
            $row_bank_selected = mysqli_fetch_array($result_bank_selected);
            $bank_selected_code = $row_bank_selected['f_bank_code'];
            $bank_selected_id = $row_bank_selected['f_id'];
        
            $query_bank_selected_name = "SELECT * FROM bank_code WHERE f_delete='N' AND f_id='$bank_selected_code'";
            mysqli_set_charset($conn, "utf8");
            $result_bank_selected_name = mysqli_query($conn, $query_bank_selected_name);
            $row_bank_bank_selected_name = mysqli_fetch_array($result_bank_selected_name);
        
            $current_bank_code_name = $row_bank_bank_selected_name['f_bank_name'];
            $current_bank_acc_name = $row_bank_selected['f_bank_account_name'];
            $current_bank_acc_number = $row_bank_selected['f_bank_account_no'];
        ?>
        <!-- Truepay Function End -->

        <div id="wrapper">
            <div class="funds-wrap">
                <ul class="nav nav-tabs nav-justified">
                    
                    <li class="active"> <a href="#tab2" class="text-uppercase language" data-translate="bank_transfer">Bank Transfer</a>
                    </li>
                    <li ><a href="#tab1" class="text-uppercase language" data-translate="quick_pay">Quick
                            Pay</a></li>
                    <!-- <li><a href="#tab3" class="text-uppercase language" data-translate="qrpay">QR Pay</a></li> -->
                </ul>
                <div class="tab-content">

                    <!-- quickpay -->
                    <div id="tab1" class="content-pane " >
                        <form action="" class="form-padding" method="post">
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_method">Deposit
                                    Method</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_select">Required to select</span></span>
                            </label>
                            <select name="" id="tp_method" class="input-form">
                                <option value=""></option>
                                <option id="a" value="truepay">TRUEPAY</option>
                            </select>

                            <br>
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_amount">Deposit
                                    Amount</span>
                                <span class="required-tx">*<span class="language"
                                        data-translate="required_fill_in">Required to fill in</span></span>
                            </label>
                            <input class="input-form" type="number" name="amt" placeholder="Min 30 / Max 30,000"
                                id="quickpay_amount" min="30" max="50000" step="0.01">
                            <br>
                            <div class="button-sel-amount">
                                <input type="button" onclick="iq(this.value);" value="50">
                                <input type="button" onclick="iq(this.value);" value="100">
                                <input type="button" onclick="iq(this.value);" value="300">
                                <input type="button" onclick="iq(this.value);" value="500">
                                <input type="button" onclick="iq(this.value);" value="1000">
                            </div>
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_bank">Deposit Bank</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_select">Required to select</span></span>
                            </label>


                            <div class="bank-sel-wrap">
                                <div>
                                    <label class="bank-sel active">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="MBB"
                                            onchange="bank_verify()" checked="checked">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/maybank.png">
                                          
                                        </div>
                                        <span class="">MBB</span>
                                    </label>

                                </div>
                                <div>
                                    <label class="bank-sel">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="RHB"
                                            onchange="bank_verify()">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/rhb.png">
                                        
                                        </div>
                                        <span class="">RHB</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="bank-sel">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="PBB"
                                            onchange="bank_verify()">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/pbe.png">
                                          
                                        </div>
                                        <span class="">PBB</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="bank-sel">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="CIMB"
                                            onchange="bank_verify()">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/cimb.png">
                                            <!-- <span class="selected"><img
                                                    src="../assets/img/icon/selected-tick.png"></span> -->
                                        </div>
                                        <span class="">CIMB</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="bank-sel">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="AMBANK"
                                            onchange="bank_verify()">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/ambank.png">
                                         
                                        </div>
                                        <span class="">AMBB</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="bank-sel">
                                        <input class="bank-radiobtn" type="radio" name="t_bank_option" value="HLB"
                                            onchange="bank_verify()">
                                        <div class="bank-selected">
                                            <img src="../assets/img/bank/hongleong.png">
                                            <!-- <span class="selected"><img
                                                    src="../assets/img/icon/selected-tick.png"></span> -->
                                        </div>
                                        <span class="">HLB</span>
                                    </label>
                                </div>
                            </div>
                            <input type="text" class="input-form" id="t_selected_bank" name="lname" value="MayBank"
                                readonly>
                            <input type="text" name="bCode" id="selected_bank_code" class="input-form" value="MAYBANK"
                                readonly hidden>
                            <br>
                            <input class="submit-btn" type="submit" value="Submit" id="truepay_submit"
                                name="truepay_submit" onclick="return truepay_verify();">

                            <!-- Truepay Submit Part Start -->
                            <?php
                                    if (isset($_POST['truepay_submit']) && !empty($_POST['truepay_submit'])) {

                                        //start declaration 
                                        $b_code = "";
                                        if (!empty($_POST['bCode'])) $b_code = $_POST['bCode'];
                                        // echo $b_code;
                                        $amount = "";
                                        if (!empty($_POST['amt'])) $amount = $_POST['amt'];
                                        //   echo $amount; exit;
                                        //end declaration

                                        $d_ts = time();

                                        // $apiUrl = "https://api.tpm-bo.club/a/getDPLink";
                                        $apiUrl = "https://api.tpm-bo.com/a/getDPLink";
                                        $apiPort = 443;

                                        $new_url = "https://b88mys.com/m/deposit/";
                                        // $new_url = "https://demofg.com/api_test/truepay/sample.php?trx_id=$trxid"."&name=$user_name";
                                        // echo $new_url; exit;


                                        $dataPost = array(
                                            "mCode" => $merchant_code,
                                            "token" => '',
                                            "ts" => $d_ts,
                                            "bCode" => $b_code,
                                            "amt" => $amount,
                                            "user" => $member_username,
                                            "trxid" => $trxid,
                                            "notifyUrl" => "https://b88mys.com/m/controller/ajax/deposit_process/notifyurl.php",
                                            "webUrl" => $new_url,
                                        );

                                        $dataPost['token'] = md5($dataPost['mCode'].'-'.$Secret_key.'-'.$get_deposit_action_name.'-'.$dataPost['ts']);

                                        // $sample_token = $dataPost['mCode'].'-'.$Secret_key.'-'.$get_deposit_action_name.'-'.$dataPost['ts'];
                                        // echo "sample_token: ".$sample_token."<br>";
                                        $token=$dataPost['token'];
                                        // echo "token here la";
                                        // print_r($sample_token);
                                        // echo "<br>";
                                        // exit;

                                        $resp = sendRequest($apiUrl, $apiPort,  $dataPost);

                                        //insert to truepay table
                                        if($member_company_id != "" && $member_id != ""){
                                            $query = "INSERT INTO truepay (f_company_id, f_member_id, f_txn_id, f_amount, f_token, f_ts, f_progress, f_delete, f_modified_time, f_created_time)
                                            VALUES ('$member_company_id', '$member_id', '$trxid', '$amount', '$token', '$d_ts', 'P', 'R', '$now', '$now')";
                                            $result = mysqli_query($conn, $query);
                                        }
                                    }
                            ?>
                            <!-- Truepay Submit Part End -->

                            <?php
                                $Reminderdeposit = "";
                                if($language =='bm'){
                                $Reminderdeposit="<p> 1. Sentiasa periksa butiran bank deposit aktif terkini sebelum membuat deposit.</p>
                                <p>2. Untuk menggunakan opsi deposit 'Transfer Bank', Lakukan transfer sebelum menyerahkan transaksi untuk mengelakkan transaksi tertunda. </p>
                                <p>3. NAMA AKAUN Pendeposit mesti dipadankan dengan nama penuh yang didaftarkan. Kami tidak menggalakkan transaksi dibuat menggunakan akaun pihak ketiga / syarikat.</p>
                                <p>4. Tolong JANGAN mengisi 'S9ASIA' # atau kata-kata sensitif yang berkaitan dengan perjudian sebagai rujukan / komen dalam transaksi pemindahan dalam talian anda.</p>
                                <p>5. Harap perhatikan bahawa perolehan 1x diperlukan untuk semua deposit yang dibuat sebelum pengeluaran dapat diproses.</p>
                                <p>6. Hubungi LIVECHAT 24/7 kami sekiranya transaksi anda belum selesai lebih dari 5 minit.</p>";
                                }
                                else if($language =='cn'){
                                $Reminderdeposit="<p>1.进行存款之前，请务必检查最新的活动存款银行详细信息。</p>
                                <p>2.对于使用“银行转账”的存款选项，请在提交交易前进行转账，以免延误交易。 </p>
                                <p>3.存款人的帐户名必须与注册的全名匹配。 我们不鼓励使用第三者/公司帐户进行交易。</p>
                                <p>4.请不要在您的在线转账交易中填写“S9ASIA”＃或任何与赌博相关的敏感词作为参考/备注。</p>
                                <p>5.请注意，在进行任何提款之前，所有存款都需要进行1倍的周转。</p>
                                <p>6.请与我们的24/7 LIVECHAT检查，如果您的交易未完成超过5分钟。</p>";
                                }
                                else if($language =='th'){
                                $Reminderdeposit="<p>1. ตรวจสอบรายละเอียดธนาคารเงินฝากล่าสุดที่ใช้งานอยู่เสมอ ก่อนทำการฝากเงิน.</p>
                                <p>2. สำหรับการใช้ตัวเลือกการฝาก 'โอนเงินผ่านธนาคาร' กรุณาทำการโอนเงินก่อนส่งรายการ เพื่อหลีกเลี่ยงการทำรายการล่าช้า</p>
                                <p>3. ชื่อบัญชีของผู้ฝาก ต้องตรงกับชื่อนามสกุลที่ลงทะเบียนไว้  เราไม่ส่งเสริมให้ทำธุรกรรมโดยใช้บัญชีบุคคลที่สาม / บริษัท</p>
                                <p>4. กรุณาอย่ากรอก 'S9ASIA' # หรือคำที่ละเอียดอ่อนที่เกี่ยวข้องกับการพนันเพื่อเป็นข้อมูลอ้างอิง / หมายเหตุในการทำธุรกรรมโอนเงินออนไลน์ของคุณ</p>
                                <p>5. โปรดทราบว่าจำเป็นต้องมี 1x เทิร์นโอเวอร์สำหรับการฝากทั้งหมด ก่อนที่จะสามารถดำเนินการถอนได้</p>
                                <p>6. โปรดตรวจสอบกับแชทสดของเราได้ตลอด 24 ชั่วโมงทุกวัน หากธุรกรรมของคุณรอดำเนินการนานกว่า 5 นาที</p>";
                                }
                                else{
                                $Reminderdeposit="<p>  1.Always check for the latest active deposit details before making a deposit.</p>
                                <p>2. For using deposit option 'Bank Transfer'. Please make the transfer before submit
                                the transaction to avoid the transaction is delay. </p>
                                <p> 3.Depositor's ACCOUNT NAME must match with registered full name. We do not encourage
                                transaction made using 3rd party/company account.</p>
                                <p> 4. Please DO NOT fill 'S9ASIA' # or any sensitive words related to gambling as
                                reference/remark in your online transfer transaction.</p> 
                                <p> 5. Please take note that 1x turnover is required for all deposits made before any withdrawal can be processed.</p>
                                <p> 6. Kindly check with our 24/7 LIVECHAT if your transaction is pending for more than 5 minutes.</p>";
                                }?>
                            <div class="reminder-wrap">
                                <span><span class="language" data-translate="reminder">Reminder</span>:</span>
                                <?php echo $Reminderdeposit?>
                            </div>
                        </form>
                    </div>

                    <!-- banktransfer -->
                    <div id="tab2" class="content-pane  is-active">
                        <form class="form-padding">
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_amount">Deposit
                                    Amount</span>
                                <span class="required-tx">*<span class="language"
                                        data-translate="required_fill_in">Required to fill in</span></span>
                            </label>
                            <input type="number" class="input-form" placeholder="Min 30 / Max 30,000" min="30" max="30000" id="amount2" step="0.01">
                            <br>
                            <div class="button-sel-amount">
                                <input type="button" onclick="ik(this.value);" value="50">
                                <input type="button" onclick="ik(this.value);" value="100">
                                <input type="button" onclick="ik(this.value);" value="300">
                                <input type="button" onclick="ik(this.value);" value="500">
                                <input type="button" onclick="ik(this.value);" value="1000">
                            </div>

                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_bank">Deposit Bank</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_select">Required to select</span></span>
                            </label>
                            <div class="bank-sel-wrap">

                                <?php    
                                $query_bank = "SELECT b.f_id, b.f_bank_account_name, b.f_bank_account_no, b.f_bank_code FROM bank b JOIN member_group_bank_relation m ON b.f_id = m.f_bank_id WHERE b.f_delete='N' AND b.f_display != '3' AND (b.f_bank_purpose = '1' OR b.f_bank_purpose = '3') AND b.f_status='1' AND b.f_bank_code != '48' AND m.f_member_group_id = '$member_group' AND m.f_delete = 'N' ORDER BY b.f_id ASC";                 
                                $result_bank = mysqli_query($conn, $query_bank);
                                $num_bank = mysqli_num_rows($result_bank);
                                $x = 1;
                                if($num_bank > 0){
                                    while($row_bank = mysqli_fetch_array($result_bank)){
                                            $bank_id = $row_bank['f_id'];
                                            $bank_name = $row_bank['f_bank_account_name'];
                                            $bank_no = $row_bank['f_bank_account_no'];
                                            $bank_code = $row_bank['f_bank_code'];
                                            $bank_icon = "";
                                            $query_bank_img = "SELECT f_bank_logo,f_bank_name FROM bank_code WHERE f_delete='N' AND f_id='$bank_code'";
                                            mysqli_set_charset($conn, "utf8");
                                            $result_bank_img = mysqli_query($conn, $query_bank_img);
                                            $row_bank_img = mysqli_fetch_array($result_bank_img);
                                            $bank_url = $row_bank_img['f_bank_logo'];
                                            $bank_icon = "../assets/img/".$bank_url; 
                                            $deposit_bank_name = $row_bank_img['f_bank_name'];
                                            if($x === 1){
                                                $hover = "hover";
                                                $active_bank = "active";
                                                $bank_selected = "checked";
                                            }
                                            else{
                                                $hover = "";
                                                $active_bank = "";
                                                $bank_selected = "";

                                            }
                                            
                                            echo
                                            "
                                            <div>
                                                <label class='bank-sel-t $active_bank'>
                                                    <input class='bank-radiobtn' type='radio' name='bank_transfer_option' value='$bank_id' onchange='testFunction(this.value)' $bank_selected>
                                                    <div class='bank-selected'>
                                                        <img src='$bank_icon'>
                                                    </div>
                                                </label>
            
                                            </div>";
                                            $x++;

                                        }
                                }

                                 ?>

                            </div>

                            <div class="banking-info">
                                <div class="tx-rel">
                                    <input type="text" class="input-form" value="MAYBANK" id="bank_name" readonly>
                                </div>
                                <div class="tx-rel">
                                    <input type="text" class="input-form" value="" id="bank_account_name"
                                        readonly>
                                    <span><i class="fal fa-copy" aria-hidden="true" id="copy_bankname"></i></span>
                                </div>
                                <div class="tx-rel">
                                    <input type="text" class="input-form" value="" id="bank_account_no"
                                        readonly>
                                    <span><i class="fal fa-copy" aria-hidden="true" id="copy_banknum"></i></span>
                                </div>
                            </div>
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="deposit_channel">Deposit
                                    Channel</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_select">Required to select</span></span>
                            </label>
                            <select name="" id="bt_selector" class="input-form">
                                <option value=""></option>
                                <option class="language" value="1" data-translate="online_transfer">Online Transfer</option>
                                <option class="language" value="2" data-translate="cash_deposit">Cash Deposit</option>
                                <option class="language" value="3" data-translate="atm_transfer">ATM Transfer</option>
                                <!-- <option value="3">ATM</option> -->
                            </select>

                            <!-- <label class="input-label">
                                <span class="input-label-tx language" data-translate="bank_details">Bank Details</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_addbank">Please add your bank account</span></span>
                            </label>
                            <select name="" id="" class="input-form-bank">
                                <option value=""></option>
                            </select>
                            <button class="add-input" data-toggle="modal" data-target="#addbank"><i
                                    class="far fa-plus"></i></button> -->
                            <!-- <label class="input-label">
                                <span class="input-label-tx language" data-translate="reference_id">Reference ID</span>
                                </span>
                            </label>
                            <input type="text" class="input-form"> -->

                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="upload_receipt">Upload
                                    Receipt</span>
                                <span class="required-tx">*<span class="language"
                                        data-translate="required_upload">Required to upload</span></span>
                            </label>
                            <div>
                                <!-- <input type="file" id="fileOpload" name="file_dep"
                                    accept="image/png, image/jpeg, image/jpg" class="form-control-file" required=""> -->
                                <img src="" alt="Image preview..." id="img-t" style="display:none">
                                <textarea name="textarea1" id="textarea1" style="display:none"></textarea>
                                <canvas id="canvas" min-height="500" min-width="500" style="display:none"></canvas>


                                <!-- New Compress Method Start -->
                                <input style="color:white;" type="file" id="bt_ori_image" name="file_dep"
                                    accept="image/png, image/jpeg, image/jpg" class="form-control-file" required>
                                <input type="file" name="" id="bt_current_file" style="color:white!important;" hidden>
                                <!-- <input type="text" id="sample_data"> -->
                                <img src="" alt="Image preview..." id="bt_compress_image"
                                    style="display:none;width:250px;height:250px;margin:10px;">
                                <a href="" id="bt_image_anchor_tag" target="_blank" style="display:none;">Click To View
                                    Compress Image</a>
                                <!-- New Compress Method End -->
                            </div>

                            <input class="submit-btn" type="button" value="Submit" id="btn_deposit_bank_transfer"
                                onclick="deposit_process()">

                            <div class="reminder-wrap">
                                <span><span class="language" data-translate="reminder">Reminder</span>:</span>
                                <?php echo $Reminderdeposit?>
                            </div>
                        </form>
                    </div>

                    <!-- addbank modal -->
                    <div class="modal fade" id="addbank" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-ab" role="document">
                            <div class="modal-content modal-ab-content">
                                <div class="modal-body modal-body-ab">
                                    <div class="ab-head">
                                        <span class="language" data-translate="add_bank">Add Bank</span>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                        </button>
                                    </div>

                                    <label class="input-label">
                                        <span class="input-label-tx language" data-translate="bank">Bank</span>
                                        <span class="required-tx">*<span class="language"
                                                data-translate="required_select">Required to select</span></span>
                                    </label><br>
                                    <input type="date" class="input-form-ab"><br>

                                    <label class="input-label">
                                        <span class="input-label-tx language" data-translate="account_name">Account
                                            Name</span>
                                        <span class="required-tx">*</span>
                                    </label><br>
                                    <input type="text" class="input-form-ab" value="TAN MEI LING" readonly><br>

                                    <label class="input-label">
                                        <span class="input-label-tx language" data-translate="account_number">Account
                                            No</span>
                                        <span class="required-tx">*<span class="language"
                                                data-translate="required_fill_in">Required to fill in</span></span>
                                    </label><br>
                                    <input type="date" class="input-form-ab"><br>

                                    <button class="submit-btn-ab" type="button">
                                        <span class="language" data-translate="submit">Submit</span>
                                    </button>

                                    <div class="reminder-wrap">
                                        <span><span class="language" data-translate="reminder">Reminder</span>:</span>
                                        <?php if($language == 'th'){
                                        echo'
                                        <p class="tb">1. ชื่อ-นามสกุลต้องตรงกับชื่อผู้ถือบัตรธนาคาร</p>
                                        <p class="tb">2. กรุณาเพิ่มบัตรธนาคารก่อนถอน</p>
                                        ';
                                    }else if($language=="bm"){
                                        echo' <p class="tb">1. Nama akaun bank pengeluaran <span class="red">MESTI</span> dipadankan dengan Nama Penuh yang didaftarkan.</p>
                                        <p class="tb">2. Sila tambah butiran bank sebelum pengeluaran.</p>';
                                    }else if($language=="cn"){
                                        echo' <p class="tb">1. 提款银行账户名称<span class="red">必须</span>与注册全名一致。</p>
                                        <p class="tb">2. 提款前请先添加银行信息。</p>';
                                    }else{
                                        echo' <p class="tb">1. Withdrawal bank account name <span class="red">MUST</span> match with registered Full Name.</p>
                                        <p class="tb">2. Please add Bank Details before withdraw.</p>';
                                    }?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- QRPAY -->
                    <div id="tab3" class="content-pane" style="display: none;">
                        <form class="form-padding" method="post" action="">
                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="qr_method">QR Pay
                                    Method</span>
                                <span class="required-tx ">*<span class="language"
                                        data-translate="required_select">Required to select</span></span>
                            </label>
                            <div class="qrselect-wrap">
                                <div class="qrselection active">
                                    <label>
                                        <input class="bank-button" type="radio" name="t_bank_option2" hidden value="TNGQR" onchange="bank_verify2()">
                                        <img src="../assets/img/tng.png" alt="">
                                    </label>
                                </div>
                                <div class="qrselection">
                                    <label>
                                        <input class="bank-button" type="radio" name="t_bank_option2" hidden value="DUITNOW" onchange="bank_verify2()">
                                        <img src="../assets/img/duitnow.png" alt="">
                                    </label>

                                </div>
                            </div>
                            <input type="text" class="input-form" value="TruePay" id="qrbank_name" >
                            <input type="text" id="selected_bank_code2" name="bCode2" value="No Bank Selected Now" hidden>

                            <label class="input-label">
                                <span class="input-label-tx language" data-translate="qr_amount">QR Pay
                                    Amount</span>
                                <span class="required-tx">*<span class="language"
                                        data-translate="required_fill_in">Required to fill in</span></span>
                            </label>
                            <input type="number" class="input-form" placeholder="Min 30 / Max 30,000" id="qr_pay_amt" name="qr_pay_amt">
                            <br>
                            <div class="button-sel-amount">
                                <input type="button" onclick="ir(this.value);" value="50">
                                <input type="button" onclick="ir(this.value);" value="100">
                                <input type="button" onclick="ir(this.value);" value="300">
                                <input type="button" onclick="ir(this.value);" value="500">
                                <input type="button" onclick="ir(this.value);" value="1000">
                            </div>

                            <!-- <button class="submit-btn-ab" type="submit" id="btn_qr_pay" name="btn_qr_pay" > -->
                                <!-- <span class="language" data-translate="submit">Submit</span> -->
                            <!-- </button> -->
                            <input type="submit" value="submit" id="btn_qr_pay" name="btn_qr_pay" class="submit-btn">
                                <!-- QR Submit Part Start -->
                                <?php
                                    if(isset($_POST['btn_qr_pay']) && !empty($_POST['btn_qr_pay'])) {

                                        //start declaration 
                                        $b_code = "";
                                        if(!empty($_POST['bCode2'])) $b_code = $_POST['bCode2']; 
                                        //   echo $b_code;

                                        $amount = "";
                                        if(!empty($_POST['qr_pay_amt'])) $amount = $_POST['qr_pay_amt'];  
                                        //   echo $amount;
                                        //end declaration

                                        $d_ts = time();

                                        $apiUrl = "https://api.tpm-bo.club/a/getDPLink";
                                        $apiPort = 443;

                                        $new_url = "https://b88mys.com/m/deposit/";
                                        // $new_url = "https://demofg.com/api_test/truepay/sample.php?trx_id=$trxid"."&name=$user_name";
                                        // echo $new_url; exit;
                                        

                                        $dataPost = array(
                                            "mCode" => $merchant_code,
                                            "token" => '',
                                            "ts" => $d_ts,
                                            "bCode" => $b_code,
                                            "amt" => $amount,
                                            "user" => $member_username,
                                            "trxid" => $trxid,
                                            "notifyUrl" => "https://b88mys.com/m/controller/ajax/deposit_process/notifyurl.php",
                                            "webUrl" => $new_url
                                        );

                                        $dataPost['token'] = md5($dataPost['mCode'].'-'.$Secret_key.'-'.$get_deposit_action_name.'-'.$dataPost['ts']);

                                        // $dataPost['token'] = $dataPost['mCode'].'-'.$Secret_key.'-'.$get_deposit_action_name.'-'.$dataPost['ts'];
                                        // $sample_token = $dataPost['mCode'].'-'.$Secret_key.'-'.$get_deposit_action_name.'-'.$dataPost['ts'];

                                        $token=$dataPost['token'];
                                        // echo $token;
                                        //   echo "khai";
                                        // print_r($dataPost);
                                        // echo "<br>";
                                        // exit;

                                        $resp = sendRequest($apiUrl, $apiPort,  $dataPost);

                                        //insert to truepay table
                                        if($member_company_id != "" && $member_id != ""){

                                            $query = "INSERT INTO truepay (f_company_id, f_member_id, f_txn_id, f_amount, f_token, f_ts, f_progress, f_delete, f_modified_time, f_created_time)
                                            VALUES ('$company_id', '$member_id', '$trxid', '$amount', '$token', '$d_ts', 'P', 'R', '$now', '$now')";
                                            $result = mysqli_query($conn, $query);
                                        }
                                    }
                                ?>
                                <!-- QR Submit Part End -->
                            
                        </form>

                    </div>

                </div>

            </div>




        </div>
        <!-- ==== FOOTER ===== -->
        <?php include '../template/footer.php';?>
        <!-- ==== FOOTERLINK =====  -->
        <?php include '../template/footerlink.php';?>
        <!-- SCRIPT -->
        <script>
        document.getElementById("copy_bankname").addEventListener("click", function() {
            copyToClipboardMsg(document.getElementById("bank_account_name"), "msg");
        });

        document.getElementById("copy_banknum").addEventListener("click", function() {
            copyToClipboardMsg(document.getElementById("bank_account_no"), "msg");
        });



        document.getElementById("pasteTarget").addEventListener("mousedown", function() {
            this.value = "";
        });


        function copyToClipboardMsg(elem, msgElem) {
            var succeed = copyToClipboard(elem);
            var msg;
            if (!succeed) {
                msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
            } else {
                msg = "Text copied to the clipboard."
            }
            if (typeof msgElem === "string") {
                msgElem = document.getElementById(msgElem);
            }
            msgElem.innerHTML = msg;
            setTimeout(function() {
                // msgElem.innerHTML = "";
            }, 2000);
        }

        function copyToClipboard(elem) {
            var lang = $('#session_lang').val();
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            if (lang == "bm") {

                Swal.fire({
                    html: "<div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; Copied &nbsp;" +
                        target.value + "</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'center',
                    type: "success"
                })


            } else if (lang == "cn") {

                Swal.fire({
                    html: "<div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; 复制 &nbsp;" +
                        target.value + "</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'center',
                    type: "success"
                })

            } else {


                Swal.fire({
                    html: "<div class='swal-alert'><i class='green fas fa-check-circle'></i> &nbsp; Copied &nbsp;" +
                        target.value + "</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                    position: 'center',
                    type: "success"
                })


            }

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
        </script>
        <!-- copy function end -->
        <!-- file detect value -->
        <script>
        $(function() {
            $('input[type="file"]').change(function() {
                if ($(this).val() != "") {
                    $(this).css('color', '#fff');
                } else {
                    $(this).css('color', 'transparent');
                }
            });
        })
        </script>
        <!-- addbank button -->
        <script>
        function addbankbtn() {
            location.replace("../bankingdetails")
        }
        </script>
        <script>
        var selector1 = ".bank-sel";
        $(selector1).on('click', function() {
            $(selector1).removeClass('active');
            $(this).addClass('active');
        });
        </script>
        <script>
        var selector2 = ".bank-sel-t";
        $(selector2).on('click', function() {
            $(selector2).removeClass('active');
            $(this).addClass('active');
        });

        $(document).ready(function() {
            var activeBank = $('.bank-sel-t');
            if (activeBank.hasClass('active')) {
                testFunction(activeBank.children('.bank-radiobtn').val());
            } else {

            }
        });
        </script>
        <script>
        var selector3 = ".qrselection";
        $(selector3).on('click', function() {
            $(selector3).removeClass('active');
            $(this).addClass('active');
        });
        </script>

        <script>
        function ik(val) {
            document.getElementById('amount2').value = val;
        }

        function iq(val) {
            document.getElementById('quickpay_amount').value = val;
        }

        function ir(val) {
            document.getElementById('qr_pay_amt').value = val;
        }
        </script>

        <script>
        'use strict';

        const Tabs = {
            init() {
                let promise = $.Deferred();
                this.$tabs = $('ul.nav-tabs');
                this.checkHash();
                this.bindEvents();
                return promise;
            },

            checkHash() {
                if (window.location.hash) {
                    this.toggleTab(window.location.hash);
                }
            },

            toggleTab(tab) {
                // targets
                var $paneToHide = $(tab).closest('.funds-wrap').find('div.content-pane').filter('.is-active'),
                    $paneToShow = $(tab),
                    $tab = this.$tabs.find('a[href="' + tab + '"]');

                // toggle active tab
                $tab.closest('li').addClass('active').siblings('li').removeClass('active');

                // toggle active tab content
                $paneToHide.removeClass('is-active').addClass('is-animating is-exiting');
                $paneToShow.addClass('is-animating is-active');
            },

            showContent(tab) {

            },

            animationEnd(e) {
                $(e.target).removeClass('is-animating is-exiting');
            },

            tabClicked(e) {
                e.preventDefault();
                this.toggleTab(e.target.hash);
            },

            bindEvents() {
                // show/hide the tab content when clicking the tab button
                this.$tabs.on('click', 'a', this.tabClicked.bind(this));

                // handle animation end
                $('div.content-pane').on('transitionend webkitTransitionEnd', this.animationEnd.bind(this));
            },


        }

        Tabs.init();
        </script>

        <script>
        bank_verify();
        bank_verify2();
        function bank_verify() {

            t_bank_code = $('input[name=t_bank_option]:checked').val();
            console.log(t_bank_code)
            bank_code_name = '';

            if (t_bank_code === 'MBB') {
                // console.log("here")
                bank_code_name = 'Maybank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('MBB');

            } else if (t_bank_code === 'CIMB') {

                bank_code_name = 'CIMB Bank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('CIMB');

            } else if (t_bank_code === 'HLB') {

                bank_code_name = 'Hong Leong Bank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('HLB');

            } else if (t_bank_code === 'PBB') {

                bank_code_name = 'Public Bank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('PBB');

            } else if (t_bank_code === 'RHB') {

                bank_code_name = 'RHB Bank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('RHB');

            } else if (t_bank_code === 'AMBANK') {

                bank_code_name = 'AM Bank'
                $('#t_selected_bank').val(bank_code_name);
                $('#selected_bank_code').val('AMBANK');

            }

        };

        function bank_verify2() {
            // console.log('asdasd')
            t_bank_code = $('input[name=t_bank_option2]:checked').val();
            // console.log(t_bank_code)

            if (t_bank_code === 'TNGQR') {
                console.log("here1")
                bank_code_name = 'TnG QR'
                $('#qrbank_name').val(bank_code_name);
                $('#selected_bank_code2').val(t_bank_code);

            } else if (t_bank_code === 'DUITNOW') {

                bank_code_name = 'DuitNow QR'
                $('#qrbank_name').val(bank_code_name);
                $('#selected_bank_code2').val(t_bank_code);

            }

        }
        </script>

        <script>
        function testFunction(str) {
            // console.log(str);
            $.ajax({
                type: "GET",
                url: "../controller/ajax/check_bank_details/index.php",
                data: 'bank_id=' + str,

                success: function(data) {
                    var data = JSON.parse(data);
                    // console.log(data);
                    // var bank_name = data.bank_name;
                    // var bank_acc = data.bank_account_name;
                    // var bank_no = data.bank_account_no;

                    // console.log(data.bank_name);
                    // console.log(data.bank_account_name);
                    // console.log(data.bank_account_no);

                    $('#bank_name').val(data.bank_name);
                    $('#bank_account_name').val(data.bank_account_name);
                    $('#bank_account_no').val(data.bank_account_no);
                    // $('#bank_name').val(bank_name);
                    // $('#bank_account_name').val(bank_account_name);
                    // $('#bank_account_no').val(bank_no);
                }
            });
        };
        </script>

        <!-- For Iphone Function Start -->
        <script>
        function iphone_photo_rotation_adjust(file, MAX_WIDTH, MAX_HEIGHT, QUALITY, ver_name, mime_type) {
            return new Promise(function(resolve, reject) {


                EXIF.getData(file, function() {

                    console.log("Entering EXIF")
                    var orientation = this.exifdata.Orientation
                    // case 1: normal
                    // case 2: horizontal flip 
                    // case 3: 180° rotate left 
                    // case 4: vertical flip 
                    // case 5: vertical flip + 90 rotate right 
                    // case 6: 90° rotate right 
                    // case 7: horizontal flip + 90 rotate right 
                    // case 8: 90° rotate left 
                    // iphone photo has 1 3 6 8

                    var data_url = URL.createObjectURL(file)

                    var img = document.createElement('img')
                    img.src = data_url

                    var canvas = document.createElement('canvas')
                    var ctx = canvas.getContext('2d')

                    img.onload = function() {

                        var result_width, result_height
                        // if(max_width_or_height&&(img.width>max_width_or_height||img.height>max_width_or_height)){
                        if (img.width > img.height) {
                            var ratio = MAX_WIDTH / img.width
                            // var ratio=max_width_or_height/img.width
                            result_width = img.width * ratio
                            result_height = img.height * ratio
                        } else {
                            // var ratio=max_width_or_height/img.height
                            var ratio = MAX_HEIGHT / img.height
                            result_width = img.width * ratio
                            result_height = img.height * ratio
                        }
                        // }
                        // else{
                        //     result_width=img.width
                        //     result_height=img.height
                        // }

                        // var w_ratio=img.width/MAX_WIDTH;
                        // var h_ratio=img.height/MAX_HEIGHT;
                        // result_width=img.width*w_ratio
                        // result_height=img.height*h_ratio
                        // result_width=MAX_WIDTH
                        // result_height=MAX_HEIGHT

                        // alert("result_width2: "+result_width+" ,result_height2: "+result_height);
                        // alert("Current orientation: "+orientation);

                        if (orientation == "") {
                            canvas.width = result_height
                            canvas.height = result_width
                            ctx.translate(result_height, 0)
                            ctx.rotate(Math.PI / 2);
                        }

                        if (orientation === 3) {
                            canvas.width = result_width
                            canvas.height = result_height
                            ctx.translate(result_width, result_height)
                            ctx.rotate(Math.PI);
                        } else if (orientation === 6) {

                            // alert("Current version : "+ver_name);
                            var ver_num = ver_name.split(" ")[1];
                            // alert("Current version number : "+ver_num);

                            // Iphone Lower Version (Below Iphone X) Start
                            if (ver_num <= 12) {
                                // alert("I'm in");
                                canvas.width = result_height
                                canvas.height = result_width
                                ctx.translate(result_height, 0)
                                ctx.rotate(Math.PI / 2);

                            }
                            // Iphone Lower Version (Below Iphone X) End
                            // Iphone X Version Start
                            else {
                                canvas.width = result_width
                                canvas.height = result_height
                            }
                            // Iphone X Version End

                        } else if (orientation === 8) {
                            canvas.width = result_height
                            canvas.height = result_width
                            ctx.translate(0, result_width)
                            ctx.rotate(-Math.PI / 2);
                        } else {
                            canvas.width = result_width
                            canvas.height = result_height
                        }
                        ctx.drawImage(img, 0, 0, result_width, result_height)

                        mime_type = mime_type || 'image/png'
                        canvas.toBlob(function(blob) {
                            resolve(blob)
                        }, mime_type, QUALITY)
                    }

                    if (img.complete) {
                        img.onload()
                    }

                })
            })
        }
        </script>
        <!-- For Iphone Function End -->

        <!-- Bank Transfer New Compress Image Start -->
        <script>
            var bt_fd = new FormData();
            var MIME_TYPE = "";
            var QUALITY = "";
            var session = $('#session_lang').val();

            // Image Input Start
            var input = document.getElementById("bt_ori_image");
            // Image Input End

            input.onchange = function(ev) {

                overlay_icon();
                // Get File And Generate To Blob Start
                var file = ev.target.files[0];
                var file2 = $('#bt_ori_image')[0].files[0];
                const blobURL = URL.createObjectURL(file);
                var img = new Image();
                img.src = blobURL;
                img.onerror = function() {
                    URL.revokeObjectURL(this.src);
                    // Handle the failure properly
                    // console.log("Cannot load image");
                    msg = "<span id=deposit_msg9 class=language>Wrong Image Type. Please Try Another One.</span>";
                    $('#bt_ori_image').val("");
                    swal_lang(msg, session);
                    img = "";
                    // console.log("here")
                    complete_overlay_icon();

                };

                img.onload = function() {
                    var height = this.height;
                    var width = this.width;
                    var FileSize = file.size;
                    var FileType = file.type;
                    var FileValue = $('#bt_ori_image').val();
                    var MIME_TYPE = openFile(FileValue);

                    // console.log("File Value: "+FileValue)
                    // console.log("Current_file_type: "+MIME_TYPE)
                    // console.log("Current_height: "+height);
                    // console.log("Current_width: "+width);
                    // console.log("Original_size: "+FileSize);
                    // console.log("Current_type: "+FileType);
                    // alert("current_image_size : w-"+width+", h-"+height);

                    if (MIME_TYPE == "1") {
                        if (session == "th") {
                            msg = "ประเภทรูปภาพไม่ถูกต้อง โปรดลองอันอื่น";
                        } else {
                            msg = "Wrong Image Type. Please Try Another One";
                        }
                        $('#bt_ori_image').val("");
                        swal_lang(msg, session);
                        img = "";
                        complete_overlay_icon();
                    }

                    if (FileSize >= 8000000) {

                        // msg = "Image size(mobile) exceeds 8MB, file will not be uploaded.";
                        // alert(msg);
                        msg = "<span id=deposit_msg8 class=language>Image size(mobile) exceeds 8MB, file will not be uploaded.</span>"

                        $('#bt_ori_image').val('');
                        img = "";
                        swal_lang(msg, session);
                        complete_overlay_icon();

                    } else {
                        QUALITY = 0.9;
                    }
                    console.log("Current quality: " + QUALITY)

                    var divider = "";
                    var h_divider = "";
                    var w_divider = "";

                    if (width >= 5000) {
                        w_divider = 16
                    } else if (width >= 4500) {
                        w_divider = 12
                    } else if (width >= 4000) {
                        w_divider = 11
                    } else if (width >= 3500) {
                        w_divider = 10
                    } else if (width >= 3000) {
                        w_divider = 8
                    } else if (width >= 2500) {
                        w_divider = 7
                    } else if (width >= 2000) {
                        w_divider = 6
                    } else if (width >= 1500) {
                        w_divider = 4
                    } else if (width >= 1000) {
                        w_divider = 3.5
                    } else if (width <= 600) {
                        w_divider = 1
                    } else {
                        w_divider = 2
                    }

                    if (height >= 5500) {
                        h_divider = 14
                    } else if (height >= 5000) {
                        h_divider = 11
                    }
                    // else if (height >= 4500){ h_divider = 9}
                    else if (height >= 4000) {
                        h_divider = 9
                    } else if (height >= 3000) {
                        h_divider = 7
                    } else if (height >= 2500) {
                        h_divider = 4
                    } else if (height >= 2300) {
                        h_divider = 3
                    } else if (height >= 2000) {
                        h_divider = 2
                    } else if (height <= 1200) {
                        h_divider = 1
                    } else {
                        h_divider = 2
                    }

                    // if(width >= 5000){ w_divider = 16 }
                    // else if (width >= 4500){ w_divider = 12}
                    // else if (width >= 3500){ w_divider = 10}
                    // else if (width >= 3000){ w_divider = 8}
                    // else if (width >= 2500){ w_divider = 7}
                    // else if (width >= 2000){ w_divider = 6}
                    // else if (width >= 1500){ w_divider = 4}
                    // else if (width <= 600){ w_divider = 1}
                    // else { w_divider = 2 }

                    // if(height >= 5000){ h_divider = 11 }
                    // // else if (height >= 4500){ h_divider = 9}
                    // else if (height >= 4000){ h_divider = 9}
                    // else if (height >= 3000){ h_divider = 7}
                    // else if (height >= 2500){ h_divider = 5}
                    // // else if (height >= 2000){ h_divider = 4}
                    // // else if (height >= 1500){ h_divider = 3}
                    // else if (height <= 1500){ h_divider = 1}
                    // else { h_divider = 2 }

                    // if(height >= 5600 && width >= 4200){
                    //     w_divider = 8;
                    //     h_divider = 7;
                    // }

                    var MAX_WIDTH = width / w_divider;
                    var MAX_HEIGHT = height / h_divider;
                    // alert("H_Divider: "+h_divider+", W_Divider: "+w_divider);
                    // console.log(navigator.platform);
                    var current_platform = navigator.platform;
                    // alert("Current OS: "+current_platform);

                    navigator.sayswho = (function() {
                        var ua = navigator.userAgent,
                            tem,
                            M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) ||
                            [];
                        if (/trident/i.test(M[1])) {
                            tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
                            return 'IE ' + (tem[1] || '');
                        }
                        if (M[1] === 'Chrome') {
                            tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
                            if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
                        }
                        M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
                        if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
                        return M.join(' ');
                    })();
                    var ver_name = navigator.sayswho;
                    // console.log("Current version: "+ver_name);
                    // alert("Current version: "+ver_name);

                    // IOS Version Start
                    if (current_platform == "iPhone" || current_platform == "MacIntel") {

                        if (FileSize <= 500000) {
                            MAX_WIDTH = 700;
                            MAX_HEIGHT = 700;
                        } else if (FileSize <= 1000000 && width >= 1500 && height >= 2500) {
                            MAX_WIDTH = 550;
                            MAX_HEIGHT = 550;
                        } else if (FileSize <= 1000000 && width <= 1500 && height <= 2800) {
                            MAX_WIDTH = 750;
                            MAX_HEIGHT = 750;
                        } else if (FileSize <= 2000000 && width >= 3300 && height >= 2500) {
                            MAX_WIDTH = 480;
                            MAX_HEIGHT = 480;
                        } else if (FileSize <= 2000000 && width <= 1200 && height <= 2500) {
                            MAX_WIDTH = 815;
                            MAX_HEIGHT = 815;
                        } else if (FileSize <= 2000000 && width <= 3300 && height <= 2500) {
                            MAX_WIDTH = 500;
                            MAX_HEIGHT = 500;
                        } else if (FileSize <= 3000000 && width <= 1500 && height <= 2800) {
                            MAX_WIDTH = 580;
                            MAX_HEIGHT = 580;
                        } else if (FileSize <= 5000000 && width <= 3500 && height <= 4500) {
                            MAX_WIDTH = 550;
                            MAX_HEIGHT = 550;
                        } else if (FileSize <= 6000000 && width >= 2500 && height >= 2500) {
                            MAX_WIDTH = 400;
                            MAX_HEIGHT = 400;
                        }
                        // else if(FileSize <= 7000000 && width <= 2900 && height <= 3100){
                        //     MAX_WIDTH = 500;
                        //     MAX_HEIGHT = 500;
                        // }
                        else if (FileSize <= 8000000 && width <= 3100 && height <= 4100) {
                            MAX_WIDTH = 500;
                            MAX_HEIGHT = 500;
                        } else if (FileSize <= 7000000) {
                            MAX_WIDTH = 350;
                            MAX_HEIGHT = 350;
                        } else {

                            if (width <= 1200 && height <= 1200) {
                                MAX_WIDTH = 300;
                                MAX_HEIGHT = 450;
                            } else if (width >= 600 && height >= 1200) {
                                MAX_WIDTH = 300;
                                MAX_HEIGHT = 450;
                            } else if (width >= 1000 && height >= 2300) {
                                MAX_WIDTH = 400;
                                MAX_HEIGHT = 550;
                            } else if (width >= 1400 && height >= 2700) {
                                MAX_WIDTH = 300;
                                MAX_HEIGHT = 450;
                            } else if (width >= 3200 && height >= 2400) {
                                MAX_WIDTH = 400;
                                MAX_HEIGHT = 400;
                            } else {
                                MAX_WIDTH = 600;
                                MAX_HEIGHT = 500;
                            }

                        }

                        // alert("Iphone Bitch");

                        // alert("Current image size: "+FileSize);
                        // alert("MAX_WIDTH: "+MAX_WIDTH+", MAX_HEIGHT: "+MAX_HEIGHT);

                        iphone_photo_rotation_adjust($('#bt_ori_image')[0].files[0], MAX_WIDTH, MAX_HEIGHT, QUALITY,
                            ver_name, MIME_TYPE).then(function(blob) {
                            console.log("Current data: " + blob);
                            var current_url = URL.createObjectURL(blob);
                            $("#bt_compress_image").attr("src", current_url);
                            $("#bt_compress_image").css("display", "block");

                            var new_date = new Date().getTime();
                            var new_file_name = new_date + "." + MIME_TYPE;
                            console.log("Current_file_name: " + new_file_name);

                            let file2 = new File([blob], new_file_name, {
                                type: "mime/type",
                                lastModified: new Date().getTime()
                            });
                            bt_fd.append('file', file2);
                            complete_overlay_icon();

                        })

                    }
                    // IOS Version End
                    // Android Version Start
                    else {

                        // alert("Android Dick");

                        // console.log("New_height: "+MAX_HEIGHT);
                        // console.log("New_width: "+MAX_WIDTH);

                        URL.revokeObjectURL(this.src);
                        const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                        const canvas = document.createElement("canvas");
                        canvas.width = newWidth;
                        canvas.height = newHeight;
                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(img, 0, 0, newWidth, newHeight);
                        canvas.toBlob(
                            (blob) => {

                                // View In Anchor Tag Start
                                let link = document.getElementById("bt_image_anchor_tag");
                                // link.download = origin_name;
                                link.href = URL.createObjectURL(blob);
                                // View In Anchor Tage End

                                // View In Normal Input Start
                                var current_url = URL.createObjectURL(blob);
                                // $('#current_data').val(current_url);
                                // console.warn("Current_file_size: "+blob.size)
                                // document.getElementById("root").append(link);
                                // View In Normal Input End

                                // Attach Image Start
                                // document.getElementById("bt_compress_image").src = current_url;
                                $("#bt_compress_image").attr("src", current_url);
                                // Attach Image End

                                // Show Image And Link Start
                                // $("#image_anchor_tag").css("display", "block");
                                // $("#compress_image").css("display", "block");
                                // Show Image And Link End

                                var new_date = new Date().getTime();
                                var new_file_name = new_date + "." + MIME_TYPE;
                                console.log("Current_file_name: " + new_file_name);

                                let file2 = new File([blob], new_file_name, {
                                    type: "mime/type",
                                    lastModified: new Date().getTime()
                                });
                                // $('#sample_data').val(current_url);
                                // var exif = EXIF.readFromBinaryFile(new BinaryFile(blob));
                                // console.log("exif: "+exif)
                                bt_fd.append('file', file2);
                                // for(var pair of bt_fd.entries()) {
                                //     console.log(pair[0]+ ', '+ pair[1]);
                                // }
                                // alert("File2: "+file2);
                                // console.log("File2: "+file2);

                                // let container = new DataTransfer();
                                // container.items.add(file2);
                                // let fileInputElement = document.getElementById('bt_current_file');
                                // fileInputElement.files = container.files;

                                // console.log("Container file: "+container.files);
                                // alert("Container file: "+container.files);
                                // console.log("Current file: "+fileInputElement.files);
                                // alert("Current file: "+fileInputElement.files);
                                // $("#bt_current_file").val(container.files);
                                // console.log(fileInputElement.file)
                                // alert("Quality: "+QUALITY+", H_Divider: "+h_divider+", W_Divider: "+w_divider);
                                $("#bt_compress_image").css("display", "block");
                                complete_overlay_icon();
                                // link.click();

                                // var hidden_elem = document.getElementById("blob_data");
                                // hidden_elem.value = URL.createObjectURL(blob);

                            },
                            MIME_TYPE,
                            QUALITY
                        );
                        // document.getElementById("root").append(canvas);
                        // document.getElementById("current_data").append(canvas.toDataURL());

                    }
                    // Anroid Version End

                };
                // Get File And Generate To Blob End
            };

            // Compress To Specific Size Start
            function calculateSize(img, maxWidth, maxHeight) {
                let width = img.width;
                let height = img.height;

                // calculate the width and height, constraining the proportions
                // if (width > height) {
                //     if (width > maxWidth) {
                //         height = Math.round((height * maxWidth) / width);
                //         width = maxWidth;
                //     }
                // } else {
                //     if (height > maxHeight) {
                //         width = Math.round((width * maxHeight) / height);
                //         height = maxHeight;
                //     }
                // }
                width = maxWidth;
                height = maxHeight;
                return [width, height];
            }
            // Compress To Specific Size End

            // Check File Type Start
            function openFile(file) {
                var extension = file.substr((file.lastIndexOf('.') + 1));
                switch (extension) {
                    case 'jpg':
                        return 'jpg'
                        break;
                    case 'png':
                        return 'png'
                        break;
                    case 'jpeg':
                        return 'jpeg'
                        break;
                    default:
                        return '1'
                }
            };
            // Check File Type End
        </script>
        <!-- Bank Transfer New Compress Image End -->

        <!-- Bank Transfer Function Start -->
        <script>
        var session = $('#session_lang').val();


        function deposit_process() {
            var member_id = "<?=$member_id?>";
            var image_data = $('#bt_ori_image')[0].files[0];
            // console.log("Current Image Data: "+image_data);

            // var deposit_amount = $('#amount2').val();
            var deposit_amount = document.getElementById("amount2");
            var bank_value = $('input[name="bank_transfer_option"]:checked').val();
            var method = $('#bt_selector').val();
            var image_path = $('#textarea1').val();
            var return_message = "";
            // console.log(image_path)
            // console.log(session);

            if (member_id != '0' && member_id != '' && member_id != null) {
                // Check Deposit Amount Empty Start
                if (deposit_amount.value != '' && deposit_amount.value != null) {

                    // Check Deposit Amount Step Start
                    if (!deposit_amount.validity.stepMismatch) {

                        // Check Deposit Amount Min Start
                        if (!deposit_amount.validity.rangeUnderflow) {

                            // Check Deposit Amount Max Start
                            if (!deposit_amount.validity.rangeOverflow) {

                                // Check Selected Methods Start
                                if (method != '' && method != null) {

                                    // Check Bank Value Start
                                    if (bank_value != '' && bank_value != null) {

                                        // Check Image Path Start
                                        if (image_data != '' && image_data != null) {
                                            overlay_icon()

                                            bt_fd.append('deposit_amount', deposit_amount.value);
                                            bt_fd.append('bank_value', bank_value);
                                            bt_fd.append('method', method);
                                            // bt_fd.append('file', image_data);

                                            // Deposit Ajax Start
                                            $.ajax({
                                                url: '../controller/ajax/deposit_process/deposit.php',
                                                type: 'POST',
                                                data: bt_fd,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                beforeSend: function() {
                                                    console.log("deposit - ok");

                                                },
                                                dataType: 'json',
                                                timeout: (90 * 1000),
                                                error: function(textstatus) { // if error occured
                                                    if (textstatus === "timeout") {
                                                        return_message =
                                                            "<span>Error occured please try again.</span>";
                                                        swal_lang(return_message, session)
                                                        complete_overlay_icon()
                                                        // ("got timeout");
                                                    } else {
                                                        complete_overlay_icon()
                                                        console.log("none error occured")
                                                        // alert(textstatus);
                                                    }
                                                    // console.log(xhr.statusText + xhr.responseText);
                                                },
                                                success: function(response) {
                                                    return_message = response.return_msg;
                                                    reload_verify = response.location;
                                                    swal_lang(return_message, session,reload_verify) // swal_lang(session)
                                                    complete_overlay_icon()

                                                }

                                            });
                                            // Deposit Ajax End

                                        } else {

                                            return_message =
                                                "<span id='deposit_msg3' class=language>Receipt is required to upload for checking purposes.</span>";
                                            swal_lang(return_message, session);

                                        }
                                        // Check Image Path End

                                    } else {

                                        return_message =
                                            "<span id='public_6' class=language>Please select bank.</span>";
                                        swal_lang(return_message, session);

                                    }
                                    // Check Bank Value End

                                } else {

                                    return_message = "<span id='ajax_1' class=language>Please select channel.</span>";
                                    swal_lang(return_message, session);

                                }
                                // Check Selected Methods End

                            } else {

                                return_message =
                                    "<span id='deposit_msg5' class='language'>Maximum deposit is MYR 30,000.</span>";
                                swal_lang(return_message, session);

                            }
                            // Check Deposit Amount Max End

                        } else {

                            return_message =
                                "<span id='deposit_msg2' class='language'>Minimum deposit is MYR 30.</span>";
                            swal_lang(return_message, session);

                        }
                        // Check Deposit Amount Min End

                    } else {

                        return_message = "<span id='public_3' class=language>Amount format wrong! Exp: 100.00</span>";
                        swal_lang(return_message, session);

                    }
                    // Check Deposit Amount Step End

                } else {
                    // console.log("here")
                    return_message = "<span id='public_2' class=language>Amount cannot be empty. </span>";
                    swal_lang(return_message, session);

                }
                // Check Deposit Amount Empty End
            } else {
                return_message = "<span id='public_1' class=language>Member id not found</span>";
                swal_lang(return_message, session);
            }

        }
        </script>
        <!-- Bank Transfer Function End -->

        <!-- Truepay Velidate Bank Selection Start -->
        <script>
        function truepay_verify() {

            var select_amount = document.getElementById("quickpay_amount");
            var select_bank = $('#selected_bank_code').val();
            var method = $('#tp_method').val();
            var session = $('#session_lang').val();

            // Check Selected Methods Start
            if (method != '' && method != null) {

                // Check Deposit Amount Empty Start
                if (select_amount.value != '' && select_amount.value != null) {

                    // Check Deposit Amount Step Start
                    if (!select_amount.validity.stepMismatch) {

                        // Check Deposit Amount Min Start
                        if (!select_amount.validity.rangeUnderflow && select_amount.value >= 30) {

                            // Check Deposit Amount Max Start
                            if (!select_amount.validity.rangeOverflow && select_amount.value <= 30000) {

                                // Check Bank Value Start
                                if (select_bank != '' && select_bank != null && select_bank.length != 0) {

                                    return true;

                                } else {

                                    return_message = "<span id=public_6 class=language>Please select bank.</span>";
                                    swal_lang(return_message, session)
                                    return false;

                                }
                                // Check Bank Value End

                            } else {

                                return_message =
                                    "<span id='deposit_msg7' class='language'>Maximum deposit is RM 30,000.</span>";
                                swal_lang(return_message, session)
                                return false;

                            }
                            // Check Deposit Amount Max End

                        } else {

                            return_message =
                                "<span id='deposit_msg6' class='language'>Minimum deposit is RM 30.</span>";
                            swal_lang(return_message, session)
                            return false;

                        }
                        // Check Deposit Amount Min End

                    } else {

                        return_message = "<span id=public_3 class=language>Amount format wrong! E.g.: 100.00</span>";
                        swal_lang(return_message, session)
                        return false;

                    }
                    // Check Deposit Amount Step End

                } else {

                    return_message = "<span id=public_2 class=language>Amount cannot be empty.</span>";
                    swal_lang(return_message, session)
                    return false;

                }
                // Check Deposit Amount Empty End

            } else {

                return_message = "<span id=ajax_1 class=language>Please select method.</span>";
                swal_lang(return_message, session)
                return false;
            }
            // Check Selected Methods End

        }
        </script>
    <!-- Truepay Velidate Bank Selection End -->
    
    <script>
        // QRPAY Verify Start
        function qr_pay_process(){

            select_amount = $('#qr_pay_amt').val();
            select_bank = $('#selected_bank_code2').val();
            // console.log("select bank: "+select_bank);
            // if(typeof select_bank === 'undefined') {
            //   select_bank = "";
            // }
            alert(selected_bank);
            var session = $('#session_lang').val();

            if ((select_amount != '' && select_bank == "") || (select_amount == "" && select_bank == "")) {

            let msg = "";

            if (session == "cn") {

                msg = "请选择银行。";

            } else if (session == "bm") {

                msg = "Sila pilih bank.";

            } else {

                msg = "Please select bank.";

            }

            swal({
                text: msg,
                type: "success"
            }).then(function () {
                return false;
            });
            return false;

            } else if (select_amount == '' && select_bank != "") {

            let msg = "";

            if (session == "cn") {

                msg = "请输入款额。";

            } else if (session == "bm") {

                msg = "Sila masukkan jumlah.";

            } else {

                msg = "Please enter amount.";

            }

            swal({
                text: msg,
                type: "success"
            }).then(function () {
                return false;
            });
            return false;

            } else if (select_amount != '' && select_amount < 30 && select_bank != "") {

            let msg = "";

            if (session == "cn") {

                msg = "输入款额不能低于RM 30。";

            } else if (session == "bm") {

                msg = "Jumlah masukkan tidak boleh lebih rendah daripada RM 30.";

            } else {

                msg = "Enter amount cannot lower than RM 30.";

            }

            swal({
                text: msg,
                type: "success"
            }).then(function () {
                return false;
            });
            return false;

            } else if (select_amount > 30000 && select_bank != "") {

            let msg = "";

            if (session == "cn") {

                msg = "款额输入不能高于RM 30,000。";

            } else if (session == "bm") {

                msg = "Jumlah masukkan tidak boleh melebihi RM 30,000.";

            } else {

                msg = "Enter amount cannot more than RM 30,000.";

            }

            swal({
                text: msg,
                type: "success"
            }).then(function () {
                return false;
            });
            return false;
            }

        }
        // QRPAY Verify End        
    </script>
</body>

</html>