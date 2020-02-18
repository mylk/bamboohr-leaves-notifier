<?php

namespace BambooHrLeavesNotifier\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use BambooHrLeavesNotifier\Entity\Leave;

class PollCommand extends ContainerAwareCommand
{
    public function configure(): void
    {
        $this->setName("poll")
            ->setDescription("Polls leaves")
            ->setHelp("Uses the BambooHR API to poll for leaves and changes on their status.");
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
    	$repo = $this->getContainer()->get("entity_manager")->getRepository(Leave::class);

    	$leaves = $repo->findAll();
    	foreach ($leaves as $leave) {
    		$output->writeln($leave->getName());
	    }
	    $output->writeln("Hello, world!");
    }
}
