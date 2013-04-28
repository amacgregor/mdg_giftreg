<?php
class Mdg_Giftregistry_Model_Api_Registry_Rest_Admin_V1 extends Mage_Catalog_Model_Api2_Product_Rest 
{
    /**
     * @return stdClass
     */
    protected function _retrieve()
    {
        $registryCollection = Mage::getModel('mdg_giftregistry/entity')->getCollection();
        return $registryCollection;
    }
}