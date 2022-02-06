<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Model_Restore extends Model {

  const MIN_EMAIL = 4;
  const MAX_EMAIL = 74;

  const RESTORE_URL = 'http://local.1-1.io/restore/r/?token=';

  public $database = null;
  public $i18n = null;
  public $crypto = null;

  public function __construct() {
    $this->database = DataBase::connect();
    $this->i18n = new i18n;
    $this->crypto = new Crypto;
  }


  public function sendRestoreMessageOnMail($hash) {

    $mail = new Mail;
    // От кого.
    $mail->from('timka_issaev@mail.ru');
 
 // Кому, можно указать несколько адресов через запятую.
$mail->to('timka_issaev@mail.ru', 'Тимур');
 
// Тема письма.
$mail->subject = 'Рассылка c сайта';
// Текст.
$mail->body = '


<div>
<div style="font-weight:bold;padding-bottom:14px">Здравствуйте</div>
<div style="padding-bottom:14px">Вы запросили восстановление пароля на сайте '.SITE_NAME.'</div>
<div style="padding-bottom:14px">Для того, чтобы восстановить пароль, нажмите на кнопку ниже.</div>
<div style="padding-bottom:14px"><a href="'.RESTORE_URL.$hash.'"><button style="
    border: 1px solid transparent;
    border-radius: 5px;
    font-weight: 700;
    padding: 0 11px;
    height: 29px;
    cursor: pointer;
    user-select: none;
    background-color: #607d8b;
    color: #FFF!important;
    transition: background 0.14s ease">Восстановить пароль</button></a></div>
</div>

<div style="font-size:14px;color:#808080;padding-bottom:14px">Если Вы не делали запрос, просто проигнорирйте данное сообщение</div>
<div style="font-size:15px;">С уважением, ваш '.SITE_NAME.'</div>

';
 
// Отправка.
$mail->send();
}


public function restore($email) {

  $email_length = mb_strlen(Security::makeSafeString($email));

  if($email_length < self::MIN_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>27, 'error_message'=>$this->i18n->get('short_email'), 'error_field'=>'email'));
  } else if($email_length > self::MAX_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>28, 'error_message'=>$this->i18n->get('long_email'), 'error_field'=>'email'));
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return array('is_error'=>true, 'error'=>array('error_code'=>29, 'error_message'=>$this->i18n->get('incorrect_email'), 'error_field'=>'email'));
  }



  $is_email_exist = $this->database->prepare("SELECT `id`, `email` FROM `users` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $email));
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  if(empty($row1['id'])) {
    return array('is_error'=>true, 'message'=>'USER_IS_NOT_AUTH');
  }



  $is_email_exist = $this->database->prepare("SELECT `id` FROM `restore` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $email));
  $row2 = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  if(empty($row2['id'])) {


  $hash=$this->crypto->generateHash();

  $is_email_exist = $this->database->prepare("
INSERT INTO `restore`(
`id`, 
`email`, 
`hash`, 
`time_created`) VALUES (
'',
:email,
:hash,
:time_created)
");
  $is_email_exist->execute(array(':email' => $email,
                                 ':hash' => $hash,
                                 ':time_created' => time()));




$this->sendRestoreMessageOnMail($hash);

$_SESSION['restore_hash']=$hash;
    return array('is_error'=>false, 'message'=>'SUCCESS_INSERT');

  } else {


  $hash=$this->crypto->generateHash();

  $is_email_exist = $this->database->prepare("

UPDATE `restore` SET `hash`=:hash,`time_created`=:time_created WHERE `email` = :email
");
  $is_email_exist->execute(array(':hash' => $hash,
                                 ':time_created' => time(),
                                 ':email' => $email));




$this->sendRestoreMessageOnMail($hash);
$_SESSION['restore_hash']=$hash;
    return array('is_error'=>false, 'message'=>'SUCCESS_INSER_UPDATE');





  }

  


}




  /**
   * @date 30 July 2018
   * @time 13:38
   * 
   */

public function r($new_password) {
  $new_password_length = mb_strlen(Security::makeSafeString($new_password));

  if($new_password_length < self::MIN_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>27, 'error_message'=>$this->i18n->get('short_email'), 'error_field'=>'email'));
  } else if($new_password_length > self::MAX_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>28, 'error_message'=>$this->i18n->get('long_email'), 'error_field'=>'email'));
  } 

  
  $is_email_exist = $this->database->prepare("SELECT `id`, `email` FROM `restore` WHERE `hash` = :hash");
  $is_email_exist->execute(array(':hash' => $_SESSION['restore_hash']));
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  if(empty($row1['id'])) {
    return array('is_error'=>true, 'message'=>'r_USER_IS_NOT_AUTH');
  }

  
  $is_email_exist = $this->database->prepare("SELECT `id`, `email` FROM `users` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $row1['email']));
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  if(empty($row1['id'])) {
    return array('is_error'=>true, 'message'=>'r2_USER_IS_NOT_AUTH');
  }

  

  $password_hashing = $this->crypto->passwordHashing($new_password);
  $hashed_password = $password_hashing['hashed_password'];  
  $salt = $password_hashing['salt'];

  $is_email_exist = $this->database->prepare("UPDATE `users` SET `hashed_password`=:hashed_password, `salt`=:salt WHERE `email` = :email");
  $is_email_exist->execute(array(':hashed_password' => $hashed_password,
                                 ':salt' => $salt,
                                 ':email' => $row1['email']));



  $is_email_exist = $this->database->prepare("DELETE FROM `restore` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $row1['email']));

    return array('is_error'=>true, 'message'=>'SUCCESS_GLOBAL.');

}






}


?>