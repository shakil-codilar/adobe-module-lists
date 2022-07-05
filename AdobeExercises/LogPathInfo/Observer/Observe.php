<?php

namespace Unit1\LogPathInfo\Observer;

class Observe implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $_logger;
    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    private $_request;

    /**
     * Log constructor.
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_logger = $logger;
        $this->_request = $request;
    }

    /**
     * Execute
     *
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->_logger->critical(
            'Request URI: ' . $this->_request->getPathInfo()
        );
    }
}
