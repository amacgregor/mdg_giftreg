<?php
class Mdg_Giftregistry_Test_Model_Registry extends EcomDev_PHPUnit_Test_Case
{
    /**
     * Product price calculation test
     *
     * @test
     * @loadFixture
     * @doNotIndexAll
     * @dataProvider dataProvider
     */
    public function registryList()
    {
        $customerId = 1;
        $registryList = Mage::getModel('mdg_giftregistry/entity')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId);
        $this->assertEquals(
            $this->_getExpectations()->getCount(),$this->_getExpectations()->getCount(),
            $registryList->count()
        );
    }
    /**
     * Listing available items for a specific registry
     *
     * @test
     * @loadFixture
     * @doNotIndexAll
     * @dataProvider dataProvider
     */
    public function registryItemsList()
    {
        $customerId = 1;
        $registry   = Mage::getModel('mdg_giftregistry/entity')->loadByCustomerId($customerId);

        $registryItems = $registry->getItems();
        $this->assertEquals(
            $this->_getExpectations()->getCount(),
            $registryItems->count()
        );
    }
}
