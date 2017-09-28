<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ReceiptErrorCode
{
    const ITEM_NULL = "Item name cannot be null";
    const PRICE_NULL = "Price cannot be null";
    const INVALID_INPUT_PROVIDER = "Invalid input provider";
    const VIEW_ADAPTER_NULL = "View adapter cannot be null";
    const PROVIDER_ERROR = "Provider cannot resolve this particular input";
}
