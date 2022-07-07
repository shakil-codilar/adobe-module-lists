<?php
namespace Session6Task\RenderData\Api;

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
     */
    public function getDataById($id);

    /**
     * Load
     *
     * @param $value
     * @param null $field
     */
    public function load($value, $field = null);

    /**
     * Create
     */
    public function create();

    /**
     * GetCollection
     */
    public function getCollection();
}
