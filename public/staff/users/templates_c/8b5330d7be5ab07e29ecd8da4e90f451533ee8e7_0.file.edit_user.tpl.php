<?php
/* Smarty version 3.1.32, created on 2018-08-21 22:15:33
  from 'C:\xampp7\htdocs\simple_blog\public\tpls\staff\users\edit_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7c72e5735247_11979608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b5330d7be5ab07e29ecd8da4e90f451533ee8e7' => 
    array (
      0 => 'C:\\xampp7\\htdocs\\simple_blog\\public\\tpls\\staff\\users\\edit_user.tpl',
      1 => 1534882524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c72e5735247_11979608 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
      <div class="row">
        <div class="redaktor col-md-8 col-md-offset-1">
            <h2>Добавление нового пользователя </h2>
            <!-- выводим сообщение об ошибках если есть  -->
           
            <form class="form-horizontal" action="edit_user.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" method="post">
                <h2 class="a-title"></h2>
    
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Почта(логин)</label>
                    <div class="col-sm-10">
                    <input type="email" name="user[email]" class="form-control" id="inputEmail3" placeholder="Почта(логин)" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
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
                        <input type="radio" name="user[deleted]" id="inlineRadio1" value="1" <?php if ($_smarty_tpl->tpl_vars['user']->value['deleted'] == 1) {?> checked <?php }?>> Да
                        <input type="radio" name="user[deleted]" id="inlineRadio2" value="0" <?php if ($_smarty_tpl->tpl_vars['user']->value['deleted'] == 0) {?> checked <?php }?>> Нет
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
    <!-- end of main  --><?php }
}
