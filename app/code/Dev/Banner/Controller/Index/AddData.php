<?php

namespace Dev\Banner\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Dev\Banner\Model\PostFactory;

class AddData extends Action
{
    protected $resultPageFactory;

    private $extensionFactory;

    private $url;

    public function __construct(UrlInterface $url, PostFactory $extensionFactory, Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        $this->url = $url;
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $model = $this->extensionFactory->create();
        $model->setData($data)->save();
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl("/banner/index");
        return $resultRedirect;
    }
}
