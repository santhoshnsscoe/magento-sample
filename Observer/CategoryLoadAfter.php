<?php

namespace VendorName\SampleModule\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class CategoryLoadAfter implements ObserverInterface {

    public function execute(Observer $observer) {
        $category = $observer->getEvent()->getCategory();
        //code to use the observer event
        return $this;
    }

}
