<?php
$defaultCorePath = $modx->getOption('core_path').'components/modoauth/';

$modaouthCorePath = $modx->getOption('modoauth.core_path',null,$defaultCorePath);

$modauth = $modx->getService('modoauth','ModoAuth',$modaouthCorePath.'model/modoauth/',$scriptProperties);


if (!($modauth instanceof ModoAuth)) return '';


/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rowTpl');
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');
 
$output = '';

//$m = $modx->getManager();
//$created = $m->createObjectContainer('Clients');
//echo $created ? 'Table created.' : 'Table not created.';
//$created = $m->createObjectContainer('Tokens');
//echo $created ? 'Table created.' : 'Table not created.';
//$created = $m->createObjectContainer('AuthCodes');
//echo $created ? 'Table created.' : 'Table not created.';
//$created = $m->createObjectContainer('RefreshTokens');
//echo $created ? 'Table created.' : 'Table not created.';


//// include our OAuth2 Server object
//require_once $modx->getOption('modoauth.core_path',null,$defaultCorePath.'components/oauth2/').'elements/snippets/snippet.server.php';
//
//// Handle a request for an OAuth2.0 Access Token and send the response to the client
//$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();


// include our OAuth2 Server object
require_once $modx->getOption('modoauth.core_path',null,$defaultCorePath.'components/oauth2/').'elements/snippets/snippet.server.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}
echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));

return $output;