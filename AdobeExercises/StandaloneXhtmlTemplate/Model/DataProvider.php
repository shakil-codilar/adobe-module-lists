<?php
namespace Unit7\StandaloneXhtmlTemplate\Model;

use JetBrains\PhpStorm\ArrayShape;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    /**
     * GetData
     *
     * @return \string[][][]
     */
    #[ArrayShape(['list' => "\string[][]"])] public function getData()
    {
        return [ 'list' => [
            0 =>
                [
                    'name'      => 'Veronica',
                    'lastname'  => 'Costello'
                ]
            ]
        ];
    }
}
