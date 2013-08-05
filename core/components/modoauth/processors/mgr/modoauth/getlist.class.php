<?php

class ClientsGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'Clients';
    public $languageTopics = array('modoauth:default');
    public $defaultSortField = 'client_id';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'modoauth.client';
}
return 'ClientsGetListProcessor'
?>
