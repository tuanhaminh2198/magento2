<?php

namespace Dev\ProductContent\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

/**
 * Class Action
 * @package ViMagento\HelloWorld\Ui\Component\Listing\Grid\Column
 */
class Choose extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;
    public function __construct(
        UrlInterface $urlBuilder,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'Choose' => [
                        'href' => $this->urlBuilder->getUrl('productcontent/post/choose', ['id' => $item['entity_id']]),
                        'label' => __('Choose')
                    ],
                ];
            }
        }
        return $dataSource;
    }
}
