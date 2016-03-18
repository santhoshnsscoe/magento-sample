<?php

namespace VendorName\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        //code to insert initial data to the database
    }

}
