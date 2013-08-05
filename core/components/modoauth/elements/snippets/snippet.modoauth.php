<?php
// include our OAuth2 Server object
$defaultCorePath = $modx->getOption('core_path').'components/modoauth/';
$modaouthCorePath = $modx->getOption('modoauth.core_path',null,$defaultCorePath);

require $modaouthCorePath.'elements/snippets/snippet.server.php';
require $modaouthCorePath.'model/modoauth/request.class.php';

$modoauth = $modx->getService('modoauth','ModoAuth',$modaouthCorePath.'model/modoauth/',$scriptProperties);


if (!($modoauth instanceof ModoAuth)) return '';


$request = ModoAuthRequest::createFromGlobals();
$response = new OAuth2\Response();

// validate the authorize request
if (!$server->validateAuthorizeRequest($request, $response)) {
    $response->send();
    die;
}
    
if($modx->user->isAuthenticated('web') ){

    $is_authorized = true;
    $user_id = $modx->user->get('id');
    
    error_log('ModoAuth: User is authenticated');
    
}else{
    
    $_SESSION['modoauth']= array(
      'modoauth-clientid' => $request->query('client_id'),
      'modoauth-responsetype'=>$request->query('response_type'),
      'modoauth-state'=>$request->query('state')
    );
    
    $output = $modoauth->getChunk('login',array(
        'modoAuthLoginTpl'=>'oAuthLoginTpl',
        'modoAuthLoginResourceId'=>'7'
    ));
    
    error_log('ModoAuth: User is not authenticated... prompting login...');
    
    return $output;
   
} 

error_log('ModoAuth: Processing authorization for client:'.$request->query('client_id'));

$server->handleAuthorizeRequest($request, $response, $is_authorized, $user_id);

if ($is_authorized) {

  $response->setRedirect(302, $response->getHttpHeader('Location'));
  
  error_log('ModoAuth: Redirecting to '.$response->getHttpHeader('Location'));
   
}

$response->send();