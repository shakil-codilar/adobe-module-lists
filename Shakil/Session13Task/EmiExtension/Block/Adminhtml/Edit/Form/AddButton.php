<?php

namespace Session13Task\EmiExtension\Block\Adminhtml\Edit\Form;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class AddButton implements ButtonProviderInterface
{
    /**
     * @var $request
     */
    protected $request;
    /**
     * @param RequestInterface $request
     */
    public function __construct(
        RequestInterface $request
    ) {
        $this->request=$request;
    }

    /**
     * GetButtonData
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $id = $this->request->getParam('emi_id');
        return [
            'label' => __('Save '),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'emi_add_form.emi_add_form',
                                'actionName' => 'submit',
                                'params' => [
                                    true,
                                    ['emi_id' =>$id],
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ];
    }
}
