<?php
/* Smarty version 3.1.32, created on 2018-08-21 20:39:22
  from 'C:\xampp7\htdocs\simple_blog\public\tpls\staff\users\articles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7c5c5a15df75_85846149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d4cfb7dc1346926ac835b2810a1a5c1308cc9e3' => 
    array (
      0 => 'C:\\xampp7\\htdocs\\simple_blog\\public\\tpls\\staff\\users\\articles.tpl',
      1 => 1534876279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c5c5a15df75_85846149 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
           <div class="user col-md-8 col-md-offset-1">
            <!-- USER ADD MENU -->
           <div class="add_user">
            <a href="new_user.php">Добавить пользователя</a>
           </div>  <!-- user add -->
          
        <h2>Список пользователей</h2>
        <table class="table table-bordered">
          <tr>
            <th>id</th>
            <th>Логин(почта)</th>
            <th>Дата регистрации</th>
            <th>Имя </th>
            <th>Фамилия</th>
            <th>Удален</th>
            <th>Редактировать</th>
          </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?> 
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['reg_date'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['deleted'];?>
</td>
            <td><a href="edit_user.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Ред</a></td>
          </tr>
   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
           </div>
            <!-- article -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  --><?php }
}
