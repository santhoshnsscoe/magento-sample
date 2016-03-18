<?php

namespace VendorName\SampleModule\Model\ResourceModel;

class Sample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    
    public function _construct() {
        $this->_init('my_sample_table', 'sample_id');
    }

}