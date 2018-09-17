<?php
require_once('../../../private/initialize.php');

login_required_public();
$fame['user_id'] = $session->user_id;

if (!isset($_GET['round'])) {
    redirect_to(CONTROLLER_PATH . ('/fame/fame_farm.php'));
}

$round = (int)$_GET['round'];
$fame = new Fame($fame);
$get_fame = $fame->find_all_fame_by_round($round);

foreach ($get_fame as &$f) {
    $f['timespent'] = round($f['timespent'] / 60);
}

include(SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
$smarty->assign('fames', $get_fame);

$smarty->display(PUBLIC_TPLS_PATH . '/fame/fame_round_info.tpl');