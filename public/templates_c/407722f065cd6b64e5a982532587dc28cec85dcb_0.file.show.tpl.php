<?php
/* Smarty version 3.1.32, created on 2018-08-24 16:42:36
  from 'C:\xampp\htdocs\simple_blog\public\tpls\public\show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b80195ca1a4a8_26782009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '407722f065cd6b64e5a982532587dc28cec85dcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\simple_blog\\public\\tpls\\public\\show.tpl',
      1 => 1535121754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b80195ca1a4a8_26782009 (Smarty_Internal_Template $_smarty_tpl) {
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
            <form action="show.php?article_id=<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
" method="post">
            <textarea name=comment class="form-control" rows="1"></textarea>    
            <button type="submit" class="btn btn-default">Отправить</button>
            </form>
            <?php }?>
            <!-- вывод комментов  -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?> 
            <div class="panel panel-primary">
            <div class="panel-heading">  <?php echo $_smarty_tpl->tpl_vars['comment']->value['email'];?>
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
