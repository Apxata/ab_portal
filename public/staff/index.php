<?php require_once('../../private/initialize.php');
login_required();
?>

<?php $page_title = 'Главная админка'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list col-md-8 col-md-offset-1">
            <h2>Главное меню</h2>
            <?php echo $session->email; ?>
            <ul>
                <li><a href="articles/index.php"> Статьи</a></li>
            </ul>
          
         </div>
        <!-- article-list -->
      
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->
  
   
       <?php include(SHARED_PATH . '/staff_footer.php'); ?>
       
   