<?php /* Smarty version Smarty-3.0.4, created on 2015-04-27 09:15:21
         compiled from "/home/mexicotr/public_html/setup/templates/database.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2125050073553e44791bd971-21990827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b230386b73403e4620e16d2731fb5fc766dfbac4' => 
    array (
      0 => '/home/mexicotr/public_html/setup/templates/database.tpl',
      1 => 1430144093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2125050073553e44791bd971-21990827',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('showHidden')->value){?>
<script type="text/javascript">MODx.showHidden = true;</script>
<?php }?>
<script type="text/javascript" src="assets/js/sections/database.js"></script>
<form id="install" action="?action=database" method="post">
<h2><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_title']) ? $_smarty_tpl->getVariable('_lang')->value['connection_title'] : null);?>
</h2>

<h3><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_connection_and_login_information']) ? $_smarty_tpl->getVariable('_lang')->value['connection_connection_and_login_information'] : null);?>
</h3>

<p><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_connection_note']) ? $_smarty_tpl->getVariable('_lang')->value['connection_connection_note'] : null);?>
</p>

<p class="error"><?php echo $_smarty_tpl->getVariable('error_message')->value;?>
</p>

<div class="labelHolder">
    <label for="database-type"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_database_type']) ? $_smarty_tpl->getVariable('_lang')->value['connection_database_type'] : null);?>
</label>
    <select id="database-type" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_type']) ? $_smarty_tpl->getVariable('config')->value['database_type'] : null);?>
" name="database_type" autofocus="autofocus">
        <option value="mysql"<?php if ((isset($_smarty_tpl->getVariable('config')->value['database_type']) ? $_smarty_tpl->getVariable('config')->value['database_type'] : null)=="mysql"){?> selected="selected"<?php }?>>mysql</option>
        <option value="sqlsrv"<?php if ((isset($_smarty_tpl->getVariable('config')->value['database_type']) ? $_smarty_tpl->getVariable('config')->value['database_type'] : null)=="sqlsrv"){?> selected="selected"<?php }?>>sqlsrv</option>
    </select>
    &nbsp;<span class="version-msg" id="database-type-error"></span>
</div>
<div class="labelHolder">
    <label for="database-server"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_database_host']) ? $_smarty_tpl->getVariable('_lang')->value['connection_database_host'] : null);?>
</label>
    <input id="database-server" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_server']) ? $_smarty_tpl->getVariable('config')->value['database_server'] : null);?>
" name="database_server" />
    &nbsp;<span class="field_error" id="database-server-error"></span>
</div>
<div class="labelHolder">
    <label for="database-user"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_database_login']) ? $_smarty_tpl->getVariable('_lang')->value['connection_database_login'] : null);?>
</label>
    <input id="database-user" name="database_user" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_user']) ? $_smarty_tpl->getVariable('config')->value['database_user'] : null);?>
" />
    &nbsp;<span class="field_error" id="database-user-error"></span>
</div>
<div class="labelHolder">
    <label for="database-password"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_database_pass']) ? $_smarty_tpl->getVariable('_lang')->value['connection_database_pass'] : null);?>
</label>
    <input id="database-password" type="password" name="database_password"  value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_password']) ? $_smarty_tpl->getVariable('config')->value['database_password'] : null);?>
" />
    &nbsp;<span class="field_error" id="database-password-error"></span>
</div>
<div class="labelHolder">
    <label for="dbase"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_database_name']) ? $_smarty_tpl->getVariable('_lang')->value['connection_database_name'] : null);?>
</label>
    <input id="dbase" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['dbase']) ? $_smarty_tpl->getVariable('config')->value['dbase'] : null);?>
" name="dbase" />
    &nbsp;<span class="field_error" id="dbase-error"></span>
</div>
<div class="labelHolder">
    <label for="table-prefix"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_table_prefix']) ? $_smarty_tpl->getVariable('_lang')->value['connection_table_prefix'] : null);?>
</label>
    <input id="table-prefix" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['table_prefix']) ? $_smarty_tpl->getVariable('config')->value['table_prefix'] : null);?>
" name="table_prefix" />
    &nbsp;<span class="field_error" id="tableprefix_error"></span>
</div>
<p>&rarr;&nbsp;<a href="javascript:void(0);" id="modx-testconn"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['db_test_conn_msg']) ? $_smarty_tpl->getVariable('_lang')->value['db_test_conn_msg'] : null);?>
</a></p>

<div id="modx-db-step1-msg" class="modx-hidden2">
    <span><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['db_connecting']) ? $_smarty_tpl->getVariable('_lang')->value['db_connecting'] : null);?>
</span>&nbsp;<span class="connect-msg"></span>
</div>
<p id="modx-db-info">
    <br />- <?php echo (isset($_smarty_tpl->getVariable('_lang')->value['mysql_version_server_start']) ? $_smarty_tpl->getVariable('_lang')->value['mysql_version_server_start'] : null);?>
<span id="modx-db-server-version"></span>
    <br />- <?php echo (isset($_smarty_tpl->getVariable('_lang')->value['mysql_version_client_start']) ? $_smarty_tpl->getVariable('_lang')->value['mysql_version_client_start'] : null);?>
<span id="modx-db-client-version"></span>
    <hr />
</p>
<div id="modx-db-step2" class="modx-hidden2">
<?php if ((isset($_smarty_tpl->getVariable('config')->value['database_type']) ? $_smarty_tpl->getVariable('config')->value['database_type'] : null)=="mysql"){?>
<div class="labelHolder">
    <label for="database-connection-charset"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_character_set']) ? $_smarty_tpl->getVariable('_lang')->value['connection_character_set'] : null);?>
</label>
    <select id="database-connection-charset" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_connection_charset']) ? $_smarty_tpl->getVariable('config')->value['database_connection_charset'] : null);?>
" name="database_connection_charset"></select>
    &nbsp;<span class="field_error" id="database_connection_charset_error"></span>
</div>
<?php if ($_smarty_tpl->getVariable('installmode')->value==0){?>
<div class="labelHolder">
    <label for="database-collation"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_collation']) ? $_smarty_tpl->getVariable('_lang')->value['connection_collation'] : null);?>
</label>
    <select id="database-collation" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['database_collation']) ? $_smarty_tpl->getVariable('config')->value['database_collation'] : null);?>
" name="database_collation"></select>
    &nbsp;<span class="field_error" id="database_collation_error"></span>
</div>
<?php }?>
<?php }?>
<br />
<p>&rarr;&nbsp;<a href="javascript:void(0);" id="modx-testcoll"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['db_test_coll_msg']) ? $_smarty_tpl->getVariable('_lang')->value['db_test_coll_msg'] : null);?>
</a></p>

<p id="modx-db-step2-msg" class="modx-hidden2"><span><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['db_check_db']) ? $_smarty_tpl->getVariable('_lang')->value['db_check_db'] : null);?>
</span>&nbsp;<span class="result"></span></p>
</div>
<?php if ($_smarty_tpl->getVariable('installmode')->value==0){?>
<div id="modx-db-step3" class="modx-hidden">
    <p class="title"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_user']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_user'] : null);?>
</p>
    <p><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_note']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_note'] : null);?>
</p>

    <div class="labelHolder">
        <label for="cmsadmin"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_login']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_login'] : null);?>
</label>
        <input type="text" name="cmsadmin" id="cmsadmin" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['cmsadmin']) ? $_smarty_tpl->getVariable('config')->value['cmsadmin'] : null);?>
" />
        &nbsp;<span class="field_error" id="cmsadmin_error"><?php echo $_smarty_tpl->getVariable('error_cmsadmin')->value;?>
</span>
    </div>
    <div class="labelHolder">
        <label for="cmsadminemail"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_email']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_email'] : null);?>
</label>
        <input type="text" name="cmsadminemail" id="cmsadminemail" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['cmsadminemail']) ? $_smarty_tpl->getVariable('config')->value['cmsadminemail'] : null);?>
" />
        &nbsp;<span class="field_error" id="cmsadminemail_error"><?php echo $_smarty_tpl->getVariable('error_cmsadminemail')->value;?>
</span>
    </div>
    <div class="labelHolder">
        <label for="cmspassword"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_password']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_password'] : null);?>
</label>
        <input type="password" id="cmspassword" name="cmspassword" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['cmspassword']) ? $_smarty_tpl->getVariable('config')->value['cmspassword'] : null);?>
" />
        &nbsp;<span class="field_error" id="cmspassword_error"><?php echo $_smarty_tpl->getVariable('error_cmspassword')->value;?>
</span>
    </div>
    <div class="labelHolder">
        <label for="cmspasswordconfirm"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['connection_default_admin_password_confirm']) ? $_smarty_tpl->getVariable('_lang')->value['connection_default_admin_password_confirm'] : null);?>
</label>
        <input type="password" id="cmspasswordconfirm" name="cmspasswordconfirm" value="<?php echo (isset($_smarty_tpl->getVariable('config')->value['cmspasswordconfirm']) ? $_smarty_tpl->getVariable('config')->value['cmspasswordconfirm'] : null);?>
" />
        &nbsp;<span class="field_error" id="cmspasswordconfirm_error"><?php echo $_smarty_tpl->getVariable('error_cmspasswordconfirm')->value;?>
</span>
    </div>
</div>
<?php }?>
<br />

<?php if ((isset($_smarty_tpl->getVariable('config')->value['unpacked']) ? $_smarty_tpl->getVariable('config')->value['unpacked'] : null)==1){?>
<input type="hidden" id="unpacked" name="unpacked" value="1" />
<?php }?>
<?php if ((isset($_smarty_tpl->getVariable('config')->value['inplace']) ? $_smarty_tpl->getVariable('config')->value['inplace'] : null)==1){?>
<input type="hidden" id="inplace" name="inplace" value="1" />
<?php }?>
<div class="setup_navbar">
    <input type="submit" name="proceed" id="modx-next" class="modx-hidden" value="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['next']) ? $_smarty_tpl->getVariable('_lang')->value['next'] : null);?>
" />
    <input type="button" onclick="MODx.go('options');" value="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['back']) ? $_smarty_tpl->getVariable('_lang')->value['back'] : null);?>
" />
</div>
</form>