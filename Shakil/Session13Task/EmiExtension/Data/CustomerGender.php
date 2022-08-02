<?php
namespace Session13Task\EmiExtension\Data;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\Data\AttributeMetadataInterface;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomerGender implements SectionSourceInterface
{
    /**
     * @var CustomerMetadataInterface
     */
    protected $customerMetadata;
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;
    /**
     * @var Session $session
     */
    public Session $session;

    /**
     * Constructor
     *
     * @param Session $session
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerMetadataInterface $customerMetadata
     */
    public function __construct(
        Session $session,
        CustomerRepositoryInterface $customerRepository,
        CustomerMetadataInterface $customerMetadata
    ) {
        $this->session=$session;
        $this->customerRepository = $customerRepository;
        $this->customerMetadata = $customerMetadata;
    }

    /**
     * GetGenderAttribute
     *
     * @param $attributeCode
     * @return AttributeMetadataInterface|null
     * @throws LocalizedException
     */
    protected function getGenderAttribute($attributeCode)
    {
        try {
            return $this->customerMetadata->getAttributeMetadata($attributeCode);
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }
    /**
     * Get Section Data
     *
     * @return array|void
     */
    public function getSectionData()
    {
        $customerId=$this->session->getCustomer()->getId();
        $customer = $this->customerRepository->getById($customerId);
        $genderId = $customer->getGender();
        $gender = $this->getGenderAttribute('gender')->getOptions()[$genderId]->getLabel();

        return[
            'data'=> $gender
        ];
    }
}
