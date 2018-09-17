<?php
/* Smarty version 3.1.32, created on 2018-09-17 11:32:35
  from '/var/www/gypsies-n1.ru/public/tpls/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9fc9133e71b9_51778145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a80679027f72cbf43f8d4b474640e69c57bdbbbe' => 
    array (
      0 => '/var/www/gypsies-n1.ru/public/tpls/welcome.tpl',
      1 => 1537197226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9fc9133e71b9_51778145 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Точка входа</h1>
                    <hr class="small">
                    <span class="subheading">Введите ваш email и пароль</span>
                </div>
            </div>
        </div>
    </div>
</header>

<form action="welcome.php" method="post">
    <table class="table">
        <tr class="info">
            <th>Параметр</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td> Почта(логин)</td>
            <td><input id="email" type="email" name="email" value="" required="required"></td>

        </tr>
        <tr>
            <td> Пароль </td>
            <td><input id="password" type="password" name="password" value="" required="required"></td>
        </tr>

    </table>
    <div class="container-fluid">
        <input type="submit" name= "submit" value="Войти" class="btn btn-primary col-lg-2 col-lg-offset-3" >
        <a href="registration.php"><div class="btn btn-danger col-lg-2">Зарегистрироваться</div></a>
    </div>
</form>
<?php }
}
