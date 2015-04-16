<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-16 16:02:27
         compiled from "libs\templates\D-1\child.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21948552f060d4a9c68-72711328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ed5e88553f0f7b65b161bb1a243abed1a18eeb9' => 
    array (
      0 => 'libs\\templates\\D-1\\child.tpl',
      1 => 1429142397,
      2 => 'file',
    ),
    'c68bab5dee732a83a54d6c335ef1db664f324183' => 
    array (
      0 => 'libs\\templates\\D-1\\parent.tpl',
      1 => 1429167746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21948552f060d4a9c68-72711328',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552f060d58c594_70096553',
  'variables' => 
  array (
    'result' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552f060d58c594_70096553')) {function content_552f060d58c594_70096553($_smarty_tpl) {?><html>
  <head>
    <title>My Title</title>
  </head>
  <body>
    My Body
    
    <hr>
    
<!--     <table border=1> -->
	
<!-- 		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?> -->
		
<!-- 			<tr> -->
			
<!-- 				<td> -->
<!-- 					<?php echo $_smarty_tpl->tpl_vars['row']->value['Id'];?>
 -->
<!-- 				</td> -->
				
<!-- 				<td> -->
<!-- 					<?php echo $_smarty_tpl->tpl_vars['row']->value['Name'];?>
 -->
<!-- 				</td> -->
				
<!-- 				<td> -->
<!-- 					<?php echo $_smarty_tpl->tpl_vars['row']->value['Age'];?>
 -->
<!-- 				</td> -->
				
<!-- 			</tr> -->
			
<!-- 		<?php } ?> -->
		
<!-- 	</table> -->
		
  </body>
</html><?php }} ?>
