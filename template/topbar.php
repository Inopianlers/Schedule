<?php
 session_start();

  $language = $_SESSION['language'];

if (isset($_SESSION['member_id'])) {
    $annoucement_pop_up = "checkCookie()";
  } else {
    $annoucement_pop_up = "";
  }?>

<header class="header">
    <button id="open-menu">
        <i class="fal fa-bars icon-grad"></i>
    </button>
    <a href="../">
        <img class="logo-anistar" src="assets/img/s9/LG.png" alt="">
        <img class="logo" src="assets/img/s9/LG.png" style="" alt="">
    </a>
    <button class="btn-flag" data-toggle="modal" data-target="#lang-modal">
        <img src="../assets/img/malaysia_flag.png" alt="">
        <span id='lang-tx'>BM</span>
    </button>
</header>


<!-- language select popup -->
<div class="modal fade" id="lang-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-language " role="document">
        <div class="modal-content lang-content">
            <div class="header-lang">
                <div class="rl-title"><span class="language" data-translate="region_language">Region and Language</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="modal-body lang-body">
                <div class="modal_language">
                    <div>
                        <div class="language_region"><img src="../assets/img/malaysia_flag.png" alt=""></div>
                        <div class="language_section">
                            <button onclick='inggeris();' name="EN" value="EN" id="EN" class="EN">EN</button>|
                            <button onclick='melayu();' name="malay" value="BM" id="malay" class="malay">BM</button>
                            <!-- <button onclick='cina();' value="CN" id="chinese" class="chinese">CN</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- OVERLAY LOGO -->
<div id="overlaylogo">
    <div class="overlay_logo">
        <img src="../assets/img/s9/S9ASIA LOGO.png" alt="LOGO">
    </div>
</div>


<div id="load">
    <div class="overlay_logo">
        <img src="../assets/img/s9/S9ASIA LOGO.png" alt="LOGO">
    </div>
</div>