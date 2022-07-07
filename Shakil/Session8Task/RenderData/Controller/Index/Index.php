<?php

namespace Session6Task\RenderData\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Session6Task\RenderData\Api\EmployeeRepositoryInterface;
use Magento\Framework\App\RequestInterface;

class Index extends Action
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $resultJsonFactory;

    /**
     * @var EmployeeRepositoryInterface
     */
    public $employeeRepository;

    /**
     * @var $requestInterface
     */
    public $requestInterface;

    /**
     * Constructor
     *
     * @param JsonFactory $resultJsonFactory
     * @param Context $context
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param RequestInterface $requestInterface
     */
    public function __construct(
        JsonFactory $resultJsonFactory,
        Context $context,
        EmployeeRepositoryInterface $employeeRepository,
        RequestInterface $requestInterface
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->employeeRepository = $employeeRepository;
        $this->requestInterface = $requestInterface;
    }

    /**
     * Execute
     *
     * @return Json
     */
    public function execute(): Json
    {
        $id = $this->requestInterface->getParam('id');
        $resultJson = $this->resultJsonFactory->create();
        $collection = $this->employeeRepository->getAllData();
        return $resultJson->setData($collection);
    }
}
