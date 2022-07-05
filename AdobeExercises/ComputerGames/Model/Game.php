<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit8\ComputerGames\Model;

use Unit8\ComputerGames\Model\ResourceModel\Game as GameResourceModel;

/**
 * Class Game
 * @package Unit8\ComputerGames\Model
 */
class Game extends \Magento\Framework\Model\AbstractExtensibleModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GameResourceModel::class);
    }

    /**
     * @return array
     */
    public function getCustomAttributesCodes()
    {
        return array('game_id', 'name', 'type', 'trial_period', 'release_date', 'image');
    }
}
