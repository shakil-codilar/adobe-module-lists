<?php

namespace Unit2\HelloWorldRedirect\Controller\Adminhtml\Action;

class HelloWorld extends \Magento\Backend\App\Action
{
 /**
  * Execute method redirects to another url
  */
    public function execute()
    {
        $this->_redirect('catalog/category/edit/id/2');
    }

    /**
     * _processUrlKeys method checks url is valid or not
     *
     * If not valid then it will redirect to start up admin page
     *
     * @return bool
     */
    public function _processUrlKeys(): bool
    {
        return true;
    }
}
