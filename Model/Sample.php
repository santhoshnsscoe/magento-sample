<?php

namespace VendorName\SampleModule\Model;

class Sample extends \Magento\Framework\Model\AbstractModel {

    public function _construct() {
        $this->_init('VendorName\SampleModule\Model\ResourceModel\Detail');
    }

}
