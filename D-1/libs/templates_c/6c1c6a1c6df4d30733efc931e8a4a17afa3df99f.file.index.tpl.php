<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-16 01:03:28
         compiled from "libs\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28762552ee8a4ce4ca9-20153763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c1c6a1c6df4d30733efc931e8a4a17afa3df99f' => 
    array (
      0 => 'libs\\templates\\index.tpl',
      1 => 1429139007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28762552ee8a4ce4ca9-20153763',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552ee8a4dfa264_69211518',
  'variables' => 
  array (
    'name' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552ee8a4dfa264_69211518')) {function content_552ee8a4dfa264_69211518($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\WORKS\\WS\\Eclipse_Luna\\Smarty\\D-1\\libs\\plugins\\modifier.date_format.php';
?><html>
<!--   <head> -->
<!--     <title>Smarty</title> -->
<!--   </head> -->
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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

	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  	
  </body>
</html><?php }} ?>
