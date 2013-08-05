<?php

class ModoAuthHomeManagerController extends ModoAuthManagerController {
    public function process(array $scriptProperties = array()) {
 
    }
    public function getPageTitle() { return $this->modx->lexicon('modoauth'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->modoauth->config['jsUrl'].'mgr/widgets/modoauth.grid.js');
        $this->addJavascript($this->modoauth->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->modoauth->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() { return $this->modoauth->config['templatesPath'].'home.tpl'; }
}

?>
