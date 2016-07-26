<?php

namespace VendorName\SampleModule\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportCsv extends \Magento\Backend\App\Action {

    const ADMIN_RESOURCE = 'VendorName_SampleModule::grid_export';

    
    protected $_fileFactory;

    public function __construct(Context $context, FileFactory $fileFactory) {
        
        $this->_fileFactory = $fileFactory;
        parent::__construct($context);
    }

    public function execute() {

        $fileName = 'sample-grid.csv';
        $this->_view->loadLayout();
        $csv_file = $this->_view->getLayout()
                ->createBlock('VendorName\SampleModule\Block\Adminhtml\Sample\Detail\Grid')
                ->getCsvFile();
        return $this->_fileFactory->create(
            $fileName,
            $csv_file,
            DirectoryList::VAR_DIR
        );
    }

}
