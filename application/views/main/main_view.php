<div style="text-align: center;padding:14px 0;">
	
<div style="width:904px;margin:0 auto;">

	<style type="text/css">
.food_block{padding:9px 9px;border:1px solid transparent;transition:all 0.14s ease;}
.food_block:hover{box-shadow:0 0 9px #d4d4d4;border:1px solid #DDD;}

	</style>
<script type="text/javascript">
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