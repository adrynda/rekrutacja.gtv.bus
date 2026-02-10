<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ShopApi\V1\Http\ApiClient;
use ShopApi\V1\Repository\ProducerRepository;

#[AsCommand(name: "shop-api:producers:get-all")]
class GetAllProducersCommand extends Command
{
    public function __construct(
        protected ApiClient $apiClient,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Lista zapisanych producer'ów:");

        $producerRepository = new ProducerRepository($this->apiClient);

        dump($producerRepository->getAll());

        return Command::SUCCESS;
    }
}
