<?php
class Controller_Logout extends Controller {
    
  function __construct() {
    session_unset();
    session_destroy();
    header('Location: /');
  }
    
}