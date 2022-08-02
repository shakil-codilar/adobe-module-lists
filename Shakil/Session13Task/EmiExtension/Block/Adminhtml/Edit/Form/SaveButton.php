<?php

namespace Session13Task\EmiExtension\Block\Adminhtml\Edit\Form;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
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
                                'targetName' => 'emi_edit_form.emi_edit_form',
                                'actionName' => 'save',
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
