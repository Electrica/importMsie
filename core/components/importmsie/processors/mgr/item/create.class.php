<?php

class importMsieItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'importMsieItem';
    public $classKey = 'importMsieItem';
    public $languageTopics = ['importmsie'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('importmsie_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('importmsie_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'importMsieItemCreateProcessor';