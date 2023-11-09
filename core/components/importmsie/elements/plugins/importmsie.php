<?php
/** @var modX $modx */
switch ($modx->event->name) {
    case 'OnManagerPageBeforeRender':
        $importMsie = $modx->getService('importMsie', 'importMsie', MODX_CORE_PATH . 'components/importmsie/model/');
        $importMsie->loadJsCss();
        break;
}