<?php
namespace Dev\ProductContent\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'dev_productcontent_post';

    protected $_cacheTag = 'dev_productcontent_post';

    protected $_eventPrefix = 'dev_productcontent_post';

    protected function _construct()
    {
        $this->_init('Dev\ProductContent\Model\ResourceModel\Post');
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
