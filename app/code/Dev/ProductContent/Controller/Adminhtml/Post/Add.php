<?php

namespace Dev\ProductContent\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Dev\ProductContent\Model\PostFactory;
/**
 * Class AddNew
 * @package ViMagento\HelloWorld\Controller\Adminhtml\Post
 */
class Add extends Action
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if($id){
            $title='Edit Product Content';

        }
        else{
            $title='Add Product Content';
        }
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;
    }
}


