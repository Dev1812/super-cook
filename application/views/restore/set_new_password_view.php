<div id="restore_page">
<div class="restore_page__wrap">
<div class="form">
<style type="text/css">
.form_wrap_2{width:240px;margin:0 auto;}
</style>
<div class="form_wrap form_wrap_2<?php if(!empty($data['restore_messages']) && $data['restore_messages']['is_error'] === true) {echo ' form__error_animation';} ?>">

<div class="form__title">Новый пароль</div>
<div class="form__body">

<?php



if(!empty($data['restore_messages'])) {
if($data['restore_messages']['is_error'] === true) {

?>



<div class="form_message form_message__error">
  <div class="form_message__icon_wrap">
    <i class="icon form_message__icon__status"></i>
  </div>
  <div class="form_message__body">
    <div class="form_message__body_title"><?php echo $data['restore_messages']['error']['error_message']['title'];?></div>
    <div class="form_message__body_description"><?php echo $data['restore_messages']['error']['error_message']['description'];?></div>

  </div>
</div>

<?php

}
} else {

echo '<div class="form__desc">Быстро и просто</div>';
}

?>
<FORM action="" method="GET">

<div class="form__item_wrap">
  <div class="label">Ваш новый пароль</div>
  <div class="input_wrap">
    <input type="text" name="restore_email_0" placeholder="Ваш email" class="text_field percent_100">
  </div>
</div>





<div class="form__item_wrap">

  <input type="submit" name="restore_submit_0" class="button button_green percent_100" value="Восстановить">

</div>

</FORM>

<div class="go_to__login_page_wrap">
	<div class="go_to__login_page_wrap2"><span class="go_to__login_page_or">или</span></div>
</div>

<div class="form__item_wrap">
  <a href="/login">
    <button class="button button_gray percent_100">Войти</button>
  </a>
</div>




</div>


</div>


</div>
</div>
</div>