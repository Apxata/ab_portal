<?php
/* Smarty version 3.1.32, created on 2018-09-07 07:33:23
  from 'C:\WinNMP\WWW\albion\public\tpls\public\articles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b9229c3cb2392_20391270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80e3672bc3ae7b5442ec74f9de2eb4a7cda550bb' => 
    array (
      0 => 'C:\\WinNMP\\WWW\\albion\\public\\tpls\\public\\articles.tpl',
      1 => 1535149818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9229c3cb2392_20391270 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
            <div class="article col-md-8 col-md-offset-1">

                    <h2 class="a-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['subject'];?>
</h2>
                    <div class="a-info"><?php echo $_smarty_tpl->tpl_vars['article']->value['create_date'];?>
</div>
                    <div class="a-content"><?php echo $_smarty_tpl->tpl_vars['article']->value['full_text'];?>
</div>
                    <!-- a-content -->
                    <div class="a-footer"><a href="show.php?article_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['count_comments'];?>
 коммент.</a></div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <!-- article -->
         </div>
        <!-- article-list -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->
<?php }
}
