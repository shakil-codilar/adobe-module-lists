<?php

namespace Session6Task\RenderData\Model\ResourceModel\EmployeeOrder;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Session6Task\RenderData\Model\EmployeeOrder as Model;
use Session6Task\RenderData\Model\ResourceModel\EmployeeOrder as ResourceModel;

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
