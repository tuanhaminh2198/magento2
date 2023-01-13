<?php
namespace Dev\ShippingExpress\Observer;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\QuoteFactory ;
class SaveCustomFieldObserver implements ObserverInterface
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_quote;
    protected $_objectManager;
    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectmanager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectmanager,
        \Magento\Quote\Model\QuoteFactory $quoteFactory
    )
    {
        $this->_objectManager = $objectmanager;
        $this->_quote = $quoteFactory;

    }
    public function execute(EventObserver $observer)
    {
        $event = $observer->getEvent();
        // Get Order Object
        /* @var $order \Magento\Sales\Model\Order */
        $order = $event->getOrder();
        // Get Quote Object
        /** @var $quote \Magento\Quote\Model\Quote $quote */
        $quote = $event->getQuote();

        if ($quote->getDonate()) {
            $order->setDonate($quote->getDonate());
        }
        return $this;
}
}
