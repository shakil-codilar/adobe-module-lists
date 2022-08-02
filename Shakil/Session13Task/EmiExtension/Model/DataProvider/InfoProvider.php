<?php

namespace Session13Task\EmiExtension\Model\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Session13Task\EmiExtension\Model\ResourceModel\Emi\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class InfoProvider extends AbstractDataProvider
{
    /**
     * @var DataPersistorInterface $dataPersistor
     */
    protected DataPersistorInterface $dataPersistor;
    /**
     * @var $loadedData
     */
    protected $loadedData;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    //to show datas in edit form

    /**
     * GetData
     *
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = [];
        foreach ($items as $brand) {
            $this->loadedData[$brand->getEmiId()] = $brand->getData();
        }

        return $this->loadedData;
    }
}
