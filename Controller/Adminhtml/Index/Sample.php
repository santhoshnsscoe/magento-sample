<?php

namespace VendorName\SampleModule\Controller\Adminhtml\Index;

class Sample extends \Magento\Backend\App\Action {

    const ADMIN_RESOURCE = 'VendorName_SampleModule::view';

    public function execute() {
        $this->_view->loadLayout();
        $this->_setActiveMenu('VendorName_SampleModule::index');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('My Sample Page'));
        $this->_view->renderLayout();
    }

}
