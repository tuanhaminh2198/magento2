<?php
namespace Dev\Expert\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'expert_id';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\Expert\Model\Post', 'Dev\Expert\Model\ResourceModel\Post');
    }

}
