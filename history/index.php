<!DOCTYPE html>
<html lang="en">
<?php include '../template/head.php';?>
<?php include '../template/check_member_login.php';?>

<body>
    <!-- ==== HEADER ===== -->
    <?php include '../template/topbar.php';?>
    <!-- ==== SIDEBAR ===== -->
    <?php include '../template/sidebar.php';?>
    <!-- redirect form deposit start-->
    <?php $deposit_done = $_GET['redirect'] ?>
    <?php $withdraw_done = $_GET['redirect'] ?>
    <!-- ==== BODY CONTENT ===== -->
    <div class="body-wrap">
        <style>
        .row_date {
            display: flex;
            font-size: var(--extsmall-font-size);
            /* padding: 6px 5px; */
            width: 200px;
            height: 50%;
        }

        .row_date>div {
            width: 33.33333%;
            margin: 1%;
            text-align: center;
            border: 1px solid #18295f;
            border-radius: 5px;
        }

        .row_date>div span label {
            margin: 0px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            font-size: var(--exsmall-font-size);
        }

        .row_date>div:hover {
            color: #C99A55;
            color: #fff;
        }

        input[name="radioRange"] {
            display: none;
        }

        .history__nobank__img {
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
            align-content: center;
            height: 100%;
            margin-bottom: 100px;
        }

        #table_tab {
            font-size: 12px;
        }

        .history__nobank__img img {
            width: 50%;
        }

        .his_btm_ext {
            margin-bottom: 100px;
        }




        .border-row {
            color: #fff;
            border-bottom: 1px solid #fff;
        }

        #table_tab tr td {
            padding: 15px 8px;
        }

        .modal_dialog_history {
            margin: 100px auto !important;
            width: 80% !important;
        }

        #history_modaldeposit,
        #history_modaltransfer,
        #history_modalpromotion,
        #history_modalbettingsummary,
        #history_modalbonus,
        #history_modalrebate,
            {
            font-size: 15px;
        }

        .view-content {
            color: #000;
            padding: 0rem 1rem;
        }

        .view_header {
            padding: 16px 0px 12px 0px !important;
            border-bottom: 1px solid #9c9c9c;
        }

        .back_btn_view {
            background: transparent;
            border: none;
            color: var(--main-color);
            /* font-size: var(--small-font-size); */
        }

        .form_view_wrap {
            padding: 10px 10px 15px;
        }

        .view-content::after {
            content: '';
            position: absolute;
            left: -2px;
            top: -2px;
            /* background: linear-gradient( 125deg, var(--main-color);, var(--theme-color), var(--main-color);, var(--theme-color), var(--main-color);, var(--theme-color), var(--main-color);, var(--theme-color)); */
            background-size: 400%;
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            z-index: -1;
            border-radius: calc();
            animation: steam 20s linear infinite;
            filter: blur(5px);
        }


        .form_view {
            margin-bottom: 15px;
        }

        .form_detail {
            font-size: var(--small-font-size);
        }

        .no_img {
            width: 50% !important;
        }

        #history_norecord {
            color: #fff;
        }

        #table_tab {
            margin-top: 15px;
        }

        #table_tab tr td {
            padding: 15px 8px;
            text-align: center;
        }

        /* #history_table_head tr th {
            font-weight: 600;
            text-align: center;
            color: #000;
            font-size: 10px;
            padding: 5px 0px;
            white-space: nowrap;
            background: var(--main-color);
        } */

        .date_input {
            width: 95%;
            display: flex;
            margin: 0 auto;
        }

        .date-table {
            font-size: 8px;
            opacity: 0.9;
        }



        .status_history,
        .amount_history,
        .bet_history {
            font-size: 10px;
            font-weight: bold;
        }



        .createdtime_history {
            font-size: 8px;
            opacity: 0.9;
        }


        .promotion_time {
            font-size: 8px;
            opacity: 0.9;
        }

        body {
            background-attachment: fixed;
        }

        .provider_his {
            font-size: 10px;
            font-weight: bold;
            color: var(--second-color);
        }

        .provider_created {
            font-size: 8px;
            opacity: 0.9;
        }

        .wallet-his {
            font-size: 10px;
            font-weight: bold;
            color: var(--second-color);
        }

        .create-his {
            font-size: 8px;
            opacity: 0.9;
        }

        .betname-his {
            font-size: 11px;
            font-weight: bold;
            color: var(--second-color);
        }

        .history-outer {
            padding: 0px
        }

        .ticket-id {
            text-decoration: underline !important;
        }
        </style>
        <!-- ==== WALLET ===== -->
        <?php include '../template/wallet.php';?>

        <div class="scrollmenu-his">
            <input type="radio" name="history" value="2" id="transfer" />
            <input type="radio" name="history" value="6" id="bettingsummary" />
            <input type="radio" name="history" value="1" id="dep-with" checked="checked" />
            <input type="radio" name="history" value="3" id="promo" />
            <input type="radio" name="history" value="4" id="bonus" />
            <input type="radio" name="history" value="5" id="rebate" />

            <div>
                <label for="transfer" id="label_transfer" class="his_tab "> <span id="history_selec_2"
                        data-translate="transfer" class="language">Transfer</span>
                </label>
            </div>
            <div>
                <label for="bettingsummary" id="label_dep" class="his_tab">
                    <span id="history_selec_1" class="language" data-translate="betting_summary">Betting Summary</span>
                </label>
            </div>
            <div>
                <label for="dep-with" id="label_dep" class="his_tab label_hover active">
                    <span id="history_selec_1" class="language" data-translate="deposit_withdrawal">Deposit /
                        Withdrawal</span> </label>
            </div>

            <div>
                <label for="promo" id="label_promo" class="his_tab"> <span id="history_selec_3"
                        data-translate="promotion_apply" class="language">Promotion Apply</span>
                </label>
            </div>
            <div>
                <label for="bonus" id="label_bonus" class="his_tab"> <span id="history_selec_4" data-translate="bonus"
                        class="language">Bonus</span></label>
            </div>
            <div>
                <label for="rebate" id="label_rebate" class="his_tab"> <span id="history_selec_5"
                        data-translate="rebate" class="language">Rebate</span></label>
            </div>
        </div>


        <div class="history-outer">
            <div class="history-wrap">
                <div class="date_tx">
                    <span data-translate="start" class="language">Start:</span>
                    <input type="date" class="input__date" id="start_date">
                </div>
                <div class="date_tx"><span data-translate="end" class="language">End:</span>
                    <input type="date" class="input__date" id="end_date">
                </div>
                <div class="search-btn">
                    <button id="his_search_btn" value="<?= $member_id ?>" onclick="btn_check()">
                        <i class="far fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>

        <table id="table_tab" class="w-100 extend_his">
            <thead id="history_table_head">
            </thead>
            <tbody id="history_table_body">
            </tbody>
        </table>

        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modaldeposit" data-translate="deposit_withdrawal"
                            class="language pl-2">Deposit/Withdrawal</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">
                        <div class="form_view">
                            <div class="form_title"><span id="history_deposittype" data-translate="Payment_Type"
                                    class="language">Payment Type</span></div>
                            <div class="form_detail"><span id="deposit_payment_type"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span data-translate="Ticket_ID" id="history_depositticketid"
                                    class="language">Ticket ID</span></div>
                            <div class="form_detail"><span id="deposit_ticket_id"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span data-translate="Amount" id="history_depositamount"
                                    class="language">Amount</span></div>
                            <div class="form_detail"><span id="deposit_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span data-translate="Transaction_Date" id="history_depositdate"
                                    class="language">Transaction Date</span></div>
                            <div class="form_detail"><span id="deposit_transaction_date">2012002</span>
                            </div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span data-translate="Transaction_Status" id="history_depositstatus"
                                    class="language">Transaction Status</span>
                            </div>
                            <div class="form_detail"><span id="deposit_transaction_status">Rejected</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="wallet_transfer_view" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modaltransfer" class="language pl-2" ata-translate="Transfer">Transfer</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">

                        <div class="form_view">
                            <div class="form_title"><span id="history_transferfrom" data-translate="from"
                                    class="language">FROM</span>
                            </div>
                            <div class="form_detail"><span id="wallet_transfer_from"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="history_transferto" data-translate="To"
                                    class="language">TO</span>
                            </div>
                            <div class="form_detail"><span id="wallet_transfer_to"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="history_transferamount" data-translate="Amount"
                                    class="language">Amount</span>
                            </div>
                            <div class="form_detail"><span id="wallet_transfer_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_transferdate" class="language"
                                    data-translate="Transaction_Date">Transaction Date</span>
                            </div>
                            <div class="form_detail"><span id="wallet_transfer_date"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="history_transferstatus"
                                    data-translate="Transaction_Status" class="language">Transaction Status</span></div>
                            <div class="form_detail"><span id="wallet_transfer_status"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="promotion_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modalpromotion" class="language pl-2"
                            data-translate="Promotion_Apply">Promotion Apply</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">
                        <div class="form_view">
                            <div class="form_title"><span id="history_promotionticket" class="language"
                                    data-translate="Ticket_ID">Ticket ID</span>
                            </div>
                            <div class="form_detail"><span id="promotion_ticket_id"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_promotionname" class="language"
                                    data-translate="Promotion_Name">Promotion Name</span>
                            </div>
                            <div class="form_detail"><span id="promotion_name"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_promotionto" class="language" data-translate="To">To</span>
                            </div>
                            <div class="form_detail"><span id="promotion_to_wallet"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_promotiontransferamount" class="language"
                                    data-translate="Transfer_Amount">Transfer Amount</span>
                            </div>
                            <div class="form_detail"><span id="promotion_transfer_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_promotionturnover" class="language"
                                    data-translate="Target_Amount">Target Amount</span>
                            </div>
                            <div class="form_detail"><span id="promotion_target_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="history_promotiondate" class="language"
                                    data-translate="Transaction_Date">Transaction Date</span>
                            </div>
                            <div class="form_detail"><span id="promotion_transfer_date"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="history_promotionstatus" class="language"
                                    data-translate="Transaction_Status">Transaction Status</span></div>
                            <div class="form_detail"><span id="promotion_transfer_status"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bonus_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modalbonus" class="language pl-2" data-translate="Bonus">Bonus</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="Ticket_ID">Ticket ID</span>
                            </div>
                            <div class="form_detail"><span id="bonus_ticket_id"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="Bonus_Name">Bonus Name</span>
                            </div>
                            <div class="form_detail"><span id="bonus_name"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="To">To</span>
                            </div>
                            <div class="form_detail"><span id="bonus_to_wallet"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language"
                                    data-translate="Transfer_Amount">Transfer Amount</span>
                            </div>
                            <div class="form_detail"><span id="bonus_transfer_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Target_Amount">Target
                                    Amount</span></div>
                            <div class="form_detail"><span id="bonus_target_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language"
                                    data-translate="Transaction_Date">Transaction Date</span>
                            </div>
                            <div class="form_detail"><span id="bonus_transfer_date"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language"
                                    data-translate="Transaction_Status">Transaction Status</span>
                            </div>
                            <div class="form_detail"><span id="bonus_transfer_status"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="rebate_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modalrebate" class="language pl-2" data-translate="Rebate">Rebate</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="To">To</span>
                            </div>
                            <div class="form_detail"><span id="rebate_name"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="Rebate_Amount">Rebate Amount</span>
                            </div>
                            <div class="form_detail"><span id="rebate_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Release_Date">Release
                                    Date</span>
                            </div>
                            <div class="form_detail"><span id="rebate_date"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Status">Status</span>
                            </div>
                            <div class="form_detail"><span id="rebate_status"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="bettingsummary_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal_dialog_history" role="document">
                <div class="modal-content view-content">
                    <div class="view_header">
                        <span id="history_modalbettingsummary" class="language" data-translate="Betting_Summary">Betting
                            Summary</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form_view_wrap">
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="Game_Provider">Game Provider</span>
                            </div>
                            <div class="form_detail"><span id="bet_providerName"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title">
                                <span id="" class="language" data-translate="Bet_Count">Bet Count</span>
                            </div>
                            <div class="form_detail"><span id="bet_count"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Bet_Amount">Bet
                                    Amount</span>
                            </div>
                            <div class="form_detail"><span id="bet_amount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Valid_Bet_Amount">Valid
                                    Bet Amount</span>
                            </div>
                            <div class="form_detail"><span id="bet_validAmount"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Promo_Turnover">Promo
                                    Turnover</span>
                            </div>
                            <div class="form_detail"><span id="bet_promoTurnover"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language"
                                    data-translate="Turnover_Without_Promo">Turnover Without Promo</span>
                            </div>
                            <div class="form_detail"><span id="bet_turnoverWithoutPromo"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="total_bonus">Total
                                    Bonus</span>
                            </div>
                            <div class="form_detail"><span id="bet_totalBonus"></span></div>
                        </div>
                        <div class="form_view">
                            <div class="form_title"><span id="" class="language" data-translate="Total_Rebate">Total
                                    Rebate</span>
                            </div>
                            <div class="form_detail"><span id="bet_totalRebate"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ==== FOOTER ===== -->
    <?php include '../template/footer.php';?>
    <!-- ==== FOOTERLINK =====  -->
    <?php include '../template/footerlink.php';?>
    <!-- script -->

    <script>
    var lang = $('#session_lang').val();

    var histab = ".his_tab";
    $(histab).on('click', function() {
        $(histab).removeClass('active');
        $(this).addClass('active');
    });
    </script>
    <script>
    $('input:checkbox').change(function() {
        if ($(this).is(":checked")) {
            $('.labels .his_tab').addClass("menuitemshow");
        } else {
            $('.labels .his_tab').removeClass("menuitemshow");
        }
    });
    </script>

    <script>
    $(function() {
        $('#dep_with').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();

            if (lang == "th") {

                $('.history__title').html("เงินฝาก/ถอน");

            } else if (lang == "cn") {

                $('#history_selec_title_1').html("存款 / 提款");

            } else if (lang == "bm") {

                $('#history_selec_title_1').html("Deposit / Pengeluaran");

            } else {

                $('.history__title').html("Deposit/Withdrawal");
            }

            $('#label_dep').addClass("label_hover");
            $('#label_transfer').removeClass("label_hover");
            $('#label_promo').removeClass("label_hover");
            $('#label_bonus').removeClass("label_hover");
            $('#label_rebate').removeClass("label_hover");
            $('#label_betsummary').removeClass("label_hover");



        });
    });
    $(function() {
        $('#transfer').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();

            if (lang == "th") {

                $('.history__title').html("โอน");

            } else if (lang == "cn") {

                $('#history_selec_title_1').html("转账");


            } else if (lang == "bm") {

                $('#history_selec_title_1').html("Pemindahan");


            } else {
                $('.history__title').html("Transfer");
            }

            $('#label_transfer').addClass("label_hover");
            $('#label_dep').removeClass("label_hover");
            $('#label_promo').removeClass("label_hover");
            $('#label_bonus').removeClass("label_hover");
            $('#label_rebate').removeClass("label_hover");
            $('#label_betsummary').removeClass("label_hover");


        });
    });
    $(function() {
        $('#promo').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();
            if (lang == "th") {

                $('.history__title').html("สมัครโปรโมชั่น");

            } else if (lang == "cn") {

                $('#history_selec_title_1').html("优惠申请");


            } else if (lang == "bm") {

                $('#history_selec_title_1').html("Promosi Memohon");

            } else {
                $('.history__title').html("Promotion Apply");
            }
            $('#label_promo').addClass("label_hover");
            $('#label_transfer').removeClass("label_hover");
            $('#label_dep').removeClass("label_hover");
            $('#label_bonus').removeClass("label_hover");
            $('#label_rebate').removeClass("label_hover");
            $('#label_betsummary').removeClass("label_hover");

        });
    });
    $(function() {
        $('#bonus').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();

            if (lang == "th") {

                $('.history__title').html("โบนัส");

            } else if (lang == "cn") {

                $('#history_selec_title_1').html("红利");


            } else {
                $('.history__title').html("Bonus");

            }
            $('#label_bonus').addClass("label_hover");
            $('#label_transfer').removeClass("label_hover");
            $('#label_promo').removeClass("label_hover");
            $('#label_dep').removeClass("label_hover");
            $('#label_rebate').removeClass("label_hover");
            $('#label_betsummary').removeClass("label_hover");

        });
    });
    $(function() {
        $('#rebate').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();
            if (lang == "th") {

                $('.history__title').html("โบนัส");

            } else {
                $('.history__title').html("rebate");

            }
            $('#label_rebate').addClass("label_hover");
            $('#label_bonus').removeClass("label_hover");
            $('#label_transfer').removeClass("label_hover");
            $('#label_promo').removeClass("label_hover");
            $('#label_dep').removeClass("label_hover");
            $('#label_betsummary').removeClass("label_hover");

        });
    });

    $(function() {
        $('#betsummary').change(function() {
            $('#history_table_head').empty();
            $('#history_table_body').empty();
            if (lang == "th") {

                $('.history__title').html("สรุปการเดิมพัน");

            } else {
                $('.history__title').html("betting summary");

            }
            $('#label_rebate').removeClass("label_hover");
            $('#label_bonus').removeClass("label_hover");
            $('#label_transfer').removeClass("label_hover");
            $('#label_promo').removeClass("label_hover");
            $('#label_dep').removeClass("label_hover");
            $('#label_betsummary').addClass("label_hover");

        });
    });

    $('input:checkbox').change(function() {
        if ($(this).is(":checked")) {
            $('.labels .his_tab').addClass("menuitemshow");
        } else {
            $('.labels .his_tab').removeClass("menuitemshow");
        }
    });
    </script>

    <script>
    deposit_done = '<?=$deposit_done?>';
    withdraw_done = '<?=$deposit_done?>';
    if (deposit_done == 'click_dep') {
        btn_check()
    }
    if (withdraw_done == 'click_wtd') {
        btn_check()
    }

    function btn_check() {
        $('#history_table_body').empty();
        var id = $(this).attr("value");
        var member_id = "<?php echo $member_id?>";
        var transfer_type = $('input[name="history"]:checked').val();
        var range = $('input[name="radioRange"]:checked').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        // console.log(start_date);
        // console.log(end_date);
        // console.log(transfer_type);
        // console.log(member_id);
        // console.log(id);


        if (member_id != '') {
            // alert("asdasdsa");
            // overlay_cover();

            $.ajax({
                url: '../controller/ajax/get_history_data/index.php',
                type: 'GET',

                data: {
                    id: id,
                    transfer_type: transfer_type,
                    start_date: start_date,
                    end_date: end_date,
                    range: range
                },
                // beforeSend: function() {
                // // setting a timeout
                // // console.log(transfer_type);
                // // console.log(id);


                // },error: function(xhr) { // if error occured
                // alert("Error occured.please try again");
                // console.log(xhr.statusText + xhr.responseText);    
                // },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(data) {
                    // console.log(data)
                    var th = data.table_head;
                    var td = data.table_body;
                    var empty = data.empty;
                    // alert(td);

                    $('#history_table_body').html(td);
                    $('#history_table_head').html(th);
                    $('#table_nodata').html(empty);


                    // var table_tab = $('#table_tab');

                }

            });

        }
    };

    $('#history_table_body').on('click', '.ticket-id', function() {
        var history_id = $(this).attr('value');
        var member_id = "<?php echo $member_id?>";
        // var transfer_type = $('#transfer_type').val();
        var transfer_type = $('input[name="history"]:checked').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        // alert(transfer_type)

        console.log(history_id);
        // console.log(member_id);
        // console.log(transfer_type);

        // alert(transfer_type)

        if (history_id != '' && transfer_type != '') {

            var ticket_id = history_id.substring(0, 1);
            // console.log(ticket_id);

            $.ajax({
                url: '../controller/ajax/get_history_detail',
                type: 'GET',
                data: {
                    history_id: history_id,
                    transfer_type: transfer_type,
                    ticket_id: ticket_id,
                    member_id: member_id,
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(data) {
                    // console.log(data)
                    var payment_type = data.payment_type;
                    var ticket_id = data.ticket_id;
                    var amount = data.amount;
                    var transaction_date = data.transaction_date;
                    var transaction_status = data.transaction_status;
                    var promotion_name = data.promotion_name;
                    var turnover_amount = data.turnover_amount;
                    var from_wallet = data.from_wallet;
                    var to_wallet = data.to_wallet;

                    var provider_name = data.provider_name;
                    var bet_total = data.bet_total;
                    var bet_amount = data.bet_amount;
                    var valid_bet = data.valid_bet;
                    var total_promo_turnover = data.total_promo_turnover;
                    var tunover_without_bonus = data.tunover_without_bonus;
                    var final_bonus = data.final_bonus;
                    var total_rebate = data.total_rebate;


                    // console.log(payment_type);
                    // deposit and withdraw part
                    $('#deposit_payment_type').html(payment_type);
                    $('#deposit_ticket_id').html(ticket_id);
                    $('#deposit_amount').html(amount);
                    $('#deposit_transaction_status').html(transaction_status);
                    $('#deposit_transaction_date').html(transaction_date);
                    // end deposit and withdraw part

                    // wallet transfer part
                    $('#wallet_transfer_from').html(from_wallet);
                    $('#wallet_transfer_to').html(to_wallet);
                    $('#wallet_transfer_amount').html(amount);
                    $('#wallet_transfer_status').html(transaction_status);
                    $('#wallet_transfer_date').html(transaction_date);
                    // end wallet transfer part

                    // claim promotion part
                    $('#promotion_ticket_id').html(ticket_id);
                    $('#promotion_name').html(promotion_name);
                    $('#promotion_to_wallet').html(to_wallet);
                    $('#promotion_transfer_amount').html(amount);
                    $('#promotion_target_amount').html(turnover_amount);
                    $('#promotion_transfer_date').html(transaction_date);
                    $('#promotion_transfer_status').html(transaction_status);
                    // end promotion part

                    // claim bonus part
                    $('#bonus_ticket_id').html(ticket_id);
                    $('#bonus_name').html(promotion_name);
                    $('#bonus_to_wallet').html(to_wallet);
                    $('#bonus_transfer_amount').html(amount);
                    $('#bonus_target_amount').html(turnover_amount);
                    $('#bonus_transfer_date').html(transaction_date);
                    $('#bonus_transfer_status').html(transaction_status);
                    // end bonus part

                    // claim rebate part
                    $('#rebate_name').html(promotion_name);
                    $('#rebate_amount').html(amount);
                    $('#rebate_date').html(transaction_date);
                    $('#rebate_status').html(transaction_status);
                    // end rebate part

                    // betting summary part
                    $('#bet_providerName').html(provider_name);
                    $('#bet_count').html(bet_total);
                    $('#bet_amount').html(bet_amount);
                    $('#bet_validAmount').html(valid_bet);
                    $('#bet_promoTurnover').html(total_promo_turnover);
                    $('#bet_turnoverWithoutPromo').html(tunover_without_bonus);
                    $('#bet_totalBonus').html(final_bonus);
                    $('#bet_totalRebate').html(total_rebate);

                    //end betting summary part



                }
            });

        }

        // alert(history_id);

    });
    </script>
</body>

</html>