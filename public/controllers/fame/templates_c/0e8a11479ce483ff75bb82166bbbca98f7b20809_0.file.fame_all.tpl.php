<?php
/* Smarty version 3.1.32, created on 2018-09-16 14:41:51
  from 'C:\WinNMP\WWW\albion\public\tpls\fame\fame_all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9e6baf7e0b33_57371315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e8a11479ce483ff75bb82166bbbca98f7b20809' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\fame\\fame_all.tpl',
      1 => 1536310598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9e6baf7e0b33_57371315 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
        <div class="row">
           <div class="user col-md-8 col-md-offset-1">
            <!-- USER ADD MENU -->
           <div class="">
            <form active="index.php" method="post">
              <div class="form-group">
                <input type="number" name="fame" class="form-control" placeholder="Количество фейма">
              </div>
              <button type="submit" class="btn btn-primary">Добавить опыт</button>
            </form>
           </div>  <!-- user add -->
          
        <h2>Фейм фарм</h2>
        <table class="table table-bordered">
          <tr>
            <th>id </th>
            <th>Фейм </th>
            <th>Время </th>
            <th>Продолжительность, мин </th>
            <th>Фейма набито </th>
            <th>Фейм в час </th>
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
