<?php

namespace Session6Task\RenderData\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Session6Task\RenderData\Model\Employee as Model;
use Session6Task\RenderData\Model\ResourceModel\Employee as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * _construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
