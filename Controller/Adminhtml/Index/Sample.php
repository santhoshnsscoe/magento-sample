<?php

namespace VendorName\SampleModule\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Sample extends \Magento\Backend\App\Action {

    protected $_resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute() {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('VendorName_SampleModule::index');
        $resultPage->getConfig()->getTitle()->prepend(__('My Sample Page'));
        return $resultPage;
    }

    protected function _isAllowed() {
        return $this->_authorization->isAllowed('VendorName_SampleModule::view');
    }

}
