<?php
namespace Task\ProductsRendering\Block;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\View\Element\Template;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use \Magento\Backend\Block\Template\Context;

class View extends Template
{
    /**
     * Variable for Collection
     *
     * @var CollectionFactory
     */
    protected CollectionFactory $_productCollectionFactory;

    /**
     * Construct
     *
     * @param Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param array $data
     */

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * GetProductCollection
     *
     * @return Collection
     */
    public function getProductCollection(): Collection
    {
        return $this->_productCollectionFactory->create();
    }
}
