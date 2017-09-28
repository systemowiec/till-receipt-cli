<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
interface ReceiptInputProvider
{
    /**
     * @param string $input
     *
     * @return array
     */
    public function resolve($input);
}
