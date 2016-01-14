$tpl = $modx->getOption('tpl', $scriptProperties, '');
$wrapperTpl = $modx->getOption('wrapperTpl', $scriptProperties, '');
$limit = $modx->getOption('limit', $scriptProperties, '0');
$offset = $modx->getOption('offset', $scriptProperties, 0);
$totalVar = $modx->getOption('totalVar', $scriptProperties, 'total');

$where = $modx->getOption('where', $scriptProperties, '');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$queries = $modx->getOption('queries', $scriptProperties, '');
$queries = !empty($queries) ? $modx->fromJSON($queries) : array();
$sortConfig = $modx->getOption('sortConfig', $scriptProperties, '');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption('configs', $scriptProperties, '');
$configs = explode(',', $configs);
$toSeparatePlaceholders = $modx->getOption('toSeparatePlaceholders', $scriptProperties, false);
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, '');
//$placeholdersKeyField = $modx->getOption('placeholdersKeyField', $scriptProperties, 'MIGX_id');
$placeholdersKeyField = $modx->getOption('placeholdersKeyField', $scriptProperties, 'id');
$toJsonPlaceholder = $modx->getOption('toJsonPlaceholder', $scriptProperties, false);
$jsonVarKey = $modx->getOption('jsonVarKey', $scriptProperties, 'migx_outputvalue');
$prefix = isset($scriptProperties['prefix']) ? $scriptProperties['prefix'] : null;

$packageName = $modx->getOption('packageName', $scriptProperties, ''); 
$joins = $modx->getOption('joins', $scriptProperties, '');
$joins = !empty($joins) ? $modx->fromJson($joins) : false;

$selectfields = $modx->getOption('selectfields', $scriptProperties, '');
$selectfields = !empty($selectfields) ? explode(',', $selectfields) : null;

$addfields = $modx->getOption('addfields', $scriptProperties, '');
$addfields = !empty($addfields) ? explode(',', $addfields) : null;

$debug = $modx->getOption('debug', $scriptProperties, false);

$packagepath = $modx->getOption('core_path') . 'components/' . $packageName . '/';
$modelpath = $packagepath . 'model/';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = $scriptProperties['classname'];

$base_path = $modx->getOption('base_path', null, MODX_BASE_PATH);
$base_url = $modx->getOption('base_url', null, MODX_BASE_URL);

$migx = $modx->getService('migx', 'Migx', $modx->getOption('migx.core_path', null, $modx->getOption('core_path') . 'components/migx/') . 'model/migx/', $scriptProperties);
if (!($migx instanceof Migx))
    return '';
//$modx->migx = &$migx;
$defaultcontext = 'web';
$migx->working_context = isset($modx->resource) ? $modx->resource->get('context_key') : $defaultcontext;

$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties['property.' . $property] = $value;
}

$idx = 0;
$output = array();
$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $classname, '', $selectfields));

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
        $sortby = $sort['sortby'];
        $sortdir = isset($sort['sortdir']) ? $sort['sortdir'] : 'ASC';
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
        $fields = $object->toArray('', false, true);
        
        if (!empty($addfields)){
            foreach ($addfields as $addfield){
                $addfield = explode(':',$addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : '';
                $fields[$addname] = $adddefault; 
            }
        }
        
        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields['_alt'] = $idx % 2;
            $idx++;
            $fields['_first'] = $idx == 1 ? true : '';
            $fields['_last'] = $idx == $limit ? true : '';
            $fields['idx'] = $idx;
            $rowtpl = '';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields['_first'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields['_last'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = 'tpl_' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = 'tpl_n' . $divisor;
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
                $fields['_tpl'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject('modChunk');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = '<pre>' . print_r($fields, 1) . '</pre>';
                } else {
                    $output[] = '<pre>' . print_r($fields, 1) . '</pre>';
                }
            }
        }


    }
}

if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return '';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return '';
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject('modChunk');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties['output'] = $o;
        $o = $chunk->process($properties);
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return '';
}

return $o;