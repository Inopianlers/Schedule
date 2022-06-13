<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/home/head.php';?>
    <style>
    body {
        background-image: url(assets/img/landingpage/landing_background_02.png) !important;
        background-image: url(assets/img/landingpage/landing_background_02.png), #000000 !important;
        background-color: #000000;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .scroll-down {
        opacity: 1;
        -webkit-transition: all .5s ease-in 3s;
        transition: all .5s ease-in 3s;
    }

    .scroll-down {
        position: absolute;
        bottom: 30px;
        left: 50%;
        margin-left: -16px;
        display: block;
        width: 32px;
        height: 32px;
        border: 2px solid var(--main-color);
        background-size: 14px auto;
        border-radius: 50%;
        z-index: 2;
        -webkit-animation: bounce 2s infinite 2s;
        animation: bounce 2s infinite 2s;
        -webkit-transition: all .2s ease-in;
        transition: all .2s ease-in;
        transform: scale(1)
    }

    .scroll-down:before {
        position: absolute;
        top: calc(50% - 8px);
        left: calc(50% - 6px);
        transform: rotate(-45deg);
        display: block;
        width: 12px;
        height: 12px;
        content: "";
        border: 2px solid var(--main-color);
        color: var(--main-color);
        border-width: 0px 0 2px 2px;
    }

    @keyframes bounce {

        0%,
        100%,
        20%,
        50%,
        80% {
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }

        40% {
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        60% {
            -webkit-transform: translateY(-5px);
            -ms-transform: translateY(-5px);
            transform: translateY(-5px);
        }
    }

    .swal2-close:focus {
        box-shadow: none !important;
    }

    .swal2-close {
        color: #000 !important;
        top: 5px !important;
        right: 5px !important;
        font-size: 1.3em !important;
    }

    .swal-button {
        background-color: var(--main-color) !important;
    }

    .swal-button:focus {
        box-shadow: none !important;
    }

    .swal-footer {
        text-align: center !important;
    }

    .swal2-styled:focus {
        outline: none !important;
        box-shadow: none !important;
    }
    </style>
</head>



<body>
    <div class="body-wrap">
        <section class="lp-wrap section-lp">
            <div class="lp-img">
                <img src="assets/img/b88_logo.png" alt="">
            </div>

            <div class="lp-tx">
                <span>Asia's Most Trusted Platform <br> Fool The Excitement With B88!</span>
            </div>

            <div class="lp-btn">
                <button onclick="redirecthome()"><img src="assets/img/landingpage/currency_malaysia.png"
                        alt=""><br>Malaysia</button>

                <button onclick="cms()"><img src="assets/img/landingpage/currency_thailand.png"
                        alt=""><br>Thailand</button>
            </div>

            <a href="#" class="scroll-down" address="true"></a>
        </section>

        <section class="section-lp section-down">
            <div class="wc-wrap">
                <span class="wc-tx1">WHY CHOOSE</span>
                <img class="wc-img" src="assets/img/b88_logo.png" alt="">
                <hr class="t-line" size="30" color="#ffd97a">

                <span class="wc-tx2">B88 ESTABLISHED IN 2018</span>
                <p>B88 members entertainment is our top priority. <br>
                    We believe in providing only the best services to our <br>
                    members with the most security and rewards system.</p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_security.png" alt="">
                </div>
                <span>SECURITY & PRIVACY</span>
                <p>
                    B88 uses state-of-the-art security and we take player's <br>
                    anonymity and data privacy very seriously. Rest assured <br>
                    you are safe when you play at B88.
                </p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_promotion.png" alt="">
                </div>
                <span>PROMOTIONS & BONUSES</span>
                <p>
                    B88 provides multiple form of promotions and bonuses <br>
                    to our players. Get up to 100% deposit bonus for new <br>
                    users and high rebates!
                </p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_five_star.png" alt="">
                </div>
                <span>FIVE STAR SERVICE & FAST WITHDRAWAL</span>
                <p>
                    For a seamless gaming experience,B88 are always be <br>
                    there for you to assits and serve our members 24/7 Live <br>
                    Chat an any inquiries. Our payment gateway providers <br>
                    make secure, speedy deposits and withdrawals
                </p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_rewards.png" alt="">
                </div>
                <span>REWARDS SYSTEM</span>
                <p>
                    B88 launched a new integral reward program to thank <br>
                    all members for their long-standing support and love. <br>
                    the afficial launch of gift exchange zone to get your <br>
                    favourite prizes.
                </p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_latest_game.png" alt="">
                </div>
                <span>LATEST GAMES</span>
                <p>
                    By collaborating with international vendors, we are able <br>
                    to provide the most latest and entertaining games for everyone. <br>
                    Find your most favourite and exciting games <br>
                    at B88!
                </p>
            </div>

            <div class="be-cont-wrap">
                <div>
                    <img src="assets/img/landingpage/benefit_multi_region.png" alt="">
                </div>
                <span>MULTI REGION</span>
                <p>
                    B88 are rapidly expanding around the world. While we <br>
                    are now available in Malaysia and Thailand, so no <br>
                    matter where you are, B88 always be with you.
                </p>
            </div>
            <style>
            [type="radio"]:checked,
            [type="radio"]:not(:checked) {
                position: absolute;
                left: -9999px;
            }

            [type="radio"]:checked+label,
            [type="radio"]:not(:checked)+label {
                position: relative;
                letter-spacing: 3px;
                cursor: pointer;
                line-height: 30px;
                font-size: 12px;
                text-transform: uppercase;
                font-weight: 500;
                color: #fff;
                margin-right: 10px;
                margin-left: 10px;
                -webkit-transition: all 0.2s ease;
                transition: all 0.2s ease;
            }

            [type="radio"]:not(:checked)+label:after {
                opacity: 0;
                width: 0;
            }

            [type="radio"]:checked+label:after {
                opacity: 1;
                width: calc(100% - 24px);
            }

            .checkbox-all:checked+label {

                color: #ffd97a;
            }

            .checkbox-slots:checked+label {
                color: #ffd97a;
            }

            .checkbox-sport:checked+label {
                color: #ffd97a;
            }

            .checkbox-live:checked+label {
                color: #ffd97a;
            }

            .checkbox-esport:checked+label {
                color: #ffd97a;
            }

            .checkbox-lottery:checked+label {
                color: #ffd97a;
            }

            .seperator {
                width: 100%;
                height: 30px;
            }

            .cards {
                display: flex;
                flex-wrap: wrap;
            }

            .project {
                width: 50%;
                -webkit-transition: all 0.2s linear;
                transition: all 0.3s linear;
            }


            .project.slots,
            .project.sport,
            .project.live,
            .project.esport,
            .project.lottery {
                opacity: 0;
                transform: scale(0);
                padding: 0;
                margin: 0;
                display: none;
                border-width: 0;
            }

            .checkbox-all:checked~.cards .project.slots,
            .checkbox-all:checked~.cards .project.sport,
            .checkbox-all:checked~.cards .project.live,
            .checkbox-all:checked~.cards .project.esport,
            .checkbox-all:checked~.cards .project.lottery,
            .checkbox-slots:checked~.cards .project.slots,
            .checkbox-sport:checked~.cards .project.sport,
            .checkbox-live:checked~.cards .project.live,
            .checkbox-esport:checked~.cards .project.esport,
            .checkbox-lottery:checked~.cards .project.lottery {
                opacity: 1;
                min-width: calc(22% - 28px);
                display: block;
                padding: 20px;
                transform: scale(1);
                border-width: 3px;
            }
            </style>
            <div class="ap-wrap">
                <P>
                    AVAILABLE <br> <span> PLATFORM</span>
                </P>

                <hr class="t-line" size="30" color="#ffd97a">

                <input class="checkbox-all" id="all" type="radio" name="checkbox" checked="" />
                <label for="all">all</label>
                <input class="checkbox-slots" id="slots" type="radio" name="checkbox" />
                <label for="slots">Slots</label>
                <input class="checkbox-live" id="live" type="radio" name="checkbox" />
                <label for="live">Live Casino</label>
                <input class="checkbox-sport" id="sport" type="radio" name="checkbox" />
                <label for="sport">Sportsbook</label>
                <input class="checkbox-esport" id="esport" type="radio" name="checkbox" />
                <label for="esport">E-sports</label>
                <input class="checkbox-lottery" id="lottery" type="radio" name="checkbox" />
                <label for="lottery">Lottery</label>



                <!-- project cards-->
                <div class="cards">
                    <div class="project slots">
                        <img src="assets/img/landingpage/game_provider_01.png" alt="">
                    </div>
                    <div class="project slots">
                        <img src="assets/img/landingpage/game_provider_02.png" alt="">
                    </div>
                    <div class="project slots">
                        <img src="assets/img/landingpage/game_provider_03.png" alt="">
                    </div>
                    <div class="project slots">
                        <img src="assets/img/landingpage/game_provider_04.png" alt="">
                    </div>
                    <div class="project slots live">
                        <img src="assets/img/landingpage/game_provider_05.png" alt="">
                    </div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_06.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_07.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_08.png" alt=""></div>
                    <div class="project slots live"> <img src="assets/img/landingpage/game_provider_09.png" alt="">
                    </div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_10.png" alt=""></div>
                    <div class="project slots" style="opacity:50%;"> <img
                            src="assets/img/landingpage/game_provider_11.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_12.png" alt=""></div>
                    <div class="project slots live"> <img src="assets/img/landingpage/game_provider_13.png" alt="">
                    </div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_14.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_15.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_16.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_17.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_18.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_19.png" alt=""></div>
                    <div class="project slots" style="opacity:50%;"> <img
                            src="assets/img/landingpage/game_provider_20.png" alt=""></div>
                    <div class="project slots" style="opacity:50%;"> <img
                            src="assets/img/landingpage/game_provider_21.png" alt=""></div>
                    <div class="project slots" style="opacity:50%;"> <img
                            src="assets/img/landingpage/game_provider_22.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_23.png" alt=""></div>
                    <div class="project slots live"> <img src="assets/img/landingpage/game_provider_24.png" alt="">
                    </div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_25.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_26.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_27.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_28.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_29.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_30.png" alt=""></div>
                    <div class="project live"> <img src="assets/img/landingpage/game_provider_31.png" alt=""></div>
                    <div class="project sport"> <img src="assets/img/landingpage/game_provider_32.png" alt=""></div>
                    <div class="project sport"> <img src="assets/img/landingpage/game_provider_33.png" alt=""></div>
                    <div class="project sport"> <img src="assets/img/landingpage/game_provider_34.png" alt=""></div>
                    <div class="project lottery"> <img src="assets/img/landingpage/game_provider_35.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_36.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_37.png" alt=""></div>
                    <div class="project slots"> <img src="assets/img/landingpage/game_provider_38.png" alt=""></div>
                    <div class="project esport"> <img src="assets/img/landingpage/game_provider_39.png" alt=""></div>
                </div>

            </div>
            <div class="footer-ldp">
                <div>
                    <div class="ldp-tl"><span>Licenses</span></div>
                    <div class="ldp-img1">
                        <img class="pl-0" src="assets/img/landingpage/footer_license_01.png" alt="">
                        <img src="assets/img/landingpage/footer_license_02.png" alt="">
                        <img src="assets/img/landingpage/footer_license_03.png" alt="">
                        <img class="pl-0 w-50" src="assets/img/landingpage/footer_license_04.png" alt="">
                        <img class="w-50" src="assets/img/landingpage/footer_license_05.png" alt="">
                    </div>
                </div>
                <div>
                    <div class="ldp-tl"><span>Gaming Licenses</span></div>
                    <div class="ldp-img2">
                        <img src="assets/img/landingpage/footer_gaming_curacao.png" alt="">
                    </div>
                </div>
                <div>
                    <div class="ldp-tl"><span>Payment Method</span></div>
                    <div class="ldp-img3">
                        <img class="pl-0" src="assets/img/landingpage/footer_payment_01.png" alt="">
                        <img src="assets/img/landingpage/footer_payment_02.png" alt="">
                        <img class="pl-0 pt-0" src="assets/img/landingpage/footer_payment_03.png" alt="">
                    </div>
                </div>

                <p class="ldp-cpy">
                    <span>COPYRIGHTS &copy; 2021 B88.ALL RIGHTS RESERVED. </span>
                </p>
            </div>


        </section>

    </div>


    <!-- ==== FOOTERLINK ===== -->
    <?php include 'template/home/footerlink.php';?>
    <!-- script -->
    <!-- filter provider -->
    <script>
    $(function() {
        $('.scroll-down').click(function() {
            $('html, body').animate({
                scrollTop: $('section.section-down').offset().top
            }, 'slow');
            return false;
        });
    });
    </script>

    <script>
    function cms() {

        Swal.fire({
            html: "<div>Something NEW is coming soon! </br> Stay Tuned.</div>",
            showConfirmButton: true,
            showCloseButton: false,
            confirmButtonColor: '#C99A55',
            closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
            type: "success"
        })
    }

    function redirecthome() {

        window.location.href = "index.php";
    }
    </script>
</body>

</html>