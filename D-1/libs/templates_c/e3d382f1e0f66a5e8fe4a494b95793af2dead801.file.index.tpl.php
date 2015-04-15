<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-16 01:19:43
         compiled from "libs\templates\D-1\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4164552eeecedc4763-35425473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3d382f1e0f66a5e8fe4a494b95793af2dead801' => 
    array (
      0 => 'libs\\templates\\D-1\\index.tpl',
      1 => 1429139979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4164552eeecedc4763-35425473',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552eeeceefcfb3_11769752',
  'variables' => 
  array (
    'name' => 0,
    'address' => 0,
    'id' => 0,
    'names' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552eeeceefcfb3_11769752')) {function content_552eeeceefcfb3_11769752($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\function.html_options.php';
?><html>
  <head>
    <title>D-1:Smarty</title>
  </head>
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 -->
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"YES"), 0);?>
 -->
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Info"), 0);?>
 -->
	
  <body>
  
	<pre>
		User Information:
		
		Name: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['name']->value);?>

		Address: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>

		Date: <?php echo smarty_modifier_date_format(time(),"%b %e, %Y");?>

	</pre>

	<select name=user>
	
		<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['id']->value,'output'=>$_smarty_tpl->tpl_vars['names']->value,'selected'=>"5"),$_smarty_tpl);?>

		
	</select>
	
<!-- 	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 -->
  	
  </body>
</html><?php }} ?>
