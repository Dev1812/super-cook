<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Not_Found extends Controller {

	public $view = null;

  public function __construct() {

    $this->view = new View;

}

  public function action_index() {
    $data = array();
    $param = array();//task_id
    $param['css'] = 'not_found.css';
    $param['page_title'] = 'Страница не найдена | '.SITE_NAME;
    $this->view->generate('/errors/404_view.php', '/templates/template_view.php', $param, $data, null);
  }




}