<script type="text/javascript">
$('#bank_num').bind('input', function() {
    var c = this.selectionStart,
        r = /[^0-9]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#profile_currentpass').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#profile_new_password').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#profile_confirm_password').bind('input', function() {
    var c = this.selectionStart,
        r = /[^a-z0-9-!@#$%^&*()-_+|~=`{}\[\]:";'<>?,.\/]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});
</script>

<script>
var lang = $('#session_lang').val();
// alert(lang);
if (lang == "cn") {

    $("#btn_change_password").val("提交");
    $("#btn_add_bank").val("提交");
    // $("#bank_num").attr("placeholder", "请输入户口号码");
    $("#profile_currentpass").attr("placeholder", "密码");
    $("#profile_new_password").attr("placeholder", "新密码");
    $("#profile_confirm_password").attr("placeholder", "确认密码");


} else if (lang == "bm") {

    $("#btn_change_password").val("Hantar");
    $("#btn_add_bank").val("Hantar");
    // $("#bank_num").attr("placeholder", "Sila masukkan nombor akaun anda.");
    $("#profile_currentpass").attr("placeholder", "Kata Laluan Semasa");
    $("#profile_new_password").attr("placeholder", "Kata Laluan Baru");
    $("#profile_confirm_password").attr("placeholder", "Sahkan Kata Laluan");


} else {

    $("#btn_change_password").val("Submit");
    $("#btn_add_bank").val("Submit");
    // $("#bank_num").attr("placeholder", "Please Enter Account No. ");
    $("#profile_currentpass").attr("placeholder", "Enter Password");
    $("#profile_new_password").attr("placeholder", "New Password");
    $("#profile_confirm_password").attr("placeholder", "Confirm password");

}
</script>

<script>
// PROFILE PAGE
var hash = location.hash.replace(/^#/, ''); // ^ means starting, meaning only match the first hash
if (hash) {
    $('.nav a[href="#' + hash + '"]').tab('show');
}
// Change hash for page-reload
$('.nav a').on('shown.bs.tab', function(e) {
    window.location.hash = e.target.hash;
})
</script>

<script>
$('#btn_add_bank').click(function() {
    var user_id = "<?php echo $member_id ?>";
    var bank_id = $('#bank_id').val();
    var bank_num = $('#bank_num').val();
    var lang = "<?php echo $language ?>";
    console.log(bank_id, bank_num)
    if (lang == "cn") {
        msg_addbankfail1 = "请选择银行。";
    } else if (lang == "bm") {
        msg_addbankfail1 = "Sila pilih bank.";

    } else {
        msg_addbankfail1 = "Please select bank.";
    }

    if (lang == "cn") {
        msg_addbankfail = "请输入您的户口号码。";
    } else if (lang == "bm") {
        msg_addbankfail = "Sila masukkan nombor akaun anda.";

    } else {
        msg_addbankfail = "Please enter your account number.";
    }

    if (bank_id != 0) {

        if (user_id != '' && bank_num != '') {

            // overlay_cover();

            $.ajax({
                url: '../controller/ajax/addbank/index.php',
                type: 'GET',
                data: {
                    user_id: user_id,
                    bank_id: bank_id,
                    bank_num: bank_num
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(data) {
                    // console.log(data);
                    var user_bank_detail = data.member_bank_detail;
                    var alert_message = data.alert_message;
                    var id = data.user_id;
                    var username = data.user_name;
                    var member_bank_num = data.user_bank_num;
                    var member_bank_name = data.user_bank_name;
                    var member_bank_logo = data.user_bank_logo;
                    var icon_delete_id = data.delete_id;
                    var error_code = data.error_code;
                    // console.log(member_bank_num);

                    // alert(user_bank_detail)

                    // alert(user_bank_detail)
                    if (data != '' || data != 0) {
                        if (error_code != 0) {
                            $('#detect_bank_card').addClass("hidden");
                            Swal.fire({
                                html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                                    alert_message + "</div>",
                                showConfirmButton: false,
                                scrollbarPadding: false,
                                showCloseButton: true,
                                closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                                position: 'center',
                                type: "success"

                            }).then(function() {
                                // location.reload();
                            });
                            $('#get_bank_bar').append(

                                "<div class='bank_details' id=' " + icon_delete_id +
                                " '>" +
                                "<table id='bank__table'>" +
                                "<tr>" +
                                "<td hidden> " + icon_delete_id + "</td>" +
                                "<td rowspan='3' class='bank__img'><img src='../assets/img/" +
                                member_bank_logo + "' alt=''></td>" +
                                "<td style='text-align: left;' class='pl-2'><b>" + username + "</b> </td>" +
                                "<td rowspan='3' class='delete__icon'><a ><i class='fal fa-trash-alt' aria-hidden='true'></i></a></td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td style='text-align: left;' class='pl-2'>" + member_bank_num + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "<td style='text-align: left;' class='pl-2'>" + member_bank_name + "</td>" +
                                "</tr>" +
                                "</table>" +
                                "</div>"




                            );
                            $('#bank_num').val("");
                            $('#bank_id').val("");
                            $('#addbank').modal('hide');


                        } else {
                            // swal({
                            //     text: alert_message,
                            //     type: "success"
                            // })

                            Swal.fire({

                                html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                                    alert_message + "</div>",
                                showConfirmButton: false,
                                scrollbarPadding: false,
                                showCloseButton: true,
                                closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                                position: 'center',
                                type: "success"

                            }).then(function() {
                                $('#addbank').modal('hide');

                            });

                        }
                    } else {
                        // swal({
                        //     text: alert_message,
                        //     type: "success"
                        // })
                        Swal.fire({
                            html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                                alert_message + "</div>",
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            showCloseButton: true,
                            closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
                            position: 'center',
                            type: "success"
                        }).then(function() {
                            $('#addbank').modal('hide');
                        });


                    }

                    // location.reload();

                    // var table_tab = $('#table_tab');

                }

            });
        } else {
            Swal.fire({
                // text: msg_addbankfail1,
                // type: "success"
                html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                    msg_addbankfail + "</div>",
                showConfirmButton: false,
                scrollbarPadding: false,
                showCloseButton: true,
                closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                position: 'center',
                type: "success"
            })
        }
    } else {
        Swal.fire({
            html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                msg_addbankfail1 + "</div>",
            showConfirmButton: false,
            scrollbarPadding: false,
            showCloseButton: true,
            closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
            position: 'center',
            type: "success"
        })
    }
});


$('#get_bank_bar').on('click', '.delete__icon', function() {
    var obj = $(this);
    console.log(obj);
    var delete_bank_id = $(this).closest('tr').find('td:eq(0)').text();

    // var delete_bank_id = $(this).attr('value');
    var user_id = "<?php echo $member_id ?>";
    var lang = "<?php echo $language ?>";
    var delete_text = '';
    var btn_confirm = '';
    var btn_cancel = '';
    var success_delete2 = '';
    console.log(delete_bank_id);

    if (lang == "cn") {
        delete_text = "确定要删除此银行账号吗?";
        btn_confirm = "确认";
        btn_cancel = "取消";
        success_delete = "您的银行已被删除";
    } else if (lang == "bm") {
        delete_text = "Pastikah nak padam bank akaun ini?";
        btn_confirm = "Kesah";
        btn_cancel = "Batal";
        success_delete = "Bank anda telah dipadam";

    } else {
        delete_text = "Confirm delete bank account number?";
        btn_confirm = "Confirm";
        btn_cancel = "Cancel";
        success_delete = "Your bank has been deleted";

    }

    Swal.fire({
        // text: delete_text,
        // showCancelButton: true,
        // confirmButtonColor: "#af633a",
        // confirmButtonText: btn_confirm,
        // cancelButtonText: btn_cancel,
        // buttonsStyling: true


        html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
            delete_text + "</div>",
        showCancelButton: true,
        confirmButtonText: btn_confirm,
        cancelButtonText: btn_cancel,
        buttonsStyling: true,
        closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
        position: 'center',
        type: "success"

    }).then(result => {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: "../controller/ajax/deletebank/index.php",
                data: {
                    delete_bank_id: delete_bank_id
                },
                cache: false,
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                beforeSend: function() {
                    console.log(delete_bank_id);
                },
                success: function(response) {
                    // console.log(response)
                    var user_bank_detail = response.return_bank;
                    var query = response.query;
                    // console.log(query)
                    // var return_msg = response.return_msg;

                    if (user_bank_detail == '0') {
                        $('#detect_bank_card').removeClass("hidden");

                        // console.log("asdsadfesda");
                        $(obj).closest('div').remove();

                    } else {
                        console.log("asdsadsda");
                        $(obj).closest('div').remove();

                        // $(obj).remove();


                        // $('#get_bank_bar').html(user_bank_detail);

                    }

                    // console.log(response)
                    // swal(
                    //     "",
                    //     success_delete,
                    //     "success"
                    // )
                    Swal.fire({
                        html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                            success_delete + "</div>",
                        showConfirmButton: false,
                        scrollbarPadding: false,
                        showCloseButton: true,
                        closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                        position: 'center',
                        type: "success"
                    })
                },
                error: function(xhr) { // if error occured

                    console.log(xhr.statusText + xhr.responseText);

                },
                failure: function(response) {
                    // swal(
                    //     "Internal Error",
                    //     "No bank card found", // had a missing comma
                    //     "error"
                    // )
                    Swal.fire({
                        html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>Internal Error,No bank card found,error</div>",
                        showConfirmButton: false,
                        scrollbarPadding: false,
                        showCloseButton: true,
                        closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                        position: 'center',
                        type: "success"
                    })

                }
            });
        }
    });
});
</script>

<!--start user add birthday -->
<script>
$("#btn_add_birthday").click(function() {
    var dob_value = $('#user_dob').val();
    var member_id = '<?=$member_id?>';
    var session = $('#session_lang').val();
    msg = "";
    console.log(dob_value);
    if (dob_value != '' || dob_value != null) {
        $.ajax({
            url: '../controller/ajax/set_dob/',
            type: 'GET',
            data: {
                dob_value: dob_value,
                id: member_id
            },
            dataType: 'json',
            contentType: "application/json; charset=UTF-8",
            success: function(response) {

                var return_message = response.return_msg;
                // console.log("setting dob: "+return_message);
                console.log(response)
                if (return_message == 0) {

                    if (session == 'bm') {

                        msg =
                            "Tarikh lahir anda telah berjaya dikemas kini.";

                    } else if (session == 'cn') {
                        msg =
                            "您的生日已成功更新。";
                    } else {
                        msg =
                            "Your date of birth has been updated successfully.";

                    }
                    $("#modal_dob").addClass("hide")

                } else {

                    if (session == 'bm') {
                        msg =
                            "Ralat berlaku, sila cuba lagi.";

                    } else if (session == 'cn') {
                        msg =
                            "发生错误，请重试。";
                    } else {
                        msg =
                            "Error Occured. Please try again.";

                    }

                }

                // Swal.fire({
                //     html: msg,
                //     showConfirmButton: false,
                //     showCloseButton: true,
                //     closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
                //     position: 'center',
                //     type: "success"
                // })

                Swal.fire({
                    html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                        msg + "</div>",
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    showCloseButton: true,
                    closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
                    position: 'center',
                    type: "success"
                }).then(function() {
                    location.reload();
                });
            }

        });
    }
});
</script>
<!--end user add birthday -->

<!-- Check Current Code Same As User Type Start-->
<script type="text/javascript">
var session = $('#session_lang').val();

function check_password_input() {
    var current_password = $('#current_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
    var session = $('#session_lang').val();

    if (new_password != '' && confirm_password != '' && new_password == confirm_password && current_password !=
        '') {

        $('#btn_change_password').prop('disabled', false);
    }

}
</script>
<!-- Check Current Code Same As User Type Start-->

<!-- Change Password Process Start -->
<script>
function change_password_process() {
    var member_id = '<?=$member_id?>';
    var current_password = $('#profile_currentpass').val();
    var new_password = $('#profile_new_password').val();
    var confirm_password = $('#profile_confirm_password').val();
    var session = $('#session_lang').val();
    var msg = "";
    console.log(current_password, new_password, confirm_password)

    function swal_lang(session, return_message, reload_verify) {
        // Swal.fire({
        //     html: "<div class='d-flex align-items-center  justify-content-center swal-alert'><i class='fas fa-exclamation-circle alert_icon'></i>&nbsp;<span class=language>" +
        //         return_message + "</span></div>",
        //     showConfirmButton: false,
        //     showCloseButton: true,
        //     closeButtonHtml: "<i class='far fa-times-circle icon-close'></i>",
        //     position: 'center',
        //     type: "success"
        // })

        Swal.fire({
            html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
                return_message + "</div>",
            showConfirmButton: false,
            scrollbarPadding: false,
            showCloseButton: true,
            closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
            position: 'center',
            type: "success"
        }).then(function() {
            if (reload_verify == true) {
                page_reload = window.location.reload();
            } else {
                page_reload = '';
            }
        });

        if (session == 'th') {
            var lang = $(this).attr('id');
            // console.log(lang);

            var mydata = JSON.parse(thai);
            // console.log(mydata);
            $('.language').each(function(index, item) {
                $(this).text(mydata[0][$(this).attr('id')]);
                $(this).text(mydata[0][$(this).text()]);
            });
        } else if (session == 'bm') {
            var lang = $(this).attr('id');
            // console.log(lang);

            var mydata = JSON.parse(malay);
            // console.log(mydata);
            $('.language').each(function(index, item) {
                $(this).text(mydata[0][$(this).attr('id')]);
                $(this).text(mydata[0][$(this).text()]);
            });

        } else if(session == 'cn') {
            var lang = $(this).attr('id');

            var mydata = JSON.parse(chinese);
            // console.log(mydata);
            $('.language').each(function(index, item) {
                $(this).text(mydata[0][$(this).attr('id')]);
                $(this).text(mydata[0][$(this).text()]);
            });
        }else{
            
        }
    }

    // console.log("Current Password："+current_password);

    // Check Member ID Start
    if (member_id != '0' && member_id != '' && member_id != null) {

        // Check Current Password Start
        if (current_password != '' && current_password != null && current_password.length != 0) {
            // console.log("bashsa")
            // Current Password Length Start
            if (current_password.length >= 6) {

                // Check New Password Start
                if (new_password != '' && new_password != null && new_password.length != 0) {

                    // Check New Password Length Start
                    if (new_password.length >= 6) {

                        // Check Confirm Password Start
                        if (confirm_password != '' && confirm_password != null && confirm_password.length != 0) {

                            // Check Confirm Password Length Start
                            if (confirm_password.length >= 6) {

                                // Check New Password == Confirm Password Start
                                if (new_password == confirm_password) {
                                    console.log(new_password, confirm_password);
                                    // Change Password Ajax Start
                                    $.ajax({
                                        url: '../controller/ajax/change_password_process',
                                        type: 'GET',
                                        data: {
                                            member_id: member_id,
                                            current_password: current_password,
                                            new_password: new_password,
                                            confirm_password: confirm_password,
                                        },
                                        beforeSend: function() {
                                            console.log("change_password_process - ok");
                                        },
                                        error: function(xhr) { // if error occured
                                            console.log(xhr.statusText + xhr.responseText);
                                        },
                                        dataType: 'json',
                                        contentType: "application/json; charset=UTF-8",
                                        success: function(response) {

                                            return_message = response.return_msg;
                                            reload_verify = response.location;

                                            swal_lang(session, return_message, reload_verify)
                                        }
                                    });
                                    // Change Password Ajax End

                                } else {

                                    return_message =
                                        "<span id='cpw_7' class='language'>New password and confirm password is not matched.</span>";
                                    swal_lang(session,return_message)

                                }
                                // Check New Password == Confirm Password End

                            } else {

                                return_message =
                                    "<span id='cpw_6' class='language'>Confirm password min length is 6 digits.</span>";
                                swal_lang(session,return_message)

                            }
                            // Check Confirm Password Length End

                        } else {

                            return_message = "<span id='cpw_5' class='language'>Confirm password is empty.</span>";
                            swal_lang(session,return_message)

                        }
                        // Check Confirm Password End

                    } else {

                        return_message =
                            "<span id='cpw_4' class='language'>New password min length is 6 digits.</span>";
                        swal_lang(session,return_message)

                    }
                    // Check New Password Length End

                } else {

                    return_message = "<span id='cpw_3' class='language'>New password is empty.</span>";
                    swal_lang(session,return_message)

                }
                // Check New Password End

            } else {

                return_message =
                    "<span id='cpw_2' class='language'>Current password min length is 6 digits.</span>";
                swal_lang(session,return_message)

            }
            // Current Password Length End

        } else {

            return_message = "<span id='cpw_1' class='language'>Current password is empty.</span>";
            swal_lang(session,return_message)

        }
        // Check Current Password End

    } else {
        return_message = "<span id='public_1' class=language>Member id not found</span>";
        swal_lang(session,return_message)

    }
    // Check Member ID End  

}
</script>
<!-- Change Password Process End -->

<script>
function swal_lang(session, return_message, reload_verify) {

    Swal.fire({
        html: "<div class='swal-alert'><i class='fas fa-exclamation-circle alert_icon' aria-hidden='true'></i>" +
        return_message + "</div>",
        showConfirmButton: false,
        scrollbarPadding: false,
        showCloseButton: true,
        closeButtonHtml: "<i class='fal fa-times alert_icon'></i>",
        position: 'center',
        type: "success"
    }).then(function() {
        if (reload_verify == true) {
            page_reload = window.location.reload();
        } else {
            page_reload = '';
        }
    });

    if (session == 'th') {
        var lang = $(this).attr('id');
        // console.log(lang);

        var mydata = JSON.parse(thai);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    } else if (session == 'bm') {
        var lang = $(this).attr('id');
        // console.log(lang);

        var mydata = JSON.parse(malay);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });

    } else if(session == 'cn') {
        var lang = $(this).attr('id');

        var mydata = JSON.parse(chinese);
        // console.log(mydata);
        $('.language').each(function(index, item) {
            $(this).text(mydata[0][$(this).attr('id')]);
            $(this).text(mydata[0][$(this).text()]);
        });
    }else{
        
    }
}
</script>

<!-- Return Member Game Username Start -->
<script>
function return_member_username() {
    var game_id = $('#cgpw_selection').val();
    var member_id = '<?=$member_id?>';
    var session = $('#session_lang').val();
    var msg = "";

    // console.log("member_id: "+member_id);
    // console.log("game_id: "+game_id);

    // Check Member ID Start
    if (member_id != '0' && member_id != '' && member_id != null) {

        // Check Current Password Start
        if (game_id != '' && game_id != null) {

            // overlay_icon();

            // Check Member Game Username Ajax Start
            $.ajax({
                url: '../controller/ajax/reset_password_process/return_username.php',
                type: 'GET',
                data: {
                    member_id: member_id,
                    game_id: game_id
                },
                beforeSend: function() {
                    // console.log("change_password_process - ok");
                    console.log(game_id, member_id);
                },
                error: function(xhr) { // if error occured
                    console.log(xhr.statusText + xhr.responseText);
                },
                timeout: (15 * 1000),
                error: function(textstatus) { // if error occured
                    if (textstatus === "timeout") {

                        // Error During Ajax Process
                        return_message =
                            "<span id=ajax_error class=language>Error Occured. Please try again.</span>";
                        swal_lang(session,return_message)


                    } else {

                        // No Error Appear

                    }
                },
                dataType: 'json',
                contentType: "application/json; charset=UTF-8",
                success: function(response) {

                    var return_message = response.return_msg;
                    var result = response.return_result;
                    if (result == true) {
                        var game_username = response.game_username;
                        $('#game_username').val(game_username);
                        console.log(game_username)
                    } else {
                        swal_lang(session,return_message)

                    }
                }
            });
            // Change Member Game Username Ajax End

        } else {

            return_message = "<span id=cpw_1 class=language>Current password is empty.</span>";
            swal_lang(session,return_message)


        }
        // Check Current Password End

    } else {
        return_message = "<span id=public_1 class=language>Member ID not found.</span>";
        swal_lang(session,return_message)


    }
    // Check Member ID End  
}
</script>
<!-- Return Member Game Username End -->


<!-- Check Current Game Password Same As User Type Start-->
<script type="text/javascript">
$('#new_gamepassword').bind('input', function() {
    var c = this.selectionStart,
        r = /[^A-Za-z0-9]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});

$('#confirm_gamepassword').bind('input', function() {
    var c = this.selectionStart,
        r = /[^A-Za-z0-9]/gi,
        v = $(this).val();
    if (r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
});


function check_game_password_input() {
    var cgpw_selection = $('#cgpw_selection').val();
    var game_username = $('#game_username').val();
    var new_password = $('#new_gamepassword').val();
    var confirm_password = $('#confirm_gamepassword').val();
    var session = $('#session_lang').val();

    if (cgpw_selection != '' && game_username != '' && new_password != '' && confirm_password != '' && new_password ==
        confirm_password) {

        $('#change_gamepw_btn').prop('disabled', false);
    } else {
        $('#change_gamepw_btn').prop('disabled', true);
    }

}
</script>
<!-- Check Current Game Password Same As User Type Start-->

<!-- Change Member Game Password Start -->
<script>
function change_game_password_process() {
    var member_id = '<?=$member_id;?>';
    var wallet_id = $('#cgpw_selection').val();
    var game_username = $('#game_username').val();
    var new_password = $('#new_gamepassword').val();
    var confirm_password = $('#confirm_gamepassword').val();
    var session = $('#session_lang').val();

    // Check Member ID Start
    if (member_id != '0' && member_id != '' && member_id != null) {

        // Check Game Provider Start
        if (wallet_id != '0' && wallet_id != '' && wallet_id != null) {

            // Check New Password Start
            if (new_password != '' && new_password != null && new_password.length != 0) {

                // Check New Password Length Start
                if (new_password.length >= 6) {

                    // Check New Password Pattern Start
                    if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/.test(new_password)) {

                        // Check Confirm Password Start
                        if (confirm_password != '' && confirm_password != null && confirm_password.length != 0) {

                            // Check Confirm Password Length Start
                            if (confirm_password.length >= 6) {

                                // Check Confirm Password Pattern Start
                                if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/.test(confirm_password)) {

                                    // Check New Password == Confirm Password Start
                                    if (new_password == confirm_password) {

                                        overlay_icon();

                                        // Change Password Ajax Start
                                        $.ajax({
                                            url: '../controller/ajax/reset_password_process/',
                                            type: 'GET',
                                            data: {
                                                member_id: member_id,
                                                wallet_id: wallet_id,
                                                new_password: new_password,
                                                confirm_password: confirm_password
                                            },
                                            // beforeSend: function () {
                                            //     console.log("change_password_process - ok");
                                            // },
                                            // error: function (xhr) { // if error occured
                                            //     console.log(xhr.statusText + xhr.responseText);
                                            // },
                                            timeout: (15 * 1000),
                                            error: function(textstatus) { // if error occured
                                                if (textstatus === "timeout") {

                                                    // Error During Ajax Process
                                                    msg =
                                                        "<span id=ajax_error class=language>Error Occured. Please try again.</span>";
                                                    swal_lang(return_message, session)


                                                } else {

                                                    // No Error Appear

                                                }
                                            },
                                            dataType: 'json',
                                            contentType: "application/json; charset=UTF-8",
                                            success: function(response) {
                                                complete_overlay_icon();

                                                // console.log(response);

                                                var return_message = response.return_msg;
                                                var reload_verify = response.return_result;

                                                // // console.log(result);
                                                // // location = result;

                                                swal_lang(return_message, session, reload_verify)
                                                $('#change_gamepassword').prop('disabled', true);
                                            }
                                        });
                                        // Change Password Ajax End

                                    } else {

                                        return_message =
                                            "<span id=cpw_7 class='language'>New password and confirm password is not matched.</span>";
                                        swal_lang(return_message, session)


                                    }
                                    // Check New Password == Confirm Password End

                                } else {

                                    return_message =
                                        "<span id=cpw_9 class=language>Confirm password must contain at least one digit, one uppercase and one lowercase.</span>";
                                    swal_lang(return_message, session)


                                }
                                // Check Confirm Password Pattern End

                            } else {

                                return_message =
                                    "<span id=cpw_6 class=language>Confirm password min length is 6 digits.</span>";
                                swal_lang(return_message, session)


                            }
                            // Check Confirm Password Length End

                        } else {

                            return_message = "<span id=cpw_5 class=language>Confirm password is empty.</span>";
                            swal_lang(return_message, session)


                        }
                        // Check Confirm Password End

                    } else {
                        return_message =
                            "<span id=cpw_8 class=language>New password must contain at least one digit, one uppercase and one lowercase.</span>";
                        swal_lang(return_message, session)

                    }
                    // Check New Password Pattern End

                } else {

                    return_message = "<span id=cpw_4 class='language'>New password min length is 6 digits.</span>";
                    swal_lang(return_message, session)


                }
                // Check New Password Length End

            } else {

                return_message = "<span id=cpw_3 class=language>New password is empty.</span>";
                swal_lang(return_message, session)


            }
            // Check New Password End

        } else {
            return_message = "<span id=cpw_10 class=language>Please select provider game.</span>";
            swal_lang(return_message, session)
        }
        // Check Game Provider End

    } else {
        return_message = "<span id=public_1 class=language>Member ID not found.</span>";
        swal_lang(return_message, session)


    }
    // Check Member ID End 
}
</script>
<!-- Change Member Game Password End -->