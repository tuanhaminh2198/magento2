<?php
namespace Dev\ProductContent\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use PharIo\Version\Exception;
use Dev\ProductContent\Model\PostFactory;

class AddProductContent extends \Magento\Backend\App\Action
{
    protected $productCollectionFactory;
    protected $redirectFactory;
    protected $postFactory;
    protected $resultFactory;
    public function __construct(Context $context, \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                PostFactory $postFactory
    )
    {
        $this->productCollectionFactory=$productCollectionFactory;
        $this->postFactory = $postFactory;
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->postFactory->create();
        $data = $this->getRequest()->getPostValue();
        $product= $this->productCollectionFactory->create()->addAttributeToFilter('entity_id',$data['entity_id'])
            ->addAttributeToSelect('name','catalog_product_entity_varchar')->getData();
        $param = $this->getRequest()->getParam('id');
        $post->load($param);
        $id=null;
        $newData = [
            'product_id' =>$data['entity_id'],
            'display_area' => $data['display_area'],
            'status' => $data['status'],
            'product_name' => $product[0]['name'],
            'product_sku'=> $product[0]['sku'],
            'content'=>$data['content'],
        ];
        if (!empty($data['product_content_id'])) {
            $id = $data['product_content_id'];
            $post->load($id);
        } else if (isset($param)) {
            $id=$param;
        }
        try {
            $post->load($id);
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage("You saved the product content.");
        }
        catch (Exception $exception) {
            $this->messageManager->addErrorMessage("$exception->getMessage()");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('productcontent/post');
        // TODO: Implement execute() method.
    }
}
