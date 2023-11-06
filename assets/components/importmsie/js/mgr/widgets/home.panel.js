importMsie.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'importmsie-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('importmsie') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('importmsie_items'),
                layout: 'anchor',
                items: [{
                    html: _('importmsie_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'importmsie-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    importMsie.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(importMsie.panel.Home, MODx.Panel);
Ext.reg('importmsie-panel-home', importMsie.panel.Home);
