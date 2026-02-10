<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use ShopApi\V1\Http\ApiClient;
use ShopApi\V1\Repository\ProducerRepository;
use ShopApi\V1\Model\Producer;

#[AsCommand(name: "shop-api:producers:create-one")]
class CreateOneProducerCommand extends Command
{
    public function __construct(
        protected ApiClient $apiClient,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Wprowadź dane w celu dodania nowego producer'a");

        $formData = $this->getFormData($input, $output);

        $producerRepository = new ProducerRepository($this->apiClient);

        $producer = new Producer(...$formData);

        dump($producerRepository->create($producer));

        return Command::SUCCESS;
    }

    private function getFormData(InputInterface $input, OutputInterface $output): array
    {
        $helper = $this->getHelper("question");
        $formFields = [
            "id" => new Question("Identyfikator: "),
            "name" => new Question("Imię: "),
            "siteUrl" => new Question("Adres strony: "),
            "logoFilename" => new Question("Nazwa logotypu: "),
            "ordering" => new Question("Kolejność: "),
            "sourceId" => new Question("Identyfikator źródła: "),
        ];

        $formData = [];
        
        foreach ($formFields as $key => $field) {
            $formData[$key] = $helper->ask($input, $output, $field);
        }

        return $formData;
    }
}
