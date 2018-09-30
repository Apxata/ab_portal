<?php
/* Smarty version 3.1.32, created on 2018-09-30 06:39:38
  from '/var/www/gypsies-n1.ru/public/staff/tpls/articles/new_article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb0a7ea0b8ec2_16383136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a995d653a64d029c2a7d375f5b3c4a93f7c7eb3' => 
    array (
      0 => '/var/www/gypsies-n1.ru/public/staff/tpls/articles/new_article.tpl',
      1 => 1537263327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb0a7ea0b8ec2_16383136 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
<div class="content container">
  <div class="row">
    <div class="redaktor col-md-8 col-md-offset-1">
        <h2>Добавление новой статьи </h2>
        <!-- выводим сообщение об ошибках если есть  -->
        <form action="new_article.php" method="post">
            <div id="text_editor">
              <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста" value="">  

                <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80" placeholder="Ваш текст"></textarea>
                  <hr>
                <p>Видимость</p>
                <label class="radio-inline">
                <input type="radio" name="article[visible]" id="inlineRadio1" value="1" checked> Видно
                </label>
                <label class="radio-inline">
                <input type="radio" name="article[visible]" id="inlineRadio2" value="0"> Скрыто
                </label>

                <hr>
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
