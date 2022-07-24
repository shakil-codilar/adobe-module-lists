<?php

namespace Session6Task\RenderData\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface EmployeeDetailsInterface extends ExtensibleDataInterface
{
    public const NAME = "name";
    public const DESCRIPTION = "description";

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);
}
