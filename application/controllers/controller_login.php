<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Login extends Controller {

  public $view = null;
  public $model = null;

  public function __construct() {
    if(User::isAuth()) {
      header('Location: /');
    }
    $this->view = new View;
    $this->model = new Model_Login;
  }

  public function action_index() {
    $data = array();
    $param = array();
    $param['css'] = 'login.css';
    $param['page_title'] = 'Вход | '.SITE_NAME;
    if(isset($_POST['login_submit_0']) && !empty($_POST['login_submit_0'])) {
      $data['login_messages'] = $this->model->login($_POST['login_email_0'], $_POST['login_password_0']);
    }
    $this->view->generate('login/login_view.php', '/templates/template_view.php', $param, $data, null);
  }





}