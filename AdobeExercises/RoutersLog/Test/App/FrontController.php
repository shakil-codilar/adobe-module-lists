<?php

namespace Unit2\RoutersLog\Test\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Request\ValidatorInterface as RequestValidator;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\MessageInterface as MessageManager;
use Psr\Log\LoggerInterface;

/**
 * Class FrontController
 */
class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var RequestValidator
     */
    private $requestValidator;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        ?RequestValidator $requestValidator = null,
        ?MessageManager $messageManager = null,
        ?LoggerInterface $logger = null
    ) {
        $this->logger = $logger
            ?? ObjectManager::getInstance()->get(LoggerInterface::class);
        parent::__construct(
            $routerList,
            $response,
            $requestValidator,
            $messageManager,
            $logger
        );
    }

    /**
     * Perform action and generate response
     *
     * @param RequestInterface|HttpRequest $request
     * @return ResponseInterface|ResultInterface
     * @throws \LogicException|LocalizedException
     */
    public function dispatch(RequestInterface $request)
    {
        $routerList = [];
        foreach ($this->_routerList as $router) {
            $routerList[] = $router;
        }
        $routerList = array_map(function ($item) {
            return get_class($item);
        }, $routerList);
        $routerList = "\n\r" . implode("\n\r", $routerList);
        $this->logger->info("Magento2 Routers List:" . $routerList);

        return parent::dispatch($request);
    }
}
