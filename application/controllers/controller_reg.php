<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Reg extends Controller {

  public $view = null;
  public $model = null;

  public function __construct() {

    if(User::isAuth()) {
      header('Location: /');
    }

    $this->view = new View;
    $this->model = new Model_Reg;
}

  public function action_index() {
    $data = array();
    $param = array();
    $param['css'] = 'reg.css';
    $param['page_title'] = 'Регистрация | '.SITE_NAME;
    if(isset($_POST['reg_submit_0']) && !empty($_POST['reg_submit_0'])) {
      $data['reg_messages'] = $this->model->reg($_POST['reg_first_name_0'], $_POST['reg_last_name_0'], $_POST['reg_email_0'], $_POST['reg_password_0']);
    }
    $this->view->generate('reg/reg_view.php', '/templates/template_view.php', $param, $data, null);
  }


}