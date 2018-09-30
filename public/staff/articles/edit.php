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

$page_title = 'Редактирование статьи';

//Проверяем передан ли айди, если нет то отправляем на индекс
if (!isset($_GET['id'])) {
    redirect_to('articles.php');
}
$id = (int)$_GET['id'];
$article = Article::find_article_by_id($id);

if ($article == false) {
    redirect_to('articles.php');
}

if (isset($_POST["submit"])) {
    switch ($_POST["submit"]) {
        case "access_type" :
            $access_via_link  =  (int) $_POST['access_via_link'];

               $result =  Article::update_article_access($id, $access_via_link);

               if($result !== true){
                  echo $result;
               }else{
                   $_SESSION['message'] = 'доступы успшено обновлены';
                   redirect_to('edit.php?id=' . $id);
               }

            break;

        case "update_form":

            // Save record using post parameters
            $args = $_POST['article'];
            $article = new Article($args);
            $result = $article->update($id);

            if ($result === true) {
                $_SESSION['message'] = 'Статья успешно отредактирована';
                redirect_to('index.php');
            } else {
                // show errors
                $_SESSION['message'] = 'Что то пошло не так';
                redirect_to('edit.php?id=' . $id);
            }

            break;

        default:
            break;
    }
} else {
    // display the form
}

// Формируем html

include(SHARED_PATH . '/staff_header.php');

$smarty = new Smarty;
$smarty->assign('article', $article);
$smarty->assign('server_name', DOMAIN_NAME);
$smarty->display(PUBLIC_PATH . ('/staff/tpls/articles/edit.tpl'));

include(SHARED_PATH . '/staff_footer.php'); 


