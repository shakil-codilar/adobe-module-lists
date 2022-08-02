<?php

namespace Session13Task\EmiExtension\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Redirect;
use Session13Task\EmiExtension\Model\EmiFactory as ModelFactory;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{
    /**
     * @var ModelFactory
     */

    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * Construct
     *
     * @param Context $context
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        Context $context,
        ModelFactory   $modelFactory,
        ResourceModel  $resourceModel
    ) {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $resultRedirect= $this->resultRedirectFactory->create();
        $emptyBrand = $this->modelFactory->create();
        $data = $this->getRequest()->getParam('emi_id');
        $deleteBrand=$emptyBrand->load($data);
        $deleteBrand->delete();
        $this->messageManager->addSuccessMessage(__(
            'Employee details of %1 deleted successfully'
        ));
        return $resultRedirect->setPath('*/*/index');
    }
}
