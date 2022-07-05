<?php

namespace Unit4\ProductDataLog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogProductSave implements ObserverInterface
{
    /**
     * @var null|LoggerInterface
     */
    protected ?LoggerInterface $_logger = null;

    /**
     * LogProductSave constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    /**
     * Execute
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        if ($product->getId() && ($product->isDataChanged() || $product->isObjectNew())) {
            $logMessage  = PHP_EOL . 'Product Saving Log...' . PHP_EOL;

            foreach ($product->getData() as $key => $dataItem) {
                if ((is_string($dataItem) || is_int($dataItem)) && $dataItem != $product->getOrigData($key)) {
                    $logMessage .= $key . ' = ' . $dataItem . PHP_EOL;
                }
            }
            $this->_logger->info($logMessage);
        }
    }
}
