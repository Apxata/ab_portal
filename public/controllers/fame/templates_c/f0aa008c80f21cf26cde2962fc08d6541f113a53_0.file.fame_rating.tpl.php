<?php
/* Smarty version 3.1.32, created on 2018-10-04 15:33:18
  from 'C:\WinNMP\WWW\albion\public\tpls\fame\fame_rating.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb632bebfca68_10348034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0aa008c80f21cf26cde2962fc08d6541f113a53' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\fame\\fame_rating.tpl',
      1 => 1538667196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb632bebfca68_10348034 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">

                <h3>Фейм рейтинг</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Ник</th>
                        <th>Дата</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['nickname'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['total_timespent'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fame']->value['fame_per_round'];?>
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
