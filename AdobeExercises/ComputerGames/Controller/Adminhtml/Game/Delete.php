<?php

namespace Unit8\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\RedirectFactory;
use Unit8\ComputerGames\Model\GameFactory;

class Delete extends Action
{
    /**
     * @var null|GameFactory
     */
    protected $gameFactory = null;

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * __construct
     *
     * @param  mixed $context
     * @param  mixed $gameFactory
     * @param  mixed $redirectFactory
     *
     * @return void
     */
    public function __construct(Action\Context $context, GameFactory $gameFactory, RedirectFactory $redirectFactory)
    {
        $this->gameFactory = $gameFactory->create();
        $this->resultRedirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    /**
     * execute
     *
     * @return void
     */
    public function execute()
    {
        $entityId = $this->getRequest()->getParam('game_id');

        $this->gameFactory->load($entityId);
        if ($this->gameFactory->getId()) {
            $this->gameFactory->delete();
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;
    }

    /**
     * _isAllowed
     *
     * @return void
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Unit8_ComputerGames::grid');
    }
}
