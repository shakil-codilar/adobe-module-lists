<?php

namespace Task\SimplePreference\Model;

class Product extends \Magento\Catalog\Model\Product
{
    /**
     * GetName returning static value
     *
     * @return string
     */
    public function getName(): string
    {
        return "Some Random Text";
    }
}
