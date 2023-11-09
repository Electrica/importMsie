<?php

class importMsieItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'importMsieItem';
    public $classKey = 'importMsieItem';
    public $languageTopics = ['importmsie'];
    public $file = null;
    public $sql = null;
    //public $permission = 'create';

    public function process()
    {
        $this->beforeSet();
        $this->prepareSql();

        return $this->success('Импорт удался');
    }

    public function beforeSet()
    {
        $files = $_FILES;
        if (empty($files)){
            return $this->failure('Загрузите файл CSV');
        }
        $dir = MODX_ASSETS_PATH . 'components/importmsie/files/';

        if(!is_dir($dir)){
            mkdir($dir);
        }
        $cache = $this->modx->getCacheManager();

        //@TODO Сделать проверку на расширение csv
        $name = str_replace(' ', '_', $files['csv']['name']);
        if(!$cache->copyFile($files['csv']['tmp_name'], $dir.$name)){
            return $this->failure('Не удалось загрузить файл');
        }
        $this->file = $dir.$name;

        return false;
    }

    protected function getArrayFromCsv()
    {
        $array = [];
        $file = fopen($this->file, 'r');
        while (($line = fgetcsv($file, 0, ';')) !== FALSE) {
            $array[] = $line;
        }
        fclose($file);
        return $array;
    }

    protected function prepareSql(){
        /**
         * 0] => PMST
            [1] => PMST58104 (артикул модификации)
            [2] => Матрас PROMATRAS Стандарт 58х104х16
            [3] => 33628 (цена)
            [4] => 58х104
         *
         */
        $sql = [];
        $array = $this->getArrayFromCsv();
        $prefix = $this->modx->getOption('table_prefix');
        foreach ($array as $item) {
            $sql = "UPDATE {$prefix}msop_modifications SET `price`={$item['3']} WHERE `article`='{$item['1']}';";
            $this->modx->exec($sql);
        }
    }

    protected function _log($line = '', $error = 1)
    {
        $this->modx->log($error, print_r($line, 1));
    }
}

return 'importMsieItemCreateProcessor';