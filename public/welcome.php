<?php 
require_once('../private/initialize.php');

$page_title = 'Страница входа';

$errors = [];
$email = '';
$password = '';

    if(is_post_request()) {

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        } else {
            $email = '';
        }

        if(isset($_POST['password'])){
            $password = $_POST['password'];
        } else {
            $password = '';
        }
    }

    // Валидация

    if(is_blank($email)) {
        $errors[] = "Почта не может быть пустой";
    }
    if(is_blank($password)) {
        $errors[] = "Пароль не может быть пустым";
    }

    //если не было ошибок, пробуем залогиниться

    if(empty($errors)) {

        $user = User::find_user_by_email_not_deleted($email);
        // test($user);
        // если почта найдена и пароль верный

        if($user != false && password_verify($password, $user['hashed_password'])) {
            // помечаем пользователя как залогиненного

            $session->login($user);

            redirect_to('index.php');
        }else {
            // test(User::verify_pas($password));
            // что-то пошло не так, выводим ошибку
           echo $errors[] = "Попытка входа была неуспешной.";
        }
    }

       
include(SHARED_PATH . '/public_header.php');

$smarty = new Smarty;
$smarty->assign('user', $email);
$smarty->display(PUBLIC_PATH . ('/tpls/welcome.tpl'));

include(SHARED_PATH . '/public_footer.php');

