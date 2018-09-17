<?php require_once('../../../private/initialize.php');

// Требуется регистрация
login_required();
//Уровень доступа к странице
$access_required = 5;
//Проверяем доступы
$access = new Access($session->user_id, $access_required);
if (!$access->check_access_lvl()) {
    die("нехватает прав");
}

$page_title = 'Добавление статьи'; 
$errors = [];
$_SESSION['message']= "";

if(is_post_request()) {
    
    // create a RECORD using this params
    $args = $_POST['article'];
    $args['author_id'] = $session->user_id;
    $article = new Article($args);
    $result = $article->create();

} else {
   // $article = new Article;
}

// формируем страницу

 include(SHARED_PATH . '/staff_header.php'); 

 $smarty = new Smarty;
 $smarty->display(PUBLIC_PATH . ('/staff/tpls/articles/new_article.tpl'));
       
 include(SHARED_PATH . '/staff_footer.php'); 