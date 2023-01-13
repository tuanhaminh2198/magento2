<?php
namespace Dev\ProductContent\Model\ResourceModel;
/* truy van sql*/

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('product_content', 'product_content_id');
    }

}
