<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Command;

use JMS\Serializer\SerializerBuilder;
use KamilDemuratRekrutacjaHRtec\Rss\Downloader\NationalGeographicDownloader;
use KamilDemuratRekrutacjaHRtec\Rss\Writer\CsvWriter;
use KamilDemuratRekrutacjaHRtec\Rss\Reader\NationalGeographicReader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RssAtomSimpleCommand extends Command
{
    protected static $defaultName = 'csv:simple'; //nie mozna ustawic typowania - nadpisana zmienna statyczna

    protected ValidatorInterface $validation;

    public function __construct()
    {
        parent::__construct();
        $this->validation = Validation::createValidator();
    }


    protected function configure(): void
    {
        $this
            ->setDescription(
        'This command allows you to download RSS/Atom data from the url passed as URL argument and
                save to the path passed as the PATH argument. Old data in the file will be override',
            )
            ->addArgument('URL', InputArgument::REQUIRED, 'Url to download RSS/Atom data')
            ->addArgument('PATH', InputArgument::REQUIRED, 'Path where data should be save')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $logger = new ConsoleLogger($output);

        $validationResult = $this->validation->validate($input->getArgument('URL'), new Url());

        if ($validationResult->count() > 0) {
            $logger->error(sprintf("URL %s is not valid", $input->getArgument('URL')));

            return Command::INVALID;
        }

        try {
            $serializer = SerializerBuilder::create()->build();

            $downloader = new NationalGeographicDownloader(
                new NationalGeographicReader(),
                $serializer,
                new CsvWriter(),
                $logger
            );

            $downloader->download($input->getArgument('URL'), $input->getArgument("PATH"));

            return Command::SUCCESS;
        } catch (\Throwable $throwable) {
            $logger->error(
                sprintf(
                    "Error during download simple data from url %s to path %s",
                    $input->getArgument('URL'),
                    $input->getArgument('PATH')
                ), [
                    'exception' => $throwable,
                ]
            );

            return Command::FAILURE;
        }
    }
}