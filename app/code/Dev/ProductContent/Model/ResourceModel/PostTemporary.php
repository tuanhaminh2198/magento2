<?php
namespace Dev\ProductContent\Model\ResourceModel;
/* truy van sql*/

class PostTemporary extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('product_content_temporary', 'product_content_id_temporary');
    }

}
