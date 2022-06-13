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
        <!-- ==== VERIFY ===== -->
        <?php include '../template/verify.php';?>
        <!-- ==== USER INFO ===== -->
        <div class="back-btn">
            <a href="../myaccount"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
            <span class="language" data-translate="user_info">USER INFO</span>
        </div>
<!-- 
        <div class="userinfo__wrap">
            <div class='userinfo-outer'>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/user_info.png" alt=""></span>
                    <span class="user__info-left language" data-translate="username">Username</span>
                </div>
                <div class="user__det"><?= $member_username?></div>
            </div>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/full_name.png" alt=""></span>
                    <span class="user__info-left language" data-translate="full_name">Full Name</span>
                </div>
                <div class="user__det"><?= $member_full_name ?></div>
            </div>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/contact_number.png" alt=""></span>
                    <span class="user__info-left language" data-translate="contact_number">Contact Number</span>
                </div>
                <div class="user__det">
                    <?php echo  $member_contact_no =  str_pad(substr($member_contact_no, -4), strlen($member_contact_no), '*', STR_PAD_LEFT);?>
                </div>
            </div>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/date_of_birth.png" alt=""></span>
                    <span class="user__info-left language" data-translate="dob">Date of Birth</span>
                </div>
                <div id="div_member_birthday" class="user__det" <?=$hide_div_dob?>>
                    <?php echo $member_birthday?>
                </div>
                <div id="modal_dob" class="user__det " <?php echo $hide_modal_dob?>><a data-toggle="modal"
                        data-target="#birthday"><i class="fal fa-edit" aria-hidden="true"></i></a></div>
            </div>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/email.png" alt=""></span>
                    <span class="user__info-left language" data-translate="email">Email</span>
                </div>
                <div class="user__det">
                    <?=$member_email?>
                </div>
            </div>
            <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/currency.png" alt=""></span>
                    <span class="user__info-left language" data-translate="currency">Currency</span>
                </div>
                <div class="user__det">
                    <?= $member_currency_name?>
                </div>
            </div>
            </div>

        </div> -->
<!-- ============ -->
        <div class="userinfo__wrap">

            <div class="userinfo-outer">
                <div class="userinfo__wrap-row">
                    <div class="d-flex">
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/user_info.png" alt=""></span>
                        <span class="user__info-left language" data-translate="username">Username</span>
                    </div>
                    <div class="user__det"><?php echo $member_username ?></div>
                </div>

                <div class="userinfo__wrap-row">
                    <div class="d-flex">
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/full_name.png" alt=""></span>
                        <span class="user__info-left language" data-translate="full_name">Full name</span>
                    </div>
                    <div class="user__det"><?php echo $member_full_name ?></div>
                </div>

                <div class="userinfo__wrap-row">
                    <div class="d-flex">
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/contact_number.png" alt=""></span>
                    <span class="user__info-left language" data-translate="contact_number">Contact Number</span>
                    </div>
                    <div class="user__det">
                        <?php echo  $member_contact_no =  str_pad(substr($member_contact_no, -4), strlen($member_contact_no), '*', STR_PAD_LEFT);?>
                    </div>
                </div>

                <div class="userinfo__wrap-row">
                    <div class="d-flex">
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/date_of_birth.png" alt=""></span>
                    <span class="user__info-left language" data-translate="dob">Date of Birth</span>
                    </div>
                    <div id="div_member_birthday" class="user__det <?=$hide_div_dob?>">
                        <?php echo $member_birthday?>
                    </div>
                    <div id="modal_dob" class="user__det <?php echo $hide_modal_dob?>"><a data-toggle="modal"
                            data-target="#birthday"><i class="fal fa-edit"></i></a>
                    </div>
                </div>

                <div class="userinfo__wrap-row">
                    <div class="d-flex">
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/email.png" alt=""></span>
                    <span class="user__info-left language" data-translate="email">Email</span>
                    </div>
                    <div class="user__det"><?=$member_email?></div>
                </div>

                <div class="userinfo__wrap-row">
                <div>
                    <span class="userinfo-icon"><img src="../assets/img/s9/userinfo/currency.png" alt=""></span>
                    <span class="user__info-left language" data-translate="currency">Currency</span>
                </div>
                <div class="user__det">
                    <?= $member_currency_name?>
                </div>
            </div>

            </div>

        </div>

        <!-- birthday popup -->
        <div class="modal fade" id="birthday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-bd" role="document">
                <div class="modal-content modal-bd-content">
                    <div class="modal-body modal-body-bd">

                        <div class="bd-head">
                            <span class="language" data-translate="dob">Date of Birth</span>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                            </button>
                        </div>

                        <label class="input-label">
                            <span class="input-label-tx language" data-translate="date">Date</span>
                            <span class="required-tx">*<span class="language" data-translate="required_select">Required
                                    to select</span></span>
                        </label>
                        <br>
                        <input type="date" class="input-form-bd" id="user_dob">
                        <br>
                        <button class="submit-btn-bd" type="button" id="btn_add_birthday">
                            <span class="language" data-translate="save">Save</span>
                        </button>

                        <div class="reminder-wrap">
                            <span><span class="language" data-translate="reminder">Reminder</span>:</span>
                            <?php if($language=='bm'){
                                echo"<p class='tb'> 1. Anda hanya dibenarkan mengedit Tarikh Lahir anda sekali.</p>
                                <p class='tb'> 2. Anda mesti berumur sekurang-kurangnya 18 tahun untuk meneruskan.</p>";
                            }else if($language=='cn'){
                                echo"<p class='tb'> 1. 您只能编辑您的出生日期一次。</p>
                                <p class='tb'> 2. 您必须至少年满 18 岁才能继续。</p>";
                            }else if($language=='th'){
                                echo"<p class='tb'> 1. คุณได้รับอนุญาตให้แก้ไขวันเดือนปีเกิดของคุณได้เพียงครั้งเดียว</p>
                                <p class='tb'> 2. คุณต้องมีอายุอย่างน้อย 18 ปี จึงจะดำเนินการต่อได้</p>";
                            }else{
                                echo"<p class='tb'> 1.You are only allowed to edit your Date of Birth once.</p>
                                <p class='tb'> 2. You must at least 18 years of age to continue.</p>";
                            }?>
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
    <?php include '../template/myaccountscript.php';?>

</body>

</html>