<?php

namespace Session6Task\RenderData\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Session6Task\RenderData\Model\ResourceModel\EmployeeOrder as ResourceModel;

class EmployeeOrder extends AbstractExtensibleModel
{
    /**
     * _construct
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
