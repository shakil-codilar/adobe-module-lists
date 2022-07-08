<?php
namespace Session6Task\RenderData\Model\Data;

use Magento\Framework\App\ResourceConnection;
use Session6Task\RenderData\Api\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @var ResourceConnection
     */
    private ResourceConnection $connection;

    /**
     * Constructor
     * @param ResourceConnection $connection
     */
    public function __construct(
        ResourceConnection $connection
    ) {
        $this->connection = $connection;
    }

    /**
     * GetDataById
     *
     * @param int $id
     * @return array
     */
    public function getDataById(int $id): array
    {
        $conn = $this->connection->getConnection();
        $select = $conn->select()
            ->from(['a' => 'adobe_employee'])
            ->join(['b' => 'adobe_employee_order'], 'b.parent_id=a.entity_id')
            ->where('a.entity_id = ?', $id)
            ->Limit(2);

        return $conn->fetchAll($select) ?? [];
    }

    /**
     * GetAllData
     */
    public function getAllData(): ?array
    {
        $conn = $this->connection->getConnection();
        $select = $conn->select()
            ->from(['a' => 'adobe_employee'])
            ->join(['b' => 'adobe_employee_order'], 'b.parent_id=a.entity_id');

        return $conn->fetchAll($select) ?? [];
    }
}

