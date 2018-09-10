<?php
/* Smarty version 3.1.32, created on 2018-09-10 18:48:52
  from 'C:\WinNMP\WWW\albion\public\staff\tpls\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b96bc94433309_75931167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8da08b35a884f5a79c13d5b5c3bf7542efd0ed5d' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\staff\\tpls\\login.tpl',
      1 => 1536605328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b96bc94433309_75931167 (Smarty_Internal_Template $_smarty_tpl) {
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
   
<form action="login.php" method="post">
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
          <input type="submit" name= "submit" value="Отправить" class="btn btn-primary col-lg-3 col-lg-offset-3" >   
    </div>
</form><?php }
}
