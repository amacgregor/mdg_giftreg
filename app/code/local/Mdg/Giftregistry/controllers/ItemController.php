<?php

class Mdg_Giftregistry_ItemController extends Mage_Core_Controller_Front_Action
{
    public function addAction()
    {
        try {
            $data = $this->getRequest()->getParams();

            $registryItem = Mage::getModel('mdg_giftregistry/item');

            if($this->getRequest()->getPost() && !empty($data)) {

                $registryItem->setProductId($data['product_id']);
                $registryItem->setRegistryId($data['registry_id']);
                $registryItem->save();
                $successMessage =  Mage::helper('mdg_giftregistry')->__('Product Successfully Added to the Registry');
                Mage::getSingleton('core/session')->addSuccess($successMessage);
            }else{
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirectUrl($this->_getRefererUrl());
        }
        $this->_redirectUrl($this->_getRefererUrl());
    }

    public function editAction()
    {
        return $this;
    }
    public function deleteAction()
    {
        return $this;
    }
}