<?php
namespace Dev\Expert\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'dev_expert_post';

    protected $_cacheTag = 'dev_expert_post';

    protected $_eventPrefix = 'dev_expert_post';

    protected function _construct()
    {
        $this->_init('Dev\Expert\Model\ResourceModel\Post');
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
