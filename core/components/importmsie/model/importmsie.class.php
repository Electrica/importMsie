<?php

class importMsie
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/importmsie/';
        $assetsUrl = MODX_ASSETS_URL . 'components/importmsie/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('importmsie', $this->config['modelPath']);
        $this->modx->lexicon->load('importmsie:default');
    }

    public function loadJsCss(){
        $this->modx->controller->addJavascript($this->config['jsUrl'].'mgr/importmsie.js');
        $this->modx->controller->addJavascript($this->config['jsUrl'].'mgr/widgets/items.windows.js');

        $this->modx->controller->addHtml('<script type="text/javascript">
            importMsie.config = ' . json_encode($this->config) . ';
            importMsie.config.connector_url = "' . $this->config['connectorUrl'] . '";
        </script>
        ');
    }

}