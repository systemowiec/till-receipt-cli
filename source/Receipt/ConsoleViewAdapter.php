<?php

namespace App\Receipt;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ConsoleViewAdapter implements ViewAdapter
{
    /**
     * {@inheritdoc}
     */
    public function print(array $items, $subTotal, $discount, $grandTotal)
    {
        $preparedItems = [];

        $output = new BufferedOutput();
        $table = new Table($output);
        $table->setHeaders(["Item", "Price"]);

        /** @var Item $i */
        foreach ($items as $i) {
            $preparedItems[] = [$i->getItemName(), $i->getItemFullAmount()];
        }

        $preparedItems[] = new TableSeparator();
        $preparedItems[] = ["Discounts", $discount];
        $preparedItems[] = ["Sub Total", $subTotal];
        $preparedItems[] = new TableSeparator();
        $preparedItems[] = ["Grand Total", $grandTotal];
        $table->setRows($preparedItems);
        $table->render();

        return $output->fetch();
    }
}
