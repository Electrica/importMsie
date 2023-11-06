importMsie.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'importmsie-panel-home',
            renderTo: 'importmsie-panel-home-div'
        }]
    });
    importMsie.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(importMsie.page.Home, MODx.Component);
Ext.reg('importmsie-page-home', importMsie.page.Home);