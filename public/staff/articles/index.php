<?php require_once('../../../private/initialize.php'); 

login_required();

$page_title = 'Статьи'; 

// $articles = Article::find_all_articles();
if (isset($_GET['page'])){
    $current_page = $_GET['page'];
} else {
    $current_page = 1 ;
}
// Количество статей на странице 
$per_page = 15;

// Считаем сколько всего статей в базе
$total_count = Article::count_all();

// Создаем новый экземпляр класса пагинация, передаем туда:
// текущую страницу, сколько статей выводить на странице, всего всего статей 
$pagination = new Pagination ($current_page, $per_page, $total_count);

// Считаем сколько статей отсутпить 
$offset = $pagination->offset();

// Ищем все статьи для вывода на данной странице
$articles = Article::find_all_articles_per_page($per_page, $offset);

// Обрабатываем текст, чтобы показывал разметку маркдаун
$Parsedown = new Parsedown();
foreach ($articles as &$a) {
    $a['full_text'] =  nl2br($Parsedown->text($a['full_text']));
}
//  Формирование страницы для отображения

//подключаем заголовок
include(SHARED_PATH . '/staff_header.php'); 

//Подключаем шаблонизатор СМАРТИ
$smarty = new Smarty;
$smarty->assign('articles', $articles);
$smarty->display(PUBLIC_PATH . ('/tpls/staff/articles/index.tpl'));

//подключаем футер
include(SHARED_PATH . '/staff_footer.php'); 
      
   