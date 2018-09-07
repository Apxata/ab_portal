<?php 
    require_once('../../../private/initialize.php'); 
    
    login_required();
    
    if(!isset($_GET['id'])) {
        redirect_to(root_path('/staff/users/articles.php'));
      }
      $id = (int) $_GET['id'];
      $user = User::find_user_by_id($id);
      if($user == false) {
        redirect_to(root_path('/staff/users/articles.php'));
      }

    if(is_post_request()) {
       
        $args = $_POST['user'];
        $user = new User($args);
        $result = $user->update($id);

        if($result == true) {
            $_SESSION['message'] = 'Пользователь успешно обновлен';
            redirect_to(root_path('/staff/users/articles.php'));
        } else {
                // ошибка
                echo "ошибка";
        }
    } else {
    
    }

//  ----   ПОДКЛЮЧАЕМ ОТОБРАЖЕНИЕ СТРАНИЦЫ

 //подключаем заголовок
 include(SHARED_PATH . '/staff_header.php'); 

 //Подключаем шаблонизатор СМАРТИ
 $smarty = new Smarty;
 $smarty->assign('user', $user);
 $smarty->display(PUBLIC_PATH . ('/tpls/staff/users/edit_user.tpl'));
 
 //подключаем футер
 include(SHARED_PATH . '/staff_footer.php'); 




    
    
