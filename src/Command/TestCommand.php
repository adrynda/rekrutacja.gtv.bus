<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ShopApi\V1\Http\ApiClient;
use ShopApi\V1\Repository\ProducerRepository;
use ShopApi\V1\Model\Producer;

#[AsCommand(name: "sdk-test")]
class TestCommand extends Command
{
    public function __construct(
        protected ApiClient $apiClient,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // $output->writeln("asdasd");

        $producerRepository = new ProducerRepository($this->apiClient);

        $producer = new Producer(
            id: 5,
            name: 'name',
            siteUrl: 'site url',
            logoFilename: 'logo filename',
            ordering: 11,
            sourceId: 'source id',
        );

        dd($producerRepository->createOne($producer), $this::class);
        dd($producerRepository->getAll(), $this::class);

        return Command::SUCCESS;
    }
}
