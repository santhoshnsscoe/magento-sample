<?php

namespace VendorName\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SampleCommand extends Command {

    //params
    protected $_limit;

    protected function configure() {
        $this->setName('mysample:update')
                ->setDescription('Update the data using command.')
                ->setDefinition($this->getInputList());
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->addArguments($input);

        try {
            //code to execute
            $output->writeln('Updated the command.');
        } catch (LocalizedException $e) {
            $output->writeln($e->getMessage());
        } catch (\Exception $e) {
            $output->writeln('Not able to update');
            $output->writeln($e->getMessage());
        }
    }

    public function addArguments($input) {
        $this->_limit = intval($input->getArgument("limit"));
        if ($this->_limit <= 0) {
            $this->_limit = 100;
        }
    }

    public function getInputList() {
        $inputList = [];
        $inputList[] = new InputArgument('limit', InputArgument::OPTIONAL, 'Collection Limit');
        return $inputList;
    }

}
