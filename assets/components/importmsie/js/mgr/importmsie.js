var importMsie = function (config) {
    config = config || {};
    importMsie.superclass.constructor.call(this, config);
};
Ext.extend(importMsie, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('importmsie', importMsie);

importMsie = new importMsie();