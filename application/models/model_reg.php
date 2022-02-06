<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Model_Reg extends Model {

  const MAX_ROWS = 20;

  const MIN_FIRSTNAME = 3;
  const MAX_FIRSTNAME = 74;


  const MIN_LASTNAME = 3;
  const MAX_LASTNAME = 74;



  const MIN_EMAIL = 4;
  const MAX_EMAIL = 74;

  const MIN_PASSWORD = 4;
  const MAX_PASSWORD = 54;

  public $database = null;
  public $i18n = null;
  public $crypto = null;

  public function __construct() {
    $this->database = DataBase::connect();
    $this->i18n = new i18n;
    $this->crypto = new Crypto;
  }

  /**
   * @date 30 July 2018
   * @time 13:38
   * 
   */

public function reg($first_name, $last_name, $email, $password) {
  $first_name_length = mb_strlen(trim(Security::makeSafeString($first_name)));
  $last_name_length = mb_strlen(trim(Security::makeSafeString($last_name)));
  $email_length = mb_strlen(Security::makeSafeString($email));
  $password_length = mb_strlen($password);

  $password = Security::makeSafeString($password);

  if($first_name_length < self::MIN_FIRSTNAME) {
    return array('is_error'=>true, 'error'=>array('error_code'=>21, 'error_message'=>$this->i18n->get('short_firstname'), 'error_field'=>'first_name'));
  } else if($first_name_length > self::MAX_FIRSTNAME) {
    return array('is_error'=>true, 'error'=>array('error_code'=>22, 'error_message'=>$this->i18n->get('long_firstname'), 'error_field'=>'first_name'));
  } else if(!preg_match('/^[а-яА-Яёa-zA-Z]*$/u', $first_name)) {
    return array('is_error'=>true, 'error'=>array('error_code'=>23, 'error_message'=>$this->i18n->get('incorrect_firstname'), 'error_field'=>'first_name'));
  }

  if($last_name_length < self::MIN_LASTNAME) {
    return array('is_error'=>true, 'error'=>array('error_code'=>21, 'error_message'=>$this->i18n->get('short_lastname'), 'error_field'=>'last_name'));
  } else if($last_name_length > self::MAX_LASTNAME) {
    return array('is_error'=>true, 'error'=>array('error_code'=>22, 'error_message'=>$this->i18n->get('long_lastname'), 'error_field'=>'last_name'));
  } else if(!preg_match('/^[а-яА-Яёa-zA-Z]*$/u', $last_name)) {
    return array('is_error'=>true, 'error'=>array('error_code'=>23, 'error_message'=>$this->i18n->get('incorrect_lastname'), 'error_field'=>'last_name'));
  }

  if($email_length < self::MIN_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>27, 'error_message'=>$this->i18n->get('short_email'), 'error_field'=>'email'));
  } else if($email_length > self::MAX_EMAIL) {
    return array('is_error'=>true, 'error'=>array('error_code'=>28, 'error_message'=>$this->i18n->get('long_email'), 'error_field'=>'email'));
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return array('is_error'=>true, 'error'=>array('error_code'=>29, 'error_message'=>$this->i18n->get('incorrect_email'), 'error_field'=>'email'));
  }

  if($password_length < self::MIN_PASSWORD) {
    return array('is_error'=>true, 'error'=>array('error_code'=>30, 'error_message'=>$this->i18n->get('short_password'), 'error_field'=>'password'));
  } else if($password_length > self::MAX_PASSWORD) {
    return array('is_error'=>true, 'error'=>array('error_code'=>31, 'error_message'=>$this->i18n->get('long_password'), 'error_field'=>'password'));
  }
  $is_email_exist = $this->database->prepare("SELECT `id` FROM `users` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $email));
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  if(isset($row1['id']) || !empty($row1['id'])) {
    return array('is_error'=>true,'error'=>array('error_code'=>32, 'error_message'=>$this->i18n->get('email_exist'), 'error_field'=>'email'));
  } 

  $password_hashing = $this->crypto->passwordHashing($password);
  $hashed_password = $password_hashing['hashed_password'];  
  $salt = $password_hashing['salt'];
  $timestamp_registered = time();


  
  $sql_reg = "INSERT INTO `users`(`id`,
                                  `first_name`, 
                                  `last_name`,
                                  `email`,
                                  `phone_number`,
                                  `small_photo_path`,
                                  `big_photo_path`,
                                  `sex`,
                                  `time_birth`, 
                                  `time_reg`, 
                                  `hashed_password`, 
                                  `salt`, 
                                  `account_type`, 
                                  `status_text`, 
                                  `hash`,
                                  `country_id`, 
                                  `city_title`, 
                                  `site`, 
                                  `vk`, 
                                  `instagram`, 
                                  `facebook`, 
                                  `tiktok`, 
                                  `twitter`, 
                                  `ok`) VALUES (
                                  '',
                                  :first_name,
                                  :last_name,
                                  :email,
                                  '',
                                  '',
                                  '',
                                  '',
                                  '',
                                  :time_reg,
                                  :hashed_password,
                                  :salt,
                                  '',
                                  '',
                                  :hash,
                                  '',
                                  '',
                                  '',
                                  '',
                                  '',
                                  '',
                                  '',
                                  '',
                                  '')";

  $user_hash = sha1(time().rand()).md5(time().rand().$_SERVER['REMOTE_ADDR']);

  $reg_user = $this->database->prepare($sql_reg);
  $reg_user->execute(array(':first_name' => $first_name,
                           ':last_name' => $last_name,
                           ':email' => $email,
                           ':time_reg' => time(),
                           ':hashed_password' => $hashed_password,
                           ':salt' => $salt,
                           ':hash' => $user_hash));

  $_SESSION['user_type'] = 'user';
  $_SESSION['user_id'] = $this->database->lastInsertId();
  $_SESSION['user_first_name'] = $first_name;
  $_SESSION['user_last_name'] = $last_name;
  $_SESSION['user_small_photo'] = '';


  header('Location: /');
}

  
}
?>
