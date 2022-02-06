<div id="login_page" class="form_wrap">


<style type="text/css">
.form__is_registered{padding-bottom:14px;}
.input_wrap__is_registered{text-align: center;}
  .input_wrap__is_registered_link{text-align: center;}
</style>
<div class="form__block">
  <div class="form__title">Восстановление пароля</div>



<?php

if(!empty($data['restore_messages'])) {
if($data['restore_messages']['is_error'] === true) {
?>
  <div class="form__message form__message_error">
      <div class="form__message_title"><?php echo $data['restore_messages']['error']['error_message']['title'];?></div>
      <div class="form__message_body"><?php echo $data['restore_messages']['error']['error_message']['description'];?></div>
  </div>

<?php
}
}
?>



  <div class="form__body">
    <FORM action="" method="POST">
    <div class="input_wrap">
      <input type="text" name="restore_email_0" class="text_field" placeholder="Ваш email" autofocus="">
    </div>
    <div class="input_wrap">
      <input type="submit" name="restore_submit_0" class="button button_green percent_100" value="Восстановить">
    </div>
  </FORM>
  </div>
  <div class="form__variant_wrap">
    <span class="form__variant_text">или</span>
  </div>
  <div class="input_wrap input_wrap__is_registered">
      <a href="/restore" class="form__is_registered"><span style="color:#000;">Уже Зарегестрированы?</span> Вход</a>

    </div>
  <div class="input_wrap">
    <a href="/reg">
      <button name="" class="button percent_100">Регистрация</button>
    </a>
  </div>
</div>


</div>