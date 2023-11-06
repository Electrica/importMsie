<?php

/**
 * The home manager controller for importMsie.
 *
 */
class importMsieHomeManagerController extends modExtraManagerController
{
    /** @var importMsie $importMsie */
    public $importMsie;


    /**
     *
     */
    public function initialize()
    {
        $this->importMsie = $this->modx->getService('importMsie', 'importMsie', MODX_CORE_PATH . 'components/importmsie/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['importmsie:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('importmsie');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->importMsie->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/importmsie.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->importMsie->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        importMsie.config = ' . json_encode($this->importMsie->config) . ';
        importMsie.config.connector_url = "' . $this->importMsie->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "importmsie-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="importmsie-panel-home-div"></div>';

        return '';
    }
}