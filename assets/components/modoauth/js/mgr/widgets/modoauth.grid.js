ModoAuth.grid.ModoAuth = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'modoauth-grid-modoauth'
        ,url: ModoAuth.config.connectorUrl
        ,baseParams: { action: 'mgr/modoauth/getList' }
        ,fields: ['id','name','description','menu']
        ,paging: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: _('modoauth.name')
            ,dataIndex: 'name'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('modoauth.description')
            ,dataIndex: 'description'
            ,sortable: false
            ,width: 350
            ,editor: { xtype: 'textfield' }
        }]
    });
    ModoAuth.grid.ModoAuth.superclass.constructor.call(this,config)
};
Ext.extend(ModoAuth.grid.ModoAuth,MODx.grid.Grid);
Ext.reg('modoauth-grid-modoauth',ModoAuth.grid.ModoAuth);
