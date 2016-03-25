<?php

namespace VendorName\PaymentOverride\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    public function isActive($store = null) {
        return $this->getConfig('active', $store);
    }

    public function getMessage($store = null) {
        return $this->getConfig("my_message", $store);
    }

    protected function getConfig($type, $store = null) {
        return $this->scopeConfig->getValue("vendorname_samplemodule/settings/$type", ScopeInterface::SCOPE_STORE, $store);
    }

}
