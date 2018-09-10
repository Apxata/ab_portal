<?php
require_once("../private/initialize.php");

login_required_public();

include (SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
// $smarty->assign('fames', $fame);
$smarty->display('tpls/index.tpl');