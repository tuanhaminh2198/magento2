<?php
namespace Dev\Expert\Model;
class ExpertReview extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'dev_expert_expertreview';

    protected $_cacheTag = 'dev_expert_expertreview';

    protected $_eventPrefix = 'dev_expert_expertreview';

    protected function _construct()
    {
        $this->_init('Dev\Expert\Model\ResourceModel\ExpertReview');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
