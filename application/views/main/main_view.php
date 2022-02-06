<div style="text-align: center;padding:0px 0;">
	

<div style="background-color:#DDD;height:391px;position: relative;" id="olololol">

<div style="position: absolute;color:#FFF;top:0;right:0;z-index: 99;padding: 9px 14px;cursor: pointer;" onClick="hide('olololol');setCookie('main_background_about_block','true',7);">x закрыть</div>

<div class="photo_block" style="position: absolute; background-image:url('/images/1920x1200_877569_[www.ArtFile.ru].jpg');width:100%;height:100%"></div>

<div style="position:absolute;top: 0;left:0;right:0;bottom:0;background-color:#000;opacity:.44;"></div>
<div style="position:absolute;top: 0;left:0;right:0;bottom:0;">

	<div style="margin-top: 106px">
		<div style="color:#FFF;font-size:2.3em;margin-bottom:34px;">Добро пожаловать</div>
		<div style="color:#FFF;font-size:1.4em">Мы поможем Вам найти то самое блюдо, которое понравится Вам, Вашим родственникам или друзьям</div>
		<a href="#loll"><div style="margin-top:44px;"><button class="button" >Начать</button></div></a>
	</div>
</div>
</div>

<div style="width:904px;margin:0 auto;" id="loll">




	<style type="text/css">
.food_block{padding:9px 9px;border:1px solid transparent;transition:all 0.14s ease;}
.food_block:hover{box-shadow:0 0 9px #d4d4d4;border:1px solid #DDD;}

	</style>
<script type="text/javascript">

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}


window.onload = function() {
  if(getCookie('main_background_about_block') == 'true') {
hide('olololol');
  }
}

function deletePost(post_id) {
var isAdmin = confirm("Вы действительно хоите удалить запись?");

if(!isAdmin) {
	return false;
}








ajax.post({

	url: '/main/ajax_delete_my_post/?post_id='+post_id,
	success: function(obj) {
		console.warn(obj);
		hide('test_'+post_id);
	}
});
}
</script>
<?php
//var_dump($data['foods']);
if(empty($data['foods'])) {
  echo '<div style="padding:74px 0;text-align:center;">Не найдено ни отдной записи</div>';
} else {
foreach($data['foods'] as $v) {
	//var_dump($v);
?>
<a href="/main/get/?food_id=<?php echo $v['id'];?>" id="test_<?php echo $v['id'];?>">
<div class="food_block" style="width: 208px;height:287px; float: left;margin:9px;overflow: hidden;border-radius:9px;cursor: pointer;position: relative;">


<?php

if(!empty($v['owner_id']) && !empty($_SESSION['user_id'])) {

if($v['owner_id'] == $_SESSION['user_id']) {
	echo '
<div style="position: absolute;top:0;right:0;background-color:#000;top:9px;right:9px;width:29px;height:29px;color:#FFF;
    padding-top: 3px;" onClick="event.preventDefault();deletePost('.$v['id'].');">x</div>';
}
}


?>


<div class="food_block__photo_wrap" style="width:190px">
	<div class="photo_block" style="background-image:url('/<?php echo $v['big_photo_path'];?>');width: 190px;height:190px;"></div>
</div>


<div style="line-height:24px;">
	
<div style="font-weight: bold;margin:11px 0 4px;color:#607d8b;text-align: center;font-size:1.2em;"><?php echo $v['title'];?></div>
 <?php echo $v['date_created'];?>

</div>
</div>
</a>
<?php
}
}
?>
</div>
</div>
<div style="clear: both;"></div>