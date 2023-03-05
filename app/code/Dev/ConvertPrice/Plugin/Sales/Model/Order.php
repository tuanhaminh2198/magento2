<?php

namespace Dev\ConvertPrice\Plugin\Sales\Model;

class Order
{
    /**
     * @var \Dev\ConvertPrice\Helper\Data
     */
    protected $priceDecimalHelperData;

    /**
     * @param \Dev\ConvertPrice\Helper\Data $priceDecimalHelperData
     */
    public function __construct(
        \Dev\ConvertPrice\Helper\Data $priceDecimalHelperData
    ) {
        $this->priceDecimalHelperData = $priceDecimalHelperData;
    }

    /**
     * @param \Magento\Sales\Model\Order $subject
     * @param array ...$args
     * @return array
     */
    public function beforeFormatPricePrecision(
        \Magento\Sales\Model\Order $subject,
                                   ...$args
    ) {
        if ($this->priceDecimalHelperData->isEnable()) {
            if ($this->priceDecimalHelperData->showDecimal()) {
                //change the precision
                $args[1] = $this->priceDecimalHelperData->getDecimalLength();
            } else {
                $args[1] = 0;
            }
        }
        return $args;
    }
}
