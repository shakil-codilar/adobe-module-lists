<?php

namespace Unit2\HelloWorldController\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\view\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var  PageFactory
     */
    protected PageFactory $pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory=$pageFactory;
        parent::__construct($context);
    }

    /**
     * Creating page with controller
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result=$this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents('Hello');
        return $result;
    }
}
