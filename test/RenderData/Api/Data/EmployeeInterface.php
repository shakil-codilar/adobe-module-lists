<?php

namespace Session6Task\RenderData\Api\Data;

use Magento\Framework\Api\CustomAttributesDataInterface;
use Magento\Framework\Api\ExtensibleDataInterface;

interface EmployeeInterface extends ExtensibleDataInterface
{
    public const  ID="entity_id";
    public const  NAME="name";
    public const  EMAIL="email";
    public const ADDRESS="address";
    public const  PHONENUMBER="phonenumber";
    public const DESCRIPTION="description";
    public const CREATED_AT="created_at";
    public const UPDATED_AT="updated_at";

    /**
     * Get Id
     *
     * @return  int
     */
    public function getId();

    /**
     * Set Id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id);
    /**
     * Get Name
     *
     * @return  string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param string  $name
     * @return $this
     */
    public function setName($name);
    /**
     * Get Email
     *
     * @return  string
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);
    /**
     * Get Address
     *
     * @return  string
     */
    public function getAddress();

    /**
     * Set Address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address);
    /**
     * Get PhoneNumber
     *
     * @return  int
     */
    public function getPhoneNumber();

    /**
     * Set PhoneNumber
     *
     * @param string $number
     * @return $this
     */
    public function setPhoneNumber($number);
    /**
     * Get Description
     *
     * @return  string
     */
    public function getDescription();

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);
    /**
     * Get Created At
     *
     * @return  string
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
    /**
     * Get Updated At
     *
     * @return  string
     */
    public function getUpdatedAt();

    /**
     * Set Updated At
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set Extension Attribute
     *
     * @param \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface  $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Session6Task\RenderData\Api\Data\EmployeeExtensionInterface
        $extensionAttributes
    );
}
