<?php

namespace Dev\Banner\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Dev\Banner\Model\PostFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
class Delete extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        PostFactory $extensionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        parent::__construct($context);
    }
    public function execute()
    {

        try {
            $id = $this->getRequest()->getParam('id');
            if ($id) {


                $model = $this->extensionFactory->create()->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Record Delete Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl("/banner/index");
        return $resultRedirect;
    }
}

