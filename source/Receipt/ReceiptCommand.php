<?php

namespace App\Receipt;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @copyright 2016 Jarosław Stańczyk <jaroslaw@stanczyk.co.uk>. All rights reserved.
 */
class ReceiptCommand extends Command
{
    /**
     * @var ReceiptProcessor
     */
    private $receiptProcessor;

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('receipt')
            ->setDescription('Application made to print receipt')
            ->addArgument("input", InputArgument::REQUIRED, "Receipt json array is required");
        $this->receiptProcessor = new ReceiptProcessor();
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->receiptProcessor->printReceipt($input->getArgument('input')));
    }
}
