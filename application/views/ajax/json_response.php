<?php
$ajax = array('is_error'=>true);
if(isset($data['ajax'])) {
  $ajax = $data['ajax'];
}
echo json_encode($ajax);
?>