<?php
ini_set('data.timezone',"Europe/Warsaw");
ini_set('intl.default_locale',"pl_PL");
setlocale(LC_TIME, 'pl_PL');

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use KamilDemuratRekrutacjaHRtec\Rss\Command\RssAtomSimpleCommand;
use KamilDemuratRekrutacjaHRtec\Rss\Command\RssAtomExtendedCommand;

$application = new Application();

$application->add(new RssAtomSimpleCommand());
$application->add(new RssAtomExtendedCommand());

$application->run();