<?php
namespace Dev\ConvertPrice\Plugin\Framework\Pricing\Local;
class Format{
    protected  $priceDecimalHelperData;

    public function __construct(
        \Dev\ConvertPrice\Helper\Data $priceDecimalHelperData

    )
    {
        $this->priceDecimalHelperData = $priceDecimalHelperData;
    }
public function afterGetPriceFormat(\Magento\Framework\Locale\FormatInterface $subject, $result){
        if($this->priceDecimalHelperData->isEnable()){
            if($this->priceDecimalHelperData->showDecimal()){
                $precision =$this->priceDecimalHelperData->getDecimalLength();
                $result['requiredPrecision']=$precision;
            }
            else{
                $precision=0;
                $result['precision']=$precision;
                $result['requiredPrecision']=$precision;
            }
        }

     return $result;
}

}
