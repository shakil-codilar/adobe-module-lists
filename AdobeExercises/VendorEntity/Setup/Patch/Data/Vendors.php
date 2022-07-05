<?php
namespace Unit4\VendorEntity\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class Vendors implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected ModuleDataSetupInterface $moduleDataSetup;

    /**
     * Vendors constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Apply function
     *
     * @return void
     */
    public function apply(): void
    {
        $this->moduleDataSetup->startSetup();

        $this->moduleDataSetup->getConnection()->insert(
            'vendor_entity',
            [
                'name'    => 'Shakil',
                'contact' => '8777768145',
                'active'     => 'yes'
            ]
        );

        $this->moduleDataSetup->endSetup();
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
