<?php
namespace Dev\ProductContent\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'product_content_id';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\ProductContent\Model\Post', 'Dev\ProductContent\Model\ResourceModel\Post');
    }
}
