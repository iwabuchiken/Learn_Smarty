<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-16 09:04:20
         compiled from "libs\templates\D-1\index_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:784552ef8bfb4dd27-15910252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fd3d8a10bc971e3b68fc57ca7161e1196b2a668' => 
    array (
      0 => 'libs\\templates\\D-1\\index_table.tpl',
      1 => 1429142397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '784552ef8bfb4dd27-15910252',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552ef8bfbcad43_97731803',
  'variables' => 
  array (
    'val' => 0,
    'names' => 0,
    'name' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552ef8bfbcad43_97731803')) {function content_552ef8bfbcad43_97731803($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\function.cycle.php';
?><html>
  <head>
    <title>D-1:Smarty</title>
  </head>
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
 -->
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>"YES"), 0);?>
 -->
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>"Info"), 0);?>
 -->
	
  <body>
  
<!--   	<?php echo $_smarty_tpl->getSubTemplate ("C:/WORKS/WS/Eclipse_Luna/Smarty/D-1/libs/debug.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
 -->
  
  	<?php echo $_smarty_tpl->tpl_vars['val']->value['Token']['id'];?>

  
	<table>
	
		<?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['names']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
?>
			<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#123456,#654321"),$_smarty_tpl);?>
"><td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td></tr>
		<?php } ?>
		</table>
		
		<table>
		<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#aaaaaa,#bbbbbb"),$_smarty_tpl);?>
"><td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
</td></tr>
		<?php } ?>
		
	</table>  	
	
  </body>
  
</html><?php }} ?>
