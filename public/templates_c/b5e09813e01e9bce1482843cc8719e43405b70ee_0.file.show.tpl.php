<?php
/* Smarty version 3.1.32, created on 2018-09-12 12:14:25
  from 'C:\WinNMP\WWW\albion\public\tpls\show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b99032188d0c7_63590406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5e09813e01e9bce1482843cc8719e43405b70ee' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\show.tpl',
      1 => 1536754441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b99032188d0c7_63590406 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list col-md-8 col-md-offset-1 ">
            <div class="article ">
                    <h2 class="a-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['subject'];?>
</h2>
                    <div class="a-info"><?php echo $_smarty_tpl->tpl_vars['article']->value['create_date'];?>
</div>
                    <div class="a-content"><?php echo $_smarty_tpl->tpl_vars['article']->value['full_text'];?>
</div><!-- a-content -->
                    <div class="a-footer"></div>
            </div>  <!-- article -->
            <?php if (isset($_smarty_tpl->tpl_vars['session']->value)) {?>
                <h3>Введите ваш комментарий</h3>
                <form action="show.php?article_id=<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
" method="post">
                <textarea name=comment class="form-control" rows="1"></textarea>
                <button type="submit" class="btn btn-danger">Отправить</button>
                </form>
            <?php } else { ?>
                <a href="welcome.php">Войдите, если хотите оставить коммент</a>
                <hr>
            <?php }?>

            <!-- вывод комментов  -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?> 
            <div class="panel panel-primary">
            <div class="panel-heading">  <?php echo $_smarty_tpl->tpl_vars['comment']->value['nickname'];?>
 : <?php echo $_smarty_tpl->tpl_vars['comment']->value['date_create'];?>
 </div>
            <div class="panel-body"> <?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
</div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div><!-- comments    -->
          
         </div>
        <!-- article-list -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  --><?php }
}
