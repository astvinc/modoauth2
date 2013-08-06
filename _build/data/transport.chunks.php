<?php

function getChunkContent($filename = '') {
    $o = file_get_contents($filename);
    $o = trim($o);
    return $o;
}

$chunks = array();

$chunks[0]= $modx->newObject('modChunk');
$chunks[0]->fromArray(array(
    'id' => 0,
    'name' => 'authLoginForm',
    'description' => 'Chunk that will contain the call to your desired login extra. By default we are using Login since it allows us to redirect back to authorize snippet once iuser is authenticated.',
    'snippet' => getChunkContent($sources['elements'].'chunks/login.chunk.tpl'),
    'properties' => include $sources['data'].'properties/properties.login.php'
),'',true,true);

return $chunks;