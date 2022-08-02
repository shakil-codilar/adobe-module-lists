<?php

namespace Session13Task\EmiExtension\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Session13Task\EmiExtension\Model\Emi as ModelFactory;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;

class Add extends Action
{
    /**
     * @var ModelFactory
     */
    protected ModelFactory $modelFactory;

    /**
     * @var ResourceModel
     */
    protected ResourceModel $resourceModel;

    /**
     * @var Registry
     */
    protected Registry $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * Construct
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $coreRegistry
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $coreRegistry,
        ModelFactory   $modelFactory,
        ResourceModel  $resourceModel
    ) {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        //set page title
        $resultPage->getConfig()->getTitle()->prepend(__('EmiExtension Module'));
        $pageTitle = __('Add Emi Matrix');
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;
    }
}
