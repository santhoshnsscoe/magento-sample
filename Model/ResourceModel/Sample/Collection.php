<?php

namespace VendorName\SampleModule\Model\ResourceModel\Sample;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    
    public function _construct() {
        $this->_init('VendorName\SampleModule\Model\Sample', 'VendorName\SampleModule\Model\ResourceModel\Sample');
    }

}
