<?php
/* Smarty version 3.1.29, created on 2016-06-03 15:26:58
  from "E:\phpleague\Grace\Grace.so\App\Views\te.php" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57513142a28174_85081779',
  'file_dependency' => 
  array (
    'e65f03612d6d65d9f113492d3c96f70a95a246f4' => 
    array (
      0 => 'E:\\phpleague\\Grace\\Grace.so\\App\\Views\\te.php',
      1 => 1464938765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_57513142a28174_85081779 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'E:\\phpleague\\Grace\\Grace.so\\App\\Library\\Smarty\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\phpleague\\Grace\\Grace.so\\App\\Library\\Smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

12312
<PRE>
123123123

    <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?><b><?php }?>
        
        Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title'));?>

        <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?></b><?php }?>

    The current date and time is <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>


    The value of global assigned variable $SCRIPT_NAME is <?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>


    Example of accessing server environment variable SERVER_NAME: <?php echo $_SERVER['SERVER_NAME'];?>


    The value of {$Name} is <b><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</b>

variable modifier example of {$Name|upper}

<b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['Name']->value, 'UTF-8');?>
</b>
<?php }
}
