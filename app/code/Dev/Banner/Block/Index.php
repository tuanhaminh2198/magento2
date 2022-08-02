<?php
//namespace Dev\Banner\Block;
//
//use Magento\Framework\View\Element\Template;
//
//class Index extends \Magento\Framework\View\Element\Template
//{
//    public $postFactory;
//    public function __construct(Template\Context $context, array $data = [],\Dev\Banner\Model\PostFactory $postFactory)
//    {
//        $this->postFactory=$postFactory;
//        parent::__construct($context, $data);
//    }
//
//    public function getTitle()
//    {
//        return __('HelloWorld!');
//    }
//public function getPostCollection(){
//    $post = $this->postFactory->create();
//    return $post->getCollection();
//}
//}


namespace Dev\Banner\Block;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dev\Banner\Model\PostFactory          $postFactory
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {

        return __('Hello World');

    }

    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }

}
