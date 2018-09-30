<?php require_once('../private/initialize.php'); 
    
    // проверка на передачу айди статьи
    if (isset($_GET['article_id'])){
        $article_id = (int) $_GET['article_id'];
        $article = Article::find_article_by_id_and_access_id($article_id);
        // ищем по хешу
    }elseif (isset($_GET['article_hash'])){
        $article_hash = h($_GET['article_hash']);
        $article = Article::find_article_by_hash($article_hash);
    } else {
        redirect_to('articles.php');
    }
    $deleted = 0;

    if (is_post_request()) {
         // создаем новый комент
        $text_comment = $_POST['comment'];
        $user_id = (int) $session->user_id;

        $comment = new Comment($user_id, $article_id, $text_comment, $deleted);
        $result = $comment->create();
        if($result) {
          redirect_to("show.php?article_id=$article_id");
        }
    } else {

    }

    // Ищем статью по айди 

    if(!empty($article)) {

    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
        $article['full_text'] =  nl2br($Parsedown->line($article['full_text']));

    // Пагинация для комментов
    
    // ищем всем комменты
    $comments = Comment::find_all_comments_with_email($article_id);
    // test($comments);

    //Подключаем шаблонизатор СМАРТИ
    $smarty = new Smarty;
    // передаем статью шаблонизатору
    $smarty->assign('article', $article);
    $smarty->assign('article_id', $article_id);
    $smarty->assign('comments', $comments);

    // провряем есть ли айди у пользователя, тогда показывает форму ответа.
    // если нет говорим что нужно залогиниться.
    if($session->is_logged_in()){
        $smarty->assign('session', $session);  
    }    

    include(SHARED_PATH . '/public_header.php');

    $smarty->display(PUBLIC_PATH . ('/tpls/show.tpl'));
    
    include(SHARED_PATH . '/public_footer.php');

    }else {
        $_SESSION = "Статья не найдена";
        redirect_to("articles.php");
    }