<?php
namespace Dev\Banner\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Widget\Block\BlockInterface;
use Dev\Banner\Model\ResourceModel\Post\CollectionFactory;

class BottomBannerWidget extends Template implements BlockInterface
{

    protected $bannerCollectionFactory;

    public function __construct(
        Template\Context  $context,
        array             $data,
        CollectionFactory $bannerCollectionFactory)
    {
        $this->setTemplate('widget/bottomwidget.phtml');
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Set data to View
     */
    public function dataBannerBottom()
    {
        $collection = $this->bannerCollectionFactory->create();
        // Chon hien thi anh tai bottom
        $banner = $collection->addFieldToFilter('status_image', ['eq' => true],)
            ->addFieldToFilter('position_image', [['eq' => 1],['eq'=>2]])
            ->getData();
        // Set url
        $url= $this->setData('mediaURL', $this->_storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'banner/tmp/image/');
        $data=[
            "data"=>$banner,
            "url"=>$url
        ];
        return $data;
    }

}
