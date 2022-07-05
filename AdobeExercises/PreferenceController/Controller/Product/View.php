<?php

namespace Unit2\PreferenceController\Controller\Product;

use \Magento\Framework\Controller\ResultInterface;

class View extends \Magento\Catalog\Controller\Product\View
{
    /**
     * Create page with controller
     *
     * @return ResultInterface
     */
    public function execute():ResultInterface
    {
        $result=$this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents("Controller from Preference");
        return $result;
    }
}
