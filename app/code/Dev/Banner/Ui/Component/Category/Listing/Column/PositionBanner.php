<?php

namespace Dev\Banner\Ui\Component\Category\Listing\Column;
class  PositionBanner implements \Magento\Framework\Data\OptionSourceInterface
{

    public function toOptionArray()
    {
        return [
            // TODO: Implement toOptionArray() method.
            ['value' => 0, 'label' => __('Banner Top')],
            ['value' => 1, 'label' => __('Banner Bottom')],
            ['value' => 2, 'label' => __('All')],
        ];
    }
}
