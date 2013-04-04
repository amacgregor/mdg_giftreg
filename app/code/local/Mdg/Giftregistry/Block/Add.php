<?php

class Mdg_Giftregistry_Block_Add extends Mage_Core_Block_Template
{
    public function getCustomerRegistryCollection()
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();

        if ($customer) {
            $collection = Mage::getModel('mdg_giftregistry/entity')->getCollection()
                ->addFieldToFilter('customer_id', $customer->getId());
            return $collection;
        } else {
            return false;
        }
    }
}