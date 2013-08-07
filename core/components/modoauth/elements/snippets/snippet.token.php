<?php
// include our OAuth2 Server object
$defaultCorePath = $modx->getOption('core_path').'components/modoauth/';
$modaouthCorePath = $modx->getOption('modoauth.core_path',null,$defaultCorePath);

require_once $modaouthCorePath.'elements/snippets/snippet.server.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client
$server->handleTokenRequest(OAuth2_Request::createFromGlobals(), new OAuth2_Response())->send();