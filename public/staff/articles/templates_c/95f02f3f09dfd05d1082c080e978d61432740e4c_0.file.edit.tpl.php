<?php
/* Smarty version 3.1.32, created on 2018-09-30 17:49:37
  from 'C:\WinNMP\WWW\albion\public\staff\tpls\articles\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb10cb179c076_27437050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95f02f3f09dfd05d1082c080e978d61432740e4c' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\staff\\tpls\\articles\\edit.tpl',
      1 => 1538329774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb10cb179c076_27437050 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="redaktor col-md-8 col-md-offset-1">
            <h1>Редактирование статьи</h1>
            <!-- выводим сообщение об ошибках если есть  -->
            <div class="row">
                <form class="form-inline" action="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" method="post">
                    <a class="btn btn-primary" href="index.php"> Вернуться обратно</a>
                                        <select name="access_via_link" class="form-control col-sm-offset-4">
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['access_via_id'] == 1) {?> selected <?php }?>>Стандартный доступ</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['article']->value['access_via_id'] == 2) {?> selected <?php }?>>Доступ по ссылке</option>
                    </select>
                    <button type="submit" class="btn btn-danger" name="submit" value="access_type">
                    Изм. доступ</button>
                </form>
                <div class="full-link">
                    <?php if ($_smarty_tpl->tpl_vars['article']->value['access_via_id'] == 2) {?> http://albion.test/show.php?article_hash=<?php echo $_smarty_tpl->tpl_vars['article']->value['article_hash'];?>
 <?php }?>
                </div>
            </div>
            <div class="row">
                <form action="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" method="post">
                    <h2 class="a-title"></h2>
                    <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста"
                           value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['subject'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="a-content">
                        <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80"
                                  placeholder="Ваш текст"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['full_text'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                        <hr>
                        <p>Видимость</p>
                        <label class="radio-inline">
                            <input type="radio" name="article[visible]" id="inlineRadio1"
                                   value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['visible'] == 1) {?> checked <?php }?>> Видно
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="article[visible]" id="inlineRadio2"
                                   value="0" <?php if ($_smarty_tpl->tpl_vars['article']->value['visible'] == 0) {?> checked <?php }?>> Скрыто
                        </label>
                        <hr>
                    </div> <!-- a-content -->
                    <div id="operations">
                        <button class="btn btn-primary" name="submit" type="submit" value="update_form">Отредактировать
                        </button>
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
