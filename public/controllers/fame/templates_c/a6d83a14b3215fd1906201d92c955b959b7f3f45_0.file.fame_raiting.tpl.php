<?php
/* Smarty version 3.1.32, created on 2018-10-04 15:02:59
  from 'C:\WinNMP\WWW\albion\public\tpls\fame\fame_rating.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb62ba38a7053_71614140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6d83a14b3215fd1906201d92c955b959b7f3f45' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\fame\\fame_rating.tpl',
      1 => 1538665352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb62ba38a7053_71614140 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">

                <h3>Фейм рейтинг</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Ник</th>
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
                            <td></td>
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
