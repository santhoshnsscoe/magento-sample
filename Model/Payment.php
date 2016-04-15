<?php

namespace VendorName\SampleModule\Model;

use Magento\Payment\Model\InfoInterface;

class Payment extends \Magento\Payment\Model\Method\Cc {

    const CODE = 'vendorname_samplemodule';

    protected $_code = self::CODE;
    protected $_infoBlockType = 'VendorName\SampleModule\Block\Info\Cc';
    
    //optional as per our requirmenet
    protected $_isGateway = true;
    protected $_canAuthorize = true;
    protected $_canCapture = true;
    protected $_canCapturePartial = false;
    protected $_canRefund = true;
    protected $_canVoid = true;
    protected $_canUseInternal = true;
    protected $_canUseCheckout = true;
    protected $_canUseForMultishipping = true;
    protected $_authorize = '';
    protected $_authorizeError = false;
    protected $_debugReplacePrivateDataKeys = ['card', 'merc'];

    public function authorize(InfoInterface $payment, $amount) {
        // authorization code
        return $this;
    }

    public function capture(InfoInterface $payment, $amount) {
        // capture code
        return $this;
    }

    public function void(InfoInterface $payment) {
        // payment void code
        return $this;
    }

    public function refund(InfoInterface $payment, $amount) {
        // refund code
        return $this;
    }

}
