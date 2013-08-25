<?php
class Mdg_Giftregistry_IndexController extends Mage_Core_Controller_Front_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    public function _initModel($param = 'registry_id')
    {
        $model = Mage::getModel('mdg_giftregistry/entity');
        $model->setStoreId($this->getRequest()->getParam('store', 0));

        if( $modelId = $this->getRequest()->getParam($param))
        {
            $model->load($modelId);
            if(!$model->getId())
            {
                Mage::throwException($this->__('There was a problem initializing the gift registry.'));
            }

        }
        Mage::register('current_giftregistry', $model);
        return $model;
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function deleteAction()
    {
        try {
            $registryId = $this->getRequest()->getParam('registry_id');
            if($registryId){
                if($registry = Mage::getModel('mdg_giftregistry/entity')->load($registryId))
                {
                    $registry->delete();
                    $successMessage =  Mage::helper('mdg_giftregistry')->__('Gift registry has been successfully deleted.');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                    $this->_redirect('*/*/');

                }else{
                    throw new Exception("There was a problem deleting the registry");
                }
            }
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
    }

    public function newAction()
    {
        $this->_initModel();
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function editAction()
    {
        $this->_initModel();
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }


    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {

                $model = $this->_initModel();

                if($model === false)
                {
                    throw new Exception("There was a problem saving the registry");
                }
                $customer   = Mage::getSingleton('customer/session')->getCustomer();

                // Update the model with the form data
                $model->updateRegistryData($customer, $data);
                $model->save();

                Mage::getSingleton('core/session')
                        ->addSuccess($this->__('The gift registry has been saved.'));

                if ($redirectBack = $this->getRequest()->getParam('back', false)) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), 'store' => $model->getStoreId()));
                    return;
                }

            } catch (Mage_Core_Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('core/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $model->getId()));
                return;
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError($this->__('There was an error trying to save the gift registry.'));
                Mage::logException($e);
            }
        }
        $this->_redirect('*/*/');
    }
}
