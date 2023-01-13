<?php

namespace Dev\FSShipping\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;

class Express extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    protected $_code = 'express';
    protected $_isFixed = true;
    protected $_rateResultFactory;
    protected $_productCollection;

    protected $_rateMethodFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection,
        \Magento\Framework\App\Config\ScopeConfigInterface          $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory  $rateErrorFactory,
        \Psr\Log\LoggerInterface                                    $logger,
        \Magento\Shipping\Model\Rate\ResultFactory                  $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array                                                       $data = []
    )
    {
        $this->_productCollection = $productCollection;
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    private function isFreeShippingRequired(RateRequest $request): bool
    {
        $minSubtotal = $request->getPackageValueWithDiscount();
        if ($request->getBaseSubtotalWithDiscountInclTax() ) {
            $minSubtotal = $request->getBaseSubtotalWithDiscountInclTax();
        }
        return $minSubtotal >= $this->getConfigData('freeshippingtotal');
    }

    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');
        $subTotal = $cart->getQuote()->getSubtotal();
        $items = $cart->getQuote()->getItems();
        $productId = [];

        foreach ($items as $item) {
                $productId[] = $item->getProductId();
        }
        $productCollections = [];
        foreach ($productId as $id) {
            $productCollections[] = $this->_productCollection->create()->addAttributeToFilter('entity_id', $id)->addAttributeToSelect('free_shipping', 'catalog_product_entity_int')->getData();
        }
        $productFreeShipping = false;
        foreach ($productCollections as $product) {
            if (!empty($product)) {
                if ($product[0]['free_shipping'] == 1) {
                    $productFreeShipping = true;
                }
            }
        }
        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->_rateResultFactory->create();

        $this->_updateFreeMethodQuote($request);
        if ($subTotal>=$this->getConfigData('freeshippingtotal') || $productFreeShipping ) {
            $method = $this->_rateMethodFactory->create();
            $method->setCarrier('express');
            $method->setCarrierTitle($this->getConfigData('title'));
            $method->setMethod('express');
            $method->setMethodTitle($this->getConfigData('name'));
            $method->setPrice('0.00');
            $method->setCost('0.00');
            $result->append($method);
        }
         else{
             $result = $this->_rateResultFactory->create();
             $method = $this->_rateMethodFactory->create();
             $method->setCarrier('express');
             $method->setCarrierTitle($this->getConfigData('title'));
             $method->setMethod('express');
             $method->setMethodTitle($this->getConfigData('name'));
             $amount = $this->getConfigData('price');
             $method->setPrice($amount);
             $method->setCost($amount);
             $result->append($method);
         }
        return $result;
    }

    public function getAllowedMethods()
    {
        return ['express' => $this->getConfigData('name')];
    }
}

