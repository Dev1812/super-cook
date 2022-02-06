<?php
  $page_title = (isset($param['page_title']) && !empty($param['page_title'])) ? $param['page_title'] : '...';
  $page_description = (isset($param['page_description']) && !empty($param['page_description'])) ? $param['page_description'] : '...';
  $page_keywords = (isset($param['page_keywords']) && !empty($param['page_keywords'])) ? $param['page_keywords'] : '...';
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
    <title><?php echo $page_title; ?></title>


    <link rel="icon" href="/images/icons/favicon.ico?1" type="image/x-icon" />
    <link rel="shortcut icon" href="/images/icons/favicon.ico?1" type="image/x-icon" />



    <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
    <meta name="title" content="<?php echo $page_title; ?>">
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <link rel="shortcut icon" href="/public/images/icons/atom.png" type="image/png">

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">

    <meta property="og:title" content="<?php echo $page_title; ?>">
    <meta property="og:image" content="/images/icons/favicon.ico?2">
    <meta property="og:description" content="<?php echo $page_description; ?>">

    <meta name="viewport" content="width=device-width, user-scalable=yes">

   <link rel="stylesheet" type="text/css" href="/css/common.css?<?php echo time();?>">

   <script type="text/javascript" src="/js/common.js?<?php echo rand();?>"></script>

   <script type="text/javascript">
window.cur=cur={};
    </script>

    <?php

if(!empty($param['css'])) {

  if(is_array($param['css'])) {
    foreach($param['css'] as $v) {
      echo '<link rel="stylesheet" type="text/css" href="/css/'.$v.'?v='.rand().'">';
    }
  } else {
    echo '<link rel="stylesheet" type="text/css" href="/css/'.$param['css'].'?v='.rand().'">';
  }
}
?>

</head>
<body>
<div id="wrap1">
<style type="text/css">



.flat_menu{right:0;top: 14px;margin-top:39px;margin-right:4px;
  position: absolute;border:1px solid #DDD;width:174px;border-radius:7px;padding:3px 0;z-index: 11;position: absolute;}
  .flat_menu .flat_menu__item{padding:5px 14px;background-color:#FFF;cursor: pointer;}
  .flat_menu .flat_menu__item:hover{background-color:#FBFBFB}

</style>
<div id="pop" onClick="hide(this);hide('profile__user_bar_menu_157');" style="display: none; position: fixed;top:0;left:0;right:0;bottom:0;z-index:9"></div>
<div class="wrap2">
<div class="head" >

  <div class="head__wrap" style="position: relative;">


<div style="position: absolute;margin-top:54px;margin-left:111px;border:1px solid #DDD;width:271px;background-color:#FFF;z-index:9;border-radius:7px;box-shadow: 0 0 24px #808080;display: none;z-index: 11" id="lol">
</div>
<style type="text/css">
.qwerty1{
    padding: 3px 9px;
    border-bottom: 1px solid #DDD;
    min-height: 59px;
    max-height: 195px;
    overflow: hidden;
    color: #000;
    margin: 6px 0;}
</style>
<script type="text/javascript">

function parseJSON(obj){
  if(window.JSON && JSON.parse) {
    return JSON.parse(obj);
  }
  return eval('('+obj+')');
}
function topMenuSearch(value) {
if(value.length < 1) { 
return false;
}
      var responsr='';  
  console.log(value);
  ajax.get({
    url: '/search/ajax_search/?q='+value,
    data: '',
    success: function(data) {
      for(var i in data) {
        console.log(data[i]);
responsr += '\
  <a href="/main/get/?food_id='+data[i].id+'">\
\
<div class="qwerty1" style="\
    padding: 1px 7px;min-height:41px">\
  <div style="float: left;">\
    <div class="photo_block" style="background-image:url('+data[i].big_photo_path+');width: 31px;height:31px;"></div>\
  </div>\
  <div style="margin-left:41px;">\
    <div style="font-weight: bold;margin-bottom:7px;font-size:1.1em;">'+data[i].title+'</div>\
  </div>\
</div>\
</a>\
\
';

     }


responsr += '<a href="/search/index/?q='+document.getElementById('lol2').value+'"><div style="text-align: center;padding:1px 0 9px;color:#808080;">показать еще</div></a>';
      document.getElementById('lol').innerHTML=responsr;
      console.log(data);
    }
  });
}

</script>

<div class="profile__user_bar_menu flat_menu" id="profile__user_bar_menu_157" style="display: none;">
  <a href="/main/create_food"><div class="flat_menu__item">+Создать запись</div></a>
  <a href="/logout"><div class="flat_menu__item">Выход</div></a>
</div>

    <div class="head__left">
      <img class="head__link" style="padding:11px;cursor: pointer;" src="/images/icons/menu.png" onClick="show('sidebar-global__layer');
ge('sidebar').style.marginLeft='0';">
      <a href="\" class="head__link" style="font-weight: bold;">Супер Повар</a>
    </div>
    <div class="head__right">
<a href="//digitalwind.ru" title="Сайт Цирового ветра">
<div style="float:left;margin-right:74px;">
      <img src="http://digitalwind.ru/images/ru_logo_22.png" width="114">
  
</div></a>
<?php
if(!User::isAuth()) {
  echo '
      <a href="/login" class="head__link">Вход</a>
      <a href="/reg" class="head__link">Регистрация</a>';
} else {
?>
  <div class="head__link" style="padding:5px;cursor:pointer" onClick="show('pop');show('profile__user_bar_menu_157');">
  <i class="icon photo_block" style="background-image:url(/images/3ddbf963411e89507c89f0621a43be86.jpg);width: 31px;height: 31px;border-radius:54px;"></i>
  <span style="font-weight:bold;position:relative;top:-10px;margin-left:7px;"><?php echo $_SESSION['user_last_name'];?></span></div>
    <!--  <a href="/logout" class="head__link">Выход</a>-->

    <?php
}
  
 function getCount() {
    $database = DataBase::connect();

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods`");
  $is_email_exist->execute(array(':food_1'=>0));
  $arr[0] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>1));
  $arr[1] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>2));
  $arr[2] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>3));
  $arr[3] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>4));
  
  $arr[4] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>5));
  
  $arr[5] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>6));
  
  $arr[6] = $is_email_exist->fetch(PDO::FETCH_ASSOC);

  $is_email_exist = $database->prepare("SELECT COUNT(`id`) FROM `foods` WHERE `category`=:food_1");
  $is_email_exist->execute(array(':food_1'=>7));
  
  $arr[7] = $is_email_exist->fetch(PDO::FETCH_ASSOC);
return $arr;
  }
$arr = getCount();
?>
    </div>  
      <div class="head__search_field__wrap">
        <div class="head__search_field__wrap_2">
          <FORM action="/search/index/">
          <input type="text" name="q" class="text_field head__search_field" placeholder="Поиск..." style="background-color:#FBFBFB;border:1px solid #E1E1E1!important;    position: relative;z-index: 11;" onKeyUp="topMenuSearch(this.value);" id="lol2" onClick="show('lol');show('qwertyy');" autocomplete="off">
        </FORM>
        </div>
      </div>
  </div>
</div><style type="text/css">.head__link{font-size:.9em;}</style>


<div id="qwertyy" style="position: fixed;top:0;left:0;right:0;bottom:0;z-index:9;display: none;" onClick="hide('lol');hide('qwertyy');"></div>


<div class="head head__categories" style="background-color:#FFF;border-top:1px solid #DDD;border-bottom:1px solid #DDD">
  <div class="head__wrap">
      <a href="/main/index/?category=0" class="head__link" style="
    border-bottom: 2px solid #3f51b5;padding: 8px 14px;background-color:#FBFBFB">Все категории <?php echo $arr[0]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=1" class="head__link">Десерты <?php echo $arr[1]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=2" class="head__link">Основные блюда <?php echo $arr[2]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=3" class="head__link">Салаты <?php echo $arr[3]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=4"  class="head__link">Коктейли <?php echo $arr[4]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=5"  class="head__link">Супы <?php echo $arr[5]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=6"  class="head__link">Сэндвичи <?php echo $arr[6]['COUNT(`id`)'];?></a>
      <a href="/main/index/?category=7"  class="head__link">Пицца <?php echo $arr[7]['COUNT(`id`)'];?></a>
  </div>
</div>
<div class="content">


<?php
  if(isset($content_view) && !empty($content_view)) {
    require_once SITE_ROOT.'application/views/'.$content_view;
  } else {
    echo '...';
  }
?>
</div>
<div class="footer">Test &copy; 2022</div>
</div>

</div>


<?php
if(User::isAuth()) {
  echo '<a href="/main/create_food" target="_blank"><div style="    position: fixed;
    right: 0;
    bottom: 0;
    margin: 45px;
    background: #607d8b;
    padding: 7px 15px;
    color: #FFF;
    border-radius: 32px;">Создать рецепт</div></a>';
} 

?>

         <style type="text/css">
          #sidebar-global__layer {
    position: fixed;
    top: 0;
    left: 250px;
    z-index: 99999;
    right: 0;
    bottom: 0;
    background-color: #484545;
    opacity: .7;
    cursor: pointer;
}
         </style>
<div id="sidebar-global__layer" style="display: none;" onclick="ge('sidebar').style.marginLeft='-250px';hide(this);"></div>






<div id="sidebar" style="margin-left: -250px;">
<!--
  <div style="
    padding: 11px 15px 15px 31px;border-bottom: 1px solid #DDD;">
      <img src="image/icon/favicon.ico" style="position: relative;right:11px;
    top: 3px;">Аля Гурме</div>
-->


  <form action="/search2.php">
    <div style="border-bottom: 7px;">
         <div class="sidebar-content__line" style="border-bottom:1px solid #DDD;"><input type="text" name="q" class="head-search" placeholder="Поиск">
<input type="submit" value="Найти" style="margin-top:7px;border:0;width:100%;">
         </div>
      
    </div>

         </form>


  <div class="sidebar-user__bar" id="sidebar-user__bar">

    <div class="sidebar-content">
      <div class="sidebar-content" style="padding-top:7px;">
        <!--
    <div class="sidebar-user__bar_wrap">
            <img style="width:70px;height:70px;" src="/image/Pmz7l.png">
    </div>
        <a class="sidebar-content__line_wrap" href="/profile.php?category_id=10"><div class="sidebar-content__line sidebar-content__line_user_initials">sddsfdsfdsf sddsfdsfdsf<span style="font-weight:normal;margin-left:7px;border-bottom:1px dashed #000;"></span></div></a>   --> 




            <a class="sidebar-content__line_wrap" href="/main/index/?category="><div class="sidebar-content__line">Все категории <span style="font-weight: bold;"><?php echo $arr[0]['COUNT(`id`)'];?></span> </div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category=1"><div class="sidebar-content__line">Десерты <span style="font-weight: bold;"><?php echo $arr[1]['COUNT(`id`)'];?></span></div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category==2"><div class="sidebar-content__line">Основые блюда <span style="font-weight: bold;"><?php echo $arr[2]['COUNT(`id`)'];?></span></div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category=3"><div class="sidebar-content__line">Салаты <span style="font-weight: bold;"><?php echo $arr[3]['COUNT(`id`)'];?></span></div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category=4"><div class="sidebar-content__line">Коктейли <span style="font-weight: bold;"><?php echo $arr[4]['COUNT(`id`)'];?></span></div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category=5"><div class="sidebar-content__line">Супы <span style="font-weight: bold;"><?php echo $arr[5]['COUNT(`id`)'];?></span></div></a>
        <a class="sidebar-content__line_wrap" href="/main/index/?category=6"><div class="sidebar-content__line">Сэндвичи <span style="font-weight: bold;"><?php echo $arr[6]['COUNT(`id`)'];?></span></div></a>

        <a class="sidebar-content__line_wrap" href="/main/index/?category=7"><div class="sidebar-content__line">Пицца <span style="font-weight: bold;"><?php echo $arr[7]['COUNT(`id`)'];?></span></div></a>









      </div>
    </div>
  </div>

</div>










<style type="text/css">
#sidebar-global__layer{position:fixed;top:0;left:250px;z-index:99999;right:0;bottom:0;background-color:#484545;opacity:.7;cursor:pointer}
#sidebar{position:fixed;top:0;left:0;bottom:0;width:250px;background-color:#FFF;border-right:1px solid #DDD;transition:margin .3s ease;z-index:999999}
.sidebar-top__search_wrap{height:45px;border-bottom:1px solid #DDD}
.sidebar-search__field{width:100%}
.sidebar-top__search_wrap{padding:9px 15px 16px}
.sidebar-content__line_user_initials{font-weight:700}
.sidebar-user__bar_wrap{padding:15px 27px 11px}
.sidebar-content__line{padding:7px 27px;color:#000;transition:background-color .3s ease}
.sidebar-content__line:hover{background-color:#FAFAFA}
</style>
</body>
</html>