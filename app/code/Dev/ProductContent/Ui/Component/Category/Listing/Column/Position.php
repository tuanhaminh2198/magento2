<?php

namespace Dev\ProductContent\Ui\Component\Category\Listing\Column;
class  Position implements \Magento\Framework\Data\OptionSourceInterface
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
