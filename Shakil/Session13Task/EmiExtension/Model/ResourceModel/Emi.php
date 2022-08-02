<?php

namespace Session13Task\EmiExtension\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Emi extends AbstractDb
{
    public const TABLE_NAME = 'adobe_emi';
    public const ID_FIELD_NAME = 'emi_id';

    /**
     * Construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
