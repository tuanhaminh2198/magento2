<?php
namespace Dev\Banner\Model\Config;
class StatusImage implements \Magento\Framework\Option\ArrayInterface{

    public function toOptionArray()
    {
     return [
         // TODO: Implement toOptionArray() method.
         ['value'=>0,'label'=>__('Disable Banner ')],
         ['value'=>1,'label'=>__('Enable Banner ')],
     ];
    }
}
