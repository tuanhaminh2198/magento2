<?php
namespace NewDev\NewBanner\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddnewAttribute implements DataPatchInterface
{
    private $moduleDataSetup;
    private $eavSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory

    )
{
    $this->moduleDataSetup=$moduleDataSetup;
    $this->eavSetupFactory =$eavSetupFactory;
}
public function apply()
{
    // TODO: Implement apply() method.
    $eavSetup = $this->eavSetupFactory->create(['setup'=>$this->moduleDataSetup]);
    $eavSetup -> addAttribute('catalog_product','custom_description231sd',
        [
            'type' => 'int',
            'label' => 'Custom Descripton 231sd',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'default' => 0,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'visible' => true,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'required' => false,
            'group' => 'General',
            'sort_order' => 80,


        ]);

}
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

}
