<?php
namespace Dev\ProductContent\Model\ResourceModel\PostTemporary;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'product_content_id_temporary';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\ProductContent\Model\PostTemporary', 'Dev\ProductContent\Model\ResourceModel\PostTemporary');
    }
}
