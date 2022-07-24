<?php
namespace Session6Task\RenderData\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Session6Task\RenderData\Api\Data\EmployeeDetailsInterface;

class EmployeeDetails extends AbstractExtensibleModel implements EmployeeDetailsInterface
{

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
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
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION);
    }

    /**
     * @inheritdoc
     *
     * @return \Session6Task\RenderData\Api\Data\EmployeeDetailsExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritdoc
     *
     * @param  \Session6Task\RenderData\Api\Data\EmployeeDetailsExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Session6Task\RenderData\Api\Data\EmployeeDetailsExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
