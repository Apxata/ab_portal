<?php
require_once("../private/initialize.php");

include (SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
// $smarty->assign('fames', $fame);
$smarty->display('tpls/public/index.tpl');