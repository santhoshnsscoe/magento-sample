<?php

namespace VendorName\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Sales\Setup\SalesSetupFactory;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements InstallDataInterface {

    protected $_salesSetupFactory;
    protected $_quoteSetupFactory;
    protected $_categorySetupFactory;

    public function __construct(SalesSetupFactory $salesSetupFactory, QuoteSetupFactory $quoteSetupFactory, CategorySetupFactory $categorySetupFactory) {
        $this->_salesSetupFactory = $salesSetupFactory;
        $this->_quoteSetupFactory = $quoteSetupFactory;
        $this->_categorySetupFactory = $categorySetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {

        $salesInstaller = $this->_salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);
        $quoteInstaller = $this->_quoteSetupFactory->create(['resourceName' => 'quote_setup', 'setup' => $setup]);
        $catalogInstaller = $this->_categorySetupFactory->create(['setup' => $setup]);

        $this->addQuoteAttributes($quoteInstaller);
        $this->addOrderAttributes($salesInstaller);
        $this->addInvoiceAttributes($salesInstaller);
        $this->addCreditmemoAttribute($salesInstaller);
        $this->addCategoryAttributes($catalogInstaller);
        $this->addProductAttributes($catalogInstaller);
    }

    public function addQuoteAttributes($installer) {
        $installer->addAttribute('quote', 'sample_module_field', ['type' => 'text']);
        $installer->addAttribute('quote_address', 'sample_module_field', ['type' => 'text']);
    }

    public function addOrderAttributes($installer) {
        $installer->addAttribute('order', 'sample_module_field', ['type' => 'text']);
    }

    public function addInvoiceAttributes($installer) {
        $installer->addAttribute('invoice', 'sample_module_field', ['type' => 'text']);
    }

    public function addCreditmemoAttribute($installer) {
        $installer->addAttribute('creditmemo', 'sample_module_field', ['type' => 'text']);
    }

    public function addCategoryAttributes($installer) {
        $installer->addAttribute('catalog_category', 'sample_module_field', [
            'type' => 'varchar',
            'label' => 'Sample Module Field',
            'input' => 'text',
            'required' => false,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General Information',
            'sort_order' => 30,
                ]
        );
    }

    public function addProductAttributes($installer) {
        $installer->addAttribute('catalog_category', 'sample_module_field', [
            'type' => 'varchar',
            'label' => 'Sample Module Field',
            'input' => 'text',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'user_defined' => true,
            'required' => false,
                ]
        );
    }

}
