<?php
namespace Session13Task\EmiExtension\Block\Emi;

use Magento\Framework\App\Http\Context;
use Magento\Framework\View\Element\Template;
use Session13Task\EmiExtension\Model\Emi as Model;
use Session13Task\EmiExtension\Model\EmiFactory as ModelFactory;
use Session13Task\EmiExtension\Model\ResourceModel\Emi as ResourceModel;
use Session13Task\EmiExtension\Model\ResourceModel\Emi\CollectionFactory as CollectionFactory;
use Magento\Customer\Model\Session;
use \Magento\Customer\Api\CustomerRepositoryInterface as CustomerRepository;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Customer\Api\Data\AttributeMetadataInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Directory\Model\Currency;
use Magento\Framework\Registry as Registry;

class Emi extends Template
{
    /**
     * @var Registry $registry
     */
    protected Registry $registry;
    /**
     * @var Currency $currency
     */
    protected Currency $currency;
    /**
     * @var Model $model
     */
    protected Model $model;
    /**
     * @var CustomerMetadataInterface
     */
    protected $customerMetadata;
    /**
     * @var Context $httpContext
     */
    protected $httpContext;
    /**
     * @var CustomerRepository $customerRepository
     */
    protected CustomerRepository $customerRepository;
    /**
     * @var Session $session
     */
    protected Session $session;
    /**
     * @var ModelFactory $modelFactory
     */
    protected ModelFactory $modelFactory;
    /**
     * @var ResourceModel $resourceModel
     */
    protected ResourceModel $resourceModel;
    /**
     * @var CollectionFactory $collectionFactory
     */
    protected CollectionFactory $collectionFactory;
    /**
     * Constructor
     *
     * @param Registry $registry
     * @param Currency $currency
     * @param Model $model
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     * @param CollectionFactory $collectionFactory
     * @param CustomerRepository $customerRepository
     * @param Template\Context $context
     * @param Session $session
     * @param Context $httpContext
     * @param array $data
     */
    public function __construct(
        Registry $registry,
        Currency $currency,
        Model $model,
        ModelFactory        $modelFactory,
        ResourceModel               $resourceModel,
        CollectionFactory           $collectionFactory,
        CustomerRepository $customerRepository,
        CustomerMetadataInterface $customerMetadata,
        Template\Context $context,
        Session $session,
        Context $httpContext,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->currency = $currency;
        $this->model = $model;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->customerMetadata = $customerMetadata;
        $this->customerRepository = $customerRepository;
        $this->httpContext = $httpContext;
        parent::__construct($context, $data);
        $this->session = $session;
    }

    /**
     * GetCustomerIsLoggedIn
     *
     * @return bool
     */
    public function getCustomerIsLoggedIn()
    {
        return (bool)$this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
    }
    /**
     * Get customer attribute
     *
     * @param string $attributeCode
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
     * GetCustomerId
     *
     * @return mixed|null
     */
    public function getCustomerId()
    {
        return $this->httpContext->getValue('customer_id');
    }

    /**
     * GetAllData
     *
     * @return mixed
     */
    public function getAllData()
    {
        if ($this->getCustomerIsLoggedIn()) {
            $collection = $this->collectionFactory->create();
            return $collection->getData();
        }
    }

    /**
     * GetGender
     *
     * @return string
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function getGender()
    {
        $customerId = $this->getCustomerId();
        $customer = $this->customerRepository->getById($customerId);
        $genderId = $customer->getGender();
        $gender = $this->getGenderAttribute('gender')->getOptions()[$genderId]->getLabel();
        return $gender;
    }

    /**
     * GetCurrencySymbol
     *
     * @return string
     */
    public function getCurrencySymbol()
    {
        return $this->currency->getCurrencySymbol();
    }

    /**
     * CurrentProductPrice
     *
     * @return mixed
     */
    public function getCurrentProductPrice()
    {
         $currentProduct = $this->registry->registry('current_product');
         return $currentProduct->getFinalPrice();
    }

    /**
     * GetPrincipal
     *
     * @return void
     */
    public function getPrincipal()
    {
        return $this->getCurrentProductPrice();
    }

}
