<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  session_set_cookie_params(199999);
  ini_set('session.gc_maxlifetime', 199999);
  ini_set('session.cookie_lifetime', 199999);
  session_name('sid');
  session_start();
  define('SECURITY_CONST', 'true');
  define('SITE_ROOT', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']).'/');
  define('SITE_NAME', 'Babel');
  define('TEMPORARY_SMALL_PHOTO', '/images/material-desing-color-4134.jpg');
  define('TEMPORARY_BIG_PHOTO', 'public/images/com.sadrooid15.Materialwallpapers5.jpg');

 
  require_once SITE_ROOT.'application/bootstrap.php';
?>