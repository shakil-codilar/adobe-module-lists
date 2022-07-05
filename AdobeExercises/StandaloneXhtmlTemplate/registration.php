<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
// Exercise: 1.3.2.2
// Exercise: 1.3.2.3
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Unit1_StandaloneXhtmlTemplate',
    __DIR__
);
