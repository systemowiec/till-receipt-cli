<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ItemMapper
{
    /**
     * @var string
     */
    private $input;

    /**
     * @var null|JSONInputProvider
     */
    private $receiptInputProvider;

    /**
     * @param string                    $input
     * @param ReceiptInputProvider|null $receiptInputProvider
     *
     * @throws ReceiptException
     */
    public function __construct($input, ReceiptInputProvider $receiptInputProvider = null)
    {
        $this->input = $input;
        $this->receiptInputProvider = $receiptInputProvider == null ? new JSONInputProvider() : null;
        if ($this->receiptInputProvider == null) {
            throw new ReceiptException(
                "Invalid Input Provider",
                ReceiptErrorCode::INVALID_INPUT_PROVIDER
            );
        }
    }

    /**
     * @return Item[]
     * @throws ReceiptException
     */
    public function getProceedItems()
    {
        $translatedArray = $this->receiptInputProvider->resolve($this->input);
        if (!is_array($translatedArray)) {
            throw new ReceiptException(
                "Provider cannot resolve this particular input",
                ReceiptErrorCode::PROVIDER_ERROR
            );
        }

        $items = [];
        foreach ($translatedArray as $i) {
            $itemDiscount = (!empty($i->discount) && $i->discount > 0) ? $i->discount : 0;
            $items[] = new Item($i->item, $i->price, $itemDiscount);
        }

        return $items;
    }
}
