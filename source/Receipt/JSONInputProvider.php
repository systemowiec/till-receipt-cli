<?php

namespace App\Receipt;

class JSONInputProvider implements ReceiptInputProvider
{
    /**
     * {@inheritdoc}
     */
    public function resolve($input)
    {
        return json_decode($input);
    }
}
