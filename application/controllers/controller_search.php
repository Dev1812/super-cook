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
 //   $this->view->generate('search/search_view.php', '/templates/template_view.php', $param, $data, null);
  }

  
/*

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
  session_set_cookie_params(199999);
  ini_set('session.gc_maxlifetime', 199999);
  ini_set('session.cookie_lifetime', 199999);
  session_name('sid');
  session_start();
  
  define('SITE_ROOT', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']).'/');

  include SITE_ROOT.'libs/database.php';
  include SITE_ROOT.'libs/search.php';

$q = !empty($_GET['q']) ? $_GET['q'] : '';
  echo json_encode(search($q));*/
}