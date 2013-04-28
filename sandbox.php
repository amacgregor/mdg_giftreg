<?php
/**
 * Created by JetBrains PhpStorm.
 * User: amacgregor
 * Date: 13/03/13
 * Time: 6:50 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'app/Mage.php';
umask(0);
Mage::app();

$registry = Mage::getModel('mdg_giftregistry/entity');
$registry
    ->setCustomerId(1)
    ->setWebsiteId(1)
    ->setTypeId(1)
    ->setEventName('Test Event')
    ->setEventDate('2012-10-10')
    ->setEventCountry('Canada')
    ->setEventLocation('Downtown')
;
$registry->save();
print_r($registry);