<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class Item
{
    /**
     * @var string
     */
    private $itemName;

    /**
     * @var float
     */
    private $itemPrice;

    /**
     * @var integer
     */
    private $itemDiscount;

    /**
     * @param string  $itemName
     * @param float   $itemPrice
     * @param integer $itemDiscount
     *
     * @throws ReceiptException
     */
    public function __construct($itemName, $itemPrice, $itemDiscount = 0)
    {
        $errorCodes = $this->getFailureErrorCodes($itemName, $itemPrice);

        if (!empty($errorCodes)) {
            throw new ReceiptException("Item cannot be created", $errorCodes);
        }

        $this->itemName = $itemName;
        $this->itemPrice = $itemPrice;
        $this->itemDiscount = $itemDiscount;
    }

    /**
     * @return mixed
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @return mixed
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @return mixed
     */
    public function getItemDiscount()
    {
        return $this->itemDiscount;
    }

    /**
     * @return mixed
     */
    public function getItemFullAmount()
    {
        return $this->itemPrice - $this->itemDiscount;
    }

    /**
     * @param string $itemName
     * @param float  $itemPrice
     *
     * @return array
     */
    public function getFailureErrorCodes($itemName, $itemPrice)
    {
        $errorCodes = [];
        if (empty($itemName)) {
            $errorCodes[] = ReceiptErrorCode::ITEM_NULL;
        }

        if (empty($itemPrice)) {
            $errorCodes[] = ReceiptErrorCode::PRICE_NULL;

            return $errorCodes;
        }

        return $errorCodes;
    }
}
