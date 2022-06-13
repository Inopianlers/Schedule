<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../template/head.php';?>
    <?php include '../template/check_member_login.php';?>
    <style>
    .hidden {
        display: none;
    }

    body {

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
        <!-- ==== WALLET ===== -->
        <?php include '../template/wallet.php';?>

        <!--  -->
        <div class="ac-tr">
            <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
            <label class="ac-label language" for="ac-1" data-translate="Game_Balance">Game Balance</label>
            <article class="ac-text">
                <div class="refresh-tr-btn"><i onclick="window.location.reload();" class="far fa-sync-alt"
                        aria-hidden="true"></i></div>
                <!-- loop here -->
                <div class="ac-sub">
                    <input class="ac-input" id="ac-3" name="ac-3" type="checkbox" />

                    <?php
                            $query_wallets = "SELECT wc.f_id, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p ON wc.f_id = p.f_wallet_code WHERE wc.f_delete='N' and wc.f_id != '1' AND p.f_status != 'M'";
                            $result_wallets = mysqli_query($conn, $query_wallets);
                            $num_wallets = mysqli_num_rows($result_wallets);
                            // echo $num_wallets;
                            if($num_wallets > 0){
                                while($row_wallets = mysqli_fetch_array($result_wallets)){
                                    $wallet_id = $row_wallets['f_id'];
                                    $wallet_name = $row_wallets['f_wallet_name'];

                                    // if($wallet_id == 2 || $wallet_id == 3 || $wallet_id == 5 || $wallet_id == 6 || $wallet_id == 7 || $wallet_id == 8 || $wallet_id == 12 || $wallet_id == 33 || $wallet_id == 43){
                                        echo 
                                        "
                                        <label class='ac-ns-label' for='ac-3'>
                                            <div class='ac-ns-lf'>
                                                <span>$wallet_name</span>
                                            </div>
                                            <div class='ac-ns-rg'>
                                                <span class='rb-amt' id='game_$wallet_id'>0.00</span>
                                                <button class='btn_all_in' id='selected_$wallet_id'>
                                                    <span class='language' data-translate='all_in'>ALL IN</span>
                                                </button>
                                            </div>
                                        </label>                              
                                        ";
                                    // }else{

                                    // }

                                }
                            }                                       
                    ?>
                    <!-- sub -->
                    <!-- <article class="ac-sub-text">
                        <label class="input-label">
                            <span class="input-label-tx language">Transfer Amount</span>
                            <span class="required-tx">*</span>
                        </label>
                        <input type="number" class="input-form" min="1" step="0.01" id="transfer_inputamount"
                            onkeypress="return event.keyCode === 8 || event.charCode >= 46 && event.charCode <= 57"
                            name="amount" value="" min="1" required>
                        <br>
                        <label class="input-label">
                            <span class="input-label-tx language">Promotion</span>
                            <span class="required-tx">*<span class="language">Optional</span></span>
                        </label>
                        <select class="input-form" id="transfer_promotion_show" name="promotion"
                            onchange="checkfreebet()">
                            <option value="" disabled selected></option>
                        </select>
                        <br>
                        <input class="submit-btn mb-3" type="submit" value="Submit" id="btn_transfer_submit"
                            name="transfer_submit">
                    </article> -->

                </div>
            </article>
        </div>
        <!--/ac-->

        <!-- Transfer form -->
        <form class="form-padding">
            <input type="text" id="transfer_type" name="transfer_type" hidden readonly>

            <label class="input-label">
                <span class="input-label-tx language" data-translate="transfer_from">Transfer From</span>
                <span class="required-tx">*<span class="language" data-translate="required_select">Required to
                        select</span></span>
            </label>

            <select class="input-form" id="from_wallet" name="from_wallet" onchange="changetype()">
                <option value="" class="language pselect"></option>
                <option class="" value="1">Main Wallet</option>
                <?php
                $query_wallets = "SELECT wc.f_id, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p on wc.f_id = p.f_wallet_code WHERE wc.f_delete='N' AND p.f_status = 'N' AND p.f_delete = 'N'";
                $result_wallets = mysqli_query($conn, $query_wallets);
                $num_wallets = mysqli_num_rows($result_wallets);

                if($num_wallets > 0){
                    while($row_wallets = mysqli_fetch_array($result_wallets)){
                    $wallet_id_from = $row_wallets['f_id'];
                    $wallet_name_from = $row_wallets['f_wallet_name'];
                // if($wallet_id_from == 1 || $wallet_id_from == 2 || $wallet_id_from == 3 || $wallet_id_from == 5 || $wallet_id_from == 6 || $wallet_id_from == 7 || $wallet_id_from == 8 || $wallet_id_from == 12 || $wallet_id_from == 33 ||$wallet_id_from == 43){
                //     $hide_game_from = "";

                // }else{
                //     $hide_game_from = "hide";
                // }
                echo '<option class="'.$hide_game_from.'" value="'.$wallet_id_from.'">'.$wallet_name_from.'</option>';

                    }
                }
            ?>
            </select>
            <br>

            <label class="input-label d-flex align-items-end justify-content-between pt-0">
                <div>
                    <span class="input-label-tx language" data-translate="transfer_to">Transfer To</span>
                    <span class="required-tx">*<span class="language" data-translate="required_select">Required to
                            select</span></span>
                </div>
                <div>
                    <button class="swap-btn">
                        <i class="far fa-sort-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </label>

            <select class="input-form" name="to_wallet" id="to_wallet" onchange="check_promo();changetype()">
                <option value="" class="language pselect"></option>
                <option class="" value="1">Main Wallet</option>

                <?php

                    $query_wallets1 = "SELECT wc.f_id, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p on wc.f_id = p.f_wallet_code WHERE wc.f_delete='N' AND p.f_status = 'N' AND p.f_delete = 'N'";
                    $result_wallets1 = mysqli_query($conn, $query_wallets1);
                    $num_wallets1 = mysqli_num_rows($result_wallets1);

                    if($num_wallets1 > 0){
                        while($row_wallets1 = mysqli_fetch_array($result_wallets1)){
                        $wallet_id_to = $row_wallets1['f_id'];
                        $wallet_name_to = $row_wallets1['f_wallet_name'];

                        echo '<option class="" value="'.$wallet_id_to.'">'.$wallet_name_to.'</option>';

                        }
                        
                    }
                ?>
            </select>
            <br>

            <label class="input-label">
                <span class="input-label-tx language" data-translate="transfer_amount">Transfer Amount</span>
                <span class="required-tx">*<span class="language" data-translate="required_fill_in">Required to fill
                        in</span></span>
            </label>
            <input type="number" class="input-form" step="0.01" min="0.1" id="amount_place_lang"
                onkeypress="return event.keyCode === 8 || event.charCode >= 46 && event.charCode <= 57" name="amount"
                placeholder=""> <br>

            <label class="input-label" id="promo_label">
                <span class="input-label-tx language" data-translate="promotion">Promotion</span>
                <span class="required-tx-p">*<span class="language" data-translate="optional">Optional</span></span>
            </label>
            <select class="input-form" id="transfer_promotion_show" name="promotion">
                <!-- <option value=""></option> -->
            </select>
            <br>
            <input class="submit-btn" type="button" value="Submit" id="transfer_btn">
        </form>

    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>

    <!-- SCRIPT -->





    <!-- swap value -->
    <script>
    $(".swap-btn").click(function() {
        var transferfrom = $("#from_wallet").val();
        var transferto = $("#to_wallet").val();
        $("#from_wallet").val(transferto);
        $("#to_wallet").val(transferfrom);
        changetype();

        return false;
    })
    </script>

    <!-- onoff toggle -->
    <script>
    var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {},
        $checkboxes = $("#on-off-toggle :checkbox");

    $checkboxes.on("change", function() {
        $checkboxes.each(function() {
            checkboxValues[this.id] = this.checked;
        });

        localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
    });

    // On page load
    $.each(checkboxValues, function(key, value) {
        $("#" + key).prop('checked', value);
    });
    </script>

    <script>
    function changetype() {
        var str = $("#from_wallet").val();
        var str2 = $("#to_wallet").val();

        //   console.log(str)
        //   console.log(str2)
        if (str == 1 && str2 == 1) {

            $("#to_wallet").val("")

        } else if (str == str2) {
            $("#to_wallet").val("")

        }

        if (str >= 2) {
            // console.log("type :2")
            $("#transfer_type").val(2);
            $("#to_wallet option[value='1']").removeClass("hidden");
            $("#transfer-promo-hide").addClass("hidden");
            $("#transfer_promotion_show").addClass("hidden");
            $("#transfer-promo-hide2").addClass("hidden");
            $("#promotion_section").addClass("hidden");
            $("#transfer_promotion_show").val('');
            $("#transfer_promo_text").addClass("hidden");
            $('#promo_label').addClass("hidden");


        } else {
            $("#transfer_type").val(1);
            $("#to_wallet option[value='1']").addClass("hidden");
            $("#transfer_promo_text").removeClass("hidden");
            $("#transfer-promo-hide").removeClass("hidden");
            $("#transfer_promotion_show").removeClass("hidden");
            $("#transfer-promo-hide2").removeClass("hidden");
            $("#promotion_section").removeClass("hidden");
            $('#promo_label').removeClass("hidden");
            check_promo()

        }

    }
    </script>

    <!-- Check Promotion By Game Start -->
    <script>
    function check_promo() {
        var id = '<?php echo $member_id ?>';
        var transfer_type = $("#transfer_type").val();
        var game_code = $("#to_wallet").val();
        var lang = '<?php echo $language ?>';

        // console.log(id);
        // console.log(game_code);

        if (transfer_type == 1 && game_code != 1) {
            $.ajax({
                url: '../controller/ajax/check_promotion/',
                type: 'GET',
                data: {
                    id: id,
                    game_code: game_code,
                    lang: lang
                },
                beforeSend: function() {
                    // console.log("ok");
                },
                error: function(xhr) { // if error occured
                    console.log(xhr.statusText + xhr.responseText);
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(response) {
                    // var a = [response];
                    // console.log(response);

                    var return_message = response.return_msg;
                    var return_num = response.promo_name;
                    var bonus_type = response.bonus_type;
                    // console.log(bonus_type);
                    $("#transfer_promotion_show").html(return_num);


                    // alert("return_msg: "+return_message+", return_num: "+return_num)


                }
            });
        }

    }
    </script>
    <!-- Check Promotion By Game End -->

    <!-- All In Functions Start -->
    <script>
    $(".btn_all_in").click(function() {
        var member_id = "<?php echo $member_id; ?>";
        var current_wallet_id = this.id;
        var wallet_id = current_wallet_id.split("_")[1];
        // console.log(current_wallet_id)
        // console.log("current selected id: "+wallet_id);
        event.stopPropagation();
        overlay_icon()

        $.ajax({
            url: '../controller/ajax/wallet_all_in/index.php',
            type: 'GET',
            data: {
                member_id: member_id,
                wallet_id: wallet_id
            },
            beforeSend: function() {

                console.log(wallet_id + " :all-in start")
            },
            complete: function(data) {

                console.log(wallet_id + " :all-in end")
            },
            error: function(xhr) { // if error occured
                console.log(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(response) {
                complete_overlay_icon()
                // console.log(response);
                var return_msg = response.return_msg;
                var game_id = '#game_' + wallet_id;
                var all_in_amount = response.latest_balance;
                var pending_amount = response.pending_amount
                var session = $('#session_lang').val();


                // console.log(all_in_amount)
                if (return_msg == 0 || return_msg == '') {
                    return_message =
                        "<span id='ts_msg2' class=language>Transfer successful.</span>";
                    swal_lang(return_message, session)
                    // console.log("All In Success.");
                    //  $(game_id).val(all_in_amount);x
                    //  $(game_id).html(all_in_amount);
                    $(game_id).html(all_in_amount);
                    $('#getnum').text(pending_amount);

                } else if (return_msg == 2) {
                    return_message =
                        "<span id='transfer_msg4' class=language>Insufficient balance in main wallet.</span>";
                    swal_lang(return_message, session)
                    // console.log("Insufficient Balance.");

                } else if (return_msg == 3) {
                    return_message =
                        "<span id='transfer_msg15' class=language>Failed to transfer. You have claimed promotion/bonus under selected game.</span>";
                    swal_lang(return_message, session)
                    // console.log("Promo/Bonus Locking");

                } else if (return_msg == 4) {
                    return_message =
                        "<span id='cpw_msg8' class=language>Error occured. Please try again.</span>";
                    swal_lang(return_message, session)
                    // console.log("API Error. Please Try Again");

                } else if (return_msg == 5) {
                    return_message =
                        "<span id='ts_msg1' class=language>Failed to create game ID.</span>";
                    swal_lang(return_message, session)
                    // console.log("Creation Error");

                } else {
                    return_message =
                        "<span id='cpw_msg8' class=language>Error occurred. Please try again.</span>";
                    swal_lang(return_message, session)
                    // console.log("Connection Error.");

                }

            }

        });

    })
    </script>
    <!-- All In Functions End -->
    <!-- add active -->
    <script>
    $(document).ready(function() {
        $("#ac-1").click(function() {
            var getBalanceBar = $("#ac-1")
            $(this).toggleClass("active");

            if (getBalanceBar.hasClass('active')) {
                call_balance();
            }
        });
    });
    </script>
    <!-- transfer process start  -->
    <script>
    var contact_no = "<?php echo $member_contact_no?>";
    var session = $('#session_lang').val();

    $("#transfer_btn").click(function() {
        var member_id = "<?= $member_id?>";
        var company_id = "<?=$member_compamy_id?>";
        var from_wallet = $('#from_wallet').val();
        var to_wallet = $('#to_wallet').val();
        // var transfer_amount = $('#amount_place_lang').val();
        var transfer_promotype = $('#transfer_type').val();
        var transfer_amount = document.getElementById("amount_place_lang");
        var tamount = transfer_amount.value
        var promotion = $("#transfer_promotion_show").val()
        var return_message = '';
        // console.log(transfer_amount)
        if (member_id != '0' && member_id != '' && member_id != null) {

            if (from_wallet != '0' && from_wallet != null && from_wallet != '') {

                if (to_wallet != '0' && to_wallet != null && to_wallet != '') {

                    if (transfer_amount.value != '' && transfer_amount.value != null && transfer_amount.value !=
                        0) {
                        // console.log("1")

                        if (!transfer_amount.validity.stepMismatch) {
                            // console.log("2")

                            if (!transfer_amount.validity.rangeUnderflow) {
                                overlay_icon()

                                // if (!transfer_amount.validity.rangeOverflow) {

                                $.ajax({
                                    url: '../controller/ajax/transfer_process/transfer.php',
                                    type: 'GET',
                                    data: {
                                        member_id: member_id,
                                        from_wallet: from_wallet,
                                        to_wallet: to_wallet,
                                        transfer_type: transfer_promotype,
                                        transfer_amount: transfer_amount.value,
                                        promotion: promotion,
                                        company_id: company_id,
                                        contact_no: contact_no

                                    },
                                    dataType: 'json',
                                    contentType: "application/json; charset=UTF-8",
                                    // timeout: (15 * 1000),
                                    error: function(textstatus) { // if error occured
                                        if (textstatus === "timeout") {
                                            return_message =
                                                "<span>Error occured please try again.</span>";
                                            swal_lang(return_message, session)
                                            // ("got timeout");
                                        } else {
                                            console.log("none error occured")
                                            // alert(textstatus);
                                        }
                                        // console.log(xhr.statusText + xhr.responseText);
                                    },
                                    beforeSend: function() {
                                        // console.log(promotion)
                                        console.log(member_id, from_wallet, to_wallet,
                                            transfer_promotype, transfer_amount.value,
                                            promotion,
                                            company_id)
                                        // console.log("transfer - pass data start");

                                    },
                                    success: function(response) {
                                        // console.log(response)
                                        complete_overlay_icon()
                                        return_message = response.return_msg;
                                        reload_verify = response.location
                                        // console.log(reload_verify)                    
                                        // console.log(page_reload)

                                        swal_lang(return_message, session, reload_verify)


                                        // var location = response.location;
                                        // var script_lang = response.script_lang;
                                        // var session = $("#session_lang").val()
                                        // console.log(session)                    

                                    }

                                });

                                // } else {
                                //     return_message =
                                //         "<span id='public_5' class='language'>Maximum Topup is THB</span><span>&nbsp;500000.</span";
                                //     swal_lang(session, return_message)

                                // }

                            } else {
                                return_message =
                                    "<span id='transfer_msg15' class='language'>Minimum transfer is MYR 0.1 .</span>";
                                swal_lang(session, return_message)

                            }

                        } else {
                            return_message =
                                "<span id='public_3' class=language>Amount format wrong! Exp: 100.00</span>";
                            swal_lang(return_message, session)
                            // swal_lang(session)

                        }
                    } else {
                        return_message = "<span id='public_2' class=language>Amount cannot be empty. </span>";
                        swal_lang(return_message, session)

                    }

                } else {
                    return_message = "<span id=transfer_2 class=language>Please select 'Transfer to'</span>";
                    swal_lang(return_message, session)

                }

            } else {
                return_message = "<span id=transfer_1 class=language>Please select 'Transfer from'</span>";
                swal_lang(return_message, session)

            }

        } else {
            return_message = "<span id='public_1' class=language>Member id not found</span>";
            swal_lang(return_message, session)


        }



    });
    </script>
    <!-- transfer process end -->



</body>

</html>