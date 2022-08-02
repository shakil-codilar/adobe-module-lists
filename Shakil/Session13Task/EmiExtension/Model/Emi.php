<?php

namespace Session13Task\EmiExtension\Model;

use Magento\Framework\Model\AbstractModel;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;

class Emi extends AbstractModel
{
    /**
     * Construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }
}
