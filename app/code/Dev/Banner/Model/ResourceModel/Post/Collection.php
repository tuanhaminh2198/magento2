<?php
namespace Dev\Banner\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'banner_id';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\Banner\Model\Post', 'Dev\Banner\Model\ResourceModel\Post');
    }

}
