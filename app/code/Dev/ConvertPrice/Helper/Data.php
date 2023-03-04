<?php
namespace Dev\ConvertPrice\Helper;

class Data extends  \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_DEV_CONVERTPRICE_ENABLE='convert_price/general/enable';
    const XML_PATH_DEV_CONVERTPRICE_SHOW_DECIMAL='convert_price/general/show_decimal';
    const XML_PATH_DEV_CONVERTPRICE_DECIMAL_LENGTH='convert_price/general/decimal_length';

    public function isEnable(){
            return $this ->scopeConfig->isSetFlag(
                self::XML_PATH_DEV_CONVERTPRICE_ENABLE,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function showDecimal()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_DEV_CONVERTPRICE_SHOW_DECIMAL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getDecimalLength()
    {
        return intval($this->scopeConfig->getValue(
            self::XML_PATH_DEV_CONVERTPRICE_DECIMAL_LENGTH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
    }



}

