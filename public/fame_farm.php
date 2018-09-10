<?php
require_once('../private/initialize.php');

login_required_public();

if(isset($_POST["fame"])) {
    $fame['fame'] = (int) $_POST["fame"];
    $fame['user_id'] = $session->user_id;

    $round = new Fame($fame);
    $result = $round->create();
}

$fame = Fame::find_all_by_user_id($session->user_id);
foreach ($fame as &$f){
    $f['timespent'] = round($f['timespent']/60);
}

include (SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
$smarty->assign('fames', $fame);
$smarty->display('tpls/fame_farm.tpl');