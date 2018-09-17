<?php
/* Smarty version 3.1.32, created on 2018-08-18 18:06:05
  from 'C:\xampp7\htdocs\simple_blog\public\tpls\staff\articles\new_article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7843eda4e356_36546192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b4f3b019b80336f8b8d8b7d6891014ff1ee3c10' => 
    array (
      0 => 'C:\\xampp7\\htdocs\\simple_blog\\public\\tpls\\staff\\articles\\new_article.tpl',
      1 => 1534602263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7843eda4e356_36546192 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
<div class="content container">
  <div class="row">
    <div class="redaktor col-md-8 col-md-offset-1">
        <h2>Добавление новой статьи </h2>
        <!-- выводим сообщение об ошибках если есть  -->
        <form action="new_article.php" method="post">
            <div id="operations">
              <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста" value="">  
              <div class="a-content">
                <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80" placeholder="Ваш текст"></textarea>             
                <p>Видимость</p>
                <label class="radio-inline">
                <input type="radio" name="article[visible]" id="inlineRadio1" value="1"> Видно
                </label>
                <label class="radio-inline">
                <input type="radio" name="article[visible]" id="inlineRadio2" value="0"> Скрыто
                </label>
               </div> <!-- a-content -->
            <input class="btn btn-primary btn-block btn-lg" type="submit" value="Добавить статью" />
            </div>
            <!-- operations -->
        </form>    
    </div>
    <!-- redaktor -->
  </div>
    <!-- row  -->
</div>
<!-- content container -->
</div> 
<!-- end of main  -->
<?php }
}
