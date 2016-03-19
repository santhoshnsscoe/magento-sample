<?php

namespace VendorName\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SampleCommand extends Command {

    //params
    protected $_limit;
    protected $_mylimit;

    protected function configure() {
        $this->setName('mysample:update')
                ->setDescription('Update the data using command.')
                ->setDefinition($this->getInputList());
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->addArguments($input);
        $output->writeln("Limit = {$this->_limit}");
        $output->writeln("Option Limit = {$this->_mylimit}");

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
        $this->_mylimit = intval($input->getOption("mylimit"));
    }

    public function getInputList() {
        $inputList = [];
        $inputList[] = new InputArgument('limit', InputArgument::OPTIONAL, 'Collection Limit as Argument', 100);
        $inputList[] = new InputOption('mylimit', null, InputOption::VALUE_OPTIONAL, 'Collection Limit as Option', 100);
        return $inputList;
    }

}
