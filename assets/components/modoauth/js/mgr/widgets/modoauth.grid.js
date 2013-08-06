ModoAuth.grid.ModoAuth = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'modoauth-grid-modoauth'
        ,url: ModoAuth.config.connectorUrl
        ,baseParams: { action: 'mgr/modoauth/getList' }
        ,fields: ['client_id','client_secret','redirect_uri']
        ,paging: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [{
            header: _('modoauth.client.id')
            ,dataIndex: 'client_id'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('modoauth.client.secret')
            ,dataIndex: 'client_secret'
            ,sortable: false
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('modoauth.client.redirect')
            ,dataIndex: 'redirect_uri'
            ,sortable: false
            ,width: 350
            ,editor: { xtype: 'textfield' }
        }
    ]
    });
    ModoAuth.grid.ModoAuth.superclass.constructor.call(this,config)
};
Ext.extend(ModoAuth.grid.ModoAuth,MODx.grid.Grid);
Ext.reg('modoauth-grid-modoauth',ModoAuth.grid.ModoAuth);
