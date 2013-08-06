<?php
// include our OAuth2 Server object
$defaultCorePath = $modx->getOption('core_path').'components/modoauth/';
$modaouthCorePath = $modx->getOption('modoauth.core_path',null,$defaultCorePath);

require_once $modaouthCorePath.'elements/snippets/snippet.server.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}

//Return profile resource
$token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
$userId = $token['user_id'];

if (empty($userId)){
    
    echo json_encode(array('success' => false, 'message' => 'There is no user id associated with this token'));
    
}else{
    $user = $modx->getObject('modUser',$userId);
    $profile = $user->getOne('Profile');

    if($user && $profile){

        $data = array(
            "username"=>$user->get('username'),
            "active"=>$user->get('active'),
            "fullname"=>$profile->get('fullname'),
            "email"=>$profile->get('email'),
            "gender"=>$profile->get('gender'),
            "dob"=>$profile->get('dob'),
            "extended"=>$profile->get('extended')
        );

        echo json_encode(array('success' => true, 'profile'=>$data));

    }else{

        echo json_encode(array('success' => false, 'message' => 'Profile data could not be retrieved'));

    }
}