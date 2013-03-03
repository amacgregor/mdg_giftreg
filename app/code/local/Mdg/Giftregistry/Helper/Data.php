<?php
class Mdg_Giftregistry_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getEventTypes()
    {
        $collection = Mage::getModel('mdg_giftregistry/type')->getCollection();
        return $collection;
    }
}

