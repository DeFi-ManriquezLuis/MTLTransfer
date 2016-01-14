<?php return array (
  '7736c82d39ab3141039e39452a4c396e' => 
  array (
    'criteria' => 
    array (
      'name' => 'lingua',
    ),
    'object' => 
    array (
      'name' => 'lingua',
      'path' => '{core_path}components/lingua/',
      'assets_path' => '{assets_path}components/lingua/',
    ),
  ),
  'e91de24a7f957745ff9aa2ae843b8c31' => 
  array (
    'criteria' => 
    array (
      'namespace' => 'lingua',
      'controller' => 'index',
    ),
    'object' => 
    array (
      'id' => 4,
      'namespace' => 'lingua',
      'controller' => 'index',
      'haslayout' => 1,
      'lang_topics' => 'lingua:default',
      'assets' => '',
      'help_url' => '',
    ),
  ),
  '272aa2389c1ae4cfe38d62f0e306c69e' => 
  array (
    'criteria' => 
    array (
      'text' => 'lingua',
    ),
    'object' => 
    array (
      'text' => 'lingua',
      'parent' => 'components',
      'action' => '4',
      'description' => 'lingua_desc',
      'icon' => 'images/icons/plugin.gif',
      'menuindex' => 0,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'core',
    ),
  ),
  '2852240eda84b10a3c08d124ead2a9f7' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.debug',
    ),
    'object' => 
    array (
      'key' => 'lingua.debug',
      'value' => '0',
      'xtype' => 'combo-boolean',
      'namespace' => 'lingua',
      'area' => 'general',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  'feaf54b3c1186b34ca8558659b34f3e1' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.get_key',
    ),
    'object' => 
    array (
      'key' => 'lingua.get_key',
      'value' => 'lang',
      'xtype' => 'textfield',
      'namespace' => 'lingua',
      'area' => 'URL',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '8253cfbbf433e6e0665ccc5c1493b0cc' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.code_field',
    ),
    'object' => 
    array (
      'key' => 'lingua.code_field',
      'value' => 'lang_code',
      'xtype' => 'textfield',
      'namespace' => 'lingua',
      'area' => 'URL',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '1ebb5295ad4e7a93f1020f1c90b999f0' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.contexts',
    ),
    'object' => 
    array (
      'key' => 'lingua.contexts',
      'value' => 'web',
      'xtype' => 'textfield',
      'namespace' => 'lingua',
      'area' => 'general',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '88a939a87a1ac14823d1f4fc5b9c0cef' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.parents',
    ),
    'object' => 
    array (
      'key' => 'lingua.parents',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'lingua',
      'area' => 'general',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '02bf93bd4ff3e48d80dd102417869fb0' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.ids',
    ),
    'object' => 
    array (
      'key' => 'lingua.ids',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'lingua',
      'area' => 'general',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '68c2831d0126df7d531ac471e7c26618' => 
  array (
    'criteria' => 
    array (
      'key' => 'lingua.detect_browser',
    ),
    'object' => 
    array (
      'key' => 'lingua.detect_browser',
      'value' => '0',
      'xtype' => 'combo-boolean',
      'namespace' => 'lingua',
      'area' => 'general',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '75acc689438fee48b1077b4c9ccc739e' => 
  array (
    'criteria' => 
    array (
      'category' => 'Lingua',
    ),
    'object' => 
    array (
      'id' => 6,
      'parent' => 0,
      'category' => 'Lingua',
    ),
    'files' => 
    array (
      0 => '/home/projects/public_html/truckload/platform/assets/components',
    ),
  ),
  'e35a840dc5e907eb08b9aa2481b0b228' => 
  array (
    'criteria' => 
    array (
      'name' => 'lingua.selector',
    ),
    'object' => 
    array (
      'id' => 19,
      'source' => 0,
      'property_preprocess' => 1,
      'name' => 'lingua.selector',
      'description' => 'Languages selector drop down.',
      'editor_type' => 0,
      'category' => 6,
      'cache_type' => 0,
      'snippet' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_selector
 */
$tplWrapper = $modx->getOption(\'tplWrapper\', $scriptProperties, \'lingua.selector.wrapper\');
$tplItem = $modx->getOption(\'tplItem\', $scriptProperties, \'lingua.selector.item\');
$langKey = $modx->getOption(\'getKey\', $scriptProperties, $modx->getOption(\'lingua.get_key\', null, \'lang\'));
$sortby = $modx->getOption(\'sortby\', $scriptProperties, \'id\');
$sortdir = $modx->getOption(\'sortdir\', $scriptProperties, \'asc\');
$phsPrefix = $modx->getOption(\'phsPrefix\', $scriptProperties, \'lingua.\');
$codeField = $modx->getOption(\'codeField\', $scriptProperties, \'lang_code\');

$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);

if (!($lingua instanceof Lingua)) {
    return;
}

$allowedContexts = $modx->getOption(\'lingua.contexts\');
$allowedContexts = array_map(\'trim\', @explode(\',\', $allowedContexts));
$currentContext = $modx->context->get(\'key\');
if (!in_array($currentContext, $allowedContexts)) {
    return;
}

$c = $modx->newQuery(\'linguaLangs\');
$c->where(\'active=1\');
$linguaLangs = $modx->context->config[\'lingua.langs\'];
if (!empty($linguaLangs)) {
    $linguaLangs = array_map(\'trim\', @explode(\',\', $linguaLangs));
    $c->where(array(
        \'lang_code:IN\' => $linguaLangs
    ));
}
$linguaLcids = $modx->context->config[\'lingua.lcids\'];
if (!empty($linguaLcids)) {
    $linguaLcids = array_map(\'trim\', @explode(\',\', $linguaLcids));
    $c->where(array(
        \'lcid_string:IN\' => $linguaLcids
    ));
}
$c->sortby($sortby, $sortdir);
$collection = $modx->getCollection(\'linguaLangs\', $c);
$output = \'\';
if (!$collection) {
    return;
}
$pageURL = \'http\';
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
    $pageURL .= "s";
}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] !== "80") {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
} else {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$parseUrl = parse_url($pageURL);
if (!empty($parseUrl[\'query\'])) {
    /**
     * http://stackoverflow.com/a/7753154/1246646
     */
    if (!function_exists(\'http_build_url\')) {
        define(\'HTTP_URL_REPLACE\', 1);              // Replace every part of the first URL when there\'s one of the second URL
        define(\'HTTP_URL_JOIN_PATH\', 2);            // Join relative paths
        define(\'HTTP_URL_JOIN_QUERY\', 4);           // Join query strings
        define(\'HTTP_URL_STRIP_USER\', 8);           // Strip any user authentication information
        define(\'HTTP_URL_STRIP_PASS\', 16);          // Strip any password authentication information
        define(\'HTTP_URL_STRIP_AUTH\', 32);          // Strip any authentication information
        define(\'HTTP_URL_STRIP_PORT\', 64);          // Strip explicit port numbers
        define(\'HTTP_URL_STRIP_PATH\', 128);         // Strip complete path
        define(\'HTTP_URL_STRIP_QUERY\', 256);        // Strip query string
        define(\'HTTP_URL_STRIP_FRAGMENT\', 512);     // Strip any fragments (#identifier)
        define(\'HTTP_URL_STRIP_ALL\', 1024);         // Strip anything but scheme and host

        /**
         * Build an URL<br>
         * The parts of the second URL will be merged into the first according to the flags argument.<br><br>
         *
         * @param	mixed	$url	(Part(s) of) an URL in form of a string or associative array like parse_url() returns
         * @param	mixed	$parts	Same as the first argument
         * @param	int		$flags	A bitmask of binary or\'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
         * @param	array	$newUrl	If set, it will be filled with the parts of the composed url like parse_url() would return
         * @return	string			Built URL
         */
        function http_build_url($url, $parts = array(), $flags = HTTP_URL_REPLACE, &$newUrl = false) {
            $keys = array(\'user\', \'pass\', \'port\', \'path\', \'query\', \'fragment\');

            // HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
            if ($flags & HTTP_URL_STRIP_ALL) {
                $flags |= HTTP_URL_STRIP_USER;
                $flags |= HTTP_URL_STRIP_PASS;
                $flags |= HTTP_URL_STRIP_PORT;
                $flags |= HTTP_URL_STRIP_PATH;
                $flags |= HTTP_URL_STRIP_QUERY;
                $flags |= HTTP_URL_STRIP_FRAGMENT;
            }
            // HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
            else if ($flags & HTTP_URL_STRIP_AUTH) {
                $flags |= HTTP_URL_STRIP_USER;
                $flags |= HTTP_URL_STRIP_PASS;
            }

            // Parse the original URL
            $parseUrl = parse_url($url);

            // Scheme and Host are always replaced
            if (isset($parts[\'scheme\']))
                $parseUrl[\'scheme\'] = $parts[\'scheme\'];
            if (isset($parts[\'host\']))
                $parseUrl[\'host\'] = $parts[\'host\'];

            // (If applicable) Replace the original URL with it\'s new parts
            if ($flags & HTTP_URL_REPLACE) {
                foreach ($keys as $key) {
                    if (isset($parts[$key]))
                        $parseUrl[$key] = $parts[$key];
                }
            }
            else {
                // Join the original URL path with the new path
                if (isset($parts[\'path\']) && ($flags & HTTP_URL_JOIN_PATH)) {
                    if (isset($parseUrl[\'path\']))
                        $parseUrl[\'path\'] = rtrim(str_replace(basename($parseUrl[\'path\']), \'\', $parseUrl[\'path\']), \'/\') . \'/\' . ltrim($parts[\'path\'], \'/\');
                    else
                        $parseUrl[\'path\'] = $parts[\'path\'];
                }

                // Join the original query string with the new query string
                if (isset($parts[\'query\']) && ($flags & HTTP_URL_JOIN_QUERY)) {
                    if (isset($parseUrl[\'query\']))
                        $parseUrl[\'query\'] .= \'&\' . $parts[\'query\'];
                    else
                        $parseUrl[\'query\'] = $parts[\'query\'];
                }
            }

            // Strips all the applicable sections of the URL
            // Note: Scheme and Host are never stripped
            foreach ($keys as $key) {
                if ($flags & (int) constant(\'HTTP_URL_STRIP_\' . strtoupper($key)))
                    unset($parseUrl[$key]);
            }

            $newUrl = $parseUrl;

            return
                    ((isset($parseUrl[\'scheme\'])) ? $parseUrl[\'scheme\'] . \'://\' : \'\')
                    . ((isset($parseUrl[\'user\'])) ? $parseUrl[\'user\'] . ((isset($parseUrl[\'pass\'])) ? \':\' . $parseUrl[\'pass\'] : \'\') . \'@\' : \'\')
                    . ((isset($parseUrl[\'host\'])) ? $parseUrl[\'host\'] : \'\')
                    . ((isset($parseUrl[\'port\'])) ? \':\' . $parseUrl[\'port\'] : \'\')
                    . ((isset($parseUrl[\'path\'])) ? $parseUrl[\'path\'] : \'\')
                    . ((isset($parseUrl[\'query\'])) ? \'?\' . $parseUrl[\'query\'] : \'\')
                    . ((isset($parseUrl[\'fragment\'])) ? \'#\' . $parseUrl[\'fragment\'] : \'\')
            ;
        }

    }

    parse_str($parseUrl[\'query\'], $queries);
    unset($queries[$langKey]);
    $parseUrl[\'query\'] = http_build_query($queries);

    $pageURL = http_build_url($pageURL, $parseUrl);
    $pageURL = urldecode($pageURL);
    // replace: &queryarray[0]=foo&queryarray[1]=bar
    // to:		&queryarray[]=foo&queryarray[]=bar
    $pageURL = preg_replace(\'/\\[+(\\d)+\\]+/\', \'[]\', $pageURL);
}

$pageURL = rtrim($pageURL, \'?\');
$hasQuery = strstr($pageURL, \'?\');

$languages = array();
$originPageUrl = $pageURL;
$requestUri = str_replace(MODX_BASE_URL, \'\', $parseUrl[\'path\']);
// $modx->getOption(\'cultureKey\') is overriden by plugin!
$modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
$cultureKey = $modCultureKey->get(\'value\');

$baseUrl = $modx->getOption(\'base_url\', $scriptProperties);
$baseUrl = str_replace(MODX_BASE_URL, \'\', $baseUrl);
$baseUrl = trim($baseUrl, \'/\');
$originResource = $modx->getObject(\'modResource\', $modx->resource->get(\'id\'));

foreach ($collection as $item) {
    if ($item->get(\'lang_code\') === $modx->cultureKey) {
        continue;
    }
    $itemArray = $item->toArray($phsPrefix);
    $cloneSite = $modx->getObject(\'linguaSiteContent\', array(
        \'resource_id\' => $modx->resource->get(\'id\'),
        \'lang_id\' => $item->get(\'id\'),
    ));
    if ($modx->getOption(\'friendly_urls\')) {
        $itemUri = \'\';
        if ($itemArray[$phsPrefix . \'lang_code\'] === $cultureKey) {
            $itemUri = $originResource->get(\'uri\');
        } elseif ($cloneSite) {
            $itemUri = $cloneSite->get(\'uri\');
        }
        
        if (!empty($itemUri)) {
            $matches = null;
            preg_match(\'/(\\/)*$/\', $itemUri, $matches);
            $search = $requestUri . (!empty($matches[0]) ? $matches[1] : \'\');
            $replace = (!empty($baseUrl) ? $baseUrl . \'/\' : \'\') . $itemUri;
            $pageURL = str_replace($search, $replace, $originPageUrl);
        }
    }

    $itemArray[$phsPrefix . \'url\'] = $pageURL . (!empty($hasQuery) ? \'&\' : \'?\') . $langKey . \'=\' . $itemArray[$phsPrefix . $codeField];
//    $itemArray[$phsPrefix . \'url\'] = $pageURL;

    if (!empty($toArray)) {
        $languages[] = $itemArray;
    } else {
        $languages[] = $lingua->parseTpl($tplItem, $itemArray);
    }
}

if (!empty($toArray)) {
    $wrapper = array(
        $phsPrefix . \'languages\' => $languages
    );
    $output = \'<pre>\' . print_r($wrapper, TRUE) . \'</pre>\';
} else {
    $selection = @implode("\\n", $languages);
    $wrapper = array($phsPrefix . \'languages\' => $selection);
    $output = $lingua->parseTpl($tplWrapper, $wrapper);
}
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return;
}
return $output;',
      'locked' => 0,
      'properties' => 'a:7:{s:9:"codeField";a:7:{s:4:"name";s:9:"codeField";s:4:"desc";s:19:"prop_codeField_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:9:"lang_code";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:6:"getKey";a:7:{s:4:"name";s:6:"getKey";s:4:"desc";s:16:"prop_getKey_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"lang";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:9:"phsPrefix";a:7:{s:4:"name";s:9:"phsPrefix";s:4:"desc";s:19:"prop_phsPrefix_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"lingua.";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:6:"sortby";a:7:{s:4:"name";s:6:"sortby";s:4:"desc";s:16:"prop_sortby_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:2:"ID";s:5:"value";s:2:"id";}i:1;a:2:{s:4:"text";s:8:"iso_code";s:5:"value";s:8:"iso_code";}}s:5:"value";s:2:"id";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:7:"sortdir";a:7:{s:4:"name";s:7:"sortdir";s:4:"desc";s:17:"prop_sortdir_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:3:"ASC";s:5:"value";s:3:"asc";}i:1;a:2:{s:4:"text";s:4:"DESC";s:5:"value";s:4:"desc";}}s:5:"value";s:3:"asc";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:7:"tplItem";a:7:{s:4:"name";s:7:"tplItem";s:4:"desc";s:17:"prop_tplItem_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:20:"lingua.selector.item";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}s:10:"tplWrapper";a:7:{s:4:"name";s:10:"tplWrapper";s:4:"desc";s:20:"prop_tplWrapper_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:23:"lingua.selector.wrapper";s:7:"lexicon";s:15:"lingua:property";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_selector
 */
$tplWrapper = $modx->getOption(\'tplWrapper\', $scriptProperties, \'lingua.selector.wrapper\');
$tplItem = $modx->getOption(\'tplItem\', $scriptProperties, \'lingua.selector.item\');
$langKey = $modx->getOption(\'getKey\', $scriptProperties, $modx->getOption(\'lingua.get_key\', null, \'lang\'));
$sortby = $modx->getOption(\'sortby\', $scriptProperties, \'id\');
$sortdir = $modx->getOption(\'sortdir\', $scriptProperties, \'asc\');
$phsPrefix = $modx->getOption(\'phsPrefix\', $scriptProperties, \'lingua.\');
$codeField = $modx->getOption(\'codeField\', $scriptProperties, \'lang_code\');

$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);

if (!($lingua instanceof Lingua)) {
    return;
}

$allowedContexts = $modx->getOption(\'lingua.contexts\');
$allowedContexts = array_map(\'trim\', @explode(\',\', $allowedContexts));
$currentContext = $modx->context->get(\'key\');
if (!in_array($currentContext, $allowedContexts)) {
    return;
}

$c = $modx->newQuery(\'linguaLangs\');
$c->where(\'active=1\');
$linguaLangs = $modx->context->config[\'lingua.langs\'];
if (!empty($linguaLangs)) {
    $linguaLangs = array_map(\'trim\', @explode(\',\', $linguaLangs));
    $c->where(array(
        \'lang_code:IN\' => $linguaLangs
    ));
}
$linguaLcids = $modx->context->config[\'lingua.lcids\'];
if (!empty($linguaLcids)) {
    $linguaLcids = array_map(\'trim\', @explode(\',\', $linguaLcids));
    $c->where(array(
        \'lcid_string:IN\' => $linguaLcids
    ));
}
$c->sortby($sortby, $sortdir);
$collection = $modx->getCollection(\'linguaLangs\', $c);
$output = \'\';
if (!$collection) {
    return;
}
$pageURL = \'http\';
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
    $pageURL .= "s";
}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] !== "80") {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
} else {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$parseUrl = parse_url($pageURL);
if (!empty($parseUrl[\'query\'])) {
    /**
     * http://stackoverflow.com/a/7753154/1246646
     */
    if (!function_exists(\'http_build_url\')) {
        define(\'HTTP_URL_REPLACE\', 1);              // Replace every part of the first URL when there\'s one of the second URL
        define(\'HTTP_URL_JOIN_PATH\', 2);            // Join relative paths
        define(\'HTTP_URL_JOIN_QUERY\', 4);           // Join query strings
        define(\'HTTP_URL_STRIP_USER\', 8);           // Strip any user authentication information
        define(\'HTTP_URL_STRIP_PASS\', 16);          // Strip any password authentication information
        define(\'HTTP_URL_STRIP_AUTH\', 32);          // Strip any authentication information
        define(\'HTTP_URL_STRIP_PORT\', 64);          // Strip explicit port numbers
        define(\'HTTP_URL_STRIP_PATH\', 128);         // Strip complete path
        define(\'HTTP_URL_STRIP_QUERY\', 256);        // Strip query string
        define(\'HTTP_URL_STRIP_FRAGMENT\', 512);     // Strip any fragments (#identifier)
        define(\'HTTP_URL_STRIP_ALL\', 1024);         // Strip anything but scheme and host

        /**
         * Build an URL<br>
         * The parts of the second URL will be merged into the first according to the flags argument.<br><br>
         *
         * @param	mixed	$url	(Part(s) of) an URL in form of a string or associative array like parse_url() returns
         * @param	mixed	$parts	Same as the first argument
         * @param	int		$flags	A bitmask of binary or\'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
         * @param	array	$newUrl	If set, it will be filled with the parts of the composed url like parse_url() would return
         * @return	string			Built URL
         */
        function http_build_url($url, $parts = array(), $flags = HTTP_URL_REPLACE, &$newUrl = false) {
            $keys = array(\'user\', \'pass\', \'port\', \'path\', \'query\', \'fragment\');

            // HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
            if ($flags & HTTP_URL_STRIP_ALL) {
                $flags |= HTTP_URL_STRIP_USER;
                $flags |= HTTP_URL_STRIP_PASS;
                $flags |= HTTP_URL_STRIP_PORT;
                $flags |= HTTP_URL_STRIP_PATH;
                $flags |= HTTP_URL_STRIP_QUERY;
                $flags |= HTTP_URL_STRIP_FRAGMENT;
            }
            // HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
            else if ($flags & HTTP_URL_STRIP_AUTH) {
                $flags |= HTTP_URL_STRIP_USER;
                $flags |= HTTP_URL_STRIP_PASS;
            }

            // Parse the original URL
            $parseUrl = parse_url($url);

            // Scheme and Host are always replaced
            if (isset($parts[\'scheme\']))
                $parseUrl[\'scheme\'] = $parts[\'scheme\'];
            if (isset($parts[\'host\']))
                $parseUrl[\'host\'] = $parts[\'host\'];

            // (If applicable) Replace the original URL with it\'s new parts
            if ($flags & HTTP_URL_REPLACE) {
                foreach ($keys as $key) {
                    if (isset($parts[$key]))
                        $parseUrl[$key] = $parts[$key];
                }
            }
            else {
                // Join the original URL path with the new path
                if (isset($parts[\'path\']) && ($flags & HTTP_URL_JOIN_PATH)) {
                    if (isset($parseUrl[\'path\']))
                        $parseUrl[\'path\'] = rtrim(str_replace(basename($parseUrl[\'path\']), \'\', $parseUrl[\'path\']), \'/\') . \'/\' . ltrim($parts[\'path\'], \'/\');
                    else
                        $parseUrl[\'path\'] = $parts[\'path\'];
                }

                // Join the original query string with the new query string
                if (isset($parts[\'query\']) && ($flags & HTTP_URL_JOIN_QUERY)) {
                    if (isset($parseUrl[\'query\']))
                        $parseUrl[\'query\'] .= \'&\' . $parts[\'query\'];
                    else
                        $parseUrl[\'query\'] = $parts[\'query\'];
                }
            }

            // Strips all the applicable sections of the URL
            // Note: Scheme and Host are never stripped
            foreach ($keys as $key) {
                if ($flags & (int) constant(\'HTTP_URL_STRIP_\' . strtoupper($key)))
                    unset($parseUrl[$key]);
            }

            $newUrl = $parseUrl;

            return
                    ((isset($parseUrl[\'scheme\'])) ? $parseUrl[\'scheme\'] . \'://\' : \'\')
                    . ((isset($parseUrl[\'user\'])) ? $parseUrl[\'user\'] . ((isset($parseUrl[\'pass\'])) ? \':\' . $parseUrl[\'pass\'] : \'\') . \'@\' : \'\')
                    . ((isset($parseUrl[\'host\'])) ? $parseUrl[\'host\'] : \'\')
                    . ((isset($parseUrl[\'port\'])) ? \':\' . $parseUrl[\'port\'] : \'\')
                    . ((isset($parseUrl[\'path\'])) ? $parseUrl[\'path\'] : \'\')
                    . ((isset($parseUrl[\'query\'])) ? \'?\' . $parseUrl[\'query\'] : \'\')
                    . ((isset($parseUrl[\'fragment\'])) ? \'#\' . $parseUrl[\'fragment\'] : \'\')
            ;
        }

    }

    parse_str($parseUrl[\'query\'], $queries);
    unset($queries[$langKey]);
    $parseUrl[\'query\'] = http_build_query($queries);

    $pageURL = http_build_url($pageURL, $parseUrl);
    $pageURL = urldecode($pageURL);
    // replace: &queryarray[0]=foo&queryarray[1]=bar
    // to:		&queryarray[]=foo&queryarray[]=bar
    $pageURL = preg_replace(\'/\\[+(\\d)+\\]+/\', \'[]\', $pageURL);
}

$pageURL = rtrim($pageURL, \'?\');
$hasQuery = strstr($pageURL, \'?\');

$languages = array();
$originPageUrl = $pageURL;
$requestUri = str_replace(MODX_BASE_URL, \'\', $parseUrl[\'path\']);
// $modx->getOption(\'cultureKey\') is overriden by plugin!
$modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
$cultureKey = $modCultureKey->get(\'value\');

$baseUrl = $modx->getOption(\'base_url\', $scriptProperties);
$baseUrl = str_replace(MODX_BASE_URL, \'\', $baseUrl);
$baseUrl = trim($baseUrl, \'/\');
$originResource = $modx->getObject(\'modResource\', $modx->resource->get(\'id\'));

foreach ($collection as $item) {
    if ($item->get(\'lang_code\') === $modx->cultureKey) {
        continue;
    }
    $itemArray = $item->toArray($phsPrefix);
    $cloneSite = $modx->getObject(\'linguaSiteContent\', array(
        \'resource_id\' => $modx->resource->get(\'id\'),
        \'lang_id\' => $item->get(\'id\'),
    ));
    if ($modx->getOption(\'friendly_urls\')) {
        $itemUri = \'\';
        if ($itemArray[$phsPrefix . \'lang_code\'] === $cultureKey) {
            $itemUri = $originResource->get(\'uri\');
        } elseif ($cloneSite) {
            $itemUri = $cloneSite->get(\'uri\');
        }
        
        if (!empty($itemUri)) {
            $matches = null;
            preg_match(\'/(\\/)*$/\', $itemUri, $matches);
            $search = $requestUri . (!empty($matches[0]) ? $matches[1] : \'\');
            $replace = (!empty($baseUrl) ? $baseUrl . \'/\' : \'\') . $itemUri;
            $pageURL = str_replace($search, $replace, $originPageUrl);
        }
    }

    $itemArray[$phsPrefix . \'url\'] = $pageURL . (!empty($hasQuery) ? \'&\' : \'?\') . $langKey . \'=\' . $itemArray[$phsPrefix . $codeField];
//    $itemArray[$phsPrefix . \'url\'] = $pageURL;

    if (!empty($toArray)) {
        $languages[] = $itemArray;
    } else {
        $languages[] = $lingua->parseTpl($tplItem, $itemArray);
    }
}

if (!empty($toArray)) {
    $wrapper = array(
        $phsPrefix . \'languages\' => $languages
    );
    $output = \'<pre>\' . print_r($wrapper, TRUE) . \'</pre>\';
} else {
    $selection = @implode("\\n", $languages);
    $wrapper = array($phsPrefix . \'languages\' => $selection);
    $output = $lingua->parseTpl($tplWrapper, $wrapper);
}
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return;
}
return $output;',
    ),
  ),
  '91e34e129fdd40d5a0a8c5434381df28' => 
  array (
    'criteria' => 
    array (
      'name' => 'lingua.cultureKey',
    ),
    'object' => 
    array (
      'id' => 20,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'lingua.cultureKey',
      'description' => 'Helper snippet to get the run time cultureKey, which is set by lingua\'s plugin.',
      'editor_type' => 0,
      'category' => 6,
      'cache_type' => 0,
      'snippet' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_culture_key
 */

return $modx->cultureKey;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_culture_key
 */

return $modx->cultureKey;',
    ),
  ),
  'ff8497a1508d8114460457bcddaa734a' => 
  array (
    'criteria' => 
    array (
      'name' => 'lingua.getField',
    ),
    'object' => 
    array (
      'id' => 21,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'lingua.getField',
      'description' => 'Get the value of the given field for the run time culture key.',
      'editor_type' => 0,
      'category' => 6,
      'cache_type' => 0,
      'snippet' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_getfield
 */

$field = $modx->getOption(\'field\', $scriptProperties);
if (empty($field)) {
    return;
}

$langCodeField = $modx->getOption(\'codeField\', $scriptProperties, $modx->getOption(\'lingua.code_field\', null, \'lang_code\'));
$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);

if (!($lingua instanceof Lingua)) {
    return;
}

$langObj = $modx->getObject(\'linguaLangs\', array(
    $langCodeField => $modx->cultureKey
));
if (!$langObj) {
    return;
}
$output = $langObj->get($field);
if (!$output) {
    return;
}
return $output;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_getfield
 */

$field = $modx->getOption(\'field\', $scriptProperties);
if (empty($field)) {
    return;
}

$langCodeField = $modx->getOption(\'codeField\', $scriptProperties, $modx->getOption(\'lingua.code_field\', null, \'lang_code\'));
$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);

if (!($lingua instanceof Lingua)) {
    return;
}

$langObj = $modx->getObject(\'linguaLangs\', array(
    $langCodeField => $modx->cultureKey
));
if (!$langObj) {
    return;
}
$output = $langObj->get($field);
if (!$output) {
    return;
}
return $output;',
    ),
  ),
  '37b9d6ebcce697744f528dbfc72ee0bf' => 
  array (
    'criteria' => 
    array (
      'name' => 'lingua.getValue',
    ),
    'object' => 
    array (
      'id' => 22,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'lingua.getValue',
      'description' => 'Get the value of the clone\'s field for the run time culture key.',
      'editor_type' => 0,
      'category' => 6,
      'cache_type' => 0,
      'snippet' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_getfield
 */

$field = $modx->getOption(\'field\', $scriptProperties);
if (empty($field)) {
    return;
}

$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);
$debug = $modx->getOption(\'lingua.debug\');
if (!($lingua instanceof Lingua)) {
    $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: !($lingua instanceof Lingua)\');
    return;
}

$langObj = $modx->getObject(\'linguaLangs\', array(
    \'lang_code\' => $modx->cultureKey
));
if (!$langObj) {
    if ($debug) {
        $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: Missing field\\\'s value for \' . $field . \' in \' . $modx->cultureKey);
    }
    return;
}
$c = $modx->newQuery(\'linguaSiteContent\');
$c->where(array(
    \'resource_id\' => $id,
    \'lang_id\' => $langObj->get(\'id\'),
));
$linguaSiteContent = $modx->getObject(\'linguaSiteContent\', $c);
$resource = $modx->getObject(\'modResource\', $id);
if (!$resource) {
    if ($debug) {
        $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: Missing resource for \' . $field . \' in \' . $modx->cultureKey);
    }
    return;
}
     
$tableFields = array(\'pagetitle\', \'longtitle\', \'description\', \'alias\',
    \'link_attributes\', \'introtext\', \'content\', \'menutitle\', \'uri\', \'uri_override\',
    \'properties\');
$output = \'\';
if (in_array($field, $tableFields)) {
    if ($linguaSiteContent) {
        $output = $linguaSiteContent->get($field);
    }
}
// try TV
else {
    $tv = $modx->getObject(\'modTemplateVar\', array(
        \'name\' => $field,
    ));
    if ($tv) {
        $linguaSiteTmplvarContentvalues = $modx->getObject(\'linguaSiteTmplvarContentvalues\', array(
            \'lang_id\' => $langObj->get(\'id\'),
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $id,
        ));
        if ($linguaSiteTmplvarContentvalues) {
            $value = $linguaSiteTmplvarContentvalues->get(\'value\');
            $tv->setValue($tv->get(\'id\'), $value);
        }
        $output = $tv->renderOutput($resource->get(\'id\'));
    }
}

return $output;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_getfield
 */

$field = $modx->getOption(\'field\', $scriptProperties);
if (empty($field)) {
    return;
}

$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$defaultLinguaCorePath = $modx->getOption(\'core_path\') . \'components/lingua/\';
$linguaCorePath = $modx->getOption(\'lingua.core_path\', null, $defaultLinguaCorePath);
$lingua = $modx->getService(\'lingua\', \'Lingua\', $linguaCorePath . \'model/lingua/\', $scriptProperties);
$debug = $modx->getOption(\'lingua.debug\');
if (!($lingua instanceof Lingua)) {
    $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: !($lingua instanceof Lingua)\');
    return;
}

$langObj = $modx->getObject(\'linguaLangs\', array(
    \'lang_code\' => $modx->cultureKey
));
if (!$langObj) {
    if ($debug) {
        $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: Missing field\\\'s value for \' . $field . \' in \' . $modx->cultureKey);
    }
    return;
}
$c = $modx->newQuery(\'linguaSiteContent\');
$c->where(array(
    \'resource_id\' => $id,
    \'lang_id\' => $langObj->get(\'id\'),
));
$linguaSiteContent = $modx->getObject(\'linguaSiteContent\', $c);
$resource = $modx->getObject(\'modResource\', $id);
if (!$resource) {
    if ($debug) {
        $modx->log(modX::LOG_LEVEL_ERROR, \'[lingua.getValue]: Missing resource for \' . $field . \' in \' . $modx->cultureKey);
    }
    return;
}
     
$tableFields = array(\'pagetitle\', \'longtitle\', \'description\', \'alias\',
    \'link_attributes\', \'introtext\', \'content\', \'menutitle\', \'uri\', \'uri_override\',
    \'properties\');
$output = \'\';
if (in_array($field, $tableFields)) {
    if ($linguaSiteContent) {
        $output = $linguaSiteContent->get($field);
    }
}
// try TV
else {
    $tv = $modx->getObject(\'modTemplateVar\', array(
        \'name\' => $field,
    ));
    if ($tv) {
        $linguaSiteTmplvarContentvalues = $modx->getObject(\'linguaSiteTmplvarContentvalues\', array(
            \'lang_id\' => $langObj->get(\'id\'),
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $id,
        ));
        if ($linguaSiteTmplvarContentvalues) {
            $value = $linguaSiteTmplvarContentvalues->get(\'value\');
            $tv->setValue($tv->get(\'id\'), $value);
        }
        $output = $tv->renderOutput($resource->get(\'id\'));
    }
}

return $output;',
    ),
  ),
  'dc185f7687355433c48a71d8a79e59fb' => 
  array (
    'criteria' => 
    array (
      'name' => 'Lingua',
    ),
    'object' => 
    array (
      'id' => 7,
      'source' => 0,
      'property_preprocess' => 1,
      'name' => 'Lingua',
      'description' => '',
      'editor_type' => 0,
      'category' => 6,
      'cache_type' => 0,
      'plugincode' => 'header(\'Content-Type: text/html; charset=utf-8\');
/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_plugin
 */
$event = $modx->event->name;
switch ($event) {
    case \'OnHandleRequest\': // for global
        break;

    case \'OnInitCulture\':   // for request class
        if ($modx->context->key === \'mgr\') {
            return;
        }
        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        $modx->lexicon->load(\'lingua:default\');
        $langGetKey = $modx->getOption(\'lingua.request_key\', $scriptProperties, \'lang\');
        $langGetKeyValue = filter_input(INPUT_GET, $langGetKey, FILTER_SANITIZE_STRING);
        $langGetKeyValue = strtolower($langGetKeyValue);
        $langCookieValue = filter_input(INPUT_COOKIE, \'modx_lingua_switcher\', FILTER_SANITIZE_STRING);
        $langCookieValue = strtolower($langCookieValue);
        if (!empty($langGetKeyValue) &&
                $langGetKeyValue !== $modx->cultureKey &&
                strlen($langGetKeyValue) === 2
        ) {
            $lingua->setCultureKey($langGetKeyValue);
        } else if (!empty($langCookieValue) &&
                $langCookieValue !== $modx->cultureKey &&
                strlen($langCookieValue) === 2
        ) {
            $lingua->setCultureKey($langCookieValue);
        } else if(empty($langGetKeyValue) &&
                empty($langCookieValue)
        ){
            $detectBrowser = $modx->getOption(\'lingua.detect_browser\');
            if ($detectBrowser === \'1\') {
                $languages = explode(\',\', filter_input(INPUT_SERVER, \'HTTP_ACCEPT_LANGUAGE\', FILTER_SANITIZE_STRING));
                $sortedLangs = array();
                foreach ($languages as $language) {
                    $language = strtolower($language);
                    $parts = @explode(\';\', $language);
                    if (!isset($parts[1])) {
                        $sort = 1.0;
                    } else {
                        $x = @explode(\'=\', $parts[1]);
                        $sort = $x[1] - 0;
                    }
                    $sortedLangs[$parts[0]] = $sort;
                }
                arsort($sortedLangs);
                $langs = array_keys($sortedLangs);
                $linguaLangs = $modx->getCollection(\'linguaLangs\', array(
                    \'active\' => 1
                ));
                $c = $modx->newQuery(\'linguaLangs\');
                $c->where(\'active=1\');
                $contextLangs = $modx->context->config[\'lingua.langs\'];
                if (!empty($contextLangs)) {
                    $contextLangs = array_map(\'trim\', @explode(\',\', $contextLangs));
                    $c->where(array(
                        \'lang_code:IN\' => $contextLangs
                    ));
                }
                $linguaLangs = $modx->getCollection(\'linguaLangs\', $c);
                $existingLangs = array();
                if ($linguaLangs) {
                    foreach ($linguaLangs as $linguaLang) {
                        $existingLangs[] = $linguaLang->get(\'lang_code\');
                    }
                }

                $acceptedLangs = array_intersect($existingLangs, $langs);
                $acceptedLangs = array_values($acceptedLangs); // reset index

                if (!empty($acceptedLangs) && is_array($acceptedLangs)) {
                    $lingua->setCultureKey($acceptedLangs[0]);
                }
            }
        }
        $modx->cultureKey = $lingua->getCultureKey();
        if ($modx->cultureKey !== $modx->getOption(\'cultureKey\')) {
            $modx->setOption(\'cultureKey\', $modx->cultureKey);
            $modx->context->config[\'cultureKey\'] = $modx->cultureKey;
        }
        $modx->setPlaceholder(\'lingua.cultureKey\', $modx->cultureKey);
        $modx->setPlaceholder(\'lingua.language\', $modx->cultureKey);
        
        break;

    /**
     * /////////////////// MANAGER SIDE ///////////////////
     */
    case \'OnDocFormPrerender\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            if ($resource) {
                $currentContext = $resource->get(\'context_key\');
            } else {
                $currentContext = filter_input(INPUT_GET, \'context_key\', FILTER_SANITIZE_STRING);
            }
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            if ($resource) {
                $currentParent = $resource->get(\'parent\');
            } else {
                $currentParent = filter_input(INPUT_GET, \'parent\', FILTER_SANITIZE_NUMBER_INT);
            }
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        if (is_object($resource)) {
            $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
            if (!empty($ids)) {
                $ids = array_map(\'trim\', @explode(\',\', $ids));
                $currentId = $resource->get(\'id\');
                if (!in_array($currentId, $ids)) {
                    return;
                }
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        
        $modx->lexicon->load(\'lingua:default\');
        $languages = $lingua->getLanguages();
        if (empty($languages)) {
            return;
        }
        $modx->regClientCSS(MODX_BASE_URL . \'assets/components/lingua/css/mgr.css\');
        $modx->controller->addJavascript(MODX_BASE_URL . \'assets/components/lingua/js/mgr/resource.js\');
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        $storeData = array();
        $storeDefaultData = array();
        $configLang = array();
        $linguaSiteContentArray = array();
        $createHiddenFields = array();
        foreach ($languages as $language) {
            $configLang[$language[\'lang_code\']] = array(
                \'lang_code\' => $language[\'lang_code\'],
                \'local_name\' => $language[\'local_name\'],
                \'flag\' => $language[\'flag\'],
            );
            if ($language[\'lang_code\'] === $cultureKey) {
                $storeDefaultData[] = array(
                    $language[\'lang_code\'],
                    $language[\'local_name\'],
                    $language[\'flag\'],
                );
                continue;
            }
            $storeData[] = array(
                $language[\'lang_code\'],
                $language[\'local_name\'],
                $language[\'flag\'],
            );
            if ($mode === modSystemEvent::MODE_UPD) {
                $linguaSiteContent = $modx->getObject(\'linguaSiteContent\', array(
                    \'resource_id\' => $resource->get(\'id\'),
                    \'lang_id\' => $language[\'id\']
                ));
                if ($linguaSiteContent) {
                    $linguaSiteContentArray[$language[\'lang_code\']] = $linguaSiteContent->toArray();
                } else {
                    $linguaSiteContentArray[$language[\'lang_code\']] = array();
                }
            } else {
                $linguaSiteContentArray[$language[\'lang_code\']] = array();
            }
            $modx->regClientStartupHTMLBlock(\'<style>.icon-lingua-flag-\' . $language[\'lcid_string\'] . \' {background-image: url(\\\'../\' . $language[\'flag\'] . \'\\\'); background-repeat: no-repeat;}</style>\');
            $createHiddenFields[] = $language;
        } // foreach ($languages as $language)
        //------------------------------------------------------------------
        $jsHTML = \'
    window.lingua = new Lingua({
        defaultLang: "\' . $cultureKey . \'",
        langs: \' . json_encode($configLang) . \'
    });
    lingua.config.siteContent = \' . json_encode($linguaSiteContentArray) . \';
    lingua.flagDefaultFields();
    lingua.createHiddenFields(\' . json_encode($createHiddenFields) . \');
    var actionButtons = Ext.getCmp("modx-action-buttons");
    if (actionButtons) {
        var languageBtn = new Ext.form.ComboBox({
            id: "lingua-languageBtn",
            tpl: \\\'<tpl for="."><div class="x-combo-list-item"><img src="../{flag}" class="icon"/> {local_name}</div></tpl>\\\',
            store: new Ext.data.ArrayStore({
                id: 0,
                fields: [
                    "lang_code",
                    "local_name",
                    "flag"
                ],
                data: \' . json_encode(array_merge($storeDefaultData, $storeData)) . \'
            }),
            valueField: "lang_code",
            displayField: "local_name",
            typeAhead: false,
            forceSelection: true,
            editable: false,
            mode: "local",
            triggerAction: "all",
            //emptyText: "\' . $languages[$cultureKey][\'local_name\'] . \'",
            selectOnFocus: true,
            width: 150,
            listeners: {
                select: {
                    fn: function(combo, record, index) {
                        lingua.switchLanguage(record.get("lang_code"));
                    },
                    scope: this
                },
                render: {
                    fn: function(comboBox) {
                        var store = comboBox.store;
                        var valueField = comboBox.valueField;
                        var displayField = comboBox.displayField;
                        var recordNumber = store.findExact(valueField, "\' . $cultureKey . \'", 0);
                        if (recordNumber !== -1) {
                            var displayValue = store.getAt(recordNumber).data[displayField];
                            comboBox.setValue("\' . $cultureKey . \'");
                            comboBox.setRawValue(displayValue);
                            comboBox.selectedIndex = recordNumber;
                        }
                    },
                    scope: this
                }
            }
        });
        actionButtons.insertButton(0, [languageBtn, "-"]);
        actionButtons.doLayout();
    }\';
        $modx->controller->addHtml(\'
<script type="text/javascript">
Ext.onReady(function() {
    \' . $jsHTML . \'
});
</script>\');
        //------------------------------------------------------------------
        break;

    case \'OnResourceTVFormRender\':
        if (!is_object($resource) && is_numeric($resource)) {
            $resourceId = $resource;
            $resource = $modx->getObject(\'modResource\', $resource);
        }
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            if ($resource) {
                $currentContext = $resource->get(\'context_key\');
            } else {
                $currentContext = filter_input(INPUT_GET, \'context_key\', FILTER_SANITIZE_STRING);
            }
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            if ($resource) {
                $currentParent = $resource->get(\'parent\');
            } else {
                $currentParent = filter_input(INPUT_GET, \'parent\', FILTER_SANITIZE_NUMBER_INT);
            }
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        if (is_object($resource)) {
            $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
            if (!empty($ids)) {
                $ids = array_map(\'trim\', @explode(\',\', $ids));
                $currentId = $resource->get(\'id\');
                if (!in_array($currentId, $ids)) {
                    return;
                }
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        $languages = $lingua->getLanguages(1, false);
        if (empty($languages)) {
            return;
        }
        $initAllClonedTVFields = array();
        foreach ($languages as $language) {
            $initAllClonedTVFields[] = $language;
        }

        if ($resource) {
            $tvs = $resource->getTemplateVars();
        } else {
            $templateId = $template;
            $template = $modx->getObject(\'modTemplate\', $templateId);
            $tvs = $template->getTemplateVars();
        }
        if (!$tvs) {
            return;
        }

        $tvIds = array();
        $tvOutputs = array();
        foreach ($tvs as $tv) {
            $tvIds[] = $tv->get(\'id\');
        }
        $c = $modx->newQuery(\'linguaSiteTmplvars\');
        $c->where(array(
            \'tmplvarid:IN\' => $tvIds
        ));
        $linguaSiteTmplvars = $modx->getCollection(\'linguaSiteTmplvars\', $c);
        if (!$linguaSiteTmplvars) {
            return;
        }

        $formElements = array();
        foreach ($scriptProperties[\'categories\'] as $category) {
            foreach ($category[\'tvs\'] as $tv) {
                $formElements[$tv->get(\'id\')] = $tv;
            }
        }

        if (!empty($modx->controller->scriptProperties[\'showCheckbox\'])) {
            $showCheckbox = 1;
        }

        $tmplvars = array();
        $cloneTVFields = array();
        $count = 0;
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        foreach ($linguaSiteTmplvars as $linguaTv) {
            $tvId = $linguaTv->get(\'tmplvarid\');
            if (!isset($formElements[$tvId])) {
                continue;
            }
            $tv = $formElements[$tvId];
            $tmplvars[] = array(
                \'id\' => $tvId,
                \'type\' => $tv->get(\'type\'),
            );
            $tvArray = $tv->toArray(\'tv.\');
            foreach ($languages as $language) {
                if ($language[\'lang_code\'] === $cultureKey) {
                    continue;
                }

                $linguaTVContent = $modx->getObject(\'linguaSiteTmplvarContentvalues\', array(
                    \'tmplvarid\' => $tvId,
                    \'contentid\' => $resourceId,
                    \'lang_id\' => $language[\'id\']
                ));

                /**
                 * Start to manipulate the ID to parse hidden TVs
                 */
                $content = \'\';
                if ($linguaTVContent) {
                    $content = $linguaTVContent->get(\'value\');
                }
                $inputForm = $tv->renderInput($resource, array(
                    \'value\' => $content
                ));
                if (empty($inputForm)) {
                    continue;
                }

                $tvCloneId = $tvId . \'_\' . $language[\'lang_code\'] . \'_lingua_tv\';
                // basic replacements
                $cloneInputForm = $inputForm;
                $cloneInputForm = preg_replace(\'/("|\\\'){1}tv\' . $tvId . \'("|\\\'){1}/\', \'${1}tv\' . $tvCloneId . \'${2}\', $cloneInputForm);
                $cloneInputForm = preg_replace(\'/("|\\\'){1}tv\' . $tvId . \'\\[\\]("|\\\'){1}/\', \'${1}tv\' . $tvCloneId . \'[]${2}\', $cloneInputForm);
                // advanced replacements
                $linguaSiteTmplvarsPatterns = $modx->getCollection(\'linguaSiteTmplvarsPatterns\', array(
                    \'type\' => $tv->get(\'type\')
                ));
                if ($linguaSiteTmplvarsPatterns) {
                    foreach ($linguaSiteTmplvarsPatterns as $pattern) {
                        $search = $pattern->get(\'search\');
                        $search = str_replace(\'{{tvId}}\', $tvId, $search);
                        $replacement = $pattern->get(\'replacement\');
                        $replacement = str_replace(\'{{tvCloneId}}\', $tvCloneId, $replacement);
                        $cloneInputForm = preg_replace($search, $replacement, $cloneInputForm);
                    }
                }
                $count++;
                $phs = $tvArray;
                $phs[\'tv.id\'] = $tvCloneId;
                $phs[\'tv.formElement\'] = $cloneInputForm;
                $phs[\'tv.showCheckbox\'] = $showCheckbox;
                $cloneTVFields[] = $lingua->processElementTags($lingua->parseTpl(\'lingua.resourcetv.row\', $phs));
            }
        }
        
        // reset any left out output after rendering TV forms above
        if ($modx->event->name === \'OnTVInputRenderList\') {
            $modx->event->_output = \'\';
        }

        $modx->event->output(@implode("\\n", $cloneTVFields));    
        $jsHTML = "
<script>
    Ext.onReady(function() {
        lingua.config.tmplvars = " . json_encode($tmplvars) . ";
        lingua.initAllClonedTVFields(" . json_encode($initAllClonedTVFields) . ");
        lingua.flagDefaultTVFields();
    });
</script>";
        $modx->event->output($jsHTML);

        break;

    case \'OnDocFormSave\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            $currentContext = $resource->get(\'context_key\');
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            $currentParent = $resource->get(\'parent\');
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
        if (!empty($ids)) {
            $ids = array_map(\'trim\', @explode(\',\', $ids));
            $currentId = $resource->get(\'id\');
            if (!in_array($currentId, $ids)) {
                return;
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }

        // update linguaSiteContent
        $reverting = array();
        $clearKeys = array();
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        foreach ($resource->_fields as $k => $v) {
            if (!preg_match(\'/_lingua$/\', $k)) {
                continue;
            }
            foreach ($v as $a => $b) {
                if ($a === $cultureKey) {
                    continue;
                }
                $reverting[$a][preg_replace(\'/_lingua$/\', \'\', $k)] = $b;
            }
            $clearKeys[] = $k;
        }

        $resourceId = $resource->get(\'id\');
        foreach ($reverting as $k => $v) {
            $linguaLangs = $modx->getObject(\'linguaLangs\', array(\'lang_code\' => $k));
            $params = array(
                \'resource_id\' => $resourceId,
                \'lang_id\' => $linguaLangs->get(\'id\'),
            );
            $linguaSiteContent = $modx->getObject(\'linguaSiteContent\', $params);
            if (!$linguaSiteContent) {
                $linguaSiteContent = $modx->newObject(\'linguaSiteContent\');
                $linguaSiteContent->fromArray($params);
                $linguaSiteContent->save();
            }
            $linguaSiteContent->set(\'pagetitle\', $v[\'pagetitle\']);
            $linguaSiteContent->set(\'longtitle\', $v[\'longtitle\']);
            $linguaSiteContent->set(\'description\', $v[\'description\']);
            $linguaSiteContent->set(\'content\', (isset($v[\'content\']) && !empty($v[\'content\']) ? $v[\'content\'] : $v[\'ta\']));
            if (empty($v[\'alias\'])) {
                $v[\'alias\'] = $resource->get(\'alias\');
                $linguaSiteContent->setDirty(\'alias\');
            }
            $linguaSiteContent->set(\'introtext\', $v[\'introtext\']);
            $linguaSiteContent->set(\'alias\', $v[\'alias\']);
            $linguaSiteContent->set(\'menutitle\', $v[\'menutitle\']);
            $linguaSiteContent->set(\'link_attributes\', $v[\'link_attributes\']);
            $linguaSiteContent->set(\'uri_override\', $v[\'uri_override\']);
            $linguaSiteContent->set(\'uri\', $v[\'uri\']);
            $linguaSiteContent->set(\'parent\', $resource->get(\'parent\'));
            $linguaSiteContent->set(\'isfolder\', $resource->get(\'isfolder\'));
            $linguaSiteContent->set(\'context_key\', $resource->get(\'context_key\'));
            $linguaSiteContent->set(\'content_type\', $resource->get(\'content_type\'));
            if ($resource->get(\'refreshURIs\')) {
                $linguaSiteContent->set(\'refreshURIs\', true);
            }
            $linguaSiteContent->save();
        }

        // update linguaSiteTmplvarContentvalues
        $reverting = array();
        foreach ($resource->_fields as $k => $value) {
            if (!preg_match(\'/_lingua_tv$/\', $k)) {
                continue;
            }
            $tvKey = preg_replace(\'/_lingua_tv$/\', \'\', $k);
            $tvKeys = @explode(\'_\', $tvKey);
            $tvId = str_replace(\'tv\', \'\', $tvKeys[0]);
            if (!is_numeric($tvId)) {
                continue;
            }
            $reverse = array_reverse($tvKeys);
            $lang = $reverse[0];
            if ($lang === $cultureKey) {
                continue;
            }
            $tv = $modx->getObject(\'modTemplateVar\', $tvId);
            $tvKey = $tvKeys[0];
            /* validation for different types */
            switch ($tv->get(\'type\')) {
                case \'url\':
                    // tv16_prefix_id_lingua_tv
                    $prefix = $resource->_fields[$tvKey . \'_prefix_\' . $lang . \'_lingua_tv\'];
                    if ($prefix != \'--\') {
                        $value = str_replace(array(\'ftp://\', \'http://\', \'https://\', \'ftp://\', \'mailto:\'), \'\', $value);
                        $value = $prefix . $value;
                    }
                    $reverting[$lang][$tvId] = $value;

                    break;
                case \'date\':
                    $value = empty($value) ? \'\' : strftime(\'%Y-%m-%d %H:%M:%S\', strtotime($value));

                    break;
                /* ensure tag types trim whitespace from tags */
                case \'tag\':
                case \'autotag\':
                    $tags = explode(\',\', $value);
                    $newTags = array();
                    foreach ($tags as $tag) {
                        $newTags[] = trim($tag);
                    }
                    $value = implode(\',\', $newTags);

                    break;
                default:
                    /* handles checkboxes & multiple selects elements */
                    if (is_array($value)) {
                        $featureInsert = array();
                        while (list($featureValue, $featureItem) = each($value)) {
                            if (empty($featureItem)) {
                                continue;
                            }
                            $featureInsert[count($featureInsert)] = $featureItem;
                        }
                        $value = implode(\'||\', $featureInsert);
                    }

                    break;
            }
            $reverting[$lang][$tvId] = $value;
            $clearKeys[] = $k;
        }

        /**
         * json seems to have number of characters limit;
         * that makes saving success report truncated and output modal hangs,
         * TV\'s procces does this outside of reverting\'s loops
         */
        if (!empty($clearKeys)) {
            foreach ($clearKeys as $k) {
                $resource->set($k, \'\');
            }
        }

        foreach ($reverting as $k => $tmplvars) {
            $linguaLangs = $modx->getObject(\'linguaLangs\', array(\'lang_code\' => $k));
            $langId = $linguaLangs->get(\'id\');
            foreach ($tmplvars as $key => $val) {
                if (empty($val)) {
                    continue;
                }
                $params = array(
                    \'lang_id\' => $langId,
                    \'tmplvarid\' => $key,
                    \'contentid\' => $resourceId,
                );
                $linguaSiteTmplvarContentvalues = $modx->getObject(\'linguaSiteTmplvarContentvalues\', $params);
                if (!$linguaSiteTmplvarContentvalues) {
                    $linguaSiteTmplvarContentvalues = $modx->newObject(\'linguaSiteTmplvarContentvalues\');
                }
                $linguaSiteTmplvarContentvalues->set(\'lang_id\', $langId);
                $linguaSiteTmplvarContentvalues->set(\'tmplvarid\', $key);
                $linguaSiteTmplvarContentvalues->set(\'contentid\', $resourceId);
                $linguaSiteTmplvarContentvalues->set(\'value\', $val);
                $linguaSiteTmplvarContentvalues->save();
            }
        }

        // clear cache
        $contexts = array($resource->get(\'context_key\'));
        $cacheManager = $modx->getCacheManager();
        $cacheManager->refresh(array(
            \'lingua/resource\' => array(\'contexts\' => $contexts),
        ));
        break;

    case \'OnResourceDuplicate\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            $currentContext = $oldResource->get(\'context_key\');
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            $currentParent = $oldResource->get(\'parent\');
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
        if (!empty($ids)) {
            $ids = array_map(\'trim\', @explode(\',\', $ids));
            $currentId = $oldResource->get(\'id\');
            if (!in_array($currentId, $ids)) {
                return;
            }
        }

        $linguaSiteContents = $modx->getCollection(\'linguaSiteContent\', array(
            \'resource_id\' => $oldResource->get(\'id\')
        ));
        if ($linguaSiteContents) {
            foreach ($linguaSiteContents as $linguaSiteContent) {
                $params = $linguaSiteContent->toArray();
                unset($params[\'id\']);
                $params[\'resource_id\'] = $newResource->get(\'id\');
                $newLinguaSiteContent = $modx->newObject(\'linguaSiteContent\');
                $newLinguaSiteContent->fromArray($params);
                $newLinguaSiteContent->save();
            }
        }
        break;

    case \'OnEmptyTrash\':
        if (!empty($ids) && is_array($ids)) {
            $collection = $modx->getCollection(\'linguaSiteContent\', array(
                \'resource_id:IN\' => $ids
            ));
            if ($collection) {
                foreach ($collection as $item) {
                    $item->remove();
                }
            }
        }
        break;

    case \'OnTemplateSave\':
    case \'OnTempFormSave\':
    case \'OnTVFormSave\':
    case \'OnSnipFormSave\':
    case \'OnPluginFormSave\':
    case \'OnMediaSourceFormSave\':
    case \'OnChunkFormSave\':
    case \'OnSiteRefresh\':
        $cacheManager = $modx->getCacheManager();
        $cacheManager->refresh(array(
            \'lingua/resource\' => array(),
        ));
        break;

    default:
        break;
}
return;',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'header(\'Content-Type: text/html; charset=utf-8\');
/**
 * Lingua
 *
 * Copyright 2013-2014 by goldsky <goldsky@virtudraft.com>
 *
 * This file is part of Lingua, a MODX\'s Lexicon switcher for front-end interface
 *
 * Lingua is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation version 3.
 *
 * Lingua is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Lingua; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package lingua
 * @subpackage lingua_plugin
 */
$event = $modx->event->name;
switch ($event) {
    case \'OnHandleRequest\': // for global
        break;

    case \'OnInitCulture\':   // for request class
        if ($modx->context->key === \'mgr\') {
            return;
        }
        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        $modx->lexicon->load(\'lingua:default\');
        $langGetKey = $modx->getOption(\'lingua.request_key\', $scriptProperties, \'lang\');
        $langGetKeyValue = filter_input(INPUT_GET, $langGetKey, FILTER_SANITIZE_STRING);
        $langGetKeyValue = strtolower($langGetKeyValue);
        $langCookieValue = filter_input(INPUT_COOKIE, \'modx_lingua_switcher\', FILTER_SANITIZE_STRING);
        $langCookieValue = strtolower($langCookieValue);
        if (!empty($langGetKeyValue) &&
                $langGetKeyValue !== $modx->cultureKey &&
                strlen($langGetKeyValue) === 2
        ) {
            $lingua->setCultureKey($langGetKeyValue);
        } else if (!empty($langCookieValue) &&
                $langCookieValue !== $modx->cultureKey &&
                strlen($langCookieValue) === 2
        ) {
            $lingua->setCultureKey($langCookieValue);
        } else if(empty($langGetKeyValue) &&
                empty($langCookieValue)
        ){
            $detectBrowser = $modx->getOption(\'lingua.detect_browser\');
            if ($detectBrowser === \'1\') {
                $languages = explode(\',\', filter_input(INPUT_SERVER, \'HTTP_ACCEPT_LANGUAGE\', FILTER_SANITIZE_STRING));
                $sortedLangs = array();
                foreach ($languages as $language) {
                    $language = strtolower($language);
                    $parts = @explode(\';\', $language);
                    if (!isset($parts[1])) {
                        $sort = 1.0;
                    } else {
                        $x = @explode(\'=\', $parts[1]);
                        $sort = $x[1] - 0;
                    }
                    $sortedLangs[$parts[0]] = $sort;
                }
                arsort($sortedLangs);
                $langs = array_keys($sortedLangs);
                $linguaLangs = $modx->getCollection(\'linguaLangs\', array(
                    \'active\' => 1
                ));
                $c = $modx->newQuery(\'linguaLangs\');
                $c->where(\'active=1\');
                $contextLangs = $modx->context->config[\'lingua.langs\'];
                if (!empty($contextLangs)) {
                    $contextLangs = array_map(\'trim\', @explode(\',\', $contextLangs));
                    $c->where(array(
                        \'lang_code:IN\' => $contextLangs
                    ));
                }
                $linguaLangs = $modx->getCollection(\'linguaLangs\', $c);
                $existingLangs = array();
                if ($linguaLangs) {
                    foreach ($linguaLangs as $linguaLang) {
                        $existingLangs[] = $linguaLang->get(\'lang_code\');
                    }
                }

                $acceptedLangs = array_intersect($existingLangs, $langs);
                $acceptedLangs = array_values($acceptedLangs); // reset index

                if (!empty($acceptedLangs) && is_array($acceptedLangs)) {
                    $lingua->setCultureKey($acceptedLangs[0]);
                }
            }
        }
        $modx->cultureKey = $lingua->getCultureKey();
        if ($modx->cultureKey !== $modx->getOption(\'cultureKey\')) {
            $modx->setOption(\'cultureKey\', $modx->cultureKey);
            $modx->context->config[\'cultureKey\'] = $modx->cultureKey;
        }
        $modx->setPlaceholder(\'lingua.cultureKey\', $modx->cultureKey);
        $modx->setPlaceholder(\'lingua.language\', $modx->cultureKey);
        
        break;

    /**
     * /////////////////// MANAGER SIDE ///////////////////
     */
    case \'OnDocFormPrerender\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            if ($resource) {
                $currentContext = $resource->get(\'context_key\');
            } else {
                $currentContext = filter_input(INPUT_GET, \'context_key\', FILTER_SANITIZE_STRING);
            }
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            if ($resource) {
                $currentParent = $resource->get(\'parent\');
            } else {
                $currentParent = filter_input(INPUT_GET, \'parent\', FILTER_SANITIZE_NUMBER_INT);
            }
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        if (is_object($resource)) {
            $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
            if (!empty($ids)) {
                $ids = array_map(\'trim\', @explode(\',\', $ids));
                $currentId = $resource->get(\'id\');
                if (!in_array($currentId, $ids)) {
                    return;
                }
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        
        $modx->lexicon->load(\'lingua:default\');
        $languages = $lingua->getLanguages();
        if (empty($languages)) {
            return;
        }
        $modx->regClientCSS(MODX_BASE_URL . \'assets/components/lingua/css/mgr.css\');
        $modx->controller->addJavascript(MODX_BASE_URL . \'assets/components/lingua/js/mgr/resource.js\');
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        $storeData = array();
        $storeDefaultData = array();
        $configLang = array();
        $linguaSiteContentArray = array();
        $createHiddenFields = array();
        foreach ($languages as $language) {
            $configLang[$language[\'lang_code\']] = array(
                \'lang_code\' => $language[\'lang_code\'],
                \'local_name\' => $language[\'local_name\'],
                \'flag\' => $language[\'flag\'],
            );
            if ($language[\'lang_code\'] === $cultureKey) {
                $storeDefaultData[] = array(
                    $language[\'lang_code\'],
                    $language[\'local_name\'],
                    $language[\'flag\'],
                );
                continue;
            }
            $storeData[] = array(
                $language[\'lang_code\'],
                $language[\'local_name\'],
                $language[\'flag\'],
            );
            if ($mode === modSystemEvent::MODE_UPD) {
                $linguaSiteContent = $modx->getObject(\'linguaSiteContent\', array(
                    \'resource_id\' => $resource->get(\'id\'),
                    \'lang_id\' => $language[\'id\']
                ));
                if ($linguaSiteContent) {
                    $linguaSiteContentArray[$language[\'lang_code\']] = $linguaSiteContent->toArray();
                } else {
                    $linguaSiteContentArray[$language[\'lang_code\']] = array();
                }
            } else {
                $linguaSiteContentArray[$language[\'lang_code\']] = array();
            }
            $modx->regClientStartupHTMLBlock(\'<style>.icon-lingua-flag-\' . $language[\'lcid_string\'] . \' {background-image: url(\\\'../\' . $language[\'flag\'] . \'\\\'); background-repeat: no-repeat;}</style>\');
            $createHiddenFields[] = $language;
        } // foreach ($languages as $language)
        //------------------------------------------------------------------
        $jsHTML = \'
    window.lingua = new Lingua({
        defaultLang: "\' . $cultureKey . \'",
        langs: \' . json_encode($configLang) . \'
    });
    lingua.config.siteContent = \' . json_encode($linguaSiteContentArray) . \';
    lingua.flagDefaultFields();
    lingua.createHiddenFields(\' . json_encode($createHiddenFields) . \');
    var actionButtons = Ext.getCmp("modx-action-buttons");
    if (actionButtons) {
        var languageBtn = new Ext.form.ComboBox({
            id: "lingua-languageBtn",
            tpl: \\\'<tpl for="."><div class="x-combo-list-item"><img src="../{flag}" class="icon"/> {local_name}</div></tpl>\\\',
            store: new Ext.data.ArrayStore({
                id: 0,
                fields: [
                    "lang_code",
                    "local_name",
                    "flag"
                ],
                data: \' . json_encode(array_merge($storeDefaultData, $storeData)) . \'
            }),
            valueField: "lang_code",
            displayField: "local_name",
            typeAhead: false,
            forceSelection: true,
            editable: false,
            mode: "local",
            triggerAction: "all",
            //emptyText: "\' . $languages[$cultureKey][\'local_name\'] . \'",
            selectOnFocus: true,
            width: 150,
            listeners: {
                select: {
                    fn: function(combo, record, index) {
                        lingua.switchLanguage(record.get("lang_code"));
                    },
                    scope: this
                },
                render: {
                    fn: function(comboBox) {
                        var store = comboBox.store;
                        var valueField = comboBox.valueField;
                        var displayField = comboBox.displayField;
                        var recordNumber = store.findExact(valueField, "\' . $cultureKey . \'", 0);
                        if (recordNumber !== -1) {
                            var displayValue = store.getAt(recordNumber).data[displayField];
                            comboBox.setValue("\' . $cultureKey . \'");
                            comboBox.setRawValue(displayValue);
                            comboBox.selectedIndex = recordNumber;
                        }
                    },
                    scope: this
                }
            }
        });
        actionButtons.insertButton(0, [languageBtn, "-"]);
        actionButtons.doLayout();
    }\';
        $modx->controller->addHtml(\'
<script type="text/javascript">
Ext.onReady(function() {
    \' . $jsHTML . \'
});
</script>\');
        //------------------------------------------------------------------
        break;

    case \'OnResourceTVFormRender\':
        if (!is_object($resource) && is_numeric($resource)) {
            $resourceId = $resource;
            $resource = $modx->getObject(\'modResource\', $resource);
        }
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            if ($resource) {
                $currentContext = $resource->get(\'context_key\');
            } else {
                $currentContext = filter_input(INPUT_GET, \'context_key\', FILTER_SANITIZE_STRING);
            }
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            if ($resource) {
                $currentParent = $resource->get(\'parent\');
            } else {
                $currentParent = filter_input(INPUT_GET, \'parent\', FILTER_SANITIZE_NUMBER_INT);
            }
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        if (is_object($resource)) {
            $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
            if (!empty($ids)) {
                $ids = array_map(\'trim\', @explode(\',\', $ids));
                $currentId = $resource->get(\'id\');
                if (!in_array($currentId, $ids)) {
                    return;
                }
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }
        $languages = $lingua->getLanguages(1, false);
        if (empty($languages)) {
            return;
        }
        $initAllClonedTVFields = array();
        foreach ($languages as $language) {
            $initAllClonedTVFields[] = $language;
        }

        if ($resource) {
            $tvs = $resource->getTemplateVars();
        } else {
            $templateId = $template;
            $template = $modx->getObject(\'modTemplate\', $templateId);
            $tvs = $template->getTemplateVars();
        }
        if (!$tvs) {
            return;
        }

        $tvIds = array();
        $tvOutputs = array();
        foreach ($tvs as $tv) {
            $tvIds[] = $tv->get(\'id\');
        }
        $c = $modx->newQuery(\'linguaSiteTmplvars\');
        $c->where(array(
            \'tmplvarid:IN\' => $tvIds
        ));
        $linguaSiteTmplvars = $modx->getCollection(\'linguaSiteTmplvars\', $c);
        if (!$linguaSiteTmplvars) {
            return;
        }

        $formElements = array();
        foreach ($scriptProperties[\'categories\'] as $category) {
            foreach ($category[\'tvs\'] as $tv) {
                $formElements[$tv->get(\'id\')] = $tv;
            }
        }

        if (!empty($modx->controller->scriptProperties[\'showCheckbox\'])) {
            $showCheckbox = 1;
        }

        $tmplvars = array();
        $cloneTVFields = array();
        $count = 0;
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        foreach ($linguaSiteTmplvars as $linguaTv) {
            $tvId = $linguaTv->get(\'tmplvarid\');
            if (!isset($formElements[$tvId])) {
                continue;
            }
            $tv = $formElements[$tvId];
            $tmplvars[] = array(
                \'id\' => $tvId,
                \'type\' => $tv->get(\'type\'),
            );
            $tvArray = $tv->toArray(\'tv.\');
            foreach ($languages as $language) {
                if ($language[\'lang_code\'] === $cultureKey) {
                    continue;
                }

                $linguaTVContent = $modx->getObject(\'linguaSiteTmplvarContentvalues\', array(
                    \'tmplvarid\' => $tvId,
                    \'contentid\' => $resourceId,
                    \'lang_id\' => $language[\'id\']
                ));

                /**
                 * Start to manipulate the ID to parse hidden TVs
                 */
                $content = \'\';
                if ($linguaTVContent) {
                    $content = $linguaTVContent->get(\'value\');
                }
                $inputForm = $tv->renderInput($resource, array(
                    \'value\' => $content
                ));
                if (empty($inputForm)) {
                    continue;
                }

                $tvCloneId = $tvId . \'_\' . $language[\'lang_code\'] . \'_lingua_tv\';
                // basic replacements
                $cloneInputForm = $inputForm;
                $cloneInputForm = preg_replace(\'/("|\\\'){1}tv\' . $tvId . \'("|\\\'){1}/\', \'${1}tv\' . $tvCloneId . \'${2}\', $cloneInputForm);
                $cloneInputForm = preg_replace(\'/("|\\\'){1}tv\' . $tvId . \'\\[\\]("|\\\'){1}/\', \'${1}tv\' . $tvCloneId . \'[]${2}\', $cloneInputForm);
                // advanced replacements
                $linguaSiteTmplvarsPatterns = $modx->getCollection(\'linguaSiteTmplvarsPatterns\', array(
                    \'type\' => $tv->get(\'type\')
                ));
                if ($linguaSiteTmplvarsPatterns) {
                    foreach ($linguaSiteTmplvarsPatterns as $pattern) {
                        $search = $pattern->get(\'search\');
                        $search = str_replace(\'{{tvId}}\', $tvId, $search);
                        $replacement = $pattern->get(\'replacement\');
                        $replacement = str_replace(\'{{tvCloneId}}\', $tvCloneId, $replacement);
                        $cloneInputForm = preg_replace($search, $replacement, $cloneInputForm);
                    }
                }
                $count++;
                $phs = $tvArray;
                $phs[\'tv.id\'] = $tvCloneId;
                $phs[\'tv.formElement\'] = $cloneInputForm;
                $phs[\'tv.showCheckbox\'] = $showCheckbox;
                $cloneTVFields[] = $lingua->processElementTags($lingua->parseTpl(\'lingua.resourcetv.row\', $phs));
            }
        }
        
        // reset any left out output after rendering TV forms above
        if ($modx->event->name === \'OnTVInputRenderList\') {
            $modx->event->_output = \'\';
        }

        $modx->event->output(@implode("\\n", $cloneTVFields));    
        $jsHTML = "
<script>
    Ext.onReady(function() {
        lingua.config.tmplvars = " . json_encode($tmplvars) . ";
        lingua.initAllClonedTVFields(" . json_encode($initAllClonedTVFields) . ");
        lingua.flagDefaultTVFields();
    });
</script>";
        $modx->event->output($jsHTML);

        break;

    case \'OnDocFormSave\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            $currentContext = $resource->get(\'context_key\');
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            $currentParent = $resource->get(\'parent\');
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
        if (!empty($ids)) {
            $ids = array_map(\'trim\', @explode(\',\', $ids));
            $currentId = $resource->get(\'id\');
            if (!in_array($currentId, $ids)) {
                return;
            }
        }

        $lingua = $modx->getService(\'lingua\', \'Lingua\', MODX_CORE_PATH . \'components/lingua/model/lingua/\');
        if (!($lingua instanceof Lingua)) {
            return;
        }

        // update linguaSiteContent
        $reverting = array();
        $clearKeys = array();
        // $modx->getOption(\'cultureKey\') doesn\'t work!
        $modCultureKey = $modx->getObject(\'modSystemSetting\', array(\'key\' => \'cultureKey\'));
        $cultureKey = $modCultureKey->get(\'value\');
        foreach ($resource->_fields as $k => $v) {
            if (!preg_match(\'/_lingua$/\', $k)) {
                continue;
            }
            foreach ($v as $a => $b) {
                if ($a === $cultureKey) {
                    continue;
                }
                $reverting[$a][preg_replace(\'/_lingua$/\', \'\', $k)] = $b;
            }
            $clearKeys[] = $k;
        }

        $resourceId = $resource->get(\'id\');
        foreach ($reverting as $k => $v) {
            $linguaLangs = $modx->getObject(\'linguaLangs\', array(\'lang_code\' => $k));
            $params = array(
                \'resource_id\' => $resourceId,
                \'lang_id\' => $linguaLangs->get(\'id\'),
            );
            $linguaSiteContent = $modx->getObject(\'linguaSiteContent\', $params);
            if (!$linguaSiteContent) {
                $linguaSiteContent = $modx->newObject(\'linguaSiteContent\');
                $linguaSiteContent->fromArray($params);
                $linguaSiteContent->save();
            }
            $linguaSiteContent->set(\'pagetitle\', $v[\'pagetitle\']);
            $linguaSiteContent->set(\'longtitle\', $v[\'longtitle\']);
            $linguaSiteContent->set(\'description\', $v[\'description\']);
            $linguaSiteContent->set(\'content\', (isset($v[\'content\']) && !empty($v[\'content\']) ? $v[\'content\'] : $v[\'ta\']));
            if (empty($v[\'alias\'])) {
                $v[\'alias\'] = $resource->get(\'alias\');
                $linguaSiteContent->setDirty(\'alias\');
            }
            $linguaSiteContent->set(\'introtext\', $v[\'introtext\']);
            $linguaSiteContent->set(\'alias\', $v[\'alias\']);
            $linguaSiteContent->set(\'menutitle\', $v[\'menutitle\']);
            $linguaSiteContent->set(\'link_attributes\', $v[\'link_attributes\']);
            $linguaSiteContent->set(\'uri_override\', $v[\'uri_override\']);
            $linguaSiteContent->set(\'uri\', $v[\'uri\']);
            $linguaSiteContent->set(\'parent\', $resource->get(\'parent\'));
            $linguaSiteContent->set(\'isfolder\', $resource->get(\'isfolder\'));
            $linguaSiteContent->set(\'context_key\', $resource->get(\'context_key\'));
            $linguaSiteContent->set(\'content_type\', $resource->get(\'content_type\'));
            if ($resource->get(\'refreshURIs\')) {
                $linguaSiteContent->set(\'refreshURIs\', true);
            }
            $linguaSiteContent->save();
        }

        // update linguaSiteTmplvarContentvalues
        $reverting = array();
        foreach ($resource->_fields as $k => $value) {
            if (!preg_match(\'/_lingua_tv$/\', $k)) {
                continue;
            }
            $tvKey = preg_replace(\'/_lingua_tv$/\', \'\', $k);
            $tvKeys = @explode(\'_\', $tvKey);
            $tvId = str_replace(\'tv\', \'\', $tvKeys[0]);
            if (!is_numeric($tvId)) {
                continue;
            }
            $reverse = array_reverse($tvKeys);
            $lang = $reverse[0];
            if ($lang === $cultureKey) {
                continue;
            }
            $tv = $modx->getObject(\'modTemplateVar\', $tvId);
            $tvKey = $tvKeys[0];
            /* validation for different types */
            switch ($tv->get(\'type\')) {
                case \'url\':
                    // tv16_prefix_id_lingua_tv
                    $prefix = $resource->_fields[$tvKey . \'_prefix_\' . $lang . \'_lingua_tv\'];
                    if ($prefix != \'--\') {
                        $value = str_replace(array(\'ftp://\', \'http://\', \'https://\', \'ftp://\', \'mailto:\'), \'\', $value);
                        $value = $prefix . $value;
                    }
                    $reverting[$lang][$tvId] = $value;

                    break;
                case \'date\':
                    $value = empty($value) ? \'\' : strftime(\'%Y-%m-%d %H:%M:%S\', strtotime($value));

                    break;
                /* ensure tag types trim whitespace from tags */
                case \'tag\':
                case \'autotag\':
                    $tags = explode(\',\', $value);
                    $newTags = array();
                    foreach ($tags as $tag) {
                        $newTags[] = trim($tag);
                    }
                    $value = implode(\',\', $newTags);

                    break;
                default:
                    /* handles checkboxes & multiple selects elements */
                    if (is_array($value)) {
                        $featureInsert = array();
                        while (list($featureValue, $featureItem) = each($value)) {
                            if (empty($featureItem)) {
                                continue;
                            }
                            $featureInsert[count($featureInsert)] = $featureItem;
                        }
                        $value = implode(\'||\', $featureInsert);
                    }

                    break;
            }
            $reverting[$lang][$tvId] = $value;
            $clearKeys[] = $k;
        }

        /**
         * json seems to have number of characters limit;
         * that makes saving success report truncated and output modal hangs,
         * TV\'s procces does this outside of reverting\'s loops
         */
        if (!empty($clearKeys)) {
            foreach ($clearKeys as $k) {
                $resource->set($k, \'\');
            }
        }

        foreach ($reverting as $k => $tmplvars) {
            $linguaLangs = $modx->getObject(\'linguaLangs\', array(\'lang_code\' => $k));
            $langId = $linguaLangs->get(\'id\');
            foreach ($tmplvars as $key => $val) {
                if (empty($val)) {
                    continue;
                }
                $params = array(
                    \'lang_id\' => $langId,
                    \'tmplvarid\' => $key,
                    \'contentid\' => $resourceId,
                );
                $linguaSiteTmplvarContentvalues = $modx->getObject(\'linguaSiteTmplvarContentvalues\', $params);
                if (!$linguaSiteTmplvarContentvalues) {
                    $linguaSiteTmplvarContentvalues = $modx->newObject(\'linguaSiteTmplvarContentvalues\');
                }
                $linguaSiteTmplvarContentvalues->set(\'lang_id\', $langId);
                $linguaSiteTmplvarContentvalues->set(\'tmplvarid\', $key);
                $linguaSiteTmplvarContentvalues->set(\'contentid\', $resourceId);
                $linguaSiteTmplvarContentvalues->set(\'value\', $val);
                $linguaSiteTmplvarContentvalues->save();
            }
        }

        // clear cache
        $contexts = array($resource->get(\'context_key\'));
        $cacheManager = $modx->getCacheManager();
        $cacheManager->refresh(array(
            \'lingua/resource\' => array(\'contexts\' => $contexts),
        ));
        break;

    case \'OnResourceDuplicate\':
        $contexts = $modx->getOption(\'lingua.contexts\', $scriptProperties, \'web\');
        if (!empty($contexts)) {
            $contexts = array_map(\'trim\', @explode(\',\', $contexts));
            $currentContext = $oldResource->get(\'context_key\');
            if (!in_array($currentContext, $contexts)) {
                return;
            }
        }
        $parents = $modx->getOption(\'lingua.parents\', $scriptProperties);
        if (!empty($parents)) {
            $parents = array_map(\'trim\', @explode(\',\', $parents));
            $currentParent = $oldResource->get(\'parent\');
            if (!in_array($currentParent, $parents)) {
                return;
            }
        }
        $ids = $modx->getOption(\'lingua.ids\', $scriptProperties);
        if (!empty($ids)) {
            $ids = array_map(\'trim\', @explode(\',\', $ids));
            $currentId = $oldResource->get(\'id\');
            if (!in_array($currentId, $ids)) {
                return;
            }
        }

        $linguaSiteContents = $modx->getCollection(\'linguaSiteContent\', array(
            \'resource_id\' => $oldResource->get(\'id\')
        ));
        if ($linguaSiteContents) {
            foreach ($linguaSiteContents as $linguaSiteContent) {
                $params = $linguaSiteContent->toArray();
                unset($params[\'id\']);
                $params[\'resource_id\'] = $newResource->get(\'id\');
                $newLinguaSiteContent = $modx->newObject(\'linguaSiteContent\');
                $newLinguaSiteContent->fromArray($params);
                $newLinguaSiteContent->save();
            }
        }
        break;

    case \'OnEmptyTrash\':
        if (!empty($ids) && is_array($ids)) {
            $collection = $modx->getCollection(\'linguaSiteContent\', array(
                \'resource_id:IN\' => $ids
            ));
            if ($collection) {
                foreach ($collection as $item) {
                    $item->remove();
                }
            }
        }
        break;

    case \'OnTemplateSave\':
    case \'OnTempFormSave\':
    case \'OnTVFormSave\':
    case \'OnSnipFormSave\':
    case \'OnPluginFormSave\':
    case \'OnMediaSourceFormSave\':
    case \'OnChunkFormSave\':
    case \'OnSiteRefresh\':
        $cacheManager = $modx->getCacheManager();
        $cacheManager->refresh(array(
            \'lingua/resource\' => array(),
        ));
        break;

    default:
        break;
}
return;',
    ),
  ),
  'd9132140eea5df3d0eda3830d40f051e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnHandleRequest',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnHandleRequest',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '232fa34340eb9df3c544eeb282e7efed' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnInitCulture',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnInitCulture',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '8f9f7336fb977a697a25697ed1a2413a' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '8caa0dc23c3cede2491deb05a4e805b7' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnResourceTVFormRender',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnResourceTVFormRender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'e105f9b1bbbeb531052646715e8e7c9f' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '765323138e74898ce5166ea07b8b556f' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnResourceDuplicate',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnResourceDuplicate',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'bf0b5534bc4a05f2a5978952c95acc99' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnEmptyTrash',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnEmptyTrash',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'd684abcbcdeffe83ab122157749fab89' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTemplateSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTemplateSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '77bea495aae5f8e74d7c62a4dba35ac1' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTempFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTempFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '9eb42621c21dc2ba68cbdcfa39994cf2' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTVFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnTVFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '1019aedb4204fe04c3d044a296a09e66' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnSnipFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnSnipFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'ad965be5ddd7c736ed6ff7555ca2f546' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnPluginFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnPluginFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'fe0c930b0afe983015f617da4728ecb3' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnMediaSourceFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnMediaSourceFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'acb984a35645def8b96753eb9de870b7' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnChunkFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnChunkFormSave',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '84b496add4e53790d9f752f984a1888e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnSiteRefresh',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnSiteRefresh',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);