<div id="login_page" class="form_wrap">



<div class="form__block">
  <div class="form__title">Вход</div>

<?php

if(!empty($data['login_messages'])) {
if($data['login_messages']['is_error'] === true) {
?>
  <div class="form__message form__message_error">
      <div class="form__message_title"><?php echo $data['login_messages']['error']['error_message']['title'];?></div>
      <div class="form__message_body"><?php echo $data['login_messages']['error']['error_message']['description'];?></div>
  </div>

<?php
}
}
?>
  <div class="form__body">
    <FORM action="" method="POST">

    <div class="input_wrap">
      <input type="text" name="login_email_0" class="text_field" placeholder="Ваш email" autofocus="">
    </div>
    <div class="input_wrap">
      <input type="text" name="login_password_0" class="text_field" placeholder="Ваш пароль">
    </div>
    <div class="input_wrap">
      <input type="submit" name="login_submit_0" class="button button_green" value="Войти">
      <a href="/restore" class="restore__link">Забыли пароль?</a>
    </div>
    </FORM>
  </div>
  <div class="form__variant_wrap">
    <span class="form__variant_text">или</span>
  </div>
  <a href="/reg"><button name="" class="button percent_100">Регистрация</button></a>
</div>


</div>