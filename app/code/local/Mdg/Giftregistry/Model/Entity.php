<?php
class Mdg_Giftregistry_Model_Entity extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('mdg_giftregistry/entity');
        parent::_construct();
    }

    protected function setRegistryData(Mage_Customer_Model_Customer $customer, $data)
    {
        try{
            if(!empty($data))
            {
                $this->setCustomerId($customer->getId());
                $this->setWebsiteId($customer->getWebsiteId());
                $this->setTypeId($data['type_id']);
                $this->setEventData($data['event_date']);
                $this->setEventCountry($data['event_country']);
                $this->setEventLocation($data['event_location']);
            }else{
                throw new Exception("Error Processing Request: Insufficient Data Provided");
            }
        } catch (Exception $e){
            Mage::logException($e);
        }
        return $this;
    }

}
