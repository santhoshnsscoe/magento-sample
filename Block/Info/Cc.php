<?php
namespace VendorName\SampleModule\Block\Info;

class Cc extends \Magento\Payment\Block\Info\Cc {

    protected $_template = 'VendorName_SampleModule::info/cc.phtml';

    public function getAdditionalInformation($key = null) {
        return $this->getInfo()->getAdditionalInformation($key);
    }

}
