<?php

namespace Unit8\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * ACL access restriction
     */
    const ADMIN_RESOURCE = 'Unit8_ComputerGames::grid';

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $backendPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $backendPage->setActiveMenu('Unit8_ComputerGames::grid');
        $backendPage->addBreadcrumb(__('Dashboard'),__('Games'));
        $backendPage->getConfig()->getTitle()->prepend(__('Games'));

        return $backendPage;
    }
}
