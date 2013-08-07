<?php
// Include our OAuth2 Server object
$defaultCorePath = $modx->getOption('core_path').'components/modoauth/';
$modaouthCorePath = $modx->getOption('modoauth.core_path',null,$defaultCorePath);

require $modaouthCorePath.'elements/snippets/snippet.server.php';
require $modaouthCorePath.'model/modoauth/request.class.php';

// Read properties
$tpl = $modx->getOption('tpl', $scriptProperties);
$loginTpl = $modx->getOption('loginTpl', $scriptProperties);
$authResourceId = $modx->getOption('authResourceId', $scriptProperties);

$modx->log(modX::LOG_LEVEL_DEBUG
    , '[ModoAuth] called on page '. $modx->resource->id . ' with the following parameters: '
    .print_r($scriptProperties, true));

// Verify Inputs
if (!isset($scriptProperties['authResourceId'])) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[ModoAuth:Authorize] missing required parameters &authResourceId!');
    return;
}


//Get service
$modoauth = $modx->getService('modoauth','ModoAuth',$modaouthCorePath.'model/modoauth/',$scriptProperties);

if (!($modoauth instanceof ModoAuth)) return '';

//Creating request and response. Request is an extended class of oAuth2\Request
$request = ModoAuthRequest::createFromGlobals();
$response = new OAuth2_Response();

// validate the authorize request
if (!$server->validateAuthorizeRequest($request, $response)) {
    $response->send();
    die;
}
    
if($modx->user->isAuthenticated('web') ){

    $is_authorized = true;
    $user_id = $modx->user->get('id');
    
    $modx->log(modX::LOG_LEVEL_DEBUG, '[ModoAuth:Authorize] User is authenticated');
    
}else{
    
    //Set client credentials in $_SESSION. ModoAuthRequest will read them from $_SESSION.
    $_SESSION['modoauth']= array(
      'modoauth-clientid' => $request->query('client_id'),
      'modoauth-responsetype'=>$request->query('response_type'),
      'modoauth-state'=>$request->query('state')
    );
    
    //Prompt login form
    $tpl = isset($tpl) ? $tpl : 'login';
    $output = $modoauth->getChunk($tpl,array(
        'loginTpl'=>$loginTpl,
        'authResourceId'=>$authResourceId
    ));
    
    $modx->log(modX::LOG_LEVEL_DEBUG, '[ModoAuth:Authorize] User is not authenticated... prompting login form...');

    return $output;
   
} 

$modx->log(modX::LOG_LEVEL_DEBUG, '[ModoAuth:Authorize] Processing authorization for client:'.$request->query('client_id'));

$server->handleAuthorizeRequest($request, $response, $is_authorized, $user_id);

if ($is_authorized) {

  $response->setRedirect(302, $response->getHttpHeader('Location'));
  
  $modx->log(modX::LOG_LEVEL_DEBUG, '[ModoAuth:Authorize] Redirecting to '.$response->getHttpHeader('Location'));
   
}

$response->send();