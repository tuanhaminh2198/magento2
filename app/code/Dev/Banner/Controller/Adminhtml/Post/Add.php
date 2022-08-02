<?php

namespace Dev\Banner\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Dev\Banner\Model\PostFactory;
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
    $title='Edit Banner';

}
else{
    $title='Add Banner';
}
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;
    }
}


