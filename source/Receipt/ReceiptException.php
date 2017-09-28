<?php

namespace App\Receipt;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ReceiptException extends \Exception
{
    /**
     * @var int
     */
    private $errorCodes;

    /**
     * ReceiptException constructor.
     *
     * @param string $message
     * @param int    $errorCodes
     */
    public function __construct($message, $errorCodes)
    {
        parent::__construct($message);
        $this->errorCodes = $errorCodes;
    }

    /**
     * @return string
     */
    public function getErrorCodes()
    {
        return $this->errorCodes;
    }
}
