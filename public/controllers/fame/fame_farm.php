<?php
require_once('../../../private/initialize.php');

login_required_public();
$fame['user_id'] = $session->user_id;

if (isset($_POST["submit"])) {
    switch ($_POST["submit"]) {
        case "fame_add" :
            $fame = $_POST;
            $fame['user_id'] = $session->user_id;

            $new_fame = new Fame($fame);
            $result = $new_fame->create();
            break;

        case "round_end" :
            $fame['user_id'] = $session->user_id;
            $round = new Fame($fame);

            $result = $round->create_fame_round();
            if ($result) {
                $round->create_new_round();
                redirect_to('fame_farm.php');
            }
            break;

        default:
            break;
    }
}
$fame = new Fame($fame);
$get_fame = $fame->find_all_by_last_fame_round_counter();
$get_round_fame = $fame->get_all_rounds_fame_by_user_id();
//test($get_fame);
foreach ($get_fame as &$f) {
    $f['timespent'] = round($f['timespent'] / 60);
}

foreach ($get_round_fame as &$a) {
    $a['total_timespent'] = round($a['total_timespent'] / 60);
}

include(SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
$smarty->assign('fames', $get_fame);
$smarty->assign('round_fames', $get_round_fame);
$smarty->display(PUBLIC_TPLS_PATH . '/fame/fame_farm.tpl');