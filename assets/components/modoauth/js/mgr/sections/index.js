Ext.onReady(function() {
    MODx.load({ xtype: 'modoauth-page-home'});
});
 
ModoAuth.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'modoauth-panel-home'
            ,renderTo: 'modoauth-panel-home-div'
        }]
    });
    ModoAuth.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(ModoAuth.page.Home,MODx.Component);
Ext.reg('modoauth-page-home',ModoAuth.page.Home);


