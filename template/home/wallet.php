<style>
.grp {
    font-size: var(--exsmall-font-size);
}

.wallet-row1-third {
    display: flex;
    align-items: center;
    width: 40%;
}
</style>
<?php
    $member_group_icon = "";
    // if($member_group_id == 3){

    //   $member_group_icon = "https://storage.googleapis.com/fg910/others/member_group_icon/bronze.png";

    // }
    if($member_group == 3){

    $member_group_icon = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88_VIP/vip_silver.png";
    $member_group_tx ="Silver";
    }
    else if($member_group == 4){

    $member_group_icon = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88_VIP/vip_gold.png";
    $member_group_tx ="Gold";
    }
    else if($member_group == 5){

    $member_group_icon = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88_VIP/vip_platinum.png";
    $member_group_tx ="Platinum";
    }
    else if($member_group == 6){

    $member_group_icon = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88_VIP/vip_diamond.png";
    $member_group_tx ="Diamond";
    }
    else{
    
    $member_group_icon = "https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/b88_VIP/vip_bronze.png";
    $member_group_tx ="Bronze";
    }

?>
<div class="wallet-outer">
    <div class="wallet-wrap1">
        <div class="wallet-row1">
            <div class="wallet-row1-first">
                <img style="width:70%;" src="assets/img/s9/wallet/user.png" alt="">
                <span><?=$member_username?></span>
            </div>
            <div class="wallet-row1-second">
                <div><span class="language" data-translate="main_wallet">Main Wallet</span></div>
                <div><span>MYR</span> <span class="balanceAmount"
                        id='getnum'><?php echo number_format($main_wallet_balance,2);?></span>
                    <span>
                        <i onclick="window.location.reload();" class="far fa-sync-alt" aria-hidden="true"></i></span>
                    <span> <i class="fal fa-eye hideAmount"></i>
                </div>
            </div>
            <div class="wallet-row1-third">
                <div>
                    <img onclick="restoreWallet()" src="assets/img/s9/wallet/Restore.png" alt=""><br>
                    <span class="language" data-translate="restore">Restore</span>
                </div>
                <div data-toggle="modal" data-target="#summarymodal" onclick="call_balance1()">
                    <img src="assets/img/s9/wallet/Game Wallet.png" alt=""><br>
                    <span class="language" data-translate="game_wallet">Game Wallet</span>
                </div>
            </div>
        </div>
        <div class="wt-row">
            <span data-translate="winover_turnover" class="language">WINOVER / TURNOVER</span>&nbsp;:&nbsp;
            <a href="#" data-toggle="modal" data-target="#wtpopup" id="tunroverInterface">
                <span class="language" data-translate="viewmore">View more</span>
                <div class="circle-cart" id="turnoverCount"></div>
            </a>
        </div>
        <div class="wallet-row2">
            <div id="deposit-page" class="wallet-select">
                <a href="deposit">
                    <img src="assets/img/s9/wallet/deposit.png" alt="">
                    <br>
                    <span class="language" data-translate="deposit">Deposit</span>
                </a>
            </div>
            <div id="transfer-page" class="wallet-select">
                <a href="transfer">
                    <img src="assets/img/s9/wallet/transfer.png" alt="">
                    <br>
                    <span class="language" data-translate="transfer">Transfer</span>
                </a>
            </div>
            <div id="withdraw-page" class="wallet-select">
                <a href="withdraw">
                    <img src="assets/img/s9/wallet/withdraw.png" alt="">
                    <br>
                    <span class="language" data-translate="withdrawal">Withdraw</span>
                </a>
            </div>
            <div id="promotion-page" class="wallet-select">
                <a href="promotion">
                    <img src="assets/img/s9/wallet/promo.png" alt="">
                    <br>
                    <span class="language" data-translate="promo">Promo</span>
                </a>
            </div>
            <div id="history-page" class="wallet-select">
                <a href="history">
                    <img src="assets/img/s9/wallet/history.png" alt="">
                    <br>
                    <span class="language" data-translate="history">History</span>
                </a>
            </div>
        </div>
        <div class="wallet-row3">

            <div class="point-wal-img">
                <div>
                    <img src="assets/img/s9/wallet/point.png" alt="">
                    <span class="point-title language pr-1">S9 Point:</span>
                    <div class="point-wal-amt">
                        <?=$bPoint?><span>Points</span>
                    </div>
                </div>


                <div>
                    <img src="assets/img/s9/wallet/token.png" alt="">
                    <span class="point-title language pr-1">S9 Token:</span>
                    <div class="point-wal-amt">
                        132,125,56<span>Tokens</span>
                    </div>
                </div>


                <button class="question-circle" data-toggle="modal" data-target="#bpointquestion">
                    <i class="fas fa-question-circle"></i>
                </button>

            </div>

        </div>

        <div class="wallet-autotransfer">
            <div class="autotransfer-tl"><img src="assets/img/s9/wallet/auto_transfer.png" alt=""><span
                    data-translate="main_wallet_auto_transfer" class="language">Main Wallet Auto
                    Transfer</span> <label class="switch"><input id="switch-toggle" type="checkbox" <?=$checked?> />
                    <div></div>
         </label>
        </div>
        </div>
    </div>
</div>

<!-- winover / turnover popup -->
<div class="modal fade" id="wtpopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-wt" role="document">
        <div class="modal-content modal-content-wt">

            <div class="modal-body modal-body-wt">
                <div class="wt-tl">
                    <span class="language" data-translate="winover_turnover">Winover / Turnover</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>
                </div>

                <div id="turnover_body">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bpoint popup -->
<div class="modal fade" id="bpointquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-bp" role="document">
        <div class="modal-content modal-content-bp">
            <div class="modal-body modal-body-bp">
                <div class="bp-tl">
                    <span class='wi-t1'><span class="language" data-translate="wat_p">What is</span> S9 POINT &
                        TOKEN</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="bp-content">
                    <div class="bpoint-content-img">
                        <img src="assets/img/s9/point.png" alt="">
                        <span class='wi-t2'>S9 Point</span>
                    </div>
                    <p><span class="language" data-translate="exl_p">Points are rewarded when players make deposit and
                            can be used to redeem gifts.</span></p>
                </div>
                <hr class="bp-line">
                <div class="bp-content">
                    <div class="bpoint-content-img">
                        <img src="assets/img/s9/token.png" alt="">
                        <span class='wi-t2'>S9 Token</span>
                    </div>
                    <p><span class="language" data-translate="exl_t">Tokens are also given with a minimum amount of
                            deposit and can be used to play mini games.</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modal-body-summary div {
    width: 25%;
    margin: 15px 0px;
}
</style>

<!-- summary popup -->
<div class="modal fade" id="summarymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-summary" role="document">
        <div class="modal-content modal-content-game-wallet">
            <div class="d-flex" style="width: 90%; margin: 0px 10px; border-bottom:1px solid rgba(0, 0, 0, 0.1);">
                <div class="w-50 py-2 text-center d-flex justify-content-start language" data-translate="game_wallet"
                    style="font-weight:500;">Game
                    Wallet</div>
                <span class="close-sumpopup" data-dismiss="modal" aria-label="Close"><i class="fal fa-times"
                        aria-hidden="true"></i></span>
            </div>
            <div class="modal-body modal-body-summary">
                <?php
                    $query_get_games = "SELECT wc.f_id, wc.f_code, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p ON wc.f_id = p.f_wallet_code WHERE wc.f_delete = 'N' AND wc.f_index != '0' ORDER BY wc.f_index";
                    $result_get_games = mysqli_query($conn, $query_get_games);
                    $num_get_games = mysqli_num_rows($result_get_games);

                    if($num_get_games != 0){
                        while($row_get_games=mysqli_fetch_array($result_get_games)){
                            $wallet_id = $row_get_games['f_id'];
                            $wallet_name = $row_get_games['f_wallet_name'];
                            $wallet_name_sm = strtolower($wallet_name);
                            $page_name = '../slot-'.$wallet_name_sm.'#'.$wallet_name_sm;
                            $game_current_status = $row_get_games['f_status'];
                            $extra_class = "";
                            echo "
                                <div>
                                    <img src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/gamewallet_mobile/game_provider_$wallet_id.png' alt=''><br>
                                    <span id='game_wallet_balance_$wallet_id'>0.00</span>
                                </div>
                            ";

                        }
                    }
                ?>
                <?php
                    $query_get_games = "SELECT wc.f_id, wc.f_code, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p ON wc.f_id = p.f_wallet_code WHERE wc.f_delete = 'N' AND wc.f_m_slot_index != '0' ORDER BY wc.f_m_slot_index";
                    $result_get_games = mysqli_query($conn, $query_get_games);
                    $num_get_games = mysqli_num_rows($result_get_games);

                    if($num_get_games != 0){
                        while($row_get_games=mysqli_fetch_array($result_get_games)){
                            $wallet_id = $row_get_games['f_id'];
                            $wallet_name = $row_get_games['f_wallet_name'];
                            $wallet_name_sm = strtolower($wallet_name);
                            $page_name = '../slot-'.$wallet_name_sm.'#'.$wallet_name_sm;
                            $game_current_status = $row_get_games['f_status'];
                            $extra_class = "";

                            if($wallet_id != 7){
                                echo "
                                    <div>
                                        <img src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/gamewallet_mobile/game_provider_$wallet_id.png' alt=''><br>
                                        <span id='game_wallet_balance_$wallet_id'>0.00</span>
                                    </div>
                                ";
                            }

                        }
                    }
                ?>
                <?php
                    $query_get_games = "SELECT wc.f_id, wc.f_code, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p ON wc.f_id = p.f_wallet_code WHERE wc.f_delete = 'N' AND wc.f_casino_index != '0' ORDER BY wc.f_casino_index";
                    $result_get_games = mysqli_query($conn, $query_get_games);
                    $num_get_games = mysqli_num_rows($result_get_games);

                    if($num_get_games != 0){
                        while($row_get_games=mysqli_fetch_array($result_get_games)){
                            $wallet_id = $row_get_games['f_id'];
                            $wallet_name = $row_get_games['f_wallet_name'];
                            $wallet_name_sm = strtolower($wallet_name);
                            $page_name = '../slot-'.$wallet_name_sm.'#'.$wallet_name_sm;
                            $game_current_status = $row_get_games['f_status'];
                            $extra_class = "";

                            if($wallet_id != 9 && $wallet_id != 7 && $wallet_id != 20 && $wallet_id != 50){
                                echo "
                                    <div>
                                        <img src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/gamewallet_mobile/game_provider_$wallet_id.png' alt=''><br>
                                        <span id='game_wallet_balance_$wallet_id'>0.00</span>
                                    </div>
                                ";
                            }

                        }
                    }
                ?>
                <?php
                    $query_get_games = "SELECT wc.f_id, wc.f_code, wc.f_wallet_name, p.f_status FROM wallet_code wc JOIN product p ON wc.f_id = p.f_wallet_code WHERE wc.f_delete = 'N' AND wc.f_sport_index != '0' ORDER BY wc.f_sport_index";
                    $result_get_games = mysqli_query($conn, $query_get_games);
                    $num_get_games = mysqli_num_rows($result_get_games);

                    if($num_get_games != 0){
                        while($row_get_games=mysqli_fetch_array($result_get_games)){
                            $wallet_id = $row_get_games['f_id'];
                            $wallet_name = $row_get_games['f_wallet_name'];
                            $wallet_name_sm = strtolower($wallet_name);
                            $page_name = '../slot-'.$wallet_name_sm.'#'.$wallet_name_sm;
                            $game_current_status = $row_get_games['f_status'];
                            $extra_class = "";

                            if($wallet_id != 7){
                                echo "
                                    <div>
                                        <img src='https://storage.googleapis.com/fg_merchant_image/fg901/myver/MOBILE/gamewallet_mobile/game_provider_$wallet_id.png' alt=''><br>
                                        <span id='game_wallet_balance_$wallet_id'>0.00</span>
                                    </div>
                                ";
                            }

                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- adjust wallet bm text -->
<script>
$(document).ready(function() {
    var session = $('#session_lang').val();
    if (session == "bm") {
        $('.wallet-select a').css('font-size', '.55rem');
        $('.wallet-row1-third').css('align-items', 'start');
        $('.wallet-row1-third').css('position', 'relative');
        $('.wallet-row1-third').css('top', '20px');
    }
});
</script>

<!-- add active selected -->
<script>
$(function() {
    var loc = window.location.href; // returns the full URL
    if (/deposit/.test(loc)) {
        $('#deposit-page').addClass('active');
    } else if (/transfer/.test(loc)) {
        $('#transfer-page').addClass('active');
    } else if (/withdraw/.test(loc)) {
        $('#withdraw-page').addClass('active');
    } else if (/promotion/.test(loc)) {
        $('#promotion-page').addClass('active');
    } else if (/history/.test(loc)) {
        $('#history-page').addClass('active');
    } else {

    }

});
</script>

<!-- add active selected -->
<script>
var selector = ".wallet-select";
$(selector).on('click', function() {
    $(selector).removeClass('active');
    $(this).addClass('active');
});
</script>

<!-- hide wallet amount -->
<script>
$(document).ready(function() {
    $(".hideAmount").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        $(".balanceAmount").toggleClass("hide_field");
    })
});
</script>