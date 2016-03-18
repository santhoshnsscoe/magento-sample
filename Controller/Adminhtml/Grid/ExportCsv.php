<?php

namespace VendorName\SampleModule\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportCsv extends \Magento\Backend\App\Action {

    protected $_resultPageFactory;
    protected $_fileFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory, FileFactory $fileFactory) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_fileFactory = $fileFactory;
        parent::__construct($context);
    }

    public function execute() {

        $fileName = 'salesrep-orders.csv';
        $resultPage = $this->_resultPageFactory->create();
        $csv_file = $resultPage->getLayout()
                ->createBlock('VendorName\SampleModule\Block\Adminhtml\Sample\Detail\Grid')
                ->getCsvFile();
        return $this->_fileFactory->create(
            $fileName,
            $csv_file,
            DirectoryList::VAR_DIR
        );
    }

    protected function _isAllowed() {
        return $this->_authorization->isAllowed('VendorName_SampleModule::grid_export');
    }

}
