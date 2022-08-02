<?php
//
//namespace Dev\Banner\Model\Config;
//
//use Dev\Banner\Model\PostFactory;
//use Dev\Banner\Model\ResourceModel\Post\CollectionFactory;
//
//class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
//{
//    protected $_loadedData;
//    protected $collection;
//
//    public function __construct(
//        $name,
//        $primaryFieldName,
//        $requestFieldName,
//        CollectionFactory $collectionFactory,
//        array $meta = [],
//        array $data = []
//    )
//    {
//        $this->collection = $collectionFactory->create();
//        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
//    }
//
//    public function getData()
//    {
//        if (isset($this->_loadedData)) {
//            return $this->_loadedData;
//        }
//        $items = $this->collection->getItems();
//        foreach ($items as $item) {
//            $this->_loadedData[$item->getId()] = $item->getData();
//        }
//        return $this->_loadedData;
//    }
//}



namespace Dev\Banner\Model\Config;

use Dev\Banner\Model\ResourceModel\Post\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
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
            if(isset($data['image'])){
                $imageData = json_decode($data['image'],true);
                $data['image'] = [
                    [
                        'name' => $imageData[0]['name'],
                        'url' => $url.$imageData[0]['url'],
                        'previewType' => $imageData[0]['previewType'],
                        'id' => $imageData[0]['id'],
                        'size' => $imageData[0]['size']
                    ]
                ];
            }
            $this->_loadedData[$item->getId()] = $data;
        }
        return $this->_loadedData;
    }
}
