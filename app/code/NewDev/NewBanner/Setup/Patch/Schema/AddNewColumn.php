<?php
namespace NewDev\NewBanner\Setup\Patch\Schema;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
class AddNewColumn implements SchemaPatchInterface{
    protected $moduleDataSetup;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->moduleDataSetup=$moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $this->moduleDataSetup->getConnection()->addColumn(
            $this->moduleDataSetup->getTable('new_banner'),
            'short_description111',
            ['type'=> Table::TYPE_TEXT,
                'length'=>255,
               'nullable'=> true,
               'comment'=> 'short_description111',
                ]

        );
        // TODO: Implement apply() method.
    }
    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
