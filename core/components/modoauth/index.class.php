<?php

require_once dirname(__FILE__) . '/model/modoauth/modoauth.class.php';
abstract class ModoAuthManagerController extends modExtraManagerController {
    /** @var ModoAuth modoauth */
    public $modoauth;
    public function initialize() {
        $this->modoauth = new ModoAuth($this->modx);
 
        $this->addCss($this->modoauth->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->modoauth->config['jsUrl'].'mgr/modoauth.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            ModoAuth.config = '.$this->modx->toJSON($this->modoauth->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('modoauth:default');
    }
    public function checkPermissions() { return true;}
}
class IndexManagerController extends ModoAuthManagerController {
    public static function getDefaultController() { return 'home'; }
}

?>
