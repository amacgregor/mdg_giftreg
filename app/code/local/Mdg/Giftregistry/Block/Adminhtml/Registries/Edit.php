<?php
/**
 * Created by JetBrains PhpStorm.
 * User: amacgregor
 * Date: 12/03/13
 * Time: 8:56 PM
 * To change this template use File | Settings | File Templates.
 */
class Mdg_Giftregistry_Block_Adminhtml_Registries_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';

        $this->_controller = 'adminhtml_registries';
        $this->_blockGroup = 'mdg_giftregistry';

        $this->_updateButton('save', 'label', Mage::helper('mdg_giftregistry')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('mdg_giftregistry')->__('Delete'));
    }

    public function getHeaderText()
    {
        return Mage::helper('mdg_giftregistry')->__('Create a new Registry');
    }
}