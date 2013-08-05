/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var ModoAuth = function(config) {
    config = config || {};
    ModoAuth.superclass.constructor.call(this,config);
};
Ext.extend(ModoAuth,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('modoauth',ModoAuth);
ModoAuth = new ModoAuth();