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

        $leaveLast = $repo->findOneBy([], ["createdAt" => "DESC"], 1);
        if ($leaveLast) {
		    $output->writeln(sprintf(
			    "Last leave is by %s %s.",
			    $leaveLast->getCreatedBy()->getFirstName(),
			    $leaveLast->getCreatedBy()->getLastName()
		    ));
		    return;
	    }

	    $output->writeln("No leaves found.");

	    $client = $this->getContainer()->get("bamboohr_client");
	    $employees = $client->getEmployees();
	    if (!$employees) {
		    $output->writeln("No Employees found.");
		    return;
	    }

	    foreach ($employees as $employee) {
		    $output->writeln(sprintf("%s %s (#%s)", $employee['firstName'], $employee['lastName'], $employee['id']));
	    }
    }
}
