<?php
namespace Dev\Banner\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use PharIo\Version\Exception;
use Dev\Banner\Model\PostFactory;
class AddBanner extends \Magento\Backend\App\Action
{
    protected $redirectFactory;
    protected $postFactory;
    protected $resultFactory;
    public function __construct(Context $context, \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
                                PostFactory $postFactory
    )
    {
        $this->postFactory = $postFactory;
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->postFactory->create();
        $data = $this->getRequest()->getPostValue();
        $param = $this->getRequest()->getParam('id');
        $post->load($param);
        $id=null;
        $newData = [
            'name' => $data['name'],
            'short_description' => $data['short_description'],
           'image' => $data['image'],
           'date' => $data['date'],
           'position_image' => $data['position_image'],
           'status_image' => $data['status_image'],
            'description'=>$data['description'],
        ];
        if (!empty($data['banner_id'])) {
            $id = $data['banner_id'];
            $post->load($id);
        } else if (isset($param)) {
            $id=$param;
        }
        try {
            if (isset($data['image']) && is_array($data['image'])) {
                $strpos = strpos($data['image'][0]['url'], '/media/');
                $data['image'][0]['url'] = substr($data['image'][0]['url'], $strpos + 6);
                $data['image'][0]['url'] = trim($data['image'][0]['url'], '/');
                $newData['image'] = json_encode($data['image']);
                $newData['file'] =json_encode($data['file']);
                $newData['image_url'] = $data['image'][0]['url'];
                $newData['image_name'] = $data['image'][0]['name'];

            }
            $post->load($id);
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage("You saved the banner.");
        }
        catch (Exception $exception) {
            $this->messageManager->addErrorMessage("$exception->getMessage()");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('banner/post');
        // TODO: Implement execute() method.
    }
}
