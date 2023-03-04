<?php
namespace Dev\CheckQty\Block;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
class Stock extends Template
{
    protected $registry;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        StockRegistryInterface $stockRegistry,
        array $data = []
    )
    {
        $this->registry = $registry;
        $this->stockRegistry = $stockRegistry;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getCurrentProductQty()
    {
        $productId= $this->registry->registry('current_product');
        $productQty=$this->stockRegistry->getStockItem($productId->getId());
        return $productQty->getQty();
    }
}

?>
