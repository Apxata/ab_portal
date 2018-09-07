<?php
/* Smarty version 3.1.32, created on 2018-08-18 18:36:05
  from 'C:\xampp7\htdocs\simple_blog\public\tpls\staff\articles\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b784af5262643_35471878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9717dd7e1cba0cfdd4b901bd56b1ad17cf500193' => 
    array (
      0 => 'C:\\xampp7\\htdocs\\simple_blog\\public\\tpls\\staff\\articles\\edit.tpl',
      1 => 1534610155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b784af5262643_35471878 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
      <div class="row">
        <div class="redaktor col-md-8 col-md-offset-1">
            <a class="btn btn-primary" href="index.php"> Вернуться обратно</a>
         
              <h1>Редактирование статьи</h1>
                  <!-- выводим сообщение об ошибках если есть  -->
               
              <form action="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" method="post">
                    <h2 class="a-title"></h2>
                    <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['subject'];?>
">  
                    <div class="a-content">
                        <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80" placeholder="Ваш текст"><?php echo $_smarty_tpl->tpl_vars['article']->value['full_text'];?>
</textarea>             
                        <hr>
                        <p>Видимость</p>
                        <label class="radio-inline">
                        <input type="radio" name="article[visible]" id="inlineRadio1" value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['visible'] == 1) {?> checked <?php }?>> Видно
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="article[visible]" id="inlineRadio2" value="0" <?php if ($_smarty_tpl->tpl_vars['article']->value['visible'] == 0) {?> checked <?php }?>> Скрыто
                        </label>
                    </div> <!-- a-content -->
                    <div id="operations">
                    <input class="btn btn-primary" type="submit" value="Отредактировать" />
                    </div>
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
