<?php
namespace Dev\Banner\Model\Config;
class Status implements \Magento\Framework\Option\ArrayInterface{

    public function toOptionArray()
    {
     return [
         // TODO: Implement toOptionArray() method.
         ['value'=>1,'label'=>__('Pending')],
         ['value'=>2,'label'=>__('Published')]
     ];

    }

}
