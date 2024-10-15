<?php

namespace App\Model\Logic;

use Cake\Datasource\EntityInterface;
use Cake\ORM\TableRegistry;

class AppLogic
{
    protected $table;

    public function __construct($alias)
    {
        $this->table = TableRegistry::getTableLocator()->get($alias);
    }

    public function createNewEmptyEntity(): EntityInterface
    {
        return $this->table->newEmptyEntity();
    }
}