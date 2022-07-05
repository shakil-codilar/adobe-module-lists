<?php
namespace Unit6\AdminPage\Controller\Adminhtml\Page;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory;
     */
    protected PageFactory $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param PageFactory $resultPageFactory
     * @param Context $context
     */
    public function __construct(PageFactory $resultPageFactory, Context $context)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $backendPage */
        $backendPage = $this->resultPageFactory->create();
        $backendPage->setActiveMenu('Unit6_AdminPage::new_admin_page');
        $backendPage->addBreadcrumb(__('Dashboard'), __('New Admin Page'));
        $backendPage->getConfig()->getTitle()->set('New Admin Page');

        return $backendPage;
    }
}
