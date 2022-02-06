<div class="search-container">


  <div class="search-wrap" style="">
    <div class="search-container__title">Поиск</div>
<form action="/search/index/" method="GET">
  

<?php
//var_dump($data);
?>




    <div class="input_wrap">
      <input type="text" class="text_field" name="q" placeholder="Введите поисковый запрос" value="">
    </div>

    <div>
      <input type="submit" class="button button_green" name="search_submit" value="Найти" style="width: auto;padding:auto 14px;">
    </div>

   

</form>
<div style="margin-top:14px;">
<div style="text-align: center;font-weight: bold;margin-bottom:14px;">Результаты поиска(<?php echo count($data['foods']);?>)</div>

<?php

if(empty($data['foods'])) {
} else {
foreach($data['foods'] as $v) {

  ?>
  <a href="/main/get/?food_id=<?php echo $v['id'];?>">
<div style="padding:7px 0;min-height:59px;max-height:185px;overflow: hidden;color:#000;margin:14px 0;">
  <div style="float: left;"><!--/images/1618512569_8-phonoteka_org-p-statichnii-fon-8.png-->
    <div class="photo_block" style="background-image:url('/<?php echo $v['big_photo_path'];?>');"></div>
  </div>
  <div style="margin-left:61px;">
    <div style="font-weight: bold;margin-bottom:7px;font-size:1.1em;"><?php echo $v['title'];?></div>
    <div style="color:#808080;"><?php echo strip_tags($v['description']);?></div>
  </div>
</div>
</a>
  <?php
}
}
?>





</div>

  </div>

</div>









<style type="text/css">
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
  .search-wrap{width:auto!important;}
}

.search-wrap{width:510px;margin:0 auto;background-color:#FFF;padding:34px 34px;border:1px solid #DDD;border-radius:7px;}

.label{text-align: left;}
.search-container{padding:45px 0;}
.search-container__title{font-size:19px;margin-bottom:27px;text-transform: uppercase;font-weight:bold;}
</style>


