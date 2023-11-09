importMsie.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'importmsie-item-window-create';
    }
    console.log(importMsie.config.connector_url)
    Ext.applyIf(config, {
        title: _('importmsie_item_create'),
        width: 550,
        autoHeight: true,
        url: importMsie.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        fileUpload: true,
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    importMsie.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(importMsie.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'fileuploadfield',
            fieldLabel: "Выберите CSV",
            name: 'csv',
            id: config.id + '-csv',
            anchor: '99%',
            allowBlank: false,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('importmsie-item-window-create', importMsie.window.CreateItem);