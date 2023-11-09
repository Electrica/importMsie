<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/importMsie/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/importmsie')) {
            $cache->deleteTree(
                $dev . 'assets/components/importmsie/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/importmsie/', $dev . 'assets/components/importmsie');
        }
        if (!is_link($dev . 'core/components/importmsie')) {
            $cache->deleteTree(
                $dev . 'core/components/importmsie/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/importmsie/', $dev . 'core/components/importmsie');
        }
    }
}

return true;