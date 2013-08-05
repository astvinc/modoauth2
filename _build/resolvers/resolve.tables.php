<?php
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('modoauth.core_path',null,$modx->getOption('core_path').'components/modoauth/').'model/';
            $modx->addPackage('modoauth',$modelPath);
 
            $manager = $modx->getManager();
 
            $manager->createObjectContainer('Clients');
            $manager->createObjectContainer('Tokens');
            $manager->createObjectContainer('AuthCodes');
            $manager->createObjectContainer('RefreshTokens');
 
            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;
