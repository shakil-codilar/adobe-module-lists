<?php

namespace Training3\CustomerMiddleName\Model\Data;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Customer\Model\Data\Customer as CustomerCore;

class Customer extends CustomerCore
{
    /**
     * @var DateTime $dateTime
     */
    public DateTime $dateTime;

    /**
     * @param ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $attributeValueFactory
     * @param CustomerMetadataInterface $metadataService
     * @param DateTime $dateTime
     * @param array $data
     */
    public function __construct(
        ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $attributeValueFactory,
        CustomerMetadataInterface $metadataService,
        DateTime $dateTime,
        $data = []
    ) {
        $this->dateTime=$dateTime;
        parent::__construct($extensionFactory, $attributeValueFactory, $metadataService, $data);
    }

    /**
     * Getting middle name
     *
     * @return int
     */
    public function getMiddlename(): int
    {
        return $this->age();
    }

    /**
     * Get age
     *
     * @return int
     */
    public function age(): int
    {
        $dob=$this->getDob();
        $now = time();
        $your_date = $this->dateTime->gmtTimestamp($dob);
        $datediff = $now - $your_date;
        $result=round($datediff / (60 * 60 * 24));
        return round($result/365);
    }
}
