<?php
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = trim(str_replace(array('<?php','?>'),'',$o));
    return $o;
}
$snippets = array();
 
$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 2,
    'name' => 'Authorize',
    'description' => 'Grants Authorization Code.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.authorize.php'),
),'',true,true);
$properties = include $sources['data'].'properties/properties.authorize.php';
$snippets[1]->setProperties($properties);
unset($properties);


$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'Token',
    'description' => 'Grants Token.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.token.php'),
),'',true,true);
$properties = include $sources['data'].'properties/properties.token.php';
$snippets[2]->setProperties($properties);
unset($properties);

$snippets[3]= $modx->newObject('modSnippet');
$snippets[3]->fromArray(array(
    'id' => 3,
    'name' => 'Resource',
    'description' => 'Grants Resources.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.resource.php'),
),'',true,true);
$properties = include $sources['data'].'properties/properties.resource.php';
$snippets[3]->setProperties($properties);
unset($properties);


 
return $snippets;
