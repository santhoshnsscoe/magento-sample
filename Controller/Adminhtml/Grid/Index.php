<?php

namespace VendorName\SampleModule\Controller\Adminhtml\Grid;

class Index extends \Magento\Backend\App\Action {

    const ADMIN_RESOURCE = 'VendorName_SampleModule::grid';

    public function execute() {
        $this->_view->loadLayout();
        $this->_setActiveMenu('VendorName_SampleModule::index');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('My Sample Grid'));
        $this->_addContent(
                $this->_view->getLayout()->createBlock('VendorName\SampleModule\Block\Adminhtml\Sample\Detail')
        );
        $this->_view->renderLayout();
    }

}
