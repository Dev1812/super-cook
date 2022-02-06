<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Restore extends Controller {

	public $view = null;
  public $model = null;

  public function __construct() {

    if(User::isAuth()) {
      header('Location: /');
    }

    $this->view = new View;
    $this->model = new Model_Restore;
  }

  public function action_index() {
    $data = array();
    $param = array();
    $param['css'] = 'restore.css';
    if(!empty($_POST['restore_submit_0'])) {
      $data['restore_messages'] = $this->model->restore($_POST['restore_email_0']);
    }
    $this->view->generate('restore/restore_view.php', '/templates/template_view.php', $param, $data, null);
  }

/**
 * Сюда отправляется пользователь из письма Email
 */

  public function action_r() {
    $data = array();
    $param = array();
    $param['css'] = 'restore.css';
    if(!empty($_GET['restore_submit_0'])) {
      $data['restore'] = $this->model->r($_GET['restore_email_0']);
    }
    $this->view->generate('restore/set_new_password_view.php', '/templates/template_view.php', $param, $data, null);
  }
}