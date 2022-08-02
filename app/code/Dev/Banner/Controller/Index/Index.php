<?php
/*nhan request xu ly & render page*/
namespace Dev\Banner\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam("id");
        echo"$id";
        return $this->_pageFactory->create();
    }
}


//namespace Dev\Banner\Controller\Index;
//
//class Index extends \Magento\Framework\App\Action\Action
//{
//    protected $_pageFactory;
//
//    protected $_postFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context      $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory,
//        \Dev\Banner\Model\PostFactory    $postFactory
//    )
//    {
//        $this->_pageFactory = $pageFactory;
//        $this->_postFactory = $postFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        $post = $this->_postFactory->create();
//        $collection = $post->getCollection();
//        foreach ($collection as $item) {
//            echo "<pre>";
//            print_r($item->getData());
//            echo "</pre>";
//        }
//        exit();
//        return $this->_pageFactory->create();
//    }
//}
