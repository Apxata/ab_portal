<?php 

function root_path($script_path) {
//     добавляет лидирующий / если нет
     if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
     }
    return WWW_ROOT . $script_path;
}

function u($string="") {
    return urlencode($string);
  }
  
  function raw_u($string="") {
    return rawurlencode($string);
  }
  
  function h($string="") {
    return htmlspecialchars($string);
  }

  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

function nl2br2($string) {
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
    return $string;
}