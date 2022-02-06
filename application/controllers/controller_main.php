<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Main extends Controller {

  public $view = null;
  public $model = null;

  public function __construct() {
    $this->view = new View;
    $this->model = new Model_Main;
  }

  public function action_index() {
    $data = array();
    $param = array();
    $param['page_title'] = 'Добро пожаловать | '.SITE_NAME;

    if(empty($_GET['category'])) {
      $category=0;
    } else {
      $category=$_GET['category'];
    }

    $data['foods'] = $this->model->getFoods($category);
    $this->view->generate('main/main_view.php', '/templates/template_view.php', $param, $data, null);
  }

  public function action_get() {
    $data = array();
    $param = array();
    $param['page_title'] = 'Добро пожаловать | '.SITE_NAME;

    if(empty($_GET['food_id'])) {
      $food_id=0;
    } else {
      $food_id=$_GET['food_id'];
    }

    $data['foods'] = $this->model->getFoodInfo($food_id);
    $this->view->generate('main/food_view.php', '/templates/template_view.php', $param, $data, null);
  }


  public function action_create_food() {
    if(!User::isAuth()) {
      header('Location: /login');
    }
    $data = array();
    $param = array();
    $param['page_title'] = 'Добро пожаловать | '.SITE_NAME;
    if(!empty($_POST['create_food_submit'])) {
      $data['foods'] = $this->model->createFood($_POST['create_food_title'], $_POST['create_food_description'], $_POST['create_food_category'],$_POST['food_photo_path_0']);
    }
    $this->view->generate('main/create_food_view.php', '/templates/template_view.php', $param, $data, null);
  }

  public function action_ajax_photo_upload() {
    $param = array();
    $data = array();
    $uploaddir = 'public/';
    $uploadfile = $uploaddir . md5(time().rand().$_SERVER['REMOTE_ADDR']).'.jpg';
    if (copy($_FILES['userfile']['tmp_name'], $uploadfile)) {
      echo json_encode(array('path' => $uploadfile));
    } else {
      echo json_encode('is_error'=>true);
    }
  }
  
  public function action_ajax_delete_my_post() {
    $data = array();
    $param = array();
    $data['ajax'] = $this->model->deleteMyPost($_GET['post_id']);
    $this->view->generate('', '/ajax/json_response.php', $param, $data, null);
  }

}