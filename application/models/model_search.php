<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Model_Search extends Model {

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

 function search($search_word) {

if($search_word == '' || $search_word == ' ') {
  return false;
}

$search_word = explode(' ', $search_word);
$sql = 'SELECT `id`, `title`, `big_photo_path`, `time_created`, `description`, `owner_id`, `category` FROM `foods` WHERE ';
for($i=0;$i<count($search_word); $i++) {
  if($i == 0) {

  $sql .= ' `title` LIKE "%'.$search_word[$i].'%"';
} else {

  $sql .= ' OR `title` LIKE "%'.$search_word[$i].'%"';
}

}

$sql .= "";

  $is_email_exist = $this->database->prepare($sql);


  
  $is_email_exist->execute(array());

  $arr = array();




  while($row1 = $is_email_exist->fetch(PDO::FETCH_ASSOC)) {
    $arr[] = $row1;
  }
  return $arr;
}

}


?>