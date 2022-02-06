<div id="login_page" class="form_wrap">

<div class="form__block">
  <div class="form__title">Регистрация</div>
<?php

if(!empty($data['reg_messages'])) {
if($data['reg_messages']['is_error'] === true) {
?>
  <div class="form__message form__message_error">
      <div class="form__message_title"><?php echo $data['reg_messages']['error']['error_message']['title'];?></div>
      <div class="form__message_body"><?php echo $data['reg_messages']['error']['error_message']['description'];?></div>
  </div>

<?php
}
}
?>


  <div class="form__body">
    <FORM action="" method="POST">
    <div class="input_wrap">
      <input type="text" name="reg_first_name_0" class="text_field" placeholder="Ваше имя" autofocus="">
    </div>
    <div class="input_wrap">
      <input type="text" name="reg_last_name_0" class="text_field" placeholder="Ваша фамилия">
    </div>
    <div class="input_wrap">
      <input type="text" name="reg_email_0" class="text_field" placeholder="Ваш email">
    </div>
    <div class="input_wrap">
      <input type="text" name="reg_password_0" class="text_field" placeholder="Ваш пароль">
    </div>
    <div class="input_wrap">
      <input type="submit" name="reg_submit_0" class="button button_green percent_100" value="Зарегестрироваться">
    </div>
  </FORM>
  </div>
  <div class="form__variant_wrap">
    <span class="form__variant_text">или</span>
  </div>
  <a href="/login"><button name="" class="button percent_100">Вход</button></a>
</div>


</div>