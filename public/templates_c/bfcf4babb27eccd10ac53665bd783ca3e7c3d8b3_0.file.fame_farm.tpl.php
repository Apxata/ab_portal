<?php
/* Smarty version 3.1.32, created on 2018-09-16 14:14:51
  from 'c:\winnmp\www\albion\public\tpls\fame_farm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9e655b787e07_34158531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfcf4babb27eccd10ac53665bd783ca3e7c3d8b3' => 
    array (
      0 => 'c:\\winnmp\\www\\albion\\public\\tpls\\fame_farm.tpl',
      1 => 1537107285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9e655b787e07_34158531 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
            <div class="user col-md-8 col-md-offset-1">
                <div class="fame_all">
                    <a href="fame_all.php">Все записи по фейму</a>
                </div>  <!-- user add -->
                <!-- FAME MENU ADD -->
                <div class="">
                    <form  action="fame_farm.php" method="post">
                        <div class="form-group">
                            <input type="number" name="fame" class="form-control" placeholder="Количество фейма">
                            <button type="submit" name="submit" value="fame_add" class="btn btn-primary">Добавить опыт
                            </button>
                        </div>
                    </form>

                    <form name="round_end" action="fame_farm.php" method="post">
                        <button type="submit" name="submit" value="round_end" class="btn btn-danger">Закрыть заход
                        </button>
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
                <h3>Фейм за заход</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Дата</th>
                        <th>Заход</th>
                        <th>Фейм за час</th>
                        <th>Всего фейма</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['fame_per_hour'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['fame_per_round'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['round_fame']->value['total_timespent'];?>
</td>
                            <td><a href="fame_round_info.php?id=<?php echo $_smarty_tpl->tpl_vars['round_fame']->value['id'];?>
">Подробнее</a></td>
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
