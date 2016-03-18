<?php

namespace VendorName\SampleModule\Block\Adminhtml\Sample;

class Detail extends \Magento\Backend\Block\Widget\Grid\Container {

    protected function _construct() {
        $this->_controller = 'adminhtml_sample_detail';
        $this->_blockGroup = 'VendorName_SampleModule';
        $this->_headerText = __('My Sample Grid');
        parent::_construct();
    }

}
