<footer>
    <div class="footer_nav" id="home_active">
        <a href="../" id="home_active_img">
            <img src="../assets/img/s9/footer/home.png" alt="">
            <p id="home" data-translate="home" class="language">Home</p>
        </a>
    </div>
    <div class="footer_nav" id="funds_active">
        <a href="../transfer" id="funds_active_img" class="noti_call">
            <img src="../assets/img/s9/footer/funds.png" alt="">
            <p data-translate="funds" class="language">Funds</p>
        </a>
    </div>
    <div class="footer_nav" id="myacc_active">
        <a href="../myaccount" id="myacc_active_img" class="noti_call">
            <img src="../assets/img/s9/footer/my_account.png" alt="">
            <p data-translate="my_account" class="language">My Account</p>
        </a>
    </div>

    <div class="footer_nav" id="promotion_active">
        <a href="../promotion" id="promotion_active_img">
            <img src="../assets/img/s9/sidebar/promo.png" alt="">
            <p data-translate="promotion" class="language">Promo</p>
        </a>
    </div>
    <!-- <div class="footer_nav" id="promotion_active">
        <a href="#" id="promotion_active_img">
            <img src="../assets/img/s9/footer/live_chat.png" alt="">
            <p data-translate="" class="language">Chat with us</p>
        </a>
    </div> -->
    <!-- <div class="footer_nav" id="livechat_active">
        <a href="#" id="livechat_active_img">
            <img src="assets/img/footericon/menu_icon_livechat.svg" alt="">
            <p data-translate="live_chat" class="language">Live Chat</p>
        </a>
    </div> -->
    <div class='lc-tx'>
        <span>Chat with us</span>
    </div>
</footer>

<!-- FOOTER HOVER -->
<script>
$(function() {
    var loc = window.location.href; // returns the full URL
    if (/transfer/.test(loc)) {
        $('#funds_active').css('background', '#fff');
        $("#funds_active p").css('color', ' var(--main-color)')
        $('#funds_active_img').css('color', '#000');
    } else if (/myaccount/.test(loc)) {
        $('#myacc_active').css('background', '#fff');
        $("#myacc_active p").css('color', ' var(--main-color)')
        $('#myacc_active_img').css('color', '#000');
    } else if (/promotion/.test(loc)) {
        $('#promotion_active').css('background', '#fff');
        $("#promotion_active p").css('color', ' var(--main-color)')
        $('#promotion_active_img').css('color', '#000');
    } else {
        $('#home_active').css('background', '#fff');
        $("#home_active p").css('color', ' var(--main-color)')
        $('#home_active_img').css('color', '#000');
    }
});


$(document).ready(function() {
    var member_id = '<?= $member_id ?>';
    var lang = $('#session_lang').val();
    if (member_id) {
        $('#funds_active_img').attr("href", "../transfer")
        $('#myacc_active_img').attr("href", "../myaccount")
    } else {
        console.log("no member id");
        $('#funds_active_img').attr("href", "#")
        $('#myacc_active_img').attr("href", "#")
        $('.noti_call').click(function() {
            // console.log("test1")
            if (lang == "bm") {
                msg = "Sila Log Masuk Untuk Terus!";
            } else if (lang == "cn") {
                msg = '请登录访问更多内容！';
            } else {
                msg = "Please Login To Continue!";
            }

            Swal.fire({
                html: "<div class='swal-alert'>  <i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                    msg + "</div>",
                showConfirmButton: true,
                scrollbarPadding: false,
                showCloseButton: false,
                closeButtonHtml: "<i class='fal fa-times alert_icon' aria-hidden='true'></i>",
                position: 'center',
                type: "Success",
                customClass: {
                    actions: 'before-login-action',
                    confirmButton: 'before-login-ok',
                    popup: 'before-login-cont',
                }})
        });
    }
});
</script>