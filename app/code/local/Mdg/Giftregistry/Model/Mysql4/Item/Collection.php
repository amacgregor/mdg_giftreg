<?php
class Mdg_Giftregistry_Model_Mysql4_Item_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('mdg_giftregistry/item');
        parent::_construct();
    }
}
