<?php
namespace Session11Task\Section\Data;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Exception\LocalizedException;

class CustomerDetails implements SectionSourceInterface
{
    /**
     * @var Session $session
     */
    public Session $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session=$session;
    }

    /**
     * Get Section Data
     *
     * @return array|void
     * @throws LocalizedException
     */
    public function getSectionData()
    {
        return[
            'data'=> $this->session->getCustomer()->getName()
        ];
    }
}
