<?php

namespace Dev\Banner\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Sample extends Template implements BlockInterface
{
    protected $_template = "widget/sample.phtml";
}

