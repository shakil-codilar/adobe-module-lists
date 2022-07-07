<?php
namespace Session6Task\RenderData\Api;

/**
 * Interface EmployeeRepositoryInterface
 */
interface EmployeeRepositoryInterface
{
    /**
     * GetDataById
     *
     * @param int $id
     */
    public function getDataById(int $id);

    /**
     * GetAllData
     */
    public function getAllData();
}
