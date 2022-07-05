<?php


namespace Unit8\ComputerGames\Controller\Adminhtml\Game;
use Magento\Backend\App\Action;


class Validate extends Action
{
    /**
     * execute
     *
     * @return void
     */
    public function execute()
    {
        $this->getResponse()->appendBody(json_encode(true));
        $this->getResponse()->sendResponse();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Unit8_ComputerGames::grid');

    }
}
