var importMsie = function (config) {
    config = config || {};
    importMsie.superclass.constructor.call(this, config);
};
Ext.extend(importMsie, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('importmsie', importMsie);

importMsie = new importMsie();

function getFields() {
    return [{
        xtype: 'fileuploadfield',
        fieldLabel: 'CSV файл',
        name: 'csv',
        anchor: '99%',
        allowBlank: false,
    }, ];
}


function getForm(){

    var console = MODx.load({
        xtype: 'importmsie-item-window-create',
    });
    console.show(Ext.getBody());

    // var console = MODx.load({
    //     xtype: 'modx-window',
    //     fields: getFields()
    //     ,listeners: {
    //         'shutdown': {fn:function() {
    //                 /* выполнить код здесь, когда вы закроете консоль */
    //             },scope:this},
    //
    //         'error':{fn:function() {
    //                 reqId++;
    //             },scope:this}
    //     }
    // });
    // console.show(Ext.getBody());
}




Ext.onReady(function() {
    var usermenuUl = document.getElementById("modx-user-menu"),
        firstLi = usermenuUl.firstChild,
        simpleUpdaterLi = document.createElement("LI");

    simpleUpdaterLi.innerHTML = "<span id=\"simpleupdater-link\" class=\"x-btn x-btn-small primary-button\" onclick=\"getForm()\" style=\"margin-top: 10px;\">Обновить цены</span>";
    usermenuUl.insertBefore(simpleUpdaterLi, firstLi);



});