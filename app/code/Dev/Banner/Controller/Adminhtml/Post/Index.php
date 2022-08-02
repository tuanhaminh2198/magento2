<?php
///**
// * Copyright © Magento, Inc. All rights reserved.
// * See COPYING.txt for license details.
// */
//
//namespace Dev\Banner\Controller\Adminhtml\Post;
//
//use Magento\Backend\App\Action;
//use Magento\Backend\App\Action\Context;
//use Magento\Framework\View\Result\Page;
//use Magento\Framework\View\Result\PageFactory;
//use Magento\Framework\App\Action\HttpGetActionInterface;
//
//class Index extends Action implements HttpGetActionInterface
//{
//    /**
//     * @var PageFactory
//     */
//    private $pageFactory;
//
//    /**
//     * Constructor
//     *
//     * @param Context $context
//     * @param PageFactory $rawFactory
//     */
//    public function __construct(
//        Context $context,
//        PageFactory $rawFactory
//    ) {
//        $this->pageFactory = $rawFactory;
//
//        parent::__construct($context);
//    }
//
//    /**
//     * Add the main Admin Grid page
//     *
//     * @return Page
//     */
//    public function execute(): Page
//    {
//        $resultPage = $this->pageFactory->create();
//        $resultPage->setActiveMenu('Magento_Catalog::catalog_products');
//        $resultPage->getConfig()->getTitle()->prepend(__('Admin Grid Tutorial Example'));
//
//        return $resultPage;
//    }
//}


namespace Dev\Banner\Controller\Adminhtml\Post;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('MY ADMIN'));
        return $resultPage;
    }
}
