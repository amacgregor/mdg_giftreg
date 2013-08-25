<?php
class Mdg_Giftregistry_Model_Entity extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('mdg_giftregistry/entity');
        parent::_construct();
    }

    public function updateRegistryData(Mage_Customer_Model_Customer $customer, $data)
    {
        Mage::log($this->getData());
        Mage::log($data);

        try{
            if(!empty($data))
            {
                $this->setCustomerId($customer->getId());
                $this->setWebsiteId($customer->getWebsiteId());
                $this->setTypeId($data['type_id']);
                $this->setEventName($data['event_name']);
//                $this->setEventDate($data['event_date']);
                $this->setEventCountry($data['event_country']);
                $this->setEventLocation($data['event_location']);

                Mage::log($this->getData());
            }else{
                throw new Exception("Error Processing Request: Insufficient Data Provided");
            }
        } catch (Exception $e){
            Mage::logException($e);
            return $this;

        }
        return $this;
    }

}
