<?php

namespace Session13Task\EmiExtension\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\AlreadyExistsException;
use Session13Task\EmiExtension\Model\EmiFactory as ModelFactory;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;
use Magento\Backend\App\Action\Context;

class Submit extends Action
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
     * Constructor
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
     * @throws AlreadyExistsException
     */
    public function execute(): Redirect
    {
        $resultRedirect= $this->resultRedirectFactory->create();
        $emptyBrands = $this->modelFactory->create();
        $data = $this->_request->getParams();
        $emptyBrands->setInterestRate($data['interest_rate']);
        $emptyBrands->setTenure($data['tenure']);
        $emptyBrands->setGender($data['gender']);

        $this->resourceModel->save($emptyBrands);
        $this->messageManager->addSuccessMessage(__('Record Successfully Added'));

        return $resultRedirect->setPath('*/*/index');
    }
}
