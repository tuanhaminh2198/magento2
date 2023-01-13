<?php
namespace Dev\ProductContent\Model\Config;
class Status implements \Magento\Framework\Option\ArrayInterface{

    public function toOptionArray()
    {
        return [
            // TODO: Implement toOptionArray() method.
            ['value'=>0,'label'=>__('Disable  ')],
            ['value'=>1,'label'=>__('Enable ')],
        ];
    }
}
