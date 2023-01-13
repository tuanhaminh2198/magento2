<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Product description block
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace Dev\ProductContent\Block;

use Magento\Catalog\Model\Product;
use Dev\ProductContent\Model\ResourceModel\Post\CollectionFactory;
/**
 * @api
 * @since 100.0.2
 */
class ProductPosition extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Product
     */
    protected $_product = null;
    protected $producContentCollectionFactory;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        CollectionFactory $producContentCollectionFactory,
        array $data = []
    ) {
        $this->_productCollection = $productCollection;
        $this->_coreRegistry = $registry;
        $this->producContentCollectionFactory=$producContentCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        if (!$this->_product) {
            $this->_product = $this->_coreRegistry->registry('product');
        }
        return $this->_product;
    }
    public function getPosition(){
        $collection = $this->producContentCollectionFactory->create();
        $id= $this->_request->getParam('id');
        $data = $collection->addFieldToFilter('status', 1)
            ->addFieldToFilter('product_id',$id)
            ->getData();

        return $data;
    }
}
