<?php
namespace Session6Task\RenderData\Api;

use Session6Task\RenderData\Api\Data\EmployeeInterface;
use Session6Task\RenderData\Model\Employee as Model;

/**
 * Interface EmployeeRepositoryInterface
 */
interface EmployeeRepositoryInterface
{
    /**
     * GetDataById
     *
     * @param int $id
     * @return EmployeeInterface
     */
    public function getDataById(int $id);

    /**
     * GetAllData
     *
     * @return array
     */
    public function getAllData();
}
