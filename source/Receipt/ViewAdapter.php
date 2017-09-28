<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
interface ViewAdapter
{
    /**
     * @param array   $items
     * @param float   $subTotal
     * @param integer $discount
     * @param float   $grandTotal
     *
     * @return string
     */
    public function print(array $items, $subTotal, $discount, $grandTotal);
}
