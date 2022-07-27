<?php
namespace Session6Task\RenderData\Model\Data;

use Magento\Framework\App\ResourceConnection;
use Session6Task\RenderData\Api\EmployeeRepositoryInterface;
use Session6Task\RenderData\Api\Data\EmployeeInterface as EmployeeFactory;
use Session6Task\RenderData\Model\ResourceModel\Employee as ResourceModel;
use Session6Task\RenderData\Model\ResourceModel\Employee\CollectionFactory as CollectionFactory;
use Session6Task\RenderData\Api\Data\EmployeeInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    public ResourceModel $resourceModel;
    /**
     * @var EmployeeFactory
     */
    public $employeeFactory;
    /**
     * @var ResourceConnection
     */
    private ResourceConnection $connection;
    /**
     * @var CollectionFactory $collectionFactory
     */
    public CollectionFactory $collectionFactory;

    /**
     * Constructor
     *
     * @param EmployeeFactory $employeeFactory
     * @param ResourceModel $resourceModel
     * @param ResourceConnection $connection
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        EmployeeFactory $employeeFactory,
        ResourceModel $resourceModel,
        ResourceConnection $connection,
        CollectionFactory $collectionFactory
    ) {
        $this->employeeFactory=$employeeFactory;
        $this->resourceModel=$resourceModel;
        $this->connection = $connection;
        $this->collectionFactory=$collectionFactory;
    }

    /**
     * GetDataById
     *
     * @param int $id
     * @return EmployeeInterface
     */
    public function getDataById(int $id)
    {
//        $employee=$this->employeeFactory->create();
        $this->resourceModel->load($this->employeeFactory, $id);
        return $this->employeeFactory;
    }

    /**
     * GetAllData
     *
     * @return array
     */
    public function getAllData():array
    {
        $conn = $this->connection->getConnection();
        $select = $conn->select()
            ->from(['a' => 'adobe_employee'])
           ->join(['b' => 'adobe_employee_order'], 'b.parent_id=a.entity_id');

        return $conn->fetchAll($select) ?? [];
    }
}

