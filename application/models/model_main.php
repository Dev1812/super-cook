<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Model_Main extends Model {












  const MAX_ROWS = 20;

  const MIN_EMAIL = 4;
  const MAX_EMAIL = 74;

  const MIN_PASSWORD = 4;
  const MAX_PASSWORD = 54;

  public $database = null;

  public function __construct() {
    $this->database = DataBase::connect();
    $this->i18n = new i18n;
    $this->crypto = new Crypto;
    $this->date = new Date;
    $this->user = new User;
  }

public function getFoodInfo($food_id) {




  $is_email_exist = $this->database->prepare("SELECT `id`, `title`, `big_photo_path`, `time_created`, `description`, `owner_ip`, `owner_id` FROM `foods` WHERE `id`=:food_id");
  $is_email_exist->execute(array(':food_id'=>$food_id));
  $arr=array();
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);
  $row1['owner_full_name'] = $this->user->getInitials($row1['owner_id']);
  $row1['date_created'] = $this->date->parseTimestamp($row1['time_created']);
return $row1;


}


public function deleteMyPost($post_id) {




  $is_email_exist = $this->database->prepare("DELETE FROM `foods` WHERE `id`=:post_id");
  $is_email_exist->execute(array(':post_id'=>$post_id));
/*  $arr=array();
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);
  $row1['owner_full_name'] = $this->user->getInitials($row1['owner_id']);
  $row1['date_created'] = $this->date->parseTimestamp($row1['time_created']);
return $row1;*/

return array('is_error'=>false);


}

public function getFoods($category) {


if(empty($category) || $category=='0') {

  $is_email_exist = $this->database->prepare("SELECT `id`, `title`, `big_photo_path`, `time_created`, `owner_ip`, `owner_id` FROM `foods` ORDER BY `id` DESC");

} else {

  $is_email_exist = $this->database->prepare("SELECT `id`, `title`, `big_photo_path`, `time_created`, `owner_ip`, `owner_id` FROM `foods` WHERE `category`=:category ORDER BY `id` DESC");


}


  $is_email_exist->execute(array(':category'=>$category));
  $arr=array();
  while($row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC)) {
    $row1['owner_full_name'] = $this->user->getInitials($row1['owner_id']);
    $row1['date_created'] = $this->date->parseTimestamp($row1['time_created']);
    //var_dump($row1);
    $arr[]=$row1;
  }
return $arr;


}

public function createFood($create_food_title, $create_food_description, $create_food_category,$food_photo_path_0) {
  $create_food_title = Security::makeSafeString($create_food_title);
  $create_food_description = Security::makeSafeString($create_food_description);
  $create_food_category = Security::makeSafeString($create_food_category);
  $food_photo_path_0 = Security::makeSafeString($food_photo_path_0);



  $create_food_title_length = mb_strlen(Security::makeSafeString($create_food_title));
  $create_food_description_length = mb_strlen(Security::makeSafeString($create_food_description));
  $food_photo_path_0_length = mb_strlen(Security::makeSafeString($food_photo_path_0));


  if($create_food_title_length < 3) {
    return array('is_error'=>true, 'error'=>array('error_code'=>21, 'error_message'=>$this->i18n->get('short_firstname'), 'error_field'=>'first_name'));
  } else if($create_food_title_length > 255) {
    return array('is_error'=>true, 'error'=>array('error_code'=>22, 'error_message'=>$this->i18n->get('long_firstname'), 'error_field'=>'first_name'));
  }





  if($create_food_description_length < 3) {
    return array('is_error'=>true, 'error'=>array('error_code'=>21, 'error_message'=>$this->i18n->get('short_firstname'), 'error_field'=>'first_name'));
  } else if($create_food_description_length > 90055) {
    return array('is_error'=>true, 'error'=>array('error_code'=>22, 'error_message'=>$this->i18n->get('long_firstname'), 'error_field'=>'first_name'));
  }





  if($food_photo_path_0_length < 3) {
    return array('is_error'=>true, 'error'=>array('error_code'=>21, 'error_message'=>$this->i18n->get('short_firstname'), 'error_field'=>'first_name'));
  } else if($food_photo_path_0_length > 255) {
    return array('is_error'=>true, 'error'=>array('error_code'=>22, 'error_message'=>$this->i18n->get('long_firstname'), 'error_field'=>'first_name'));
  }











  $is_email_exist = $this->database->prepare("
INSERT INTO `foods`(
`id`, 
`title`, 
`big_photo_path`, 
`time_created`, 
`owner_ip`, 
`description`, 
`owner_id`, 
`category`) VALUES (
'',
:title,
:big_photo_path,
:time_created,
:owner_ip,
:description,
:owner_id,
:category)");
  $is_email_exist->execute(array(':title'=>$create_food_title,
    ':big_photo_path'=>$food_photo_path_0,
    ':time_created'=>time(),
    ':owner_ip'=>$_SERVER['REMOTE_ADDR'],
    ':description'=>$create_food_description,
    ':owner_id'=>$_SESSION['user_id'],
    ':category'=>$create_food_category));


      return array('is_error'=>false, 'message'=>$this->i18n->get('long_firstname'));


}


  /**
   * @date 30 July 2018
   * @time 13:38
   * 
   */
/*
public function login($email, $password) {

  $email = htmlspecialchars($email);
  $email_length = mb_strlen($email);

  $password = htmlspecialchars($password);
  $password_length = mb_strlen($password);

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

  $is_email_exist = $this->database->prepare("SELECT `id`, `first_name`, `last_name`, `email`, `hashed_password`,`salt`, `user_type` FROM `users` WHERE `email` = :email");
  $is_email_exist->execute(array(':email' => $email));
  $row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC);
  
  if(!$this->crypto->checkPassword($row1['hashed_password'], $password, $row1['salt'])) {
    return array('is_error'=>true,'error'=>array('error_code'=>32, 'error_message'=>$this->i18n->get('incorrect_login_or_password')));
  } else {
    $_SESSION['user_type'] = $row1['user_type'];
    $_SESSION['user_id'] = $row1['id'];
    $_SESSION['user_first_name'] = $row1['first_name'];
    $_SESSION['user_last_name'] = $row1['last_name'];
    header('Location: /');
  } 
*/
  


}


?>