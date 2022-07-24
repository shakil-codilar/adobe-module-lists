<?php

namespace Session6Task\RenderData\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Session6Task\RenderData\Api\Data\EmployeeInterface;
use Session6Task\RenderData\Model\ResourceModel\Employee as ResourceModel;

class Employee extends AbstractExtensibleModel implements EmployeeInterface
{
    /**
     * _construct
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * Set Id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_getData(self::EMAIL);
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->_getData(self::ADDRESS);
    }

    /**
     * Set Address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get PhoneNumber
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->_getData(self::PHONENUMBER);
    }

    /**
     * Set PhoneNumber
     *
     * @param string $number
     * @return $this
     */
    public function setPhoneNumber($number)
    {
        return $this->setData(self::PHONENUMBER, $number);
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get Updated At
     *
     * @return  string
     */
    public function getUpdatedAt()
    {
        return $this->_getData(self::UPDATED_AT);
    }

    /**
     * Set Updated At
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inerhitDoc
     *
     * @return \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set Extension Attribute
     *
     * @param \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface $employeeExtension
     * @return $this
     */
    public function setExtensionAttributes(
        \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface $employeeExtension
    ) {
        return $this->_setExtensionAttributes($employeeExtension);
    }
}
