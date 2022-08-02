<?php
namespace Session13Task\EmiExtension\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Session13Task\EmiExtension\Model\EmiFactory as ModelFactory;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;

class Edit extends Action
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
     * @param PageFactory $resultPageFactory
     * @param Registry $coreRegistry
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        Context        $context,
        PageFactory $resultPageFactory,
        Registry                $coreRegistry,
        ModelFactory                               $modelFactory,
        ResourceModel                              $resourceModel
    ) {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return Redirect|Page
     */
    public function execute()
    {
        //getting the data
        $id = $this->getRequest()->getParam('emi_id');
        $model = $this->modelFactory->create();
        //loading data using model
        if ($id) {
            $model = $this->modelFactory->create()->load($id);
            if (!$model->getEmiId()) {
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/listing');
            }
        }

//        //save model data to registry variable
//        $this->_coreRegistry->register('Emi Extension', $model);
        $resultPage = $this->resultPageFactory->create();
        //set page title
        $resultPage->getConfig()->getTitle()->prepend(__('Emi Extension Module'));
        $pageTitle = __('Edit Page for %1', __('New Entry'));
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;
    }
}
