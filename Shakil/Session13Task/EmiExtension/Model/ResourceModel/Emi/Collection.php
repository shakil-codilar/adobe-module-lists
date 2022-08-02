<?php

namespace Session13Task\EmiExtension\Model\ResourceModel\Emi;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Session13Task\EmiExtension\Model\Emi as Model;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
