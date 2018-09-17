<?php
require_once('../../../private/initialize.php');
// Требуется регистрация
login_required();
//Уровень доступа к странице
$access_required = 5;
//Проверяем доступы
$access = new Access($session->user_id, $access_required);
if (!$access->check_access_lvl()) {
    die("нехватает прав");
}

$page_title = 'Статьи';

//ищем всех пользователей
$users = User::find_all_users();


//  ----   ПОДКЛЮЧАЕМ ОТОБРАЖЕНИЕ СТРАНИЦЫ

//подключаем заголовок
include(SHARED_PATH . '/staff_header.php');

//Подключаем шаблонизатор СМАРТИ
$smarty = new Smarty;
$smarty->assign('users', $users);
$smarty->display(PUBLIC_PATH . ('/staff/tpls/users/index.tpl'));

//подключаем футер
include(SHARED_PATH . '/staff_footer.php'); 
     

     
       
   