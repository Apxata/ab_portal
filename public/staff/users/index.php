<?php 
    require_once('../../../private/initialize.php'); 
    login_required();
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
     

     
       
   