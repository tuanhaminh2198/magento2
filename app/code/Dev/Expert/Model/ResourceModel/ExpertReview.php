<?php
namespace Dev\Expert\Model\ResourceModel;
/* truy van sql*/

class ExpertReview extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('expert_review', 'expert_review_id');
    }

}
