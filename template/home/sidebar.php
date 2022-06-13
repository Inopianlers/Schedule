<div id="nav-overlay"></div>
<nav class="real-menu" role="navigation">

    <div class="sidebarlogo">
        <?php
        if($language == 'bm'){
            $langsb = "BM";
        }else if($language == 'cn'){
            $langsb = "CN";
        }else{
            $langsb = "EN";
        }
        ?>
        <img src="assets/img/s9/side_bar.png" alt="">

        <div class='sb-logo-wrap'>
            <img class='sb-logo' src="assets/img/s9/S9ASIA LOGO.png" alt="">
            <span class='language' data-translate='playnowwinmore'>PLAY NOW! WIN MORE!</span>
        </div>

    </div>
    <?php if($language=="bm"){
        $language_img="bm";
    }
    else if($language=="cn"){
        $language_img="cn";
    }
    else{
        $language_img="en";
}?>

    <ul>
        <li><a href="."><img src="assets/img/s9/sidebar/home.png" alt=""><span class="language"
                    data-translate="home">Home</span></a></li>
        <!-- <li><a href="promotion"><img src="assets/img/s9/sidebar/promo.png" alt=""><span class="language"
                    data-translate="promotion">Promo</span></a></li> -->
        <li><img class="cms-sb" src="assets/img/s9/sidebar/coming_soon_<?=$language_img?>.png" alt=""
                class="sidebar_cms_img"><a href="vip" style="opacity:.5"><img src="assets/img/s9/sidebar/vip.png"
                    alt=""><span class="language" data-translate="vip">VIP</span></a></li>
        <li><img class="cms-sb" src="assets/img/s9/sidebar/coming_soon_<?=$language_img?>.png" alt=""
                class="sidebar_cms_img"><a href="#" style="opacity:.5"><img src="assets/img/s9/sidebar/reward.png"
                    alt=""><span class="language" data-translate="reward">Reward</span></a></li>

        <li><img class="cms-sb" src="assets/img/s9/sidebar/coming_soon_<?=$language_img?>.png" alt=""
                class="sidebar_cms_img"><a href="#" style="opacity:.5"><img src="assets/img/s9/sidebar/Affiliate.png"
                    alt=""><span class="language" data-translate="affiliate">Affiliate</span></a></li>

        <li><a href="contactus"><img src="assets/img/s9/sidebar/contact_us.png" alt=""><span class="language"
                    data-translate="contact_us">Contact us</span></a></li>
        <li class='<?php echo $show1?>'><a href="logout"><img src="assets/img/s9/sidebar/logout.png" alt=""><span
                    class="language" data-translate="logout">Logout</span></a></li>
    </ul>

</nav>



<!-- <script>
    function activaTab(tab) {
      $('.nav-pills a[href="#' + tab + '"]').tab('show');
    };

    function activate(evt, cityName) {
        $("#defmobslot").addClass("active");
}
</script>  -->
<script>
if ($('.real-menu ul li').hasClass('hidden')) {
    $('.real-menu ul li:nth-last-child(2)').css('border-bottom', 'none');
}
</script>