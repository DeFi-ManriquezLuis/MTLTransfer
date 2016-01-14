<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" {if $_config.manager_direction EQ 'rtl'}dir="rtl"{/if}
      lang="{$_config.manager_lang_attribute}" xml:lang="{$_config.manager_lang_attribute}">
<head>

    <title>WSI CMS Login | based on ModX Revolution</title>
    <meta http-equiv="Content-Type" content="text/html; charset={$_config.modx_charset}"/>
    

    <link rel="stylesheet" type="text/css"
          href="{$_config.manager_url}assets/ext3/resources/css/ext-all-notheme-min.css"/>
    <!--link rel="stylesheet" type="text/css" href="{$_config.manager_url}templates/default/css/xtheme-modx.css" /-->
    <link rel="stylesheet" type="text/css" href="{$_config.manager_url}templates/default/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="{$_config.manager_url}templates/default/css/login.css"/>

    {if $_config.ext_debug}
        <script src="{$_config.manager_url}assets/ext3/adapter/ext/ext-base-debug.js" type="text/javascript"></script>
        <script src="{$_config.manager_url}assets/ext3/ext-all-debug.js" type="text/javascript"></script>
    {else}
        <script src="{$_config.manager_url}assets/ext3/adapter/ext/ext-base.js" type="text/javascript"></script>
        <script src="{$_config.manager_url}assets/ext3/ext-all.js" type="text/javascript"></script>
    {/if}
    <script src="assets/modext/core/modx.js" type="text/javascript"></script>

    <script src="assets/modext/core/modx.component.js" type="text/javascript"></script>
    <script src="assets/modext/util/utilities.js" type="text/javascript"></script>
    <script src="assets/modext/widgets/core/modx.panel.js" type="text/javascript"></script>
    <script src="assets/modext/widgets/core/modx.window.js" type="text/javascript"></script>
    <script src="assets/modext/sections/login.js" type="text/javascript"></script>

    <link rel="apple-touch-icon" sizes="57x57" href="favicons//apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="favicons/manifest.json">
    <link rel="shortcut icon" href="favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta name="robots" content="noindex, nofollow"/>
</head>
<body id="login">
<div id="modx-login-language-select-div">
    <label>{$language_str}:
        <select name="cultureKey" id="modx-login-language-select">
            {$languages}
        </select>
    </label>
</div>
{$onManagerLoginFormPrerender}
<br/>

<div id="container">
    <div id="modx-login-logo" class="circular shadow1">
        <img src="{$_config.manager_url}templates/default/images/style/modx-logo-color.png" alt=""/>
    </div>

    <div id="modx-panel-login-div" class="x-panel modx-form x-form-label-right">
        <div class="x-panel-bwrap login-form-bwrap">
            <div class="login-form-bwrap-padding">
                <div class="x-panel-ml">
                    <div class="x-panel-mr">
                        <div class="x-panel-mc">

                            <form id="modx-login-form" action="" method="post">
                                <input type="hidden" name="login_context" value="mgr"/>
                                <input type="hidden" name="modahsh" value="{$modahsh}"/>
                                <input type="hidden" name="returnUrl" value="{$returnUrl}"/>

                                <div class="x-panel x-panel-noborder">
                                    <div class="x-panel-bwrap">
                                        <div class="x-panel-body x-panel-body-noheader">
                                            <h2>{$_config.site_name}</h2>
                                            <br class="clear"/>

                                            {if $error_message}<p class="error">{$error_message}</p>{/if}
                                        </div>
                                    </div>
                                </div>

                                <div class="x-form-item login-form-item login-form-item-first">
                                    <div class="x-form-element login-form-element">
                                        <input type="text" id="modx-login-username" name="username" tabindex="1"
                                               autocomplete="on" value="{$_post.username}"
                                               class="x-form-text x-form-field" placeholder="{$_lang.login_username}"/>
                                    </div>
                                </div>

                                <div class="x-form-item login-form-item">
                                    <div class="x-form-element login-form-element">
                                        <input type="password" id="modx-login-password" name="password" tabindex="2"
                                               autocomplete="on" class="x-form-text x-form-field"
                                               placeholder="{$_lang.login_password}"/>
                                    </div>
                                </div>

                                <br class="clear"/>

                                <div class="login-cb-row">
                                    <div class="login-cb-col one">
                                        <div class="x-form-check-wrap modx-login-rm-cb">
                                            <input type="checkbox" id="modx-login-rememberme" name="rememberme"
                                                   tabindex="3" autocomplete="on"
                                                   {if $_post.rememberme}checked="checked"{/if}
                                                   class="x-form-checkbox x-form-field" value="1"/>
                                            <label for="modx-login-rememberme"
                                                   class="x-form-cb-label">{$_lang.login_remember}</label>
                                        </div>
                                    </div>
                                    <div class="login-cb-col two">
                                        <div class="modx-login-fl-link">
                                            <a href="javascript:void(0);" id="modx-fl-link"
                                               style="{if $_post.username_reset}display:none;{/if}">{$_lang.login_forget_your_login}</a>
                                        </div>
                                    </div>
                                </div>

                                {$onManagerLoginFormRender}

                                <br class="clear"/>

                                <button class="x-btn-text login-form-btn" name="login" type="submit" value="1"
                                        id="modx-login-btn" tabindex="4">{$_lang.login_button} &#x25b6;</button>
                            </form>

                            {if $allow_forgot_password}
                                <div class="modx-forgot-login">
                                    <form id="modx-fl-form" action="" method="post">
                                        <div id="modx-forgot-login-form"
                                             style="{if NOT $_post.username_reset}display: none;{/if}">

                                            <div class="x-form-item login-form-item">
                                                <div class="x-form-element login-form-element">
                                                    <input type="text" id="modx-login-username-reset"
                                                           name="username_reset" class="x-form-text x-form-field"
                                                           value="{$_post.username_reset}"
                                                           placeholder="{$_lang.login_username_or_email}"/>
                                                </div>
                                                <div class="x-form-clear-left"></div>
                                            </div>

                                            <br class="clear"/>

                                            <button class="x-btn-text login-form-btn" name="forgotlogin" type="submit"
                                                    value="1"
                                                    id="modx-fl-btn">{$_lang.login_send_activation_email} </button>

                                        </div>
                                    </form>
                                </div>
                            {/if}

                            <br class="clear"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/>

    <p class="loginLicense">
        <img src="templates/default/images/wsi.png" alt="WSI" title="WSI" /><br />
        &copy;2015  &mdash;  based on <a href="http://modx.com" target="_blank">ModX Revolution</a>
    </p>
</div>

</body>
</html>
