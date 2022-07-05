<?php
namespace Unit4\VendorEntity\Setup\Patch\Schema;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class VendorColumn implements SchemaPatchInterface
{
    /**
     * @var SchemaSetupInterface;
     */
    protected $moduleSchemaSetup;

    /**
     * VendorColumn constructor.
     * @param SchemaSetupInterface $moduleSchemaSetup
     */
    public function __construct(SchemaSetupInterface $moduleSchemaSetup)
    {
        $this->moduleSchemaSetup = $moduleSchemaSetup;
    }

    /**
     * Apply function
     *
     * @return void
     */
    public function apply(): void
    {
        $this->moduleSchemaSetup->startSetup();

        $this->moduleSchemaSetup->getConnection()->addColumn(
            'vendor_entity',
            'active',
            [
                'type' => Table::TYPE_TEXT,
                'length' => 64,
                'unsigned' => true,
                'nullable' => false,
                'comment' => 'Vendor active or inactive'
            ]
        );

        $this->moduleSchemaSetup->endSetup();
    }

    /**
     * GetDependencies function to check whether its dependent on other module
     *
     * @return array|string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * GetAliases
     *
     * @return array|string[]
     */
    public function getAliases(): array
    {
        return [];
    }
}
