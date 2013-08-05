<?php
//Get this from modx
$dsn      = 'mysql:dbname=modx;host=localhost';
$username = 'root';
$password = 'root';



// error reporting (this is a demo, after all!)
ini_set('display_errors',1);error_reporting(E_ALL);

// Autoloading (composer is preferred, but for this example let's just do this)
require 'vendor/autoload.php';
OAuth2\Autoloader::register();

// $dsn is the Data Source Name for your database, for exmaple "mysql:dbname=my_oauth2_db;host=localhost"
$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password),
    array(    
    'client_table' => 'modx_oauth_clients',
    'access_token_table' => 'modx_oauth_access_tokens',
    'refresh_token_table' => 'modx_oauth_refresh_tokens',
    'code_table' => 'modx_oauth_authorization_codes',
    'user_table' => 'modx_users'
    )
);


// Pass a storage object or array of storage objects to the OAuth2 server class
$server = new OAuth2\Server($storage, array('enforce_state' => false));

// Add the "Client Credentials" grant type (it is the simplest of the grant types)
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));

// Add the "Authorization Code" grant type (this is where the oauth magic happens)
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));

// configure your available scopes
$defaultScope = 'basic';
$supportedScopes = array(
  'basic',
  'postonwall',
  'accessphonenumber'
);
$memory = new OAuth2\Storage\Memory(array(
  'default_scope' => $defaultScope,
  'supported_scopes' => $supportedScopes
));
$scopeUtil = new OAuth2\Scope($memory);

$server->setScopeUtil($scopeUtil);