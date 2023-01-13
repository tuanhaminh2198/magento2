<?php
namespace Dev\Expert\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use PharIo\Version\Exception;
use Dev\Expert\Model\PostFactory;
class AddExpert extends \Magento\Backend\App\Action
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
//        var_dump($data);
//        die();
        $newData = [
            'name' => $data['name'],
            'work_unit' => $data['work_unit'],
            'image' => $data['image'],
            'position' => $data['position'],
        ];
        if (!empty($data['expert_id'])) {
            $id = $data['expert_id'];
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
                $newData['image_url'] = $data['image'][0]['url'];
                $newData['image_name'] = $data['image'][0]['name'];

            }
            $post->load($id);
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage("You saved the expert.");
        }
        catch (Exception $exception) {
            $this->messageManager->addErrorMessage("$exception->getMessage()");
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('expert/post');
        // TODO: Implement execute() method.
    }
}
