<?php
namespace Dev\Expert\Model\ResourceModel\ExpertReview;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'expert_review_id';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Dev\Expert\Model\ExpertReview', 'Dev\Expert\Model\ResourceModel\ExpertReview');
    }

}
