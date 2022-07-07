<?php

namespace Session6Task\RenderData\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb
{

    public const TABLE_NAME = 'adobe_employee';
    public const ID_FIELD_NAME = 'entity_id';

    /**
     * _construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
