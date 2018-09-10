<?php
require_once('../../../private/initialize.php');

login_required();

$page_title = 'Редактирование статьи'; 

//Проверяем передан ли айди, если нет то отправляем на индекс
if(!isset($_GET['id'])) {
  redirect_to('articles.php');
}
$id = (int) $_GET['id'];
$article = Article::find_article_by_id($id); 

if($article == false) {
  redirect_to('articles.php');
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['article'];
  $article = new Article($args);
  $result = $article->update($id);
  
  if($result === true) {
    $_SESSION['message'] = 'Статья успешно отредактирована';
    redirect_to('index.php');
  } else {
    // show errors 
    $_SESSION['message'] = 'Что то пошло не так';
    redirect_to('edit.php?id=' . $id); 
    }
} else {
  // display the form
}

// Формируем html

include(SHARED_PATH . '/staff_header.php');

$smarty = new Smarty;
$smarty->assign('article', $article);
$smarty->display(PUBLIC_PATH . ('staff/tpls/articles/edit.tpl'));

include(SHARED_PATH . '/staff_footer.php'); 


