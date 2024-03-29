<?php
namespace Dev\Expert\Model\Config;

use Dev\Expert\Model\ResourceModel\ExpertReview\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProviderExpert extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;
    protected $_storeManager;
    protected $collection;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $postCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $postCollectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        $this->collection = $postCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        $url = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        foreach ($items as $item) {
            $data = $item->getData();
            $this->_loadedData[$item->getId()] = $data;
        }

        return $this->_loadedData;
    }
}
