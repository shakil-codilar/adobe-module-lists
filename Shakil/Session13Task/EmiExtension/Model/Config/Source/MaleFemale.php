<?php
namespace Session13Task\EmiExtension\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class MaleFemale implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [['value' => 'Male', 'label' => __('Male')], ['value' => 'Female', 'label' => __('Female')]];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return ['Male' => __('Female'), 'Female' => __('Male')];
    }
}
