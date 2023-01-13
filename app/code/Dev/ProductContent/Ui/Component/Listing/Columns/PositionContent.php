<?php

namespace Dev\ProductContent\Ui\Component\Listing\Columns;
class  PositionContent implements \Magento\Framework\Data\OptionSourceInterface
{

    public function toOptionArray()
    {
        return [
            // TODO: Implement toOptionArray() method.
            ['value' => 0, 'label' => __('Top')],
            ['value' => 1, 'label' => __('Bottom')],
            ['value' => 2, 'label' => __('All')],
        ];
    }
}
