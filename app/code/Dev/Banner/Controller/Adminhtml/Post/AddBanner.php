<?php
//
//namespace Dev\Banner\Controller\Adminhtml\Post;
//
//use Dev\Banner\Model\PostFactory;
//use Magento\Backend\App\Action;
//use Magento\Framework\Controller\Result\RedirectFactory;
///**
// * Class Save
// * @package ViMagento\HelloWorld\Controller\Adminhtml\Post
// */
//class AddBanner extends Action
//{
//    /**
//     * @var PostFactory
//     */
//    protected $postFactory;
//    protected  $redirectFactory;
//    public function __construct(
//        Action\Context $context,
//        PostFactory $postFactory,
//        RedirectFactory $redirectFactory
//    ) {
//        parent::__construct($context);
//        $this->postFactory = $postFactory;
//        $this->resultRedirectFactory=$redirectFactory;
//    }
//public function execute()
//{
//    $data = $this->getRequest()->getPostValue();
//    $param= $this->getRequest()->getParams('id');
//    $id = !empty($data['banner_id']) ? $data['banner_id'] : $param;
//    $newData = [
//        'name' => $data['name'],
//        'image' => $data["image"],
//        'status' => $data['status'],
//        'description' => $data['description'],
//        'short_description' => $data['short_description'],
//    ];
//
//    $post = $this->postFactory->create();
//    try {
//        if (isset($data['image']) && is_array($data['image'])) {
//            $strpos = strpos($data['image'][0]['url'], '/media/');
//            $data['image'][0]['url'] = substr($data['image'][0]['url'], $strpos + 6);
//            $data['image'][0]['url'] = trim($data['image'][0]['url'], '/');
//            $newData['image'] =  json_encode($data['image']);
//
//        }
//
//        $post->load($id);
//        $post->setData($newData);
//        $post->save();
//        $this->getMessageManager()->addSuccessMessage(__('Thành công'));
//        return $this->redirectFactory->create()->setPath('banner/post');
//    } catch (\Exception $e) {
//        $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
//    }
//
//}
//}

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
            'status' => $data['status'],
            'short_description' => $data['short_description'],
           'image' => $data['image'],
//            'description' => $data['description']
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
            }
//             elseif (isset($data['file']) && is_array($data['file'])) {
//                $newData['file'] = json_encode($data['file']);
//            }

            $post->load($id);
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage("You saved the banner.");
        } catch (Exception $exception) {
            $this->messageManager->addErrorMessage("$exception->getMessage()");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('banner/post');
        // TODO: Implement execute() method.
    }
}
