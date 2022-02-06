<div style="text-align: center;padding:14px 0;">
	
<div style="width:744px;margin:0 auto;">

	<style type="text/css">
.food_block{padding:9px 9px;border:1px solid transparent;transition:all 0.14s ease;cursor: text;}

	</style>

<?php
//var_dump($data);
?>
<div class="food_block" style="width: 100%;height:auto; float: left;margin:9px;overflow: hidden;border-radius:9px;cursor: text;">
<div class="food_block__photo_wrap" style="width:390px">
	<div class="photo_block" style="background-image:url('/<?php echo $data['foods']['big_photo_path'];?>');width: 190px;height:190px;"></div>
</div>


<div style="line-height:27px;">
	
<div style="font-weight: bold;margin:11px 0 4px;color:#607d8b;text-align: left;"><?php echo $data['foods']['title'];?></div>




<div style="text-align: left;color:#000;"><span style="color:#808080;">Дата создания:</span> <?php echo $data['foods']['date_created'];?></div>
<div style="text-align: left;color:#000;"><span style="color:#808080;">Автор:</span> <?php echo $data['foods']['owner_full_name'];?></div>

<div style="font-weight: normal;margin:11px 0 4px;color:#000;text-align: left;"><?php echo $data['foods']['description'];?></div>

</div>





<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-curtain data-shape="round" style="float: left;margin-top:14px;" data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,moimir"></div>
<div class="clear"></div>				
<script src="https://vk.com/js/api/openapi.js?169" type="text/javascript"></script>
<div style="margin-top:24px;">

<script type="text/javascript">
      VK.init({
        apiId: '8069602',
        onlyWidgets: true
      });
</script>

<div id="vk_comments"></div>
<div class="clear"></div>
<script type="text/javascript">
  VK.Widgets.Comments('vk_comments');
</script>
</div>
</div>
</div>
</div>
<div style="clear: both;"></div>