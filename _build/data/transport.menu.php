<?php
$action= $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => 'modoauth',
    'parent' => 0,
    'controller' => 'index',
    'haslayout' => true,
    'lang_topics' => 'modoauth:default',
    'assets' => '',
),'',true,true);
 
$menu= $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'modoauth',
    'parent' => 'components',
    'description' => 'modoauth.desc',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
),'',true,true);
$menu->addOne($action);
unset($menus);
 
return $menu;