<?php

require_once('../../../private/initialize.php');

$rating = Fame::fame_rating();

$num=1;
foreach ($rating as &$r) {
    $r["order"] = $num;
    ++$num;
    $r['total_timespent'] = round($r['total_timespent'] / 60);
}

include(SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
$smarty->assign('fames', $rating);

$smarty->display(PUBLIC_TPLS_PATH . '/fame/fame_rating.tpl');