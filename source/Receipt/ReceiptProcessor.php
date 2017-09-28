<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ReceiptProcessor
{
    private $viewAdapter;

    /**
     * @param ViewAdapter|null $viewAdapter
     *
     * @throws ReceiptException
     */
    public function __construct(ViewAdapter $viewAdapter = null)
    {
        $this->viewAdapter = $viewAdapter == null ? new ConsoleViewAdapter() : null;
        if ($this->viewAdapter == null) {
            throw new ReceiptException("View Adapter cannot be null", ReceiptErrorCode::VIEW_ADAPTER_NULL);
        }
    }

    /**
     * @param string $input
     *
     * @return string
     * @throws ReceiptException
     */
    public function printReceipt($input)
    {
        $itemMapper = new ItemMapper($input);
        $items = $itemMapper->getProceedItems();

        $calculatedItems = [];
        $discounts = 0;
        $subTotal = 0;

        foreach ($items as $item) {
            $calculatedItems[$item->getItemName()] = $item->getItemFullAmount();
            $discounts += $item->getItemDiscount();
            $subTotal += $item->getItemFullAmount();
        }
        $grandTotal = $subTotal - $discounts;

        return $this->viewAdapter->print($items, $subTotal, $discounts, $grandTotal);
    }
}
