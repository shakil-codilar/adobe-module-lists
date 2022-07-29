<?php

namespace Session13Task\CustomJs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    private PageFactory $resultJsonFactory;

    /**
     * Constructor
     *
     * @param PageFactory $resultJsonFactory
     * @param Context $context
     */
    public function __construct(
        PageFactory $resultJsonFactory,
        Context $context
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * Execute
     *
     * @return Page
     */
    public function execute(): Page
    {
        return $this->resultJsonFactory->create();
    }
}
