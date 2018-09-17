<?php
/* Smarty version 3.1.32, created on 2018-09-16 18:34:31
  from 'C:\WinNMP\WWW\albion\public\tpls\fame\fame_farm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9ea237b0d7f9_23062370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fbd3cb7928322bf4bf57842e5c63005f031e001' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\fame\\fame_farm.tpl',
      1 => 1537122867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9ea237b0d7f9_23062370 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">
                <div class="fame_all">
                    <a href="fame_all.php">Все записи по фейму</a>
                </div>  <!-- user add -->
                <!-- FAME MENU ADD -->
                <div class="fame_menu">
                    <form class="form-inline" action="fame_farm.php" method="post">
                        <div class="form-group">
                            <input type="number" name="fame" class="form-control" placeholder="Количество фейма">
                            <button type="submit" name="submit" value="fame_add" class="btn btn-primary">Добавить опыт
                            </button>
                        </div>
                    </form>
                </div>  <!-- FAME MENU ADD -->

                <h3>Фейм фарм</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Фейм</th>
                        <th>Время</th>
                        <th>Продол, мин</th>
                        <th>Фейма набито</th>
                        <th>Фейм в час</th>
                        <th>Заход</th>
                        <th>Удалить</th>
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
                            <td><a href="fame_delete.php?id=<?php echo $_smarty_tpl->tpl_vars['fame']->value['id'];?>
">Удал.</a></td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
                                <div class="row">
                    <div class="round_end_button">
                        <form name="round_end" action="fame_farm.php" method="post">
                            <button type="submit" name="submit" value="round_end"
                                    class="btn btn-danger col-md-5 col-md-offset-3">Закрыть заход
                            </button>
                        </form>
                    </div>
                </div>
                                <div class="row">
                    <h3>Фейм за заход</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>Дата</th>
                            <th>Заход</th>
                            <th>Всего фейма</th>
                            <th>Фейм за час</th>
                            <th>Времени потрачено, мин</th>
                            <th>Подробнее</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['round_fames']->value, 'round_fame');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['round_fame']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['date'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['round'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['fame_per_round'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['fame_per_hour'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['total_timespent'];?>
</td>
                                <td><a href="fame_round_info.php?round=<?php echo $_smarty_tpl->tpl_vars['round_fame']->value['round'];?>
">Подробнее</a></td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                </div>
            </div>         </div>    </div><!-- content container -->
</div><!-- end of main  -->
<?php }
}
