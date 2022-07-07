<?php

namespace Session6Task\RenderData\Model;

use Magento\Framework\Model\AbstractModel;
use Session6Task\RenderData\Model\ResourceModel\Employee as ResourceModel;

class Employee extends AbstractModel
{
    /**
     * _construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }
}
