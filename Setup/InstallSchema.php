<?php

namespace VendorName\SampleModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $table = $setup->getConnection()
                ->newTable($setup->getTable('my_sample_table'))
                ->addColumn('sample_id', Table::TYPE_INTEGER, null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true,
                        ], 'Sample Id')
                ->addColumn('text_column', Table::TYPE_TEXT, 25, [], 'Text Column')
                ->addColumn('updated', Table::TYPE_BOOLEAN, null, [
                    'default' => 0,
                    'nullable' => FALSE,
                        ], 'Updated')
                ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, [
                    'nullable' => true,
                        ], 'Updated date')
                ->setComment('Sample Table');
        $setup->getConnection()->createTable($table);
    }

}
