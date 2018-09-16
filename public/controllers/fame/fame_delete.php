<?php
require_once('../../../private/initialize.php');

login_required_public();

if (!isset($_GET['id'])) {
    redirect_to(CONTROLLER_PATH . ('/fame/fame_farm.php'));
}

$id = (int) $_GET['id'];
$fame["user_id"] = $session->user_id;
$get_fame = new Fame($fame);
$result = $get_fame->delete_fame_row($id);
if($result) {
    redirect_to('fame_farm.php');
    $_SESSION["message"] = "Запись успешно удалена";
}else{
    redirect_to('fame_farm.php');
    $_SESSION["message"] = "Вы не смогли удалить эту запись";
}




