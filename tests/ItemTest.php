<?php

namespace WorldFirst\tests;

use PHPUnit_Framework_TestCase;
use WorldFirst\Receipt\Item;
use WorldFirst\Receipt\ReceiptErrorCode;
use WorldFirst\Receipt\ReceiptException;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ItemTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test Should Create Item
     */
    public function testShouldCreateItem()
    {
        $item = new Item('Baked Beans', 0.50);
        $this->assertTrue(is_object($item));

        $this->assertEquals($item->getItemName(), 'Baked Beans');
        $this->assertEquals($item->getItemPrice(), 0.50);
    }

    /**
     * Test Should Not Create Item If Not Valid With All Parameters
     */
    public function testShouldNotCreateItemIfNotValidWithAllParameters()
    {
        // when
        $notValidItem = false;
        try {
            new Item('', null);
        } catch (ReceiptException $e) {
            $notValidItem = true;
            $this->assertContains(ReceiptErrorCode::ITEM_NULL, $e->getErrorCodes());
            $this->assertContains(ReceiptErrorCode::PRICE_NULL, $e->getErrorCodes());
        }

        // then
        $this->assertTrue($notValidItem);

        // when
        $notValidItem = false;
        try {
            new Item('', 0.50);
        } catch (ReceiptException $e) {
            $notValidItem = true;
            $this->assertContains(ReceiptErrorCode::ITEM_NULL, $e->getErrorCodes());
            $this->assertNotContains(ReceiptErrorCode::PRICE_NULL, $e->getErrorCodes());
        }

        // then
        $this->assertTrue($notValidItem);

        // when
        $notValidItem = false;
        try {
            new Item('Baked Beans', null);
        } catch (ReceiptException $e) {
            $notValidItem = true;
            $this->assertNotContains(ReceiptErrorCode::ITEM_NULL, $e->getErrorCodes());
            $this->assertContains(ReceiptErrorCode::PRICE_NULL, $e->getErrorCodes());
        }

        // then
        $this->assertTrue($notValidItem);
    }
}
