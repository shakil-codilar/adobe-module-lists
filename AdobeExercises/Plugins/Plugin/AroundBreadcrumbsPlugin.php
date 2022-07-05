<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

/**
 * Class AroundBreadcrumbsPlugin
 */
class AroundBreadcrumbsPlugin
{
    /**
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param callable $proceed
     * @param $crumbName
     * @param $crumbInfo
     */
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject,
        callable $proceed,
        $crumbName,
        $crumbInfo
    ): void
    {
        $crumbInfo['label'] = $crumbInfo['label'].'(!a)';
        $proceed($crumbName, $crumbInfo);
    }
}
