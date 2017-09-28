<?php

namespace WorldFirst\Receipt;

use WorldFirst\tests\ReceiptTestConstants;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ReceiptProcessorTest extends \PHPUnit_Framework_TestCase
{
    const EXPECTED_OUTPUT = "+-------------------+-------+
| Item              | Price |
+-------------------+-------+
| Baked Beans       | 0.5   |
| Washing Up Liquid | 0.72  |
| Rubber Gloves     | 1.38  |
| Bread             | 0.72  |
| Butter            | 0.83  |
+-------------------+-------+
| Discounts         | 0.12  |
| Sub Total         | 4.15  |
+-------------------+-------+
| Grand Total       | 4.03  |
+-------------------+-------+
";

    /**
     * Test Should Print Receipt
     */
    public function testShouldPrintReceipt()
    {
        // given
        $input = ReceiptTestConstants::$input;
        $receiptProcessor = new ReceiptProcessor();

        // when
        $output = $receiptProcessor->printReceipt($input);

        // then
        $this->assertEquals(self::EXPECTED_OUTPUT, $output);
    }
}
