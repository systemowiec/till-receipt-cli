<?php /** @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved. */

use Symfony\Component\Console\Application;
use WorldFirst\Receipt\ReceiptCommand;

require __DIR__ . '/vendor/autoload.php';

$application = new Application('ReceiptApplication', '1.0');
$application->add(new ReceiptCommand());
$application->run();
