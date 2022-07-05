<?php
namespace Session6Task\RenderData\Model\Data;

use Session6Task\RenderData\Api\EmployeeRepositoryInterface;
use Session6Task\RenderData\Model\ResourceModel\Employee\CollectionFactory;
use Session6Task\RenderData\Model\Employee as Model;
use Session6Task\RenderData\Model\EmployeeFactory as ModelFactory;
use Session6Task\RenderData\Model\ResourceModel\Employee as ResourceModel;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @var ModelFactory
     */
    private ModelFactory $modelFactory;

    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * Constructor
     * @param CollectionFactory $collectionFactory
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * GetDataById
     *
     * @param $id
     * @return Model
     */
    public function getDataById($id)
    {
        return $this->load($id);
    }

    /**
     * Load
     *
     * @param $value
     * @param null $field
     * @return Model
     */
    public function load($value, $field = null): Model
    {
        $model = $this->create();
        $this->resourceModel->load($model, $value, $field);
        return $model;
    }

    /**
     * Create
     */
    public function create(): Model
    {
        return $this->modelFactory->create();
    }

    /**
     * GetCollection
     */
    public function getCollection(): ?array
    {
        $post = $this->collectionFactory->create();
        return $post->getData();
    }
}
