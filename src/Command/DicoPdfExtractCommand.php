<?php

namespace App\Command;

use Smalot\PdfParser\Parser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use Smalot\PdfParser\Parser as PdfParser;

class DicoPdfExtractCommand extends Command
{
    protected static $defaultName = 'dico:pdf:extract';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }
        $parser = new PdfParser();
        $filename='./data/pdf/Dico_4Langue_2015_12_03.pdf';
        $content=null;
        if(file_exists($filename))
            $content = file_get_contents($filename);
      //  dump($content);
        $pdf= $parser->parseFile($filename);
        // Retrieve all pages from the pdf file.
        $pages  = $pdf->getPages();
//dump($pages);
// Loop over each page to extract text.
        foreach ($pages as $page) {
            dump($page->getTextArray());
            //echo $page->getText();
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
