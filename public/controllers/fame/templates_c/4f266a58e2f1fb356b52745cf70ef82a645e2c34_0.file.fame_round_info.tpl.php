<?php
/* Smarty version 3.1.32, created on 2018-09-17 11:45:04
  from '/var/www/gypsies-n1.ru/public/tpls/fame/fame_round_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9fcc00b460f7_65323701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f266a58e2f1fb356b52745cf70ef82a645e2c34' => 
    array (
      0 => '/var/www/gypsies-n1.ru/public/tpls/fame/fame_round_info.tpl',
      1 => 1537197226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9fcc00b460f7_65323701 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">

                <div class="row">
                    <a href="fame_farm.php">
                        <button class="btn btn-primary col-sm-3"> Вернуться назад</button>
                    </a>
                </div>
                <h3>Фейм за <?php echo $_smarty_tpl->tpl_vars['fames']->value[0]['round'];?>
 круг </h3>
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Фейм</th>
                        <th>Время</th>
                        <th>Продол, мин</th>
                        <th>Фейма набито</th>
                        <th>Фейм в час</th>
                        <th>Заход</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fames']->value, 'fame');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fame']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['fame'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['fame_time'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['timespent'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['fame_get'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['fame_per_hour'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['round'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </div>         </div>    </div><!-- content container -->
</div><!-- end of main  --><?php }
}
