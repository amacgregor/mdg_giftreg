<?php
class Mdg_Giftregistry_Block_Adminhtml_Customer_Edit_Tab_Giftregistry_List extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('registryList');
        $this->setUseAjax(true);
        $this->setDefaultSort('event_date');
        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('mdg_giftregistry/entity')
            ->getCollection()
            ->addFieldToFilter('main_table.customer_id', $this->getRequest()->getParam('id'));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header'   => Mage::helper('mdg_giftregistry')->__('Id'),
            'width'    => 50,
            'index'    => 'entity_id',
            'sortable' => false,
        ));

        $this->addColumn('event_location', array(
            'header'   => Mage::helper('mdg_giftregistry')->__('Location'),
            'index'    => 'event_location',
            'sortable' => false,
        ));

        $this->addColumn('event_date', array(
            'header'   => Mage::helper('mdg_giftregistry')->__('Event Date'),
            'index'    => 'event_date',
            'sortable' => false,
        ));

        $this->addColumn('type_id', array(
            'header'   => Mage::helper('mdg_giftregistry')->__('Event Type'),
            'index'    => 'type_id',
            'sortable' => false,
        ));
        return parent::_prepareColumns();
    }
}
