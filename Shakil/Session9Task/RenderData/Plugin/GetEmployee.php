<?php

namespace Session6Task\RenderData\Plugin;

use Session6Task\RenderData\Api\Data\EmployeeInterface;
use Session6Task\RenderData\Api\EmployeeRepositoryInterface;
use Session6Task\RenderData\Model\EmployeeFactory;
use Session6Task\RenderData\Model\ResourceModel\Employee\CollectionFactory as CollectionFactory;
use Session6Task\RenderData\Model\EmployeeFactory as ModelFactory;
use Session6Task\RenderData\Model\ResourceModel\EmployeeFactory as ResourceFactory;

class GetEmployee
{
    /**
     * @var ModelFactory
     */
    public EmployeeFactory $modelFactory;
    /**
     * @var ResourceFactory
     */
    public ResourceFactory $resourceFactory;

    /**
     * @var CollectionFactory
     */
    public CollectionFactory $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     * @param ModelFactory $modelFactory
     * @param  ResourceFactory $resourceFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        ModelFactory $modelFactory,
        ResourceFactory $resourceFactory
    ) {
        $this->collectionFactory=$collectionFactory;
        $this->modelFactory=$modelFactory;
        $this->resourceFactory=$resourceFactory;
    }

    /**
     * After Get All Data
     *
     * @param EmployeeRepositoryInterface $subject
     * @param EmployeeInterface $result
     * @return  EmployeeInterface
     */
    public function afterGetDataById(
        EmployeeRepositoryInterface $subject,
        EmployeeInterface $result
    ) {
        $extensionAttributes = $result->getExtensionAttributes();
        $collections = $this->collectionFactory->create();
        $extensionAttributes->setEmployeeDetails([
            $collections->getColumnValues('name'),$collections->getColumnValues('description')]);
        $result->setExtensionAttributes($extensionAttributes);
        return $result;
    }
}
