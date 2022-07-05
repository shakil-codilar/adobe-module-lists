<?php

namespace Training3\CustomerMiddleNamePlugin\Model\Data;

use Magento\Framework\Stdlib\DateTime\DateTime;

class Customer
{
    /**
     * @var DateTime $dateTime
     */
    public DateTime $dateTime;

    /**
     * @param DateTime $dateTime
     * @return void
     */
    public function __construct(DateTime $dateTime)
    {
        $this->dateTime=$dateTime;
    }

    /**
     * After Get Method
     *
     * @param \Magento\Customer\Model\Data\Customer $subject
     * @param $middlename
     * @return string
     */
    public function afterGetMiddlename(\Magento\Customer\Model\Data\Customer $subject, $middlename)
    {
        $dateOfBirth=$subject->getDob();
        $now = time();
        $your_date = $this->dateTime->gmtTimestamp($dateOfBirth);
        $datediff = $now - $your_date;
        $resultOfDays=round($datediff / (60 * 60 * 24));
        $age= round($resultOfDays/365);
        return (string)$age;
    }
}

