<style>
  .hover-message{
      display:flex;
      justify-content:flex-start !important;
  }
  .phone-vf{
      padding-right:10px;
  }
</style>


<div class="verify-wrap">
    <div><span class="language" data-translate="user_verify_text">Verify your account for additional layers of
            security</span></div>
    <div class="verify-message " id="verify_bank_card">
        <a href="#" class="phone-vf">
            <div><i class="fas fa-mobile-alt" style="font-size:13px;color:#000;" aria-hidden="true"></i></div>
        </a>
        <a href="#" class="hover-message">
            <div style="background:<?=$verify_user_bank?>;"><i class="fal fa-id-card" style="font-size:13px;color:#000;" aria-hidden="true"></i></div>
        </a>
        <div class="messageButton-verifybank">
            <span>
                <span data-translate="user_verify_text1" class="language">Your banking details had not been
                    verified.</span>
                <span data-translate="user_verify_text2" class="language">Success withdrawal with the banking details
                    will
                    automatic verified.</span></span>
        </div>
    </div>
</div>