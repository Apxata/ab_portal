<?php
require_once('../private/initialize.php');

if(is_post_request()) {

    $args = $_POST['user'];

    $user = new User($args);
    $result = $user->create();

    if($result == true) {
        $new_id = $user->id;
        $_SESSION['message'] = 'Новый пользователь успешно добавлен';
        redirect_to(root_path('/staff/users/index.php'));

    } else {
        // ошибка
    }
}   else {
    $user = new User;
}

//  ----   ПОДКЛЮЧАЕМ ВЫВОД НА СТРАНИЦУ

//подключаем заголовок
include(SHARED_PATH . '/public_header.php');

//Подключаем шаблонизатор СМАРТИ
$smarty = new Smarty;
if(isset($user->errors)){
    $smarty->assign('errors', $user->errors );
}
$smarty->display(PUBLIC_PATH . ('/tpls/registration.tpl'));

//подключаем футер
include(SHARED_PATH . '/public_footer.php');




