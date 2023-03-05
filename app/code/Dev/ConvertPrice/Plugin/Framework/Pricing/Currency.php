<?php
namespace Dev\ConvertPrice\Plugin\Framework\Pricing;

class Currency {
    protected $priceDecimalHelperData;

    public function __construct(
        \Dev\ConvertPrice\Helper\Data $priceDecimalHelperData
    )
        {
            $this->priceDecimalHelperData = $priceDecimalHelperData;
        }

    public function beforeToCurrency(
        \Magento\Framework\CurrencyInterface $subject, ...$args
    )
    {
        if ($this->priceDecimalHelperData->isEnable()) {
            if ($this->priceDecimalHelperData->showDecimal()) {
                $args[1]['precision'] = $this->priceDecimalHelperData->getDecimalLength();
            } else {
                $args[1]['precision'] = 0;
            }
        }

        return $args;
    }
}
