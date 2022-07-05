<?php
namespace Unit6\SystemConfiguration\Block\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Custom extends Field
{
    /**
     * GetElementHtml function
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        return 'This is custom config block output';
    }
}
