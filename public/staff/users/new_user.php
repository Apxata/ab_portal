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

if (is_post_request()) {

    $args = $_POST['user'];

    $user = new User($args);
    $result = $user->create();

    if ($result == true) {
        $new_id = $user->id;
        $_SESSION['message'] = 'Новый пользователь успешно добавлен';
        redirect_to(root_path('/staff/users/index.php'));

    } else {
        // ошибка
    }
} else {
    $user = new User;
}

//  ----   ПОДКЛЮЧАЕМ ВЫВОД НА СТРАНИЦУ

//подключаем заголовок
include(SHARED_PATH . '/staff_header.php');

//Подключаем шаблонизатор СМАРТИ
$smarty = new Smarty;
if (isset($user->errors)) {
    $smarty->assign('errors', $user->errors);
}
$smarty->display(PUBLIC_PATH . ('/staff/tpls/users/new_user.tpl'));

//подключаем футер
include(SHARED_PATH . '/staff_footer.php');
  

    
    
