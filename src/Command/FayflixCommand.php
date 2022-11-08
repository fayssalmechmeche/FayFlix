<?php

namespace App\Command;

use App\Service\TwitterApiService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'Fayflix',
    description: 'Bot Twitter',
)]


class FayflixCommand extends Command
{
    private $twitterApi;

    public function __construct(TwitterApiService $twitterApi)
    {
        parent::__construct();
        $this->twitterApi = $twitterApi;
    }
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {



        $this->twitterApi->post();
        return Command::SUCCESS;
    }
}
