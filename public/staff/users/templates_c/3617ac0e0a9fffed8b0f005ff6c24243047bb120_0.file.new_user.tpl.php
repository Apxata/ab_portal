<?php
/* Smarty version 3.1.32, created on 2018-08-22 09:06:32
  from 'C:\xampp\htdocs\simple_blog\public\tpls\staff\users\new_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7d0b783558d9_51258009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3617ac0e0a9fffed8b0f005ff6c24243047bb120' => 
    array (
      0 => 'C:\\xampp\\htdocs\\simple_blog\\public\\tpls\\staff\\users\\new_user.tpl',
      1 => 1534921494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7d0b783558d9_51258009 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
      <div class="row">
        <div class="redaktor col-md-8 col-md-offset-1">
            <h2>Добавление нового пользователя </h2>

            <!-- выводим сообщение об ошибках если есть  -->
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'er');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['er']->value) {
?>
                <?php echo $_smarty_tpl->tpl_vars['er']->value;?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>

            <form class="form-horizontal" action="new_user.php" method="post">
                <h2 class="a-title"></h2>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Почта(логин)</label>
                        <div class="col-sm-10">
                        <input type="email" name="user[email]" class="form-control" id="inputEmail3" placeholder="Почта(логин)" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                        <input type="password" name="user[password]" class="form-control" id="inputPassword1" placeholder="пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="col-sm-2 control-label">Повторите пароль</label>
                        <div class="col-sm-10">
                        <input type="password" name="user[confirm_password]" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inlineRadio1 inlineRadio2" class="col-sm-2 control-label">Удален</label>
                        <div class="col-sm-10">
                            <input type="radio" name="user[deleted]" id="inlineRadio1" value="1"> Да 
                            <input type="radio" name="user[deleted]" id="inlineRadio2" value="0" checked> Нет
                        </div>
                    </div>
                <div id="operations">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-block btn-lg" type="submit" value="Зарегать" />
                    </div>    <!-- col-sm-offset-2 col-sm-10 -->
             
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
