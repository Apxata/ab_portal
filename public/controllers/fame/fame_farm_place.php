<?php
require_once('../../../private/initialize.php');

login_required_public();

if(is_post_request()) {

    // create a RECORD using this params


} else {
    // $article = new Article;
}



include(SHARED_PATH . '/public_header.php');
$smarty = new Smarty;
$smarty->display(PUBLIC_TPLS_PATH . '/fame/fame_farm_place.tpl');