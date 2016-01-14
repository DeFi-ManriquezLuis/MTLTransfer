<?php /* Smarty version Smarty-3.0.4, created on 2015-04-27 09:15:05
         compiled from "/home/mexicotr/public_html/setup/templates/language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2127448215553e446994e803-06358177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6871a96e688edf0c139b3166aa1f8994e94c1dce' => 
    array (
      0 => '/home/mexicotr/public_html/setup/templates/language.tpl',
      1 => 1430144093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2127448215553e446994e803-06358177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="install" action="?" method="post">

<?php if ($_smarty_tpl->getVariable('restarted')->value){?>
    <br class="clear" />
    <br class="clear" />
    <p class="note"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['restarted_msg']) ? $_smarty_tpl->getVariable('_lang')->value['restarted_msg'] : null);?>
</p>
<?php }?>

<div class="setup_navbar" style="border-top: 0;">
    <p class="title"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['choose_language']) ? $_smarty_tpl->getVariable('_lang')->value['choose_language'] : null);?>
:
        <select name="language" autofocus="autofocus">
            <?php echo $_smarty_tpl->getVariable('languages')->value;?>

    	</select>
    </p>

    <input type="submit" name="proceed" value="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['select']) ? $_smarty_tpl->getVariable('_lang')->value['select'] : null);?>
" />
</div>
</form>