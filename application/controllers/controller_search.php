<?php
if(!defined('SECURITY_CONST')) {
  echo '<div style="text-align:center;margin-top:20%;font-family:Arial, sans-serif;"><div style="font-size:27px;margin-bottom:14px;">Unknown error</div><div style="font-size:17px;">Sorry for the inconvenience, we are working on an error</div></div>';
  exit;
}
class Controller_Search extends Controller {

  public $view = null;
  public $model = null;

  public function __construct() {
    $this->view = new View;
    $this->model = new Model_Search;
  }

  public function action_index() {
    $data = array();
    $param = array();
    $param['page_title'] = 'Добро пожаловать | '.SITE_NAME;

    $q = !empty($_GET['q']) ? $_GET['q'] : '';

    $data['foods'] = $this->model->search($q);
    $this->view->generate('search/search_view.php', '/templates/template_view.php', $param, $data, null);
  }

  

  public function action_ajax_search() {
    $data = array();
    $param = array();
    $param['page_title'] = 'Добро пожаловать | '.SITE_NAME;
    $q = !empty($_GET['q']) ? $_GET['q'] : '';
    $data['foods'] = $this->model->search($q);
    echo json_encode($data['foods']);
  }

}