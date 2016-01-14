<?php /* Smarty version Smarty-3.0.4, created on 2015-04-27 09:15:10
         compiled from "/home/mexicotr/public_html/setup/templates/welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1226829648553e446ea680c2-43401398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa5e6f14473933b841737ef35f70148300ffa010' => 
    array (
      0 => '/home/mexicotr/public_html/setup/templates/welcome.tpl',
      1 => 1430144093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1226829648553e446ea680c2-43401398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="assets/js/sections/welcome.js"></script>
<form id="welcome" action="?action=welcome" method="post">
<div>
    <h2><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['welcome']) ? $_smarty_tpl->getVariable('_lang')->value['welcome'] : null);?>
</h2>
    <?php echo (isset($_smarty_tpl->getVariable('_lang')->value['welcome_message']) ? $_smarty_tpl->getVariable('_lang')->value['welcome_message'] : null);?>

    <br />
</div>

<?php if (@MODX_SETUP_KEY!='@traditional@'){?>
<p><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['config_key_change']) ? $_smarty_tpl->getVariable('_lang')->value['config_key_change'] : null);?>
</p>

<div id="cck-div">
    <h3><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['config_key']) ? $_smarty_tpl->getVariable('_lang')->value['config_key'] : null);?>
</h3>
    <p><small><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['config_key_override']) ? $_smarty_tpl->getVariable('_lang')->value['config_key_override'] : null);?>
</small></p>
    <div class="labelHolder">
        <label for="config_key"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['config_key']) ? $_smarty_tpl->getVariable('_lang')->value['config_key'] : null);?>
</label>
        <input type="text" name="config_key" id="config_key" value="<?php echo $_smarty_tpl->getVariable('config_key')->value;?>
" style="width:250px" />
        <br />
        <?php if ($_smarty_tpl->getVariable('writableError')->value){?>
        <span class="field_error"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['config_not_writable_err']) ? $_smarty_tpl->getVariable('_lang')->value['config_not_writable_err'] : null);?>
</span>
        <?php }?>
    </div>
</div>
<?php }?>
<div class="setup_navbar">
    <input type="submit" name="proceed" value="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['next']) ? $_smarty_tpl->getVariable('_lang')->value['next'] : null);?>
" autofocus="autofocus" />
</div>
</form>
