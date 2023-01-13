<?php
namespace Dev\ProductContent\Model;
class PostTemporary extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'dev_productcontent_post_temporary';

    protected $_cacheTag = 'dev_productcontent_post_temporary';

    protected $_eventPrefix = 'dev_productcontent_post_temporary';

    protected function _construct()
    {
        $this->_init('Dev\ProductContent\Model\ResourceModel\PostTemporary');
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
