<?php return array (
  '9d5e8d2be549c92cc9c4826f6b546e52' => 
  array (
    'criteria' => 
    array (
      'name' => 'migx',
    ),
    'object' => 
    array (
      'name' => 'migx',
      'path' => '{core_path}components/migx/',
      'assets_path' => '{assets_path}components/migx/',
    ),
  ),
  'f95b1d91fc745140c9e19119ddc693b0' => 
  array (
    'criteria' => 
    array (
      'category' => 'MIGX',
    ),
    'object' => 
    array (
      'id' => 4,
      'parent' => 0,
      'category' => 'MIGX',
    ),
    'files' => 
    array (
      0 => '/home/projects/public_html/truckload/platform/assets/components',
    ),
  ),
  'd987cb92b191ec31add7d333468c6e1d' => 
  array (
    'criteria' => 
    array (
      'name' => 'getImageList',
    ),
    'object' => 
    array (
      'id' => 4,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getImageList',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * getImageList
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getImageList is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getImageList is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getImageList; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getImageList
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.4
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2009-2011
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: <ul>[[!getImageList? &tvname=`myTV`&tpl=`@CODE:<li>[[+idx]]<img src="[[+imageURL]]"/><p>[[+imageAlt]]</p></li>`]]</ul>*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');
$reverse = $modx->getOption(\'reverse\', $scriptProperties, \'0\');
$sumFields = $modx->getOption(\'sumFields\', $scriptProperties, \'\');
$sumPrefix = $modx->getOption(\'sumPrefix\', $scriptProperties, \'summary_\');
$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;
//split json into parts
$splits = $modx->fromJson($modx->getOption(\'splits\', $scriptProperties, 0));
$splitTpl = $modx->getOption(\'splitTpl\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');

$modx->setPlaceholder(\'docid\', $docid);

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : \'web\';

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $modx->getOption(\'configs\', $properties, \'\');
        if (!empty($migx->config[\'configs\'])) {
            $migx->loadConfigs();
            // get tabs from file or migx-config-table
            $formtabs = $migx->getTabs();
        }
        if (empty($formtabs) && isset($properties[\'formtabs\'])) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        if (!empty($properties[\'basePath\'])) {
            if ($properties[\'autoResourceFolders\'] == \'true\') {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'basePath\'] . $docid . \'/\';
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'] . $docid . \'/\';
            } else {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'base_path\'];
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'];
            }
        }
        if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\'])) {
            $jsonVarKey = $properties[\'jsonvarkey\'];
            $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
        }
        $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);
    }


}

if (empty($outputvalue)) {
    return \'\';
}

//echo $outputvalue.\'<br/><br/>\';


$items = $modx->fromJSON($outputvalue);

// where filter
if (is_array($where) && count($where) > 0) {
    $items = $migx->filterItems($where, $items);
}
$modx->setPlaceholder($totalVar, count($items));


if (!empty($reverse)) {
    $items = array_reverse($items);
}


// sort items
if (is_array($sort) && count($sort) > 0) {
    $items = $migx->sortDbResult($items, $sort);
}

$summaries = array();
$output = \'\';
$count = count($items);

if ($count > 0) {
    $items = $offset > 0 ? array_slice($items, $offset) : $items;

    $limit = $limit == 0 || $limit > $count ? $count : $limit;
    $preselectLimit = $preselectLimit > $count ? $count : $preselectLimit;
    //preselect important items
    $preitems = array();
    if ($randomize && $preselectLimit > 0) {
        for ($i = 0; $i < $preselectLimit; $i++) {
            $preitems[] = $items[$i];
            unset($items[$i]);
        }
        $limit = $limit - count($preitems);
    }

    //shuffle items
    if ($randomize) {
        shuffle($items);
    }

    //limit items
    $tempitems = array();
    for ($i = 0; $i < $limit; $i++) {
        $tempitems[] = $items[$i];
    }
    $items = $tempitems;

    //add preselected items and schuffle again
    if ($randomize && $preselectLimit > 0) {
        $items = array_merge($preitems, $items);
        shuffle($items);
    }

    $properties = array();
    foreach ($scriptProperties as $property => $value) {
        $properties[\'property.\' . $property] = $value;
    }

    $idx = 0;
    $output = array();
    $template = array();
    $count = count($items);

    foreach ($items as $key => $item) {
        $formname = isset($item[\'MIGX_formname\']) ? $item[\'MIGX_formname\'] . \'_\' : \'\';
        $fields = array();
        foreach ($item as $field => $value) {
            if (is_array($value)) {
                if (is_array($value[0])) {
                    //nested array - convert to json
                    $value = $modx->toJson($value);
                } else {
                    $value = implode(\'||\', $value); //handle arrays (checkboxes, multiselects)
                }
            }


            $inputTVkey = $formname . $field;
            if ($processTVs && isset($inputTvs[$inputTVkey])) {
                if (isset($inputTvs[$inputTVkey][\'inputTV\']) && $tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$inputTVkey][\'inputTV\']))) {

                } else {
                    $tv = $modx->newObject(\'modTemplateVar\');
                    $tv->set(\'type\', $inputTvs[$inputTVkey][\'inputTVtype\']);
                }
                $inputTV = $inputTvs[$inputTVkey];

                $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
                //don\'t manipulate any urls here
                $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
                $tv->set(\'default_text\', $value);
                $value = $tv->renderOutput($docid);
                //set option back
                $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
                //now manipulate urls
                if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                    $mTypes = explode(\',\', $mTypes);
                    if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                        //$value = $mediasource->prepareOutputUrl($value);
                        $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                    }
                }

            }
            $fields[$field] = $value;

        }

        if (!empty($addfields)) {
            foreach ($addfields as $addfield) {
                $addfield = explode(\':\', $addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault;
            }
        }

        if (!empty($sumFields)) {
            $sumFields = is_array($sumFields) ? $sumFields : explode(\',\', $sumFields);
            foreach ($sumFields as $sumField) {
                if (isset($fields[$sumField])) {
                    $summaries[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField] + $fields[$sumField];
                    $fields[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField];
                }
            }
        }


        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            if ($count == 1 && isset($tpl_oneresult)) {
                $rowtpl = $tpl_oneresult;
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if (count($summaries) > 0) {
    $modx->toPlaceholders($summaries);
}


if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/

if ($count > 0 && $splits > 0) {
    $size = ceil($count / $splits);
    $chunks = array_chunk($output, $size);
    $output = array();
    foreach ($chunks as $chunk) {
        $o = implode($outputSeparator, $chunk);
        $output[] = $modx->getChunk($splitTpl, array(\'output\' => $o));
    }
    $outputSeparator = $splitSeparator;
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);        
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * getImageList
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getImageList is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getImageList is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getImageList; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getImageList
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.4
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2009-2011
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: <ul>[[!getImageList? &tvname=`myTV`&tpl=`@CODE:<li>[[+idx]]<img src="[[+imageURL]]"/><p>[[+imageAlt]]</p></li>`]]</ul>*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');
$reverse = $modx->getOption(\'reverse\', $scriptProperties, \'0\');
$sumFields = $modx->getOption(\'sumFields\', $scriptProperties, \'\');
$sumPrefix = $modx->getOption(\'sumPrefix\', $scriptProperties, \'summary_\');
$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;
//split json into parts
$splits = $modx->fromJson($modx->getOption(\'splits\', $scriptProperties, 0));
$splitTpl = $modx->getOption(\'splitTpl\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');

$modx->setPlaceholder(\'docid\', $docid);

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : \'web\';

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $modx->getOption(\'configs\', $properties, \'\');
        if (!empty($migx->config[\'configs\'])) {
            $migx->loadConfigs();
            // get tabs from file or migx-config-table
            $formtabs = $migx->getTabs();
        }
        if (empty($formtabs) && isset($properties[\'formtabs\'])) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        if (!empty($properties[\'basePath\'])) {
            if ($properties[\'autoResourceFolders\'] == \'true\') {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'basePath\'] . $docid . \'/\';
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'] . $docid . \'/\';
            } else {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'base_path\'];
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'];
            }
        }
        if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\'])) {
            $jsonVarKey = $properties[\'jsonvarkey\'];
            $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
        }
        $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);
    }


}

if (empty($outputvalue)) {
    return \'\';
}

//echo $outputvalue.\'<br/><br/>\';


$items = $modx->fromJSON($outputvalue);

// where filter
if (is_array($where) && count($where) > 0) {
    $items = $migx->filterItems($where, $items);
}
$modx->setPlaceholder($totalVar, count($items));


if (!empty($reverse)) {
    $items = array_reverse($items);
}


// sort items
if (is_array($sort) && count($sort) > 0) {
    $items = $migx->sortDbResult($items, $sort);
}

$summaries = array();
$output = \'\';
$count = count($items);

if ($count > 0) {
    $items = $offset > 0 ? array_slice($items, $offset) : $items;

    $limit = $limit == 0 || $limit > $count ? $count : $limit;
    $preselectLimit = $preselectLimit > $count ? $count : $preselectLimit;
    //preselect important items
    $preitems = array();
    if ($randomize && $preselectLimit > 0) {
        for ($i = 0; $i < $preselectLimit; $i++) {
            $preitems[] = $items[$i];
            unset($items[$i]);
        }
        $limit = $limit - count($preitems);
    }

    //shuffle items
    if ($randomize) {
        shuffle($items);
    }

    //limit items
    $tempitems = array();
    for ($i = 0; $i < $limit; $i++) {
        $tempitems[] = $items[$i];
    }
    $items = $tempitems;

    //add preselected items and schuffle again
    if ($randomize && $preselectLimit > 0) {
        $items = array_merge($preitems, $items);
        shuffle($items);
    }

    $properties = array();
    foreach ($scriptProperties as $property => $value) {
        $properties[\'property.\' . $property] = $value;
    }

    $idx = 0;
    $output = array();
    $template = array();
    $count = count($items);

    foreach ($items as $key => $item) {
        $formname = isset($item[\'MIGX_formname\']) ? $item[\'MIGX_formname\'] . \'_\' : \'\';
        $fields = array();
        foreach ($item as $field => $value) {
            if (is_array($value)) {
                if (is_array($value[0])) {
                    //nested array - convert to json
                    $value = $modx->toJson($value);
                } else {
                    $value = implode(\'||\', $value); //handle arrays (checkboxes, multiselects)
                }
            }


            $inputTVkey = $formname . $field;
            if ($processTVs && isset($inputTvs[$inputTVkey])) {
                if (isset($inputTvs[$inputTVkey][\'inputTV\']) && $tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$inputTVkey][\'inputTV\']))) {

                } else {
                    $tv = $modx->newObject(\'modTemplateVar\');
                    $tv->set(\'type\', $inputTvs[$inputTVkey][\'inputTVtype\']);
                }
                $inputTV = $inputTvs[$inputTVkey];

                $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
                //don\'t manipulate any urls here
                $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
                $tv->set(\'default_text\', $value);
                $value = $tv->renderOutput($docid);
                //set option back
                $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
                //now manipulate urls
                if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                    $mTypes = explode(\',\', $mTypes);
                    if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                        //$value = $mediasource->prepareOutputUrl($value);
                        $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                    }
                }

            }
            $fields[$field] = $value;

        }

        if (!empty($addfields)) {
            foreach ($addfields as $addfield) {
                $addfield = explode(\':\', $addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault;
            }
        }

        if (!empty($sumFields)) {
            $sumFields = is_array($sumFields) ? $sumFields : explode(\',\', $sumFields);
            foreach ($sumFields as $sumField) {
                if (isset($fields[$sumField])) {
                    $summaries[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField] + $fields[$sumField];
                    $fields[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField];
                }
            }
        }


        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            if ($count == 1 && isset($tpl_oneresult)) {
                $rowtpl = $tpl_oneresult;
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if (count($summaries) > 0) {
    $modx->toPlaceholders($summaries);
}


if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/

if ($count > 0 && $splits > 0) {
    $size = ceil($count / $splits);
    $chunks = array_chunk($output, $size);
    $output = array();
    foreach ($chunks as $chunk) {
        $o = implode($outputSeparator, $chunk);
        $output[] = $modx->getChunk($splitTpl, array(\'output\' => $o));
    }
    $outputSeparator = $splitSeparator;
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);        
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
    ),
  ),
  '4be0c765775519362306a6ef25a18780' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxGetRelations',
    ),
    'object' => 
    array (
      'id' => 5,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxGetRelations',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, \'\');
$element = $modx->getOption(\'element\', $scriptProperties, \'getResources\');
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \',\');
$sourceWhere = $modx->getOption(\'sourceWhere\', $scriptProperties, \'\');
$ignoreRelationIfEmpty = $modx->getOption(\'ignoreRelationIfEmpty\', $scriptProperties, false);
$inheritFromParents = $modx->getOption(\'inheritFromParents\', $scriptProperties, false);
$parentIDs = $inheritFromParents ? array_merge(array($id), $modx->getParentIds($id)) : array($id);

$packageName = \'resourcerelations\';

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = \'rrResourceRelation\';
$output = \'\';

foreach ($parentIDs as $id) {
    if (!empty($id)) {
        $output = \'\';
                
        $c = $modx->newQuery($classname, array(\'target_id\' => $id, \'published\' => \'1\'));
        $c->select($modx->getSelectColumns($classname, $classname));

        if (!empty($sourceWhere)) {
            $sourceWhere_ar = $modx->fromJson($sourceWhere);
            if (is_array($sourceWhere_ar)) {
                $where = array();
                foreach ($sourceWhere_ar as $key => $value) {
                    $where[\'Source.\' . $key] = $value;
                }
                $joinclass = \'modResource\';
                $joinalias = \'Source\';
                $selectfields = \'id\';
                $selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;
                $c->leftjoin($joinclass, $joinalias);
                $c->select($modx->getSelectColumns($joinclass, $joinalias, $joinalias . \'_\', $selectfields));
                $c->where($where);
            }
        }

        //$c->prepare(); echo $c->toSql();
        if ($c->prepare() && $c->stmt->execute()) {
            $collection = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        foreach ($collection as $row) {
            $ids[] = $row[\'source_id\'];
        }
        $output = implode($outputSeparator, $ids);
    }
    if (!empty($output)){
        break;
    }
}


if (!empty($element)) {
    if (empty($output) && $ignoreRelationIfEmpty) {
        return $modx->runSnippet($element, $scriptProperties);
    } else {
        $scriptProperties[\'resources\'] = $output;
        $scriptProperties[\'parents\'] = \'9999999\';
        return $modx->runSnippet($element, $scriptProperties);
    }


}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, \'\');
$element = $modx->getOption(\'element\', $scriptProperties, \'getResources\');
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \',\');
$sourceWhere = $modx->getOption(\'sourceWhere\', $scriptProperties, \'\');
$ignoreRelationIfEmpty = $modx->getOption(\'ignoreRelationIfEmpty\', $scriptProperties, false);
$inheritFromParents = $modx->getOption(\'inheritFromParents\', $scriptProperties, false);
$parentIDs = $inheritFromParents ? array_merge(array($id), $modx->getParentIds($id)) : array($id);

$packageName = \'resourcerelations\';

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = \'rrResourceRelation\';
$output = \'\';

foreach ($parentIDs as $id) {
    if (!empty($id)) {
        $output = \'\';
                
        $c = $modx->newQuery($classname, array(\'target_id\' => $id, \'published\' => \'1\'));
        $c->select($modx->getSelectColumns($classname, $classname));

        if (!empty($sourceWhere)) {
            $sourceWhere_ar = $modx->fromJson($sourceWhere);
            if (is_array($sourceWhere_ar)) {
                $where = array();
                foreach ($sourceWhere_ar as $key => $value) {
                    $where[\'Source.\' . $key] = $value;
                }
                $joinclass = \'modResource\';
                $joinalias = \'Source\';
                $selectfields = \'id\';
                $selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;
                $c->leftjoin($joinclass, $joinalias);
                $c->select($modx->getSelectColumns($joinclass, $joinalias, $joinalias . \'_\', $selectfields));
                $c->where($where);
            }
        }

        //$c->prepare(); echo $c->toSql();
        if ($c->prepare() && $c->stmt->execute()) {
            $collection = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        foreach ($collection as $row) {
            $ids[] = $row[\'source_id\'];
        }
        $output = implode($outputSeparator, $ids);
    }
    if (!empty($output)){
        break;
    }
}


if (!empty($element)) {
    if (empty($output) && $ignoreRelationIfEmpty) {
        return $modx->runSnippet($element, $scriptProperties);
    } else {
        $scriptProperties[\'resources\'] = $output;
        $scriptProperties[\'parents\'] = \'9999999\';
        return $modx->runSnippet($element, $scriptProperties);
    }


}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
    ),
  ),
  '3b5e2b701315349b9c007cb15afc5222' => 
  array (
    'criteria' => 
    array (
      'name' => 'migx',
    ),
    'object' => 
    array (
      'id' => 6,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migx',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = !empty($configs) ? explode(\',\',$configs):array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

if (!empty($tvname))
{
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname)))
    {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'configs\']) ? $properties : $tv->getProperties();
        $cfgs = $modx->getOption(\'configs\',$properties,\'\');
        if (!empty($cfgs)){
            $cfgs = explode(\',\',$cfgs);
            $configs = array_merge($configs,$cfgs);
           
        }
        
    }
}



//$migx->config[\'configs\'] = implode(\',\',$configs);
$migx->loadConfigs(false,true,array(\'configs\'=>implode(\',\',$configs)));
$migx->customconfigs = array_merge($migx->customconfigs,$scriptProperties);



// get tabs from file or migx-config-table
$formtabs = $migx->getTabs();
if (empty($formtabs))
{
    //try to get formtabs and its fields from properties
    $formtabs = $modx->fromJSON($properties[\'formtabs\']);
}

if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\']))
{
    $jsonVarKey = $properties[\'jsonvarkey\'];
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}

$outputvalue = $tv && empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
/*
*   get inputTvs 
*/
$inputTvs = array();
if (is_array($formtabs))
{

    //multiple different Forms
    // Note: use same field-names and inputTVs in all forms
    $inputTvs = $migx->extractInputTvs($formtabs);
}

if ($tv)
{
    $migx->source = $tv->getSource($migx->working_context, false);
}

//$task = $modx->migx->getTask();
$filename = \'getlist.php\';
$processorspath = $migx->config[\'processorsPath\'] . \'mgr/\';
$filenames = array();
$scriptProperties[\'start\'] = $modx->getOption(\'offset\', $scriptProperties, 0);
if ($processor_file = $migx->findProcessor($processorspath, $filename, $filenames))
{
    include ($processor_file);
    //todo: add getlist-processor for default-MIGX-TV
}

$items = isset($rows) && is_array($rows) ? $rows : array();
$modx->setPlaceholder($totalVar, isset($count) ? $count : 0);

$properties = array();
foreach ($scriptProperties as $property => $value)
{
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
foreach ($items as $key => $item)
{

    $fields = array();
    foreach ($item as $field => $value)
    {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field]))
        {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\'])))
            {

            } else
            {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv))
            {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes))
                {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }
    if ($toJsonPlaceholder)
    {
        $output[] = $fields;
    } else
    {
        $fields[\'_alt\'] = $idx % 2;
        $idx++;
        $fields[\'_first\'] = $idx == 1 ? true : \'\';
        $fields[\'_last\'] = $idx == $limit ? true : \'\';
        $fields[\'idx\'] = $idx;
        $rowtpl = $tpl;
        //get changing tpls from field
        if (substr($tpl, 0, 7) == "@FIELD:")
        {
            $tplField = substr($tpl, 7);
            $rowtpl = $fields[$tplField];
        }

        if (!isset($template[$rowtpl]))
        {
            if (substr($rowtpl, 0, 6) == "@FILE:")
            {
                $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
            } elseif (substr($rowtpl, 0, 6) == "@CODE:")
            {
                $template[$rowtpl] = substr($tpl, 6);
            } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true))
            {
                $template[$rowtpl] = $chunk->getContent();
            } else
            {
                $template[$rowtpl] = false;
            }
        }

        $fields = array_merge($fields, $properties);

        if ($template[$rowtpl])
        {
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setCacheable(false);
            $chunk->setContent($template[$rowtpl]);
            if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField]))
            {
                $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
            } else
            {
                $output[] = $chunk->process($fields);
            }
        } else
        {
            if (!empty($placeholdersKeyField))
            {
                $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            } else
            {
                $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            }
        }
    }


}


if ($toJsonPlaceholder)
{
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders))
{
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/
if (is_array($output))
{
    $o = implode($outputSeparator, $output);
} else
{
    $o = $output;
}

if (!empty($toPlaceholder))
{
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = !empty($configs) ? explode(\',\',$configs):array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

if (!empty($tvname))
{
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname)))
    {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'configs\']) ? $properties : $tv->getProperties();
        $cfgs = $modx->getOption(\'configs\',$properties,\'\');
        if (!empty($cfgs)){
            $cfgs = explode(\',\',$cfgs);
            $configs = array_merge($configs,$cfgs);
           
        }
        
    }
}



//$migx->config[\'configs\'] = implode(\',\',$configs);
$migx->loadConfigs(false,true,array(\'configs\'=>implode(\',\',$configs)));
$migx->customconfigs = array_merge($migx->customconfigs,$scriptProperties);



// get tabs from file or migx-config-table
$formtabs = $migx->getTabs();
if (empty($formtabs))
{
    //try to get formtabs and its fields from properties
    $formtabs = $modx->fromJSON($properties[\'formtabs\']);
}

if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\']))
{
    $jsonVarKey = $properties[\'jsonvarkey\'];
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}

$outputvalue = $tv && empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
/*
*   get inputTvs 
*/
$inputTvs = array();
if (is_array($formtabs))
{

    //multiple different Forms
    // Note: use same field-names and inputTVs in all forms
    $inputTvs = $migx->extractInputTvs($formtabs);
}

if ($tv)
{
    $migx->source = $tv->getSource($migx->working_context, false);
}

//$task = $modx->migx->getTask();
$filename = \'getlist.php\';
$processorspath = $migx->config[\'processorsPath\'] . \'mgr/\';
$filenames = array();
$scriptProperties[\'start\'] = $modx->getOption(\'offset\', $scriptProperties, 0);
if ($processor_file = $migx->findProcessor($processorspath, $filename, $filenames))
{
    include ($processor_file);
    //todo: add getlist-processor for default-MIGX-TV
}

$items = isset($rows) && is_array($rows) ? $rows : array();
$modx->setPlaceholder($totalVar, isset($count) ? $count : 0);

$properties = array();
foreach ($scriptProperties as $property => $value)
{
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
foreach ($items as $key => $item)
{

    $fields = array();
    foreach ($item as $field => $value)
    {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field]))
        {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\'])))
            {

            } else
            {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv))
            {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes))
                {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }
    if ($toJsonPlaceholder)
    {
        $output[] = $fields;
    } else
    {
        $fields[\'_alt\'] = $idx % 2;
        $idx++;
        $fields[\'_first\'] = $idx == 1 ? true : \'\';
        $fields[\'_last\'] = $idx == $limit ? true : \'\';
        $fields[\'idx\'] = $idx;
        $rowtpl = $tpl;
        //get changing tpls from field
        if (substr($tpl, 0, 7) == "@FIELD:")
        {
            $tplField = substr($tpl, 7);
            $rowtpl = $fields[$tplField];
        }

        if (!isset($template[$rowtpl]))
        {
            if (substr($rowtpl, 0, 6) == "@FILE:")
            {
                $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
            } elseif (substr($rowtpl, 0, 6) == "@CODE:")
            {
                $template[$rowtpl] = substr($tpl, 6);
            } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true))
            {
                $template[$rowtpl] = $chunk->getContent();
            } else
            {
                $template[$rowtpl] = false;
            }
        }

        $fields = array_merge($fields, $properties);

        if ($template[$rowtpl])
        {
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setCacheable(false);
            $chunk->setContent($template[$rowtpl]);
            if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField]))
            {
                $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
            } else
            {
                $output[] = $chunk->process($fields);
            }
        } else
        {
            if (!empty($placeholdersKeyField))
            {
                $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            } else
            {
                $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            }
        }
    }


}


if ($toJsonPlaceholder)
{
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders))
{
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/
if (is_array($output))
{
    $o = implode($outputSeparator, $output);
} else
{
    $o = $output;
}

if (!empty($toPlaceholder))
{
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
    ),
  ),
  'be2af6a6c05f3554a11c46eb8de32a64' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxLoopCollection',
    ),
    'object' => 
    array (
      'id' => 7,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxLoopCollection',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');

$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$queries = $modx->getOption(\'queries\', $scriptProperties, \'\');
$queries = !empty($queries) ? $modx->fromJSON($queries) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = explode(\',\', $configs);
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;

$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\'); 
$joins = $modx->getOption(\'joins\', $scriptProperties, \'\');
$joins = !empty($joins) ? $modx->fromJson($joins) : false;

$selectfields = $modx->getOption(\'selectfields\', $scriptProperties, \'\');
$selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;

$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;

$debug = $modx->getOption(\'debug\', $scriptProperties, false);

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = $scriptProperties[\'classname\'];

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $classname, \'\', $selectfields));

if ($joins) {
    $migx->prepareJoins($classname, $joins, $c);
}

if (!empty($where)) {
    $c->where($where);
}

if (!empty($queries)) {
    foreach ($queries as $key => $query) {
        $c->where($query, $key);
    }

}

if (!empty($groupby)) {
    $c->groupby($groupby);
}

//set "total" placeholder for getPage
$total = $modx->getCount($classname, $c);
$modx->setPlaceholder($totalVar, $total);

if (is_array($sortConfig)) {
    foreach ($sortConfig as $sort) {
        $sortby = $sort[\'sortby\'];
        $sortdir = isset($sort[\'sortdir\']) ? $sort[\'sortdir\'] : \'ASC\';
        $c->sortby($sortby, $sortdir);
    }
}

//&limit, &offset
if (!empty($limit)) {
    $c->limit($limit, $offset);
}

if ($debug){
  $c->prepare();echo $c->toSql();
}

$template = array();

if ($collection = $modx->getCollection($classname, $c)) {
    foreach ($collection as $object) {
        $fields = $object->toArray(\'\', false, true);
        
        if (!empty($addfields)){
            foreach ($addfields as $addfield){
                $addfield = explode(\':\',$addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault; 
            }
        }
        
        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');

$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$queries = $modx->getOption(\'queries\', $scriptProperties, \'\');
$queries = !empty($queries) ? $modx->fromJSON($queries) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = explode(\',\', $configs);
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;

$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\'); 
$joins = $modx->getOption(\'joins\', $scriptProperties, \'\');
$joins = !empty($joins) ? $modx->fromJson($joins) : false;

$selectfields = $modx->getOption(\'selectfields\', $scriptProperties, \'\');
$selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;

$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;

$debug = $modx->getOption(\'debug\', $scriptProperties, false);

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = $scriptProperties[\'classname\'];

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $classname, \'\', $selectfields));

if ($joins) {
    $migx->prepareJoins($classname, $joins, $c);
}

if (!empty($where)) {
    $c->where($where);
}

if (!empty($queries)) {
    foreach ($queries as $key => $query) {
        $c->where($query, $key);
    }

}

if (!empty($groupby)) {
    $c->groupby($groupby);
}

//set "total" placeholder for getPage
$total = $modx->getCount($classname, $c);
$modx->setPlaceholder($totalVar, $total);

if (is_array($sortConfig)) {
    foreach ($sortConfig as $sort) {
        $sortby = $sort[\'sortby\'];
        $sortdir = isset($sort[\'sortdir\']) ? $sort[\'sortdir\'] : \'ASC\';
        $c->sortby($sortby, $sortdir);
    }
}

//&limit, &offset
if (!empty($limit)) {
    $c->limit($limit, $offset);
}

if ($debug){
  $c->prepare();echo $c->toSql();
}

$template = array();

if ($collection = $modx->getCollection($classname, $c)) {
    foreach ($collection as $object) {
        $fields = $object->toArray(\'\', false, true);
        
        if (!empty($addfields)){
            foreach ($addfields as $addfield){
                $addfield = explode(\':\',$addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault; 
            }
        }
        
        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
    ),
  ),
  'bd20d83c635fbc2a0c944312c342eafb' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxResourceMediaPath',
    ),
    'object' => 
    array (
      'id' => 8,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxResourceMediaPath',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * @name migxResourceMediaPath
 * @description Dynamically calculates the upload path for a given resource
 * 
 * This Snippet is meant to dynamically calculate your baseBath attribute
 * for custom Media Sources.  This is useful if you wish to shepard uploaded
 * images to a folder dedicated to a given resource.  E.g. page 123 would 
 * have its own images that page 456 could not reference.
 *
 * USAGE:
 * [[migxResourceMediaPath? &pathTpl=`assets/businesses/{id}/`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}` &breadcrumbdepth=`2`]]
 *
 * PARAMETERS
 * &pathTpl string formatting string specifying the file path. 
 *		Relative to MODX base_path
 *		Available placeholders: {id}, {pagetitle}, {parent}
 * &docid (optional) integer page id
 * &createfolder (optional) boolean whether or not to create
 */
$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$docid = $modx->getOption(\'docid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, false);
$path = \'\';
$createpath = false;

if (empty($pathTpl)) {
    $modx->log(MODX_LOG_LEVEL_ERROR, \'[migxResourceMediaPath]: pathTpl not specified.\');
    return;
}

if (empty($docid) && $modx->getPlaceholder(\'docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'docid\');
}
if (empty($docid)) {

    //on frontend
    if (is_object($modx->resource)) {
        $docid = $modx->resource->get(\'id\');
    }
    //on backend
    else {
        $createpath = $createfolder;
        // We do this to read the &id param from an Ajax request
        $parsedUrl = parse_url($_SERVER[\'HTTP_REFERER\']);
        parse_str($parsedUrl[\'query\'], $parsedQuery);

        if (isset($parsedQuery[\'amp;id\'])) {
            $docid = (int)$parsedQuery[\'amp;id\'];
        } elseif (isset($parsedQuery[\'id\'])) {
            $docid = (int)$parsedQuery[\'id\'];
        }
    }
}

if (empty($docid)) {
    $modx->log(MODX_LOG_LEVEL_ERROR, \'[migxResourceMediaPath]: docid could not be determined.\');
    return;
}

if ($resource = $modx->getObject(\'modResource\', $docid)) {
    $path = $pathTpl;
    $ultimateParent = \'\';
    if (strstr($path, \'{breadcrumb}\') || strstr($path, \'{ultimateparent}\')) {
        $parentids = $modx->getParentIds($docid);
        $breadcrumbdepth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, count($parentids));
        $breadcrumbdepth = $breadcrumbdepth > count($parentids) ? count($parentids) : $breadcrumbdepth;
        if (count($parentids) > 1) {
            $parentids = array_reverse($parentids);
            $parentids[] = $docid;
            $ultimateParent = $parentids[1];
        } else {
            $ultimateParent = $docid;
            $parentids = array();
            $parentids[] = $docid;
        }
    }

    if (strstr($path, \'{breadcrumb}\')) {
        $breadcrumbpath = \'\';
        for ($i = 1; $i <= $breadcrumbdepth; $i++) {
            $breadcrumbpath .= $parentids[$i] . \'/\';
        }
        $path = str_replace(\'{breadcrumb}\', $breadcrumbpath, $path);

    } else {
        $path = str_replace(\'{id}\', $docid, $path);
        $path = str_replace(\'{pagetitle}\', $resource->get(\'pagetitle\'), $path);
        $path = str_replace(\'{alias}\', $resource->get(\'alias\'), $path);
        $path = str_replace(\'{parent}\', $resource->get(\'parent\'), $path);
        $path = str_replace(\'{ultimateparent}\', $ultimateParent, $path);
        if ($template = $resource->getOne(\'Template\')){
            $path = str_replace(\'{templatename}\', $template->get(\'templatename\'), $path);
        }
    }

    $fullpath = $modx->getOption(\'base_path\') . $path;

    if ($createpath && !file_exists($fullpath)) {
        if (!@mkdir($fullpath, 0755, true)) {
            $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
        }
    }

    return $path;
} else {
    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: resource not found (page id %s).\', $docid));
    return;
}

/*EOF*/',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * @name migxResourceMediaPath
 * @description Dynamically calculates the upload path for a given resource
 * 
 * This Snippet is meant to dynamically calculate your baseBath attribute
 * for custom Media Sources.  This is useful if you wish to shepard uploaded
 * images to a folder dedicated to a given resource.  E.g. page 123 would 
 * have its own images that page 456 could not reference.
 *
 * USAGE:
 * [[migxResourceMediaPath? &pathTpl=`assets/businesses/{id}/`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}` &breadcrumbdepth=`2`]]
 *
 * PARAMETERS
 * &pathTpl string formatting string specifying the file path. 
 *		Relative to MODX base_path
 *		Available placeholders: {id}, {pagetitle}, {parent}
 * &docid (optional) integer page id
 * &createfolder (optional) boolean whether or not to create
 */
$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$docid = $modx->getOption(\'docid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, false);
$path = \'\';
$createpath = false;

if (empty($pathTpl)) {
    $modx->log(MODX_LOG_LEVEL_ERROR, \'[migxResourceMediaPath]: pathTpl not specified.\');
    return;
}

if (empty($docid) && $modx->getPlaceholder(\'docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'docid\');
}
if (empty($docid)) {

    //on frontend
    if (is_object($modx->resource)) {
        $docid = $modx->resource->get(\'id\');
    }
    //on backend
    else {
        $createpath = $createfolder;
        // We do this to read the &id param from an Ajax request
        $parsedUrl = parse_url($_SERVER[\'HTTP_REFERER\']);
        parse_str($parsedUrl[\'query\'], $parsedQuery);

        if (isset($parsedQuery[\'amp;id\'])) {
            $docid = (int)$parsedQuery[\'amp;id\'];
        } elseif (isset($parsedQuery[\'id\'])) {
            $docid = (int)$parsedQuery[\'id\'];
        }
    }
}

if (empty($docid)) {
    $modx->log(MODX_LOG_LEVEL_ERROR, \'[migxResourceMediaPath]: docid could not be determined.\');
    return;
}

if ($resource = $modx->getObject(\'modResource\', $docid)) {
    $path = $pathTpl;
    $ultimateParent = \'\';
    if (strstr($path, \'{breadcrumb}\') || strstr($path, \'{ultimateparent}\')) {
        $parentids = $modx->getParentIds($docid);
        $breadcrumbdepth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, count($parentids));
        $breadcrumbdepth = $breadcrumbdepth > count($parentids) ? count($parentids) : $breadcrumbdepth;
        if (count($parentids) > 1) {
            $parentids = array_reverse($parentids);
            $parentids[] = $docid;
            $ultimateParent = $parentids[1];
        } else {
            $ultimateParent = $docid;
            $parentids = array();
            $parentids[] = $docid;
        }
    }

    if (strstr($path, \'{breadcrumb}\')) {
        $breadcrumbpath = \'\';
        for ($i = 1; $i <= $breadcrumbdepth; $i++) {
            $breadcrumbpath .= $parentids[$i] . \'/\';
        }
        $path = str_replace(\'{breadcrumb}\', $breadcrumbpath, $path);

    } else {
        $path = str_replace(\'{id}\', $docid, $path);
        $path = str_replace(\'{pagetitle}\', $resource->get(\'pagetitle\'), $path);
        $path = str_replace(\'{alias}\', $resource->get(\'alias\'), $path);
        $path = str_replace(\'{parent}\', $resource->get(\'parent\'), $path);
        $path = str_replace(\'{ultimateparent}\', $ultimateParent, $path);
        if ($template = $resource->getOne(\'Template\')){
            $path = str_replace(\'{templatename}\', $template->get(\'templatename\'), $path);
        }
    }

    $fullpath = $modx->getOption(\'base_path\') . $path;

    if ($createpath && !file_exists($fullpath)) {
        if (!@mkdir($fullpath, 0755, true)) {
            $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
        }
    }

    return $path;
} else {
    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: resource not found (page id %s).\', $docid));
    return;
}

/*EOF*/',
    ),
  ),
  '6f2cd2b35361d09add1fcb6d2b05763c' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxImageUpload',
    ),
    'object' => 
    array (
      'id' => 9,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxImageUpload',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => 'return include $modx->getOption(\'core_path\').\'components/migx/model/imageupload/imageupload.php\';',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'return include $modx->getOption(\'core_path\').\'components/migx/model/imageupload/imageupload.php\';',
    ),
  ),
  '524409224b6ae55543ca24c183bd3580' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxChunklistToJson',
    ),
    'object' => 
    array (
      'id' => 10,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxChunklistToJson',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$category = $modx->getOption(\'category\', $scriptProperties, \'\');
$format = $modx->getOption(\'format\', $scriptProperties, \'json\');

$classname = \'modChunk\';
$rows = array();
$output = \'\';

$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $classname, \'\', array(\'id\', \'name\')));
$c->sortby(\'name\');

if (!empty($category)) {
    $c->where(array(\'category\' => $category));
}
//$c->prepare();echo $c->toSql();
if ($collection = $modx->getCollection($classname, $c)) {
    $i = 0;

    switch ($format) {
        case \'json\':
            foreach ($collection as $object) {
                $row[\'MIGX_id\'] = (string )$i;
                $row[\'name\'] = $object->get(\'name\');
                $row[\'selected\'] = \'0\';
                $rows[] = $row;
                $i++;
            }
            $output = $modx->toJson($rows);
            break;
        
        case \'optionlist\':
            foreach ($collection as $object) {
                $rows[] = $object->get(\'name\');
                $i++;
            }
            $output = implode(\'||\',$rows);      
        break;
            
    }


}

return $output;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$category = $modx->getOption(\'category\', $scriptProperties, \'\');
$format = $modx->getOption(\'format\', $scriptProperties, \'json\');

$classname = \'modChunk\';
$rows = array();
$output = \'\';

$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $classname, \'\', array(\'id\', \'name\')));
$c->sortby(\'name\');

if (!empty($category)) {
    $c->where(array(\'category\' => $category));
}
//$c->prepare();echo $c->toSql();
if ($collection = $modx->getCollection($classname, $c)) {
    $i = 0;

    switch ($format) {
        case \'json\':
            foreach ($collection as $object) {
                $row[\'MIGX_id\'] = (string )$i;
                $row[\'name\'] = $object->get(\'name\');
                $row[\'selected\'] = \'0\';
                $rows[] = $row;
                $i++;
            }
            $output = $modx->toJson($rows);
            break;
        
        case \'optionlist\':
            foreach ($collection as $object) {
                $rows[] = $object->get(\'name\');
                $i++;
            }
            $output = implode(\'||\',$rows);      
        break;
            
    }


}

return $output;',
    ),
  ),
  '2c3ab51977a097895880edb7d414c25a' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxSwitchDetailChunk',
    ),
    'object' => 
    array (
      'id' => 11,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxSwitchDetailChunk',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '//[[migxSwitchDetailChunk? &detailChunk=`detailChunk` &listingChunk=`listingChunk`]]


$properties[\'migx_id\'] = $modx->getOption(\'migx_id\',$_GET,\'\');

if (!empty($properties[\'migx_id\'])){
    $output = $modx->getChunk($detailChunk,$properties);
}
else{
    $output = $modx->getChunk($listingChunk);
}

return $output;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '//[[migxSwitchDetailChunk? &detailChunk=`detailChunk` &listingChunk=`listingChunk`]]


$properties[\'migx_id\'] = $modx->getOption(\'migx_id\',$_GET,\'\');

if (!empty($properties[\'migx_id\'])){
    $output = $modx->getChunk($detailChunk,$properties);
}
else{
    $output = $modx->getChunk($listingChunk);
}

return $output;',
    ),
  ),
  '280926ddd20ef87ba8893ab8179d110b' => 
  array (
    'criteria' => 
    array (
      'name' => 'getSwitchColumnCol',
    ),
    'object' => 
    array (
      'id' => 12,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getSwitchColumnCol',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$scriptProperties = $_REQUEST;
$col = \'\';
// special actions, for example the showSelector - action
$tempParams = $modx->getOption(\'tempParams\', $scriptProperties, \'\');

if (!empty($tempParams)) {
    $tempParams = $modx->fromJson($tempParams);
    $col = $modx->getOption(\'col\', $tempParams, \'\');
}

return $col;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$scriptProperties = $_REQUEST;
$col = \'\';
// special actions, for example the showSelector - action
$tempParams = $modx->getOption(\'tempParams\', $scriptProperties, \'\');

if (!empty($tempParams)) {
    $tempParams = $modx->fromJson($tempParams);
    $col = $modx->getOption(\'col\', $tempParams, \'\');
}

return $col;',
    ),
  ),
  '7fa9ff0f9e5270c997c65658ba00c415' => 
  array (
    'criteria' => 
    array (
      'name' => 'getDayliMIGXrecord',
    ),
    'object' => 
    array (
      'id' => 13,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getDayliMIGXrecord',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * getDayliMIGXrecord
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getDayliMIGXrecord is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getDayliMIGXrecord is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getDayliMIGXrecord; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getDayliMIGXrecord
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: [[!getDayliMIGXrecord? &tvname=`myTV`&tpl=`@CODE:<img src="[[+image]]"/>` &randomize=`1`]]*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = $modx->resource->get(\'context_key\');

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $properties[\'configs\'];
        $migx->loadConfigs();
        // get tabs from file or migx-config-table
        $formtabs = $migx->getTabs();
        if (empty($formtabs)) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        //$tv->setCacheable(false);
        //$outputvalue = $tv->renderOutput($docid);
        
        $tvresource = $modx->getObject(\'modTemplateVarResource\', array(
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $docid,
            ));


        $outputvalue = $tvresource->get(\'value\');
        
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);

        if (empty($outputvalue)) {
            return \'\';
        }

        $items = $modx->fromJSON($outputvalue);


        //is there an active item for the current date?
        $activedate = $modx->getOption(\'activedate\', $scriptProperties, strftime(\'%Y/%m/%d\'));
        //$activedate = $modx->getOption(\'activedate\', $_GET, strftime(\'%Y/%m/%d\'));
        $activewhere = array();
        $activewhere[\'activedate\'] = $activedate;
        $activewhere[\'activated\'] = \'1\';
        $activeitems = $migx->filterItems($activewhere, $items);

        if (count($activeitems) == 0) {

            $activeitems = array();
            // where filter
            if (is_array($where) && count($where) > 0) {
                $items = $migx->filterItems($where, $items);
            }

            $tempitems = array();
            $count = count($items);
            $emptycount = 0;
            $latestdate = $activedate;
            $nextdate = strtotime($latestdate);
            foreach ($items as $item) {
                //empty all dates and active-states which are older than today
                if (!empty($item[\'activedate\']) && $item[\'activedate\'] < $activedate) {
                    $item[\'activated\'] = \'0\';
                    $item[\'activedate\'] = \'\';
                }
                if (empty($item[\'activedate\'])) {
                    $emptycount++;
                }
                if ($item[\'activedate\'] > $latestdate) {
                    $latestdate = $item[\'activedate\'];
                    $nextdate = strtotime($latestdate) + (24 * 60 * 60);
                }
                if ($item[\'activedate\'] == $activedate) {
                    $item[\'activated\'] = \'1\';
                    $activeitems[] = $item;
                }
                $tempitems[] = $item;
            }

            //echo \'<pre>\' . print_r($tempitems, 1) . \'</pre>\';

            $items = $tempitems;


            //are there more than half of all items with empty activedates

            if ($emptycount >= $count / 2) {

                // sort items
                if (is_array($sort) && count($sort) > 0) {
                    $items = $migx->sortDbResult($items, $sort);
                }
                if (count($items) > 0) {
                    //shuffle items
                    if ($randomize) {
                        shuffle($items);
                    }
                }

                $tempitems = array();
                foreach ($items as $item) {
                    if (empty($item[\'activedate\'])) {
                        $item[\'activedate\'] = strftime(\'%Y/%m/%d\', $nextdate);
                        $nextdate = $nextdate + (24 * 60 * 60);
                        if ($item[\'activedate\'] == $activedate) {
                            $item[\'activated\'] = \'1\';
                            $activeitems[] = $item;
                        }
                    }

                    $tempitems[] = $item;
                }

                $items = $tempitems;
            }

            //$resource = $modx->getObject(\'modResource\', $docid);
            //echo $modx->toJson($items);
            $sort = \'[{"sortby":"activedate"}]\';
            $items = $migx->sortDbResult($items, $modx->fromJson($sort));

            //echo \'<pre>\' . print_r($items, 1) . \'</pre>\';

            $tv->setValue($docid, $modx->toJson($items));
            $tv->save();

        }
    }

}


$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$output = \'\';

foreach ($activeitems as $key => $item) {

    $fields = array();
    foreach ($item as $field => $value) {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field])) {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\']))) {

            } else {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }

    $rowtpl = $tpl;
    //get changing tpls from field
    if (substr($tpl, 0, 7) == "@FIELD:") {
        $tplField = substr($tpl, 7);
        $rowtpl = $fields[$tplField];
    }

    if (!isset($template[$rowtpl])) {
        if (substr($rowtpl, 0, 6) == "@FILE:") {
            $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
        } elseif (substr($rowtpl, 0, 6) == "@CODE:") {
            $template[$rowtpl] = substr($tpl, 6);
        } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true)) {
            $template[$rowtpl] = $chunk->getContent();
        } else {
            $template[$rowtpl] = false;
        }
    }

    $fields = array_merge($fields, $properties);

    if ($template[$rowtpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$rowtpl]);
        $output .= $chunk->process($fields);

    } else {
        $output .= \'<pre>\' . print_r($fields, 1) . \'</pre>\';

    }


}


if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * getDayliMIGXrecord
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getDayliMIGXrecord is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getDayliMIGXrecord is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getDayliMIGXrecord; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getDayliMIGXrecord
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: [[!getDayliMIGXrecord? &tvname=`myTV`&tpl=`@CODE:<img src="[[+image]]"/>` &randomize=`1`]]*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = $modx->resource->get(\'context_key\');

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $properties[\'configs\'];
        $migx->loadConfigs();
        // get tabs from file or migx-config-table
        $formtabs = $migx->getTabs();
        if (empty($formtabs)) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        //$tv->setCacheable(false);
        //$outputvalue = $tv->renderOutput($docid);
        
        $tvresource = $modx->getObject(\'modTemplateVarResource\', array(
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $docid,
            ));


        $outputvalue = $tvresource->get(\'value\');
        
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);

        if (empty($outputvalue)) {
            return \'\';
        }

        $items = $modx->fromJSON($outputvalue);


        //is there an active item for the current date?
        $activedate = $modx->getOption(\'activedate\', $scriptProperties, strftime(\'%Y/%m/%d\'));
        //$activedate = $modx->getOption(\'activedate\', $_GET, strftime(\'%Y/%m/%d\'));
        $activewhere = array();
        $activewhere[\'activedate\'] = $activedate;
        $activewhere[\'activated\'] = \'1\';
        $activeitems = $migx->filterItems($activewhere, $items);

        if (count($activeitems) == 0) {

            $activeitems = array();
            // where filter
            if (is_array($where) && count($where) > 0) {
                $items = $migx->filterItems($where, $items);
            }

            $tempitems = array();
            $count = count($items);
            $emptycount = 0;
            $latestdate = $activedate;
            $nextdate = strtotime($latestdate);
            foreach ($items as $item) {
                //empty all dates and active-states which are older than today
                if (!empty($item[\'activedate\']) && $item[\'activedate\'] < $activedate) {
                    $item[\'activated\'] = \'0\';
                    $item[\'activedate\'] = \'\';
                }
                if (empty($item[\'activedate\'])) {
                    $emptycount++;
                }
                if ($item[\'activedate\'] > $latestdate) {
                    $latestdate = $item[\'activedate\'];
                    $nextdate = strtotime($latestdate) + (24 * 60 * 60);
                }
                if ($item[\'activedate\'] == $activedate) {
                    $item[\'activated\'] = \'1\';
                    $activeitems[] = $item;
                }
                $tempitems[] = $item;
            }

            //echo \'<pre>\' . print_r($tempitems, 1) . \'</pre>\';

            $items = $tempitems;


            //are there more than half of all items with empty activedates

            if ($emptycount >= $count / 2) {

                // sort items
                if (is_array($sort) && count($sort) > 0) {
                    $items = $migx->sortDbResult($items, $sort);
                }
                if (count($items) > 0) {
                    //shuffle items
                    if ($randomize) {
                        shuffle($items);
                    }
                }

                $tempitems = array();
                foreach ($items as $item) {
                    if (empty($item[\'activedate\'])) {
                        $item[\'activedate\'] = strftime(\'%Y/%m/%d\', $nextdate);
                        $nextdate = $nextdate + (24 * 60 * 60);
                        if ($item[\'activedate\'] == $activedate) {
                            $item[\'activated\'] = \'1\';
                            $activeitems[] = $item;
                        }
                    }

                    $tempitems[] = $item;
                }

                $items = $tempitems;
            }

            //$resource = $modx->getObject(\'modResource\', $docid);
            //echo $modx->toJson($items);
            $sort = \'[{"sortby":"activedate"}]\';
            $items = $migx->sortDbResult($items, $modx->fromJson($sort));

            //echo \'<pre>\' . print_r($items, 1) . \'</pre>\';

            $tv->setValue($docid, $modx->toJson($items));
            $tv->save();

        }
    }

}


$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$output = \'\';

foreach ($activeitems as $key => $item) {

    $fields = array();
    foreach ($item as $field => $value) {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field])) {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\']))) {

            } else {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }

    $rowtpl = $tpl;
    //get changing tpls from field
    if (substr($tpl, 0, 7) == "@FIELD:") {
        $tplField = substr($tpl, 7);
        $rowtpl = $fields[$tplField];
    }

    if (!isset($template[$rowtpl])) {
        if (substr($rowtpl, 0, 6) == "@FILE:") {
            $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
        } elseif (substr($rowtpl, 0, 6) == "@CODE:") {
            $template[$rowtpl] = substr($tpl, 6);
        } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true)) {
            $template[$rowtpl] = $chunk->getContent();
        } else {
            $template[$rowtpl] = false;
        }
    }

    $fields = array_merge($fields, $properties);

    if ($template[$rowtpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$rowtpl]);
        $output .= $chunk->process($fields);

    } else {
        $output .= \'<pre>\' . print_r($fields, 1) . \'</pre>\';

    }


}


if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
    ),
  ),
  '403738e4715efd3f665a7b8fa093050a' => 
  array (
    'criteria' => 
    array (
      'name' => 'filterbytag',
    ),
    'object' => 
    array (
      'id' => 14,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'filterbytag',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => 'if (!is_array($subject)) {
    $subject = explode(\',\',str_replace(array(\'||\',\' \'),array(\',\',\'\'),$subject));
}

return (in_array($operand,$subject));',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'if (!is_array($subject)) {
    $subject = explode(\',\',str_replace(array(\'||\',\' \'),array(\',\',\'\'),$subject));
}

return (in_array($operand,$subject));',
    ),
  ),
  '5aa293203c31dff508966eaf522b2bb8' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxObjectMediaPath',
    ),
    'object' => 
    array (
      'id' => 15,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxObjectMediaPath',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$objectid = $modx->getOption(\'objectid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, \'1\');
$path = \'\';
$createpath = false;
if (empty($objectid) && $modx->getPlaceholder(\'objectid\')) {
    // placeholder was set by some script on frontend for example
    $objectid = $modx->getPlaceholder(\'objectid\');
}
if (empty($objectid) && isset($_REQUEST[\'object_id\'])) {
    $objectid = $_REQUEST[\'object_id\'];
}



if (empty($objectid)) {

    //set Session - var in fields.php - processor
    if (isset($_SESSION[\'migxWorkingObjectid\'])) {
        $objectid = $_SESSION[\'migxWorkingObjectid\'];
        $createpath = !empty($createfolder);
    }

}


$path = str_replace(\'{id}\', $objectid, $pathTpl);

$fullpath = $modx->getOption(\'base_path\') . $path;

if ($createpath && !file_exists($fullpath)) {
    mkdir($fullpath, 0755, true);
}

return $path;',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$objectid = $modx->getOption(\'objectid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, \'1\');
$path = \'\';
$createpath = false;
if (empty($objectid) && $modx->getPlaceholder(\'objectid\')) {
    // placeholder was set by some script on frontend for example
    $objectid = $modx->getPlaceholder(\'objectid\');
}
if (empty($objectid) && isset($_REQUEST[\'object_id\'])) {
    $objectid = $_REQUEST[\'object_id\'];
}



if (empty($objectid)) {

    //set Session - var in fields.php - processor
    if (isset($_SESSION[\'migxWorkingObjectid\'])) {
        $objectid = $_SESSION[\'migxWorkingObjectid\'];
        $createpath = !empty($createfolder);
    }

}


$path = str_replace(\'{id}\', $objectid, $pathTpl);

$fullpath = $modx->getOption(\'base_path\') . $path;

if ($createpath && !file_exists($fullpath)) {
    mkdir($fullpath, 0755, true);
}

return $path;',
    ),
  ),
  '21064c89baf3a5da32ee879b2e10f060' => 
  array (
    'criteria' => 
    array (
      'name' => 'exportMIGX2db',
    ),
    'object' => 
    array (
      'id' => 16,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'exportMIGX2db',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * exportMIGX2db
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 * 
 * Sponsored by Simon Wurster <info@wurster-medien.de>
 *
 * exportMIGX2db is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * exportMIGX2db is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * exportMIGX2db; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * exportMIGX2db
 *
 * export Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string to db-table 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*
[[!exportMIGX2db? 
&tvname=`references` 
&resources=`25` 
&packageName=`projekte`
&classname=`Projekt` 
&migx_id_field=`migx_id` 
&renamed_fields=`{"Firmen-URL":"Firmen_url","Projekt-URL":"Projekt_URL","main-image":"main_image"}`
]]
*/


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$resources = $modx->getOption(\'resources\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : \'\'));
$resources = explode(\',\', $resources);
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;
$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\');
$classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$migx_id_field = $modx->getOption(\'migx_id_field\', $scriptProperties, \'\');
$pos_field = $modx->getOption(\'pos_field\', $scriptProperties, \'\');
$renamed_fields = $modx->getOption(\'renamed_fields\', $scriptProperties, \'\');

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName .
    \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$added = 0;
$modified = 0;

foreach ($resources as $docid) {
    
    $outputvalue = \'\';
    if (count($resources)==1){
        $outputvalue = $value;    
    }
    
    if (!empty($tvname)) {
        if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

            $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        }
    }

    if (!empty($outputvalue)) {
        $renamed = !empty($renamed_fields) ? $modx->fromJson($renamed_fields) : array();

        $items = $modx->fromJSON($outputvalue);
        $pos = 1;
        $searchfields = array();
        if (is_array($items)) {
            foreach ($items as $fields) {
                $search = array();
                if (!empty($migx_id_field)) {
                    $search[$migx_id_field] = $fields[\'MIGX_id\'];
                }
                if (!empty($resource_id_field)) {
                    $search[$resource_id_field] = $docid;
                }
                if (!empty($migx_id_field) && $object = $modx->getObject($classname, $search)) {
                    $mode = \'mod\';
                } else {
                    $object = $modx->newObject($classname);
                    $object->fromArray($search);
                    $mode = \'add\';
                }
                foreach ($fields as $field => $value) {
                    $fieldname = array_key_exists($field, $renamed) ? $renamed[$field] : $field;
                    $object->set($fieldname, $value);
                }
                if (!empty($pos_field)) {
                    $object->set($pos_field,$pos) ;
                }                
                if ($object->save()) {
                    if ($mode == \'add\') {
                        $added++;
                    } else {
                        $modified++;
                    }
                }
                $pos++;
            }
            
        }
    }
}


return $added . \' rows added to db, \' . $modified . \' existing rows actualized\';',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * exportMIGX2db
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 * 
 * Sponsored by Simon Wurster <info@wurster-medien.de>
 *
 * exportMIGX2db is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * exportMIGX2db is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * exportMIGX2db; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * exportMIGX2db
 *
 * export Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string to db-table 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*
[[!exportMIGX2db? 
&tvname=`references` 
&resources=`25` 
&packageName=`projekte`
&classname=`Projekt` 
&migx_id_field=`migx_id` 
&renamed_fields=`{"Firmen-URL":"Firmen_url","Projekt-URL":"Projekt_URL","main-image":"main_image"}`
]]
*/


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$resources = $modx->getOption(\'resources\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : \'\'));
$resources = explode(\',\', $resources);
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;
$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\');
$classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$migx_id_field = $modx->getOption(\'migx_id_field\', $scriptProperties, \'\');
$pos_field = $modx->getOption(\'pos_field\', $scriptProperties, \'\');
$renamed_fields = $modx->getOption(\'renamed_fields\', $scriptProperties, \'\');

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName .
    \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$added = 0;
$modified = 0;

foreach ($resources as $docid) {
    
    $outputvalue = \'\';
    if (count($resources)==1){
        $outputvalue = $value;    
    }
    
    if (!empty($tvname)) {
        if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

            $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        }
    }

    if (!empty($outputvalue)) {
        $renamed = !empty($renamed_fields) ? $modx->fromJson($renamed_fields) : array();

        $items = $modx->fromJSON($outputvalue);
        $pos = 1;
        $searchfields = array();
        if (is_array($items)) {
            foreach ($items as $fields) {
                $search = array();
                if (!empty($migx_id_field)) {
                    $search[$migx_id_field] = $fields[\'MIGX_id\'];
                }
                if (!empty($resource_id_field)) {
                    $search[$resource_id_field] = $docid;
                }
                if (!empty($migx_id_field) && $object = $modx->getObject($classname, $search)) {
                    $mode = \'mod\';
                } else {
                    $object = $modx->newObject($classname);
                    $object->fromArray($search);
                    $mode = \'add\';
                }
                foreach ($fields as $field => $value) {
                    $fieldname = array_key_exists($field, $renamed) ? $renamed[$field] : $field;
                    $object->set($fieldname, $value);
                }
                if (!empty($pos_field)) {
                    $object->set($pos_field,$pos) ;
                }                
                if ($object->save()) {
                    if ($mode == \'add\') {
                        $added++;
                    } else {
                        $modified++;
                    }
                }
                $pos++;
            }
            
        }
    }
}


return $added . \' rows added to db, \' . $modified . \' existing rows actualized\';',
    ),
  ),
  '5b0252c72e6942e7b763e82c13dfff85' => 
  array (
    'criteria' => 
    array (
      'name' => 'preparedatewhere',
    ),
    'object' => 
    array (
      'id' => 17,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'preparedatewhere',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$name = $modx->getOption(\'name\', $scriptProperties, \'\');
$date = $modx->getOption($name . \'_date\', $_REQUEST, \'\');
$dir = str_replace(\'T\', \' \', $modx->getOption($name . \'_dir\', $_REQUEST, \'\'));

if (!empty($date) && !empty($dir) && $dir != \'all\') {
    switch ($dir) {
        case \'=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date)),
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );
            break;
        case \'>=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date))
            );
            break;
        case \'<=\':
            $where = array(
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );            
            break;

    }

    return $modx->toJson($where);
}',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$name = $modx->getOption(\'name\', $scriptProperties, \'\');
$date = $modx->getOption($name . \'_date\', $_REQUEST, \'\');
$dir = str_replace(\'T\', \' \', $modx->getOption($name . \'_dir\', $_REQUEST, \'\'));

if (!empty($date) && !empty($dir) && $dir != \'all\') {
    switch ($dir) {
        case \'=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date)),
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );
            break;
        case \'>=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date))
            );
            break;
        case \'<=\':
            $where = array(
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );            
            break;

    }

    return $modx->toJson($where);
}',
    ),
  ),
  '0763dbbef6f0370ab40ec81ff43968ef' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxJsonToPlaceholders',
    ),
    'object' => 
    array (
      'id' => 18,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxJsonToPlaceholders',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '$value = $modx->getOption(\'value\',$scriptProperties,\'\');
$prefix = $modx->getOption(\'prefix\',$scriptProperties,\'\');

//$modx->setPlaceholders($modx->fromJson($value),$prefix,\'\',true);

$values = $modx->fromJson($value);
if (is_array($values)){
    foreach ($values as $key => $value){
        $value = $value == null ? \'\' : $value;
        $modx->setPlaceholder($prefix . $key, $value);
    }
}',
      'locked' => 0,
      'properties' => '',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$value = $modx->getOption(\'value\',$scriptProperties,\'\');
$prefix = $modx->getOption(\'prefix\',$scriptProperties,\'\');

//$modx->setPlaceholders($modx->fromJson($value),$prefix,\'\',true);

$values = $modx->fromJson($value);
if (is_array($values)){
    foreach ($values as $key => $value){
        $value = $value == null ? \'\' : $value;
        $modx->setPlaceholder($prefix . $key, $value);
    }
}',
    ),
  ),
  'effde323fd849e4fc90733a618e10088' => 
  array (
    'criteria' => 
    array (
      'name' => 'MIGX',
    ),
    'object' => 
    array (
      'id' => 5,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
    ),
  ),
  '534430233e1c9557158b2b208ff80402' => 
  array (
    'criteria' => 
    array (
      'name' => 'MIGXquip',
    ),
    'object' => 
    array (
      'id' => 6,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'MIGXquip',
      'description' => '',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'plugincode' => '$quipCorePath = $modx->getOption(\'quip.core_path\', null, $modx->getOption(\'core_path\') . \'components/quip/\');
//$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name)
{

    case \'OnDocFormPrerender\':

        
        require_once $quipCorePath . \'model/quip/quip.class.php\';
        $modx->quip = new Quip($modx);

        $modx->lexicon->load(\'quip:default\');
        $quipconfig = $modx->toJson($modx->quip->config);
        
        $js = "
        Quip.config = Ext.util.JSON.decode(\'{$quipconfig}\');
        console.log(Quip);";

        //$modx->controller->addCss($assetsUrl . \'css/mgr.css\');
        $modx->controller->addJavascript($modx->quip->config[\'jsUrl\'].\'quip.js\');
        $modx->controller->addHtml(\'<script type="text/javascript">\' . $js . \'</script>\');
        break;

}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 1,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$quipCorePath = $modx->getOption(\'quip.core_path\', null, $modx->getOption(\'core_path\') . \'components/quip/\');
//$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name)
{

    case \'OnDocFormPrerender\':

        
        require_once $quipCorePath . \'model/quip/quip.class.php\';
        $modx->quip = new Quip($modx);

        $modx->lexicon->load(\'quip:default\');
        $quipconfig = $modx->toJson($modx->quip->config);
        
        $js = "
        Quip.config = Ext.util.JSON.decode(\'{$quipconfig}\');
        console.log(Quip);";

        //$modx->controller->addCss($assetsUrl . \'css/mgr.css\');
        $modx->controller->addJavascript($modx->quip->config[\'jsUrl\'].\'quip.js\');
        $modx->controller->addHtml(\'<script type="text/javascript">\' . $js . \'</script>\');
        break;

}
return;',
    ),
  ),
  '67614a800dabcf22fac882f2f815f4f7' => 
  array (
    'criteria' => 
    array (
      'namespace' => 'migx',
      'controller' => 'index',
    ),
    'object' => 
    array (
      'id' => 3,
      'namespace' => 'migx',
      'controller' => 'index',
      'haslayout' => 1,
      'lang_topics' => 'example:default',
      'assets' => '',
      'help_url' => '',
    ),
  ),
  'fbe8ff83d8d0e20f6d907ba0c26b8d1c' => 
  array (
    'criteria' => 
    array (
      'text' => 'migx',
    ),
    'object' => 
    array (
      'text' => 'migx',
      'parent' => 'components',
      'action' => 'index',
      'description' => '',
      'icon' => '',
      'menuindex' => 0,
      'params' => '&configs=packagemanager||migxconfigs||setup',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'migx',
    ),
  ),
);