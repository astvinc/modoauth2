<?php
use OAuth2\Request;

/**
 * Extend Request class to handle outh params stored in session
 *
 * @author vramirez
 */
class ModoAuthRequest extends Request{
    
     /**
     * Creates a new request with values from PHP's super globals and using $_SESSION to retrieve oAuth params.
     *
     * @return Request A new request
     *
     * @api
     */
    public static function createFromGlobals()
    {
        $class = __CLASS__;

        
        //Modification for modouth flow TODO: extend request class and override createFromGlobals method
        //to handle params stored in session
        
        $OAUTH_PARAMS = array();
        
        $clientKey = 'modoauth-clientid';
        $resTypeKey = 'modoauth-responsetype';
        $stateKey = 'modoauth-state';
        
        if(isset($_SESSION['modoauth'])){
            $oauthParams = $_SESSION['modoauth'];
            $OAUTH_PARAMS = array(
                "client_id"=>$oauthParams[$clientKey],
                "response_type"=>$oauthParams[$resTypeKey],
                "state"=>$oauthParams[$stateKey]
            );
        }
        
        $request = new $class(array_merge($_GET,$OAUTH_PARAMS), $_POST, array(), $_COOKIE, $_FILES, $_SERVER);

        $contentType = $request->server('CONTENT_TYPE', '');
        $requestMethod = $request->server('REQUEST_METHOD', 'GET'); 
        if (0 === strpos($contentType, 'application/x-www-form-urlencoded')
            && in_array(strtoupper($requestMethod), array('PUT', 'DELETE'))
        ) {
            parse_str($request->getContent(), $data);
            $request->request = $data;
        } elseif (0 === strpos($contentType, 'application/json')
            && in_array(strtoupper($requestMethod), array('POST', 'PUT', 'DELETE'))
        ) {
            $data = json_decode($request->getContent(), true);
            $request->request = $data;
        }
        
        return $request;
    }
}

?>
