<?php

namespace WorldFirst\tests;

use PHPUnit_Framework_TestCase;
use WorldFirst\Receipt\ItemMapper;
use WorldFirst\Receipt\ReceiptException;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ItemMapperTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test Should Map To Item Collection
     */
    public function testShouldMapToItemCollection()
    {
        // when
        $input = ReceiptTestConstants::$input;
        $itemMapper = new ItemMapper($input);
        $items = $itemMapper->getProceedItems();

        // then
        $arr = json_decode($input);
        foreach ($arr as $i => $z) {
            $this->assertEquals($z->item, $items[$i]->getItemName());
            $this->assertEquals($z->price, $items[$i]->getItemPrice());
        }

        $this->assertEquals(count($items), 5);
    }

    /**
     * Test Should Not Process If Not Valid Input
     */
    public function testShouldNotProcessIfNotValidInput()
    {
        // when
        $itemMapper = new ItemMapper("something");
        $result = false;
        try {
            $items = $itemMapper->getProceedItems();
        } catch (ReceiptException $e) {
            $result = true;
        }

        // then
        $this->assertTrue($result);
    }
}
