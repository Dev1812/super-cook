<div class="wrap1" style="padding:27px 37px 27px;text-align:left;width:540px;margin:27px auto;background-color: #FFF;border-radius:4px;border:1px solid #DDDFE1">

  <div style="font-size: 23px;margin-bottom:17px;text-align: center;">Создание рецепта</div>




<?php

if(!empty($data['foods'])) {
if($data['foods']['is_error'] === true) {
?>
  <div class="form__message form__message_error" style="margin:7px 0 19px">
      <div class="form__message_title"><?php echo $data['foods']['error']['error_message']['title'];?></div>
      <div class="form__message_body"><?php echo $data['foods']['error']['error_message']['description'];?></div>
  </div>

<?php
} else {
  if(!empty($data['foods']['message'])) {
    ?>

  <div class="form__message form__message_success" style="margin:7px 0 19px">
      <div class="form__message_title"><?php echo $data['foods']['message']['title'];?></div>
      <div class="form__message_body"><?php echo $data['foods']['message']['description'];?></div>
  </div>

    <?php

  }
}
}
?>



  <div>Название</div>

  <FORM action="" method="POST">
  <div style="padding:14px 0 14px;">
    <input type="text" id="create_food_title" name="create_food_title" class="text_field" placeholder="Название рецепта" autofocus="">
  </div>
  <div>Описание</div>
  <div style="padding:14px 0 14px;">
    <TEXTAREA class="text_field" style="height:207px;
    padding: 6px 14px;background-color: #FFF;" id="create_food_description" placeholder="Описание рецепта" name="create_food_description"></TEXTAREA>
  </div>

  <div style="padding:14px 0 0;">



<style type="text/css">
.nicEdit-main{background-color: #FFF;} 
.upload-files__container{margin-bottom:14px;}
.upload-file__progres{min-width:0;height:21px;transition:all 0.9s ease;background-color: #536e7b;text-align:center;color:#FFF;border-radius:7px;}
.upload-file__block{width:240px;height:21px;background-color:#DDD;width: 100%;margin-bottom:14px;}

.nicEdit-main  img {width:170px!important}  
</style>
<div id="upload-files__container">
	
</div>


<div class="clear"></div>
  </div>

<div id="sample">
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>


<div class="input_wrap">
  <div class="label">Выберите категорию:</div>


  <div>
    
<select name="create_food_category" style="cursor: pointer;border:1px solid #CCC;padding:5px 7px;width:310px;">
  <option value="1" selected="">Десерты</option>
  <option value="2">Основые блюда</option>
  <option value="3">Салаты</option>
  
  <option value="4">Коктейли</option>
  
  <option value="5">Супы</option>
  
  <option value="6">Сэндвичи</option>
  
  <option value="7">Пицца</option>
  

</select>


  </div>
</div>






















<input type="hidden" name="food_photo_path_0" id="food_photo_path_0" value="">

<div id="upload-files__container"></div>
<div id="upload-file__progress"></div>
<script type="text/javascript">
function closeUpload() {

document.getElementById('photo').value='';
document.getElementById('ab').innerHTML='';


}
function upload(file) {
  console.log('testt');
  var ajax = new XMLHttpRequest();
  var div = document.createElement('div');
  document.getElementById('upload-files__container').appendChild(div);

//document.getElementById('lol1').style.display='block';
show('upload__photo_0');
show('upload__progress__block');
//upload__progress__block
  ajax.upload.onprogress = function(event) {
    var test = ((event.loaded / event.total) *100).toFixed();
    document.getElementById('upload__progress').style.width = test + '%';
    document.getElementById('upload__progress_text').innerHTML = test + '%';
    if(test == 100) {
      document.getElementById('upload__progress').innerHTML = '';
    }
  }
  ajax.upload.onload = function(event) {
    //console.log('uploaded!');
    //console.log(event);
  }
  var formData = new FormData();
  formData.append("userfile", file);
    
  ajax.open("POST", "/main/ajax_photo_upload", true);
  ajax.send(formData);


//upload__photo_0
ajax.addEventListener("readystatechange", function() {

  ///
  //  var f = JSON.parse(ajax.responseText);

    if(ajax.readyState === 4 && ajax.status === 200) {     

    var test = JSON.parse(ajax.response);

//closeUpload
      document.getElementById('upload__photo_0').style.backgroundImage='url("/'+test.path+'")';
      document.getElementById('food_photo_path_0').value=test.path;
food_photo_path_0.value=test.path;
    //ab
    }



    hide('upload__progress__block');
/*

      document.getElementById('ab').innerHTML='<div style="position:relative;width:349px;margin-bottom:24PX;"><div style="position:absolute;top:0;right:0;padding: 9px 11px;background: #000;cursor:pointer"><img src="/image/icon/close.png"></div><img src="'+test.path+'" style="width:100%"></div>';

*/

   /// document.getElementById('lol1').style.display='none';

});


}

</script>


<div>
  
  <div class="photo_block" id="upload__photo_0" style="margin-bottom:14px; display: none; background-image:url('/images/3ddbf963411e89507c89f0621a43be86.jpg');width:210px;height:210px;"></div>

<div id="upload__progress__block" style="display: none; width:310px;height:24px;background-color:#EEE;border-radius:4px;">

<div id="upload__progress" style="height:24px;background-color:#CCC;width:0%;transition:all 0.34s ease;"></div>

<div style="
    width: 310px;
    text-align: center;
    position: relative;
    top: -22px;
    font-weight: bold;
" id="upload__progress_text">0%</div>

</div>
</div>



<style type="text/css">
  
</style>

<div class="im-chat-input--attach" style="margin-top:14px;">
  <input style="    opacity: 0;
    width: 1px;
    height: 1px;
    z-index: -1;
    pointer-events: none;
    position: absolute;" name="create_food_hoto" onchange="upload(this.files[0]);" aria-label="Прикрепить фото или видео" tabindex="0" id="im_full_upload" class="im-chat-input--attach-file" type="file" size="28" multiple="true" accept="image/jpeg,image/png,image/gif,video/*">


    <label for="im_full_upload" class="im-chat-input--attach-label" style="background: url(data:image/svg+xml;charset=utf-8,%3Csvg%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20stroke%3D%22%23828a99%22%20stroke-width%3D%221.7%22%3E%3Cpath%20d%3D%22m14.134%203.65c.853%200%201.46.278%201.988.899.017.019.494.61.66.815.228.281.674.536.945.536h.41c2.419%200%203.863%201.563%203.863%204.05v5.85c0%202.241-2%204.2-4.273%204.2h-11.454c-2.267%200-4.223-1.953-4.223-4.2v-5.85c0-2.496%201.4-4.05%203.814-4.05h.409c.271%200%20.717-.255.945-.536.166-.204.643-.796.66-.815.528-.621%201.135-.899%201.988-.899z%22%2F%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%223.85%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E) 0 no-repeat;
    width: 174px;
    height: 24px;
    opacity: .7;
    display: block;
    cursor: pointer;;position: relative;z-index:1"></label>

    <label style="margin-left: 7px;float:left;position: relative;
    position: relative;
    top: -22px;
    left: 27px;z-index: 0">Выберите фото</label> 
  </div>


<div class="clear"></div>
  <div style="padding:4px 0 14px;">
    <input type="submit" name="create_food_submit" class="button button_green" value="Создать рецепт" style="width:auto;">
  </div>
</FORM>

</div>



