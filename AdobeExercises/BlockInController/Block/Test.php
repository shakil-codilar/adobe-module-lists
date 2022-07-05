<?php

namespace Unit3\BlockInController\Block;

class Test extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * @return string
     */
    protected function _toHtml(): string
    {
        return "Block is created outside controller and rendered in controller!";
    }
}
